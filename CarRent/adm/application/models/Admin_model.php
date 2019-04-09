<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function getAdmin()
	{
		$query = $this->db->get('admin');
		return $query->result_array();
	}

	public function getAdminById($id)
	{
		$this->db->where('id_admin', $id);
		$query = $this->db->get('admin');
		return $query->result_array();
	}

	public function editAdmin($id)
	{
		$object = array('nama_admin' => $this->input->post('nama_admin'),
						'username' => $this->input->post('username'));
		if($this->input->post('password') != ""){
			$object['password'] = $this->input->post('password');
		}
		$this->db->where('id_admin', $id);
		$this->db->update("admin", $object);
	}

	public function cekLogin($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('admin');
		return $query->num_rows();
	}

	public function getDataAdminByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		return $query->row();
	}

}