<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_model extends CI_Model {

	public function getDataMobil()
	{
		$query = $this->db->get('mobil');
		return $query->result_array();
	}

	public function getDataMobilTerbaru()
	{
		$this->db->join('jenis_mobil', 'jenis_mobil.id_jenis=mobil.id_jenis');
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('mobil');
		return $query->result_array();
	}

	public function getDataMobilById($id)
	{
		$this->db->join('jenis_mobil', 'jenis_mobil.id_jenis=mobil.id_jenis');
		$this->db->where('id_mobil', $id);
		$query = $this->db->get('mobil');
		return $query->result_array();
	}
}
?>