<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Auth_model', 'am');
		$this->load->model('Dashboard_model', 'dm');
	}

	public function index()
	{

		if ($this->session->userdata('username')) {

			// $this->session->set_flashdata('message-success', 'Berhasil Login');
			redirect('dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/index');
		} else {
			$this->am->check_login();
		}
	}

	public function logout()
	{

		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('jabatan');
		$this->session->unset_userdata('id_unit');
		$this->session->unset_userdata('id_afdeling');
		$this->session->unset_userdata('username');
		session_destroy();
		redirect('auth/index');
	}
}
