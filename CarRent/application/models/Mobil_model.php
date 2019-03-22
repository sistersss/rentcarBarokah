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

	public function getDataMobilTerlaris()
	{
		$this->db->select('mobil.*, count(transaction.id_mobil) as jmltransaksi, jenis_mobil.*');
		$this->db->join('mobil', 'mobil.id_mobil=transaction.id_mobil');
		$this->db->join('jenis_mobil', 'jenis_mobil.id_jenis=mobil.id_jenis');
		$this->db->group_by('transaction.id_mobil');
		$this->db->order_by('jmltransaksi', 'DESC');
		$query = $this->db->get('transaction');
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