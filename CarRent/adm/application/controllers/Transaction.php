<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Transaction_model');
		$this->load->model('Pelanggan_model');
		$this->load->model('Mobil_model');
		$this->load->model('Jenis_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['title'] = "Daftar Transaction";
		$data['sewa'] = $this->Transaction_model->getSewa();
		$data['jenis'] = $this->Jenis_model->getJenis();
		$data['pelanggan'] = $this->Pelanggan_model->getPelanggan();
		$data['content'] = $this->load->view('transaction/list',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function subjenisAjax($id) { 
       $result = $this->db->where("id_jenis",$id)->get("subjenis")->result();

       echo json_encode($result);

   	}

   	public function mobilAjax($id) { 
       $result = $this->db->where("id_subjenis",$id)->get("mobil")->result();

       echo json_encode($result);

   	}

   	public function detailmobilAjax($id) { 
       $result = $this->db->where("id_mobil",$id)->get("mobil")->result();

       echo json_encode($result);

   	}

   	public function ambilMobil($id, $id_mobil)
   	{
   		$this->Transaction_model->updateStatus($id);
   		$this->db->query("UPDATE mobil SET kuota_mobil=(kuota_mobil-1) WHERE id_mobil=".$id_mobil);
   		redirect(base_url().'Transaction');
   	}

	public function tambahSewa()
	{
		$this->Transaction_model->addSewa();
		redirect(base_url().'Transaction');
	}

	public function editSewa($id)
	{
		$this->Transaction_model->editSewa($id);
		redirect(base_url().'Transaction');
	}

	public function hapusSewa($id)
	{
		$this->Transaction_model->deleteSewa($id);
		redirect(base_url().'Transaction');
	}
}
