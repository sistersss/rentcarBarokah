<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_model extends CI_Model {

	public function getDataMobil()
	{
<<<<<<< HEAD
=======
		$this->db->join('subjenis', 'subjenis.id_subjenis=mobil.id_subjenis');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis=subjenis.id_jenis');
>>>>>>> master
		$query = $this->db->get('mobil');
		return $query->result_array();
	}

	public function getDataMobilTerbaru()
	{
<<<<<<< HEAD
		$this->db->join('jenis_mobil', 'jenis_mobil.id_jenis=mobil.id_jenis');
=======
		$this->db->join('subjenis', 'subjenis.id_subjenis=mobil.id_subjenis');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis=subjenis.id_jenis');
>>>>>>> master
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('mobil');
		return $query->result_array();
	}

	public function getDataMobilTerlaris()
	{
		$this->db->select('mobil.*, count(transaction.id_mobil) as jmltransaksi, jenis_mobil.*');
		$this->db->join('mobil', 'mobil.id_mobil=transaction.id_mobil');
<<<<<<< HEAD
		$this->db->join('jenis_mobil', 'jenis_mobil.id_jenis=mobil.id_jenis');
=======
		$this->db->join('subjenis', 'subjenis.id_subjenis=mobil.id_subjenis');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis=subjenis.id_jenis');
>>>>>>> master
		$this->db->group_by('transaction.id_mobil');
		$this->db->order_by('jmltransaksi', 'DESC');
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function getDataMobilById($id)
	{
<<<<<<< HEAD
		$this->db->join('jenis_mobil', 'jenis_mobil.id_jenis=mobil.id_jenis');
=======
		$this->db->join('subjenis', 'subjenis.id_subjenis=mobil.id_subjenis');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis=subjenis.id_jenis');
>>>>>>> master
		$this->db->where('id_mobil', $id);
		$query = $this->db->get('mobil');
		return $query->result_array();
	}
<<<<<<< HEAD
=======

	public function addTransaction($id_mobil, $id_user, $total_bayar)
	{
		$object = array('id_pelanggan' => $id_user,
		                'id_mobil' => $id_mobil,
		                'tgl_sewa' => $this->input->post('tgl_pinjam'),
		                'lama_sewa' => $this->input->post('lama_pinjam'),
		            	'total_biaya' => $total_bayar);
		$this->db->insert("transaction", $object);
	}
>>>>>>> master
}
?>