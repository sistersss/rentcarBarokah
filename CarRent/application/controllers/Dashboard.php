<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->model('Admin_model');
		$data['notif'] = $this->Admin_model->getNotifikasi();
		$data['content'] = $this->load->view('adm/dashboard',$data, TRUE);
		$this->load->view('adm/element/main', $data);
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
					redirect(base_url().'adm');
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
			$data['content'] = $this->load->view('adm/element/settingadmin',$data, TRUE);
			$this->load->view('adm/element/main', $data);
		}
	}

	public function login()
	{
		$this->load->view('adm/element/login');
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
    			// echo "<script>alert('Berhasil Login');</script>";
    		}
    		else
    		{
    			$this->session->set_flashdata('veriflogin', 'Username atau Password anda salah');
    			redirect(base_url().'adm');
    		}
	    } else {
			redirect(base_url().'adm');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'adm');
	}
}
