<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model', 'dm');
		$this->load->model('User_model', 'um');
		$this->load->model('Laporan_model', 'lm');
	}

	public function check_biodata()
	{
		$username = $this->session->userdata('username');
		$user = $this->um->getUserByUsername($username);
		if ($user == null) {
			redirect('user/createBiodata/' . $username);
		}
	}

	public function index()
	{
		$this->dm->check_status_login();
		$this->check_biodata();
		$data['dataUser'] = $this->dm->getDataUser();
		$data['title'] = 'Dashboard | Aplikasi Panen TBS Kelapa Sawit';
		
		// jika tombol cari tanggal ditekan
		if (isset($_POST['cari_tanggal'])) {
			$tanggal_awal = date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_awal')));
			$tanggal_akhir = date('Y-m-d 23:59:59', strtotime($this->input->post('tanggal_akhir')));
			// super administrator
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
			// selain super administrator
			} elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {
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
			else  {
				$data['panenLaporan'] = $this->lm->getPanenLaporanAfdelingAdministrator($tanggal_awal, $tanggal_akhir);
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
		}

		else {
			if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {				
				// buat tanggal default
				$tanggal_awal = date('Y-m-01 00:00:00');
				$tanggal_akhir = date('Y-m-d 23:59:59');
				$data['panenLaporan'] = $this->lm->getPanenLaporan($tanggal_awal, $tanggal_akhir);

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

			} 

			elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {
				// buat tanggal default
				$tanggal_awal = date('Y-m-01 00:00:00');
				$tanggal_akhir = date('Y-m-d 23:59:59');
				$data['panenLaporan'] = $this->lm->getPanenLaporanUnitAdministrator($tanggal_awal, $tanggal_akhir);

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
			}

			else  {
				// buat tanggal default
				$tanggal_awal = date('Y-m-01 00:00:00');
				$tanggal_akhir = date('Y-m-d 23:59:59');
				$data['panenLaporan'] = $this->lm->getPanenLaporanAfdelingAdministrator($tanggal_awal, $tanggal_akhir);
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
			}
		}

		$this->load->view('templates/header-sidebar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/chart-main', $data);
	}


}
