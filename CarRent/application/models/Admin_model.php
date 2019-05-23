<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function getAdmin()
	{
		$query = $this->db->get('admin');
		return $query->result_array();
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

<<<<<<< HEAD
	public function getAllMobil()
	{
		$query = $this->db->get('mobil');
		return $query->num_rows();
	}

	public function getBookMobil()
	{
		$this->db->where('mobil.kuota_mobil', 0);
		$query = $this->db->get('mobil');
		return $query->num_rows();
	}

	public function getAvaMobil()
	{
		$this->db->where('mobil.kuota_mobil>0');
		$query = $this->db->get('mobil');
		return $query->num_rows();
	}

	public function getAllPelanggan()
	{
		$query = $this->db->get('pelanggan');
		return $query->num_rows();
	}

=======
>>>>>>> 460e7e1d9e03539ede55e2bfe2fe208d77f5aeef
	public function editAdmin($id)
	{
		$object = array('nama_admin' => $this->input->post('nama_admin'),
						'username' => $this->input->post('username'));
		if($this->input->post('password') != ""){
<<<<<<< HEAD
			$object['password'] = md5($this->input->post('password'));
=======
			$object['password'] = $this->input->post('password');
>>>>>>> 460e7e1d9e03539ede55e2bfe2fe208d77f5aeef
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
