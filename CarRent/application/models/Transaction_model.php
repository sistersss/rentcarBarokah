<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
	
	public function getTransactionById($id)
	{
		$this->db->where('id_transaksi', $id);
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function getTransaction()
	{
		$this->db->where('transaction.status', '0');
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function getSewa()
	{
		$this->db->select('pelanggan.*, mobil.*, transaction.*, transaction.status as stat');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan=transaction.id_pelanggan');
		$this->db->join('mobil','mobil.id_mobil=transaction.id_mobil');
		$this->db->where('tgl_kembali IS NULL');
		$this->db->where('transaction.status=0 OR transaction.status=2 OR transaction.status=3');
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function getKeterangan()
	{
		$query = $this->db->get('keterangan');
		return $query->result_array();
	}

	public function getKembali()
	{
		$this->db->select('pelanggan.*, mobil.*, transaction.*, transaction.status as stat');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan=transaction.id_pelanggan');
		$this->db->join('mobil','mobil.id_mobil=transaction.id_mobil');
		$this->db->where('tgl_kembali IS NOT NULL');
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function getPengembalian()
	{
		$this->db->select('pelanggan.*, mobil.*, transaction.*, transaction.status as stat');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan=transaction.id_pelanggan');
		$this->db->join('mobil','mobil.id_mobil=transaction.id_mobil');
		$this->db->where('tgl_kembali IS NULL');
		$this->db->where('transaction.status', '1');
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

	public function updateKeterangan()
	{
		$object = array('keterangan' => $this->input->post('keterangan'));
		$this->db->update("keterangan", $object);
	}

	public function kembaliMobil($id, $denda)
	{
		$object = array('tgl_kembali' => date('Y-m-d H:i:s'),
		                'denda' => $denda);
		$this->db->where('id_transaksi', $id);
		$this->db->update("transaction", $object);
	}

	public function expiredTransaction($id)
	{
		$object = array('status' => '2');
		$this->db->where('id_transaksi', $id);
		$this->db->update("transaction", $object);
	}

	public function notifExpired($id)
	{
		$object = array('id_transaksi' => $id,
		                'created_at' => date('Y-m-d H:i:s'));
		$this->db->insert("notifikasi", $object);
	}

	public function updateStatus($id)
	{
		$object = array('status' => '1');
		$this->db->where('id_transaksi', $id);
		$this->db->update("transaction", $object);
	}

	public function deleteTransaksi($id)
	{
		$this->db->where('id_transaksi', $id);
		$this->db->delete("transaction");
	}

}
