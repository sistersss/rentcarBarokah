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
		$data['content'] = $this->load->view('dashboard',$data, TRUE);
		$this->load->view('element/main', $data);
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
				echo "<script>alert('Berhasil Login');</script>";
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
