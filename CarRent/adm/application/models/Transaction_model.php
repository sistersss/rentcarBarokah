<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
	
	public function getSewa()
	{
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan=transaction.id_pelanggan');
		$this->db->join('mobil','mobil.id_mobil=transaction.id_mobil');
		$this->db->where('tgl_kembali IS NULL');
		$this->db->where('status', '0');
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function getKembali()
	{
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan=transaction.id_pelanggan');
		$this->db->join('mobil','mobil.id_mobil=transaction.id_mobil');
		$this->db->where('tgl_kembali IS NOT NULL');
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function addSewa()
	{
		$object = array('id_pelanggan' => $this->input->post('nama_pelanggan'),
		                'id_mobil' => $this->input->post('mobil'),
		                'tgl_sewa' => $this->input->post('tgl_sewa'),
		                'lama_sewa' => $this->input->post('lama_sewa'),
		            	'total_biaya' => $this->input->post('total_bayar'),
		            	'status' => '0');
		$this->db->insert("transaction", $object);
	}

	public function editSewa($id)
	{
		$object = array('id_pelanggan' => $this->input->post('nama_pelanggan'),
		                'id_mobil' => $this->input->post('mobil'),
		                'tgl_sewa' => $this->input->post('tgl_sewa'),
		                'lama_sewa' => $this->input->post('lama_sewa'),
		            	'total_biaya' => $this->input->post('total_bayar'),
		            	'status' => '0');
		$this->db->where('id_transaksi', $id);
		$this->db->update("transaction", $object);
	}

	public function updateStatus($id)
	{
		$object = array('status' => '1');
		$this->db->where('id_transaksi', $id);
		$this->db->update("transaction", $object);
	}

	public function deleteSewa($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete("transaction");
	}

}