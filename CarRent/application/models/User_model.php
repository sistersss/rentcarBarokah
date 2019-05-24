<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function getDataPelanggan()
	{
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}

	public function getKeterangan()
	{
		$query = $this->db->get('keterangan');
		return $query->result_array();
	}

	public function cekLogin($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('pelanggan');
		return $query->num_rows();
	}

	public function getDataPelangganByUsername($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('pelanggan');
		return $query->row();
	}

	public function getDataPelangganById($id)
	{
		$this->db->where('id_pelanggan', $id);
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}

	public function getLastPelanggan()
	{
		$this->db->order_by('id_pelanggan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}

	public function addPelanggan()
	{
		$object = array('nama_pelanggan' => $this->input->post('nama_pelanggan'),
						'alamat' => $this->input->post('alamat'),
						'no_telp' => $this->input->post('no_telp'),
						'email' => $this->input->post('email'),
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'));
		$this->db->insert("pelanggan", $object);
	}

	public function updatePelanggan($id)
	{
		$object = array('nama_pelanggan' => $this->input->post('nama_pelanggan'),
						'alamat' => $this->input->post('alamat'),
						'no_telp' => $this->input->post('no_telp'),
						'email' => $this->input->post('email'),
						'username' => $this->input->post('username'),
						'password' => $this->input->post('password'));
		$this->db->where('id_pelanggan', $id);
		$this->db->update('pelanggan', $object);
	}

	public function deletePelanggan($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->delete("pelanggan");
	}
}
?>