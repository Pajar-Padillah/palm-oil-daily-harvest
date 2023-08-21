<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
		$this->load->model('Profile_model', 'prom');
		$this->load->model('User_model', 'um');
	}

	public function index()
	{
		$this->dm->check_status_login();
		$data['dataUser'] = $this->dm->getDataUser();
		$data['title'] = 'Profile | Aplikasi Panen TBS Kelapa Sawit';
		
		$this->load->view('templates/header-sidebar', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function updateBiodata()
	{
		$this->dm->check_status_login();
		$id_user = $this->session->userdata('id_user');
		$data['dataUser'] = $this->dm->getDataUser();
		$data['userBiodata'] = $this->um->getUserById($id_user);
		$data['title'] = 'Profile - ' . $data['dataUser']['username'];

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header-sidebar', $data);
			$this->load->view('profile/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->prom->updateBiodata();
		}
	}

	public function changePassword()
	{
		$this->dm->check_status_login();
		$data['dataUser'] = $this->dm->getDataUser();
		$data['title'] = ucwords('profile - ') . $data['dataUser']['username'];
		$this->form_validation->set_rules('password_old', 'Password Lama', 'required');
		$this->form_validation->set_rules('password_new', 'Password Baru', 'required|matches[password_verify]');
		$this->form_validation->set_rules('password_verify', 'Password Verifikasi', 'required|matches[password_new]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header-sidebar', $data);
			$this->load->view('profile/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->prom->changePassword();
		}
	}

}