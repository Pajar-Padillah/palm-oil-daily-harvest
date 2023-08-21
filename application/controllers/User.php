<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'um');
		$this->load->model('Dashboard_model', 'dm');
		$this->load->model('Afdeling_model', 'afm');
		$this->load->model('Select_model', 'mselect');

	}

	public function index()
	{ 
		$this->dm->check_status_login();

		$data['dataUser'] = $this->dm->getDataUser();
		// $data['level'] = $this->um->getAllLevel();
		$data['unit'] = $this->um->getAllUnit();
		$data['afdeling'] = $this->afm->getAfdeling();
		// $data['jabatan'] = $this->um->getJabatan();
		
		// $data['userr'] = $this->um->getAllUserLevel()->result_array();
		
		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {				
			$data['user'] = $this->um->getAllUser();
			// $data['user12'] = $this->um->getUser12();
			// $data['user345'] = $this->um->getUser345();
		} else {
			$data['user'] = $this->um->getUserUnitAdministrator();
		}
		
		$data['title'] = 'Pengguna | Aplikasi Panen TBS Kelapa Sawit';
		
		$this->load->view('user/index', $data);
	}

	public function createUser()
	{
		$this->dm->check_status_login();

		$data['dataUser'] = $this->dm->getDataUser();
		// $data['level'] = $this->um->getAllLevel();
		$data['unit'] = $this->um->getAllUnit();
		$data['afdeling'] = $this->afm->getAllAfdeling();
		
		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {				
			$data['user'] = $this->um->getAllUser();
		} else {
			// ambil data user berdasarkan unit administrator tersebut
			$data['user'] = $this->um->getUserUnitAdministrator();
		}
		$data['title'] = 'Daftar Pengguna - ' . $data['dataUser']['username'];

		$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|trim|is_unique[user.username]', [
			'is_unique' => 'Nama Pengguna sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password', 'Kata Sandi', 'required|matches[password_verify]');
		$this->form_validation->set_rules('password_verify', 'Verifikasi Kata Sandi', 'required|matches[password]');
		// $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_unit', 'Nama Unit', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_afdeling', 'Nama Afdeling', 'required|is_natural_no_zero');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/index', $data);
		} else {
			$this->um->createUser();
		}
	}

	public function updateUser($id)
	{
		$data['dataUser'] = $this->dm->getDataUser();
		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {				
			$data['user'] = $this->um->getAllUser();
		} else {
			// ambil data user berdasarkan unit administrator tersebut
			$data['user'] = $this->um->getUserUnitAdministrator();
		}
		// $data['level'] = $this->um->getAllLevel();
		$data['unit'] = $this->um->getAllUnit();
		
		$data['title'] = 'Daftar Pengguna - ' . $data['dataUser']['username'];

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_unit', 'Nama Unit', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_afdeling', 'Nama Afdeling', 'required|is_natural_no_zero');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/index', $data);
		} else {
			$this->um->updateUser($id);
		}
	}

	public function deleteUser($id)
	{
		$this->dm->check_status_login();
		
		$this->um->deleteUser($id);
	}

	public function createBiodata($username)
	{
		$this->dm->check_status_login();
		$getUserByUsername = $this->um->getUserByUsername($username);
		$getUserByUsernameNoJoin = $this->um->getUserByUsernameNoJoin($username);

		if ($getUserByUsername) {
			$this->session->set_flashdata('message-failed', 'Pengguna ' . $getUserByUsername['username'] . ' sudah memiliki biodata');
			redirect('user');
		}

		$id_user = $getUserByUsernameNoJoin['id_user'];
		$data['dataUser'] = $this->dm->getDataUser();
		$data['userBiodata'] = $this->um->getUserById($id_user);
		$data['title'] = 'Isi Biodata - ' . $username;

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header-sidebar', $data);
			$this->load->view('user/createBiodata', $data);
		} else {
			$this->um->createBiodata();
		}
	}

	public function updateBiodataProfile()
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
			$this->load->view('user/index', $data);
		} else {
			$this->um->updateBiodataProfile();
		}
	}

	public function profile($id)
	{
		$this->dm->check_status_login();
		$data['dataUser'] = $this->dm->getDataUser();
		$data['userProfile'] = $this->um->getUserByIdAllData($id);
		$data['title'] = 'Detail Pengguna | Aplikasi Panen TBS Kelapa Sawit';
		
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer', $data);
	}

}
