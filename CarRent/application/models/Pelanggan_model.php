<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
	
	public function getPelanggan()
	{
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}

	public function getPelangganBlacklist()
	{
		$this->db->where('status', 1);
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}

	public function getPelangganNormal()
	{
		$this->db->where('status', 0);
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}

	public function getPelangganById($id)
	{
		$this->db->where('id_pelanggan', $id);
		$query = $this->db->get('pelanggan');
		return $query->result_array();
	}

	public function addPelanggan()
	{
		$object = array('nama_pelanggan' => $this->input->post('nama_pelanggan'),
		                'alamat' => $this->input->post('alamat'),
		                'email' => $this->input->post('email'),
		                'no_telp' => $this->input->post('no_telp'),
		            	'username' => $this->input->post('username'),
		            	'password' => $this->input->post('password'));
		$this->db->insert("pelanggan", $object);
	}

	public function editPelanggan($id)
	{
		$object = array('nama_pelanggan' => $this->input->post('nama_pelanggan'),
		                'alamat' => $this->input->post('alamat'),
		                'email' => $this->input->post('email'),
		                'no_telp' => $this->input->post('no_telp'),
		            	'username' => $this->input->post('username'),
		            	'password' => $this->input->post('password'));
		$this->db->where('id_pelanggan', $id);
		$this->db->update("pelanggan", $object);
	}

	public function statusBlacklist($id)
	{
		$object = array('status' => 1);
		$this->db->where('id_pelanggan', $id);
		$this->db->update("pelanggan", $object);
	}

	public function statusNormal($id)
	{
		$object = array('status' => 0);
		$this->db->where('id_pelanggan', $id);
		$this->db->update("pelanggan", $object);
	}

	public function deletePelanggan($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->delete("pelanggan");
	}

}