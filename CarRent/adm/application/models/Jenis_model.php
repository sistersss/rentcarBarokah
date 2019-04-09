<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {
	
	public function getJenis()
	{
		$query = $this->db->get('jenis_mobil');
		return $query->result_array();
	}

	public function getSubjenis($id)
	{
		$this->db->where('id_jenis', $id);
		$query = $this->db->get('subjenis');
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

	public function addSubjenis($id_jenis)
	{
		$object = array('nama_subjenis' => $this->input->post('nama_subjenis'),
						'id_jenis' => $id_jenis);
		$this->db->insert("subjenis", $object);
	}

	public function editSubjenis($id)
	{
		$object = array('nama_subjenis' => $this->input->post('nama_subjenis'));
		$this->db->where('id_subjenis', $id);
		$this->db->update("subjenis", $object);
	}

	public function deleteSubjenis($id)
	{
		$this->db->where('id_subjenis', $id);
		$this->db->delete("subjenis");
	}

}