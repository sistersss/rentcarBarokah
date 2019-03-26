<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {
	
	public function getJenis()
	{
		$query = $this->db->get('jenis_mobil');
		return $query->result_array();
	}

	public function getJenisById($id)
	{
		$this->db->where('id_jenis', $id);
		$query = $this->db->get('jenis_mobil');
		return $query->result_array();
	}

	public function addJenis()
	{
		$object = array('nama_jenis' => $this->input->post('nama_jenis'));
		$this->db->insert("jenis_mobil", $object);
	}

	public function editJenis($id)
	{
		$object = array('nama_jenis' => $this->input->post('nama_jenis'));
		$this->db->where('id_jenis', $id);
		$this->db->update("jenis_mobil", $object);
	}

	public function deleteJenis($id)
	{
		$this->db->where('id_jenis', $id);
		$this->db->delete("jenis_mobil");
	}

}