<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mobil_model');
		$this->load->model('Jenis_model');
		$this->load->model('Admin_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['title'] = "Daftar Mobil";
		$data['mobil'] = $this->Mobil_model->getMobil();
		$data['jenis'] = $this->Jenis_model->getJenis();
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('adm/mobil/list',$data, TRUE);
		$this->load->view('adm/element/main', $data);
	}

	public function subjenisAjax($id) { 
       $result = $this->db->where("id_jenis",$id)->get("subjenis")->result();

       echo json_encode($result);

	}

	public function upImg()
	{
		$config['upload_path'] = './assets/image/mobil/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000000';
	// 		$config['max_width'] = '200';
	// 		$config['max_height'] = '50';
			$config['overwrite'] = FALSE;
	        $config['remove_spaces'] = TRUE;
	        $config['max_filename'] = 250;
	        $this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');

		return $this->upload->file_name;
	}

	public function tambahMobil()
	{
		$check = $this->Mobil_model->checkMobil($this->input->post('no_polisi'));
		if($check<1){
			$img = $this->upImg();
			$this->Mobil_model->addMobil($img);
			redirect(base_url().'Mobil');
		}
		else {
			$this->session->set_flashdata('nopol', 'Nomor Polisi Sudah Ada');
			redirect(base_url().'Mobil');
		}
	}

	public function editMobil($id)
	{
		$img=null;
		if($_FILES['gambar']['name'] != ""){
			$img = $this->upImg();
		}
		$this->Mobil_model->editMobil($id,$img);
		redirect(base_url().'Mobil');
	}

	public function hapusMobil($id)
	{
		$this->Mobil_model->deleteMobil($id);
		redirect(base_url().'Mobil');
	}
}
