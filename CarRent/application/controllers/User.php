<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
		$this->load->model('User_model');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');

		// if (empty($this->session->userdata('user_id'))) {
		// 	redirect(base_url().'index.php/login');
		// }

	}

	public function index()
	{
		$this->load->view('element/login');
	}

	public function formRegister()
	{
		$this->load->view('element/register');
	}

	public function login()
	{
		if (isset($_POST['login'])) {
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
    		$cek = $this->User_model->cekLogin($username, $password);
    
    		if ($cek == 1) {
    			$show = $this->User_model->getDataPelangganByUsername($username);
    			$dlogin = array('id_pelanggan'=>$show->id_pelanggan,
    							'nama_pelanggan'=>$show->nama_pelanggan);
    			$this->session->set_userdata($dlogin);
    			if($this->session->userdata('pesan')=='active'){
    				redirect(base_url().'index.php/HomeUser/detailMobil/'.$this->session->userdata('id_pesan'));
    			}
    			else {
    				redirect(base_url().'index.php/HomeUser');
    			}
    			// echo "<script>alert('Berhasil Login');</script>";
    		}
    		else
    		{
				$this->session->set_flashdata('ceklogin', 'Username atau Password Salah');
    			redirect(base_url().'index.php/User');
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

	public function register()
	{
    	$password = $this->input->post('password');
    	$retype = $this->input->post('retype_pass');
    
    	if ($retype == $password) {
    		$this->User_model->addPelanggan();
    		redirect(base_url().'index.php/User');
    	}
    	else
    	{
    		redirect(base_url().'index.php/User/formRegister');
    	}
	}

	// public function formEditMember($id)
	// {
	// 	$data['title'] = "Edit Member";
	// 	$data['data'] = $this->User_model->getDataMemberById($id);
	// 	$data['fakultas'] = $this->User_model->getDataFakultas();
	// 	$data['content'] = $this->load->view('user/edit_member',$data, TRUE);
	// 	$this->load->view('element/main', $data);
	// }

 //   	public function tambahMember()
	// {
	// 	$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	// 	$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'trim|required');
	// 	$this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required');

	// 	if ($this->form_validation->run()==FALSE) {
	// 		$this->formTambah();
	// 	}
	// 	else
	// 	{
	// 		$this->User_model->addMember();
	// 		$id = $this->User_model->getLastMember();
	// 		$this->User_model->insertUserMember($id[0]['id_member']);
	// 		redirect(base_url().'index.php/User/index/member');
	// 	}
	// }

	// public function editMember($id)
	// {
	// 	$this->form_validation->set_rules('nama', 'Nama User', 'trim|required');
	// 	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	// 	$this->form_validation->set_rules('notelp', 'Nomor Telepon', 'trim|required');
	// 	$this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required');

	// 	if ($this->form_validation->run()==FALSE) {
	// 		$this->formEditMember($id);
	// 	}
	// 	else
	// 	{
	// 		$this->User_model->updateMember($id);
	// 		redirect(base_url().'index.php/User/index/member');
	// 	}
	// }

	// public function hapusMember($id)
	// {
	// 	$this->User_model->deleteMember($id);
	// 	redirect(base_url().'index.php/User/index/member');
	// }
}
