<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat_panen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Panen_model', 'tm');
		$this->load->model('Dashboard_model', 'dm');
		$this->load->model('Afdeling_model', 'afm');
		// $this->load->model('Level_model', 'lem');
		

	}

	public function index()
	{
		$this->dm->check_status_login();
		
		$data['dataUser'] = $this->dm->getDataUser();
		$data['unit'] = $this->tm->getAllUnit();

		$data['afdeling'] = $this->afm->getAllAfdeling()->result_array();
		// buat tanggal default
		$tanggal_awal = date('Y-01-01 00:00:00');
		$tanggal_akhir = date('Y-m-d 00:00:00');
		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator') {
			$data['jumlah_status_panen_semua'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'semua')->row_array();
			$data['jumlah_status_panen_accafdeling'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'accafdeling')->row_array();
			$data['jumlah_status_panen_accunit'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'accunit')->row_array();
			$data['jumlah_status_panen_accops'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'accops')->row_array();
			$data['jumlah_status_panen_selesai'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'selesai')->row_array();
			$status_panen = $this->uri->segment(3, 0);
			if ($status_panen) {
				$data['panen'] = $this->tm->getAllPanen($tanggal_awal, $tanggal_akhir, $status_panen);
			} else {
				$data['panen'] = $this->tm->getAllPanen($tanggal_awal, $tanggal_akhir);
			}
		} elseif ($this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {
			
			$data['panen'] = $this->tm->getPanenOPSAdministrator($tanggal_awal, $tanggal_akhir);
			
		} elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {
			
			$data['panen'] = $this->tm->getPanenUnitAdministrator($tanggal_awal, $tanggal_akhir);

		} elseif  ($this->session->userdata('jabatan') == 'Asisten Afdeling')  {
			
			$data['panen'] = $this->tm->getPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir);
			
		} else  {
			
			$data['panen'] = $this->tm->getPanenKeraniAdministrator($tanggal_awal, $tanggal_akhir);

		}

		$data['title'] = ucwords('Riwayat Panen | Aplikasi Panen TBS Kelapa Sawit');


		$this->load->view('panen/riwayat', $data);
		$this->load->view('templates/footer', $data);
	}

	
	public function detailpanen($id_panen)
	{
		$data['dataUser'] = $this->dm->getDataUser();

		$data['detail_header_panen'] = $this->tm->getDetailPanenByIdPanen($id_panen);

		// $data['title'] = ucwords('daftar detail panen - ') . $data['dataUser']['username'];
		$data['title'] = ucwords('Panen | Aplikasi Panen TBS Kelapa Sawit');


		$this->load->view('panen/detailpanen', $data);
		$this->load->view('templates/footer', $data);
	}
	
}
