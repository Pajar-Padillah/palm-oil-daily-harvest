<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Prints_model', 'prm');
		$this->load->model('Dashboard_model', 'dm');
		$this->load->model('Panen_model', 'tm');
		$this->load->model('Laporan_model', 'lm');
	}

	public function cetakPanen($id_panen)
	{
		$this->dm->check_status_login();
		$this->session->unset_userdata('id_panen');
		
		$data['panen'] = $this->tm->getPanenById($id_panen);
		
		$data['title'] = 'Cetak Panen' . ' - ' . $data['panen']['kode_panen'];
		$this->load->view('templates/header', $data);
		$this->load->view('prints/cetak_panen', $data); 
		$this->load->view('templates/printspanen', $data);  
	}

	public function laporan($tanggal_awal, $tanggal_akhir)
	{
		$this->dm->check_status_login();
		// jika tombol cari tanggal ditekan
		$tanggal_awal = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tanggal_akhir = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		// jika level super administrator
		if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {				
			$data['panenLaporan'] = $this->lm->getPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)->result_array();
			$data['jumlah_panen'] = $this->lm->getPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['jumlah_tandan'] = $this->lm->getTandanPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['tandan_kg'] = $this->lm->getTandanKgPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['rata_tandan'] = $this->lm->getRataTandanPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['brondolan'] = $this->lm->getBrondolanPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['tandan_mentah'] = $this->lm->getTandanMentahPanenLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();


			$data['jumlah_status_panen_accafdeling'] = $this->lm->getPanenLaporanSortStatusPanen($tanggal_awal, $tanggal_akhir, 'accafdeling')->row_array();
			$data['jumlah_status_panen_accunit'] = $this->lm->getPanenLaporanSortStatusPanen($tanggal_awal, $tanggal_akhir, 'accunit')->row_array();
			$data['jumlah_status_panen_accops'] = $this->lm->getPanenLaporanSortStatusPanen($tanggal_awal, $tanggal_akhir, 'accops')->row_array();
			$data['jumlah_status_panen_selesai'] = $this->lm->getPanenLaporanSortStatusPanen($tanggal_awal, $tanggal_akhir, 'selesai')->row_array();
			
			// kirim data tanggal untuk riwayat penelusuran
			$data['tanggal_awal'] = $this->input->post('tanggal_awal');
			$data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
		} elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {
			$data['panen'] = $this->tm->getPanenByIdUnit();

			$data['panenLaporan'] = $this->lm->getPanenLaporanSortTglUnitAdministrator($tanggal_awal, $tanggal_akhir)->result_array();
			$data['jumlah_panen'] = $this->lm->getPanenLaporanSortTglUnitAdministrator($tanggal_awal, $tanggal_akhir)->row_array();
			$data['jumlah_tandan'] = $this->lm->getTandanPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['tandan_kg'] = $this->lm->getTandanKgPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['rata_tandan'] = $this->lm->getRataTandanPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['brondolan'] = $this->lm->getBrondolanPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['tandan_mentah'] = $this->lm->getTandanMentahPanenUnitLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['jumlah_status_panen_accafdeling'] = $this->lm->getPanenLaporanSortStatusPanenUnitAdministrator($tanggal_awal, $tanggal_akhir, 'accafdeling')->row_array();
			$data['jumlah_status_panen_accunit'] = $this->lm->getPanenLaporanSortStatusPanenUnitAdministrator($tanggal_awal, $tanggal_akhir, 'accunit')->row_array();
			$data['jumlah_status_panen_accops'] = $this->lm->getPanenLaporanSortStatusPanenUnitAdministrator($tanggal_awal, $tanggal_akhir, 'accops')->row_array();
			$data['jumlah_status_panen_selesai'] = $this->lm->getPanenLaporanSortStatusPanenUnitAdministrator($tanggal_awal, $tanggal_akhir, 'selesai')->row_array();

			// kirim data tanggal untuk riwayat penelusuran
			$data['tanggal_awal'] = $this->input->post('tanggal_awal');
			$data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
		}

		else {			
			$data['panen'] = $this->tm->getPanenByIdUnit();	
			$data['panenLaporan'] = $this->lm->getPanenLaporanSortTglAfdelingAdministrator($tanggal_awal, $tanggal_akhir)->result_array();
			$data['jumlah_panen'] = $this->lm->getPanenLaporanSortTglAfdelingAdministrator($tanggal_awal, $tanggal_akhir)->row_array();
			$data['jumlah_tandan'] = $this->lm->getTandanPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['tandan_kg'] = $this->lm->getTandanKgPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['rata_tandan'] = $this->lm->getRataTandanPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['brondolan'] = $this->lm->getBrondolanPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['tandan_mentah'] = $this->lm->getTandanMentahPanenAfdelingLaporanSortTgl($tanggal_awal, $tanggal_akhir)->row_array();
			$data['jumlah_status_panen_accafdeling'] = $this->lm->getPanenLaporanSortStatusPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir, 'accafdeling')->row_array();
			$data['jumlah_status_panen_accunit'] = $this->lm->getPanenLaporanSortStatusPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir, 'accunit')->row_array();
			$data['jumlah_status_panen_accops'] = $this->lm->getPanenLaporanSortStatusPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir, 'accops')->row_array();
			$data['jumlah_status_panen_selesai'] = $this->lm->getPanenLaporanSortStatusPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir, 'selesai')->row_array();
			
			// kirim data tanggal untuk riwayat penelusuran
			$data['tanggal_awal'] = $this->input->post('tanggal_awal');
			$data['tanggal_akhir'] = $this->input->post('tanggal_akhir');
		}

		$data['title'] = 'Cetak Laporan' . ' - ' . $tanggal_awal . ' - ' . $tanggal_akhir;
		$this->load->view('templates/header', $data);
		$this->load->view('prints/cetak_laporan', $data);
		$this->load->view('templates/prints', $data);  
	}
}
