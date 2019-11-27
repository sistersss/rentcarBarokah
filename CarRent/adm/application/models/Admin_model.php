<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function getAdmin()
	{
		$query = $this->db->get('admin');
		return $query->result_array();
	}

	public function getIklan()
	{
		$query = $this->db->get('iklan');
		return $query->result_array();
	}

	public function addIklan($img)
	{
		$object = array('nama_iklan' => $this->input->post('nama_iklan'),
		            	'gambar' => $img);
		$this->db->insert("iklan", $object);
	}

	public function editIklan($id,$img)
	{
		$object = array('nama_iklan' => $this->input->post('nama_iklan'));
		if ($img!=null) {
			$object['gambar'] = $img;
		}
		$this->db->where('id_iklan', $id);
		$this->db->update("iklan", $object);
	}

	public function deleteIklan($id)
	{
		$this->db->where('id_iklan', $id);
		$this->db->delete("iklan");
	}

	public function getNotifikasi()
	{
		$this->db->select('pelanggan.nama_pelanggan');
		$this->db->join('transaction','transaction.id_transaksi=notifikasi.id_transaksi');
		$this->db->join('pelanggan','pelanggan.id_pelanggan=transaction.id_pelanggan');
		$this->db->order_by('notifikasi.created_at', 'DESC');
		$query = $this->db->get('notifikasi');
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
