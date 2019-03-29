<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function getDataKategoriMobil()
	{
		$query = $this->db->get('jenis_mobil');
		return $query->result_array();
	}
}
?>