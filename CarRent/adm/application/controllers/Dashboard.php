<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Admin_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('dashboard',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function settingIklan()
	{
		$data['title'] = 'Setting Iklan';
		$data['iklan'] = $this->Admin_model->getIklan();
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('element/settingiklan',$data, TRUE);
		$this->load->view('element/main', $data);
	}

	public function upImg()
	{
		$config['upload_path'] = './assets/image/iklan/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000000';
			$config['max_width'] = '600';
			$config['max_height'] = '200';
			$config['overwrite'] = FALSE;
	        $config['remove_spaces'] = TRUE;
	        $config['max_filename'] = 250;
	        $this->load->library('upload');
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');

		return $this->upload->file_name;
	}

	public function tambahIklan()
	{
		$img = $this->upImg();
		$this->Admin_model->addIklan($img);
		redirect(base_url().'Dashboard/settingIklan');
	}

	public function editIklan($id)
	{
		$img=null;
		if($_FILES['gambar']['name'] != ""){
			$img = $this->upImg();
		}
		$this->Admin_model->editIklan($id,$img);
		redirect(base_url().'Dashboard/settingIklan');
	}

	public function hapusIklan($id)
	{
		$this->Admin_model->deleteIklan($id);
		redirect(base_url().'Dashboard/settingIklan');
	}

	public function settingAdmin($id)
	{
		$data['title'] = 'Setting Admin';
		$this->load->model('Admin_model');
		if (isset($_POST['submit'])) {
			if($this->input->post('password')==$this->input->post('retype')){
				$this->Admin_model->editAdmin($id);
				if($this->input->post('password') == ""){
					redirect(base_url().'Dashboard/settingAdmin/'.$id);
				}
				else {
					redirect(base_url());
				}
			}
			else {
				$this->session->set_flashdata('admin', 'Password anda tidak cocok');
				redirect(base_url().'Dashboard/settingAdmin/'.$id);
			}
		}
		else {
			$data['admin'] = $this->Admin_model->getAdminById($id);
			$data['notif'] = $this->Admin_model->getNotifikasi();
			$data['content'] = $this->load->view('element/settingadmin',$data, TRUE);
			$this->load->view('element/main', $data);
		}
	}

	public function login()
	{
		$this->load->view('element/login');
	}

	public function prosesLogin()
	{
		if (isset($_POST['login'])) {
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
    		$this->load->model('Admin_model');
    		$cek = $this->Admin_model->cekLogin($username, $password);
    
    		if ($cek == 1) {
    			$show = $this->Admin_model->getDataAdminByUsername($username);
    			$dlogin = array('id_admin'=>$show->id_admin,
    							'nama_admin'=>$show->nama_admin);
    			$this->session->set_userdata($dlogin);
				redirect(base_url().'Dashboard');

				//echo "<script>alert('Berhasil Login');</script>";
    		}
    		else
    		{
    			redirect(base_url());
    		}
	    } else {
			redirect(base_url());
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
