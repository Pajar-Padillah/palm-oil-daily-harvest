<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Afdeling extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Unit_model', 'om');
		$this->load->model('Afdeling_model', 'afm');
		$this->load->model('Dashboard_model', 'dm');
		$this->load->model('User_model', 'um');
	}

	public function index()
	{
		$this->dm->check_status_login();

		$data['dataUser'] = $this->dm->getDataUser();
		$data['afdeling'] = $this->afm->getAllAfdeling()->result_array();
		$data['title'] = 'Afdeling | Aplikasi Panen TBS Kelapa Sawit';
		// $data['level'] = $this->um->getAllLevel();
		$data['unit'] = $this->om->getAllUnit();

		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator') {
			$data['user'] = $this->um->getAllUser();
		} else {
			$data['user'] = $this->um->getUserUnitAdministrator();
		}
		
		$this->load->view('afdeling/index', $data);
	}

	public function createAfdeling()
	{
		$this->dm->check_status_login();
		$data['dataUser'] = $this->dm->getDataUser();
		$data['unit'] = $this->om->getAllUnit();
		// $data['afdeling'] = $this->afm->getAllAfdeling();
		
		$data['title'] = 'Daftar Pengguna - ' . $data['dataUser']['username'];

		$this->form_validation->set_rules('id_unit', 'Nama Unit', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('nama_afdeling', 'Nama Afdeling', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('afdeling/index', $data);
		} else {
			$this->afm->createAfdeling();
		}
	}

	public function updateAfdeling($id)
	{

		// $data['afdeling'] = $this->afm->getAfdById($id);

		$dataUser = $this->dm->getDataUser();
		$data = [

			'id_unit' => $this->input->post('id_unit', true),
			'nama_afdeling' => $this->input->post('nama_afdeling', true),
		];

		$this->db->where('afdeling.id_afdeling', $id);
		$this->db->update('afdeling', $data);
		$data['afdeling'] = $this->afm->getAfdelingById($id);


		$this->form_validation->set_rules('id_unit', 'Nama Unit', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('nama_afdeling', 'Nama Afdeling', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('afdeling/index', $data);
		} else {
			$this->afm->updateAfdeling($id);
		}
	}

	public function deleteAfdeling($id)
	{
		$this->dm->check_status_login();
		
		$this->afm->deleteAfdeling($id);
	}

	

}
