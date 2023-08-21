<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Unit_model', 'om');
		$this->load->model('Dashboard_model', 'dm');
	}


	public function index()
	{
		$this->dm->check_status_login();
		
		$data['dataUser'] = $this->dm->getDataUser();
		// $data['dataUnit'] = $this->om->getUnitByIdd();
		$data['unit'] = $this->om->getAllUnit();
		$data['title'] = 'Unit | Aplikasi Panen TBS Kelapa Sawit';
		

		$this->load->view('unit/index', $data);
	}

	public function createUnit()
	{
		$this->dm->check_status_login();
		
		$data['dataUser'] = $this->dm->getDataUser();
		// $data['dataUnit'] = $this->om->getUnitByIdd();
		$data['unit'] = $this->om->getAllUnit();
		$data['title'] = ucwords('daftar unit - ') . $data['dataUser']['username'];
		
		$this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required|trim|is_unique[unit.nama_unit]', [
			'is_unique' => 'Unit sudah terdaftar!'
		]);
		$this->form_validation->set_rules('luas_unit', 'Luas Unit', 'required|trim');
		$this->form_validation->set_rules('jumlah_pohon', 'Jumlah Pohon', 'required|trim');
		$this->form_validation->set_rules('telepon_unit', 'Telepon Unit', 'required|trim');
		$this->form_validation->set_rules('alamat_unit', 'Alamat Unit', 'required|trim');
		$this->form_validation->set_rules('manajer_unit', 'Manajer Unit', 'required|trim');
		$this->form_validation->set_rules('map', 'Map Unit', 'required|trim');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('unit/index', $data);
		} else {
			$this->om->createUnit();
		}
	}

	public function updateUnit()
	{
		$this->dm->check_status_login();
		
		$data['dataUser'] = $this->dm->getDataUser();
		// $data['dataUnit'] = $this->om->getUnitByIdd();
		$data['unit'] = $this->om->getAllUnit();
		$data['title'] = ucwords('daftar unit - ') . $data['dataUser']['username'];

		$this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required|trim');
		$this->form_validation->set_rules('luas_unit', 'Luas Unit', 'required|trim');
		$this->form_validation->set_rules('jumlah_pohon', 'Jumlah Pohon', 'required|trim');
		$this->form_validation->set_rules('telepon_unit', 'Telepon Unit', 'required|trim');
		$this->form_validation->set_rules('alamat_unit', 'Alamat Unit', 'required|trim');
		$this->form_validation->set_rules('manajer_unit', 'Manajer Unit', 'required|trim');
		$this->form_validation->set_rules('map', 'Map Unit', 'required|trim');

		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('unit/detail', $data);
		} else {
			$this->om->updateUnit();
		}
	}

	public function detailUnit($id)
	{
		$this->dm->check_status_login();
		$data['dataUser'] = $this->dm->getDataUser();
		$data['detailUnit'] = $this->om->getUnitById($id);
		$data['title'] = 'Detail Unit | Aplikasi Panen TBS Kelapa Sawit';
		
		$this->load->view('unit/detail', $data);
		$this->load->view('templates/footer', $data);
	}

	public function deleteUnit($id)
	{
		$this->dm->check_status_login();
		
		$this->om->deleteUnit($id);
	}
}
