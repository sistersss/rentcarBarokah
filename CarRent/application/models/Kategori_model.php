<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function getDataKategoriMobil()
	{
		$query = $this->db->get('jenis_mobil');
		return $query->result_array();
	}

	public function getDataSubkategoriMobil($id)
	{
		$this->db->where('id_jenis', $id);
		$query = $this->db->get('subjenis');
		return $query->result_array();
	}
}
?>