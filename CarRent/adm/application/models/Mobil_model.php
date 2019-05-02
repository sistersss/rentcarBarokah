<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_model extends CI_Model {
	
	public function getMobil()
	{
		$this->db->join('subjenis', 'subjenis.id_subjenis=mobil.id_subjenis');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis=subjenis.id_jenis');
		$query = $this->db->get('mobil');
		return $query->result_array();
	}

	public function checkMobil($no_pol)
	{
		$this->db->where('no_polisi', $no_pol);
		$query = $this->db->get('mobil');
		return $query->num_rows();
	}

	public function getMobilById($id)
	{
		$this->db->join('subjenis', 'subjenis.id_subjenis=mobil.id_subjenis');
		$this->db->join('jenis_mobil','jenis_mobil.id_jenis=subjenis.id_jenis');
		$this->db->where('id_mobil', $id);
		$query = $this->db->get('mobil');
		return $query->result_array();
	}

	public function addMobil($img)
	{
		$object = array('id_subjenis' => $this->input->post('subjenis'),
		                'merk_mobil' => $this->input->post('merk_mobil'),
		                'warna' => $this->input->post('warna'),
		                'deskripsi' => $this->input->post('deskripsi'),
		            	'created_at' => date('Y-m-d H:i:s'),
		            	'no_polisi' => $this->input->post('no_polisi'),
		            	'gambar' => $img,
		            	'tahun_pembuatan' => $this->input->post('tahun_pembuatan'),
		            	'kuota_mobil' => 1,
		            	'harga_sewa' => $this->input->post('harga_sewa'));
		$this->db->insert("mobil", $object);
	}

	public function editMobil($id,$img)
	{
		$object = array('id_subjenis' => $this->input->post('subjenis'),
		                'merk_mobil' => $this->input->post('merk_mobil'),
		                'warna' => $this->input->post('warna'),
		                'deskripsi' => $this->input->post('deskripsi'),
		            	'no_polisi' => $this->input->post('no_polisi'),
		            	'tahun_pembuatan' => $this->input->post('tahun_pembuatan'),
		            	'harga_sewa' => $this->input->post('harga_sewa'));
		if ($img!=null) {
			$object['gambar'] = $img;
		}
		$this->db->where('id_mobil', $id);
		$this->db->update("mobil", $object);
	}

	public function deleteMobil($id)
	{
		$this->db->where('id_mobil', $id);
		$this->db->delete("mobil");
	}

}
