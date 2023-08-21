<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panen extends CI_Controller
{
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
		$tanggal_awal = date('Y-11-06 00:00:00');
		$tanggal_akhir = date('Y-m-d 23:59:59');
		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator') {
			$data['jumlah_status_panen_semua'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'semua')->row_array();
			$data['jumlah_status_panen_accafdeling'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'accafdeling')->row_array();
			$data['jumlah_status_panen_accunit'] = $this->tm->getJumlahStatusPanen($tanggal_awal, $tanggal_akhir, 'accunit')->row_array();
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
		} elseif ($this->session->userdata('jabatan') == 'Asisten Afdeling') {

			$data['panen'] = $this->tm->getPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir);
		} else {

			$data['panen'] = $this->tm->getPanenKeraniAdministrator($tanggal_awal, $tanggal_akhir);
		}

		$data['title'] = ucwords('Panen | Aplikasi Panen TBS Kelapa Sawit');


		$this->load->view('panen/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function createPanen()
	{
		$this->dm->check_status_login();

		$data['dataUser'] = $this->dm->getDataUser();
		$data['unit'] = $this->tm->getAllUnit();
		$data['afdeling'] = $this->afm->getAllAfdeling();
		// buat tanggal default
		$tanggal_awal = date('Y-m-d 00:00:00');
		$tanggal_akhir = date('Y-m-d 00:00:00');
		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator') {
			$data['jumlah_status_panen_semua'] = $this->tm->getJumlahStatusPanen('semua')->row_array();
			$data['jumlah_status_panen_accafdeling'] = $this->tm->getJumlahStatusPanen('accafdeling')->row_array();
			$data['jumlah_status_panen_accunit'] = $this->tm->getJumlahStatusPanen('accunit')->row_array();
			$data['jumlah_status_panen_selesai'] = $this->tm->getJumlahStatusPanen('selesai')->row_array();
			$status_panen = $this->uri->segment(3, 0);
			if ($status_panen) {
				$data['panen'] = $this->tm->getAllPanen($status_panen);
			} else {
				$data['panen'] = $this->tm->getAllPanen();
			}
		} elseif ($this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {

			$data['panen'] = $this->tm->getPanenOPSAdministrator($tanggal_awal, $tanggal_akhir);
		} elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {

			$data['panen'] = $this->tm->getPanenUnitAdministrator($tanggal_awal, $tanggal_akhir);
		} else {

			$data['panen'] = $this->tm->getPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir);
		}

		$data['title'] = ucwords('Panen | Aplikasi Panen TBS Kelapa Sawit');

		$this->form_validation->set_rules('id_unit', 'Nama Unit', 'required|is_natural_no_zero');
		$this->form_validation->set_rules('id_afdeling', 'Nama Afdeling', 'required|is_natural_no_zero');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('panen/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->tm->createPanen();
		}
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

	public function updatePanen($id)
	{
		$this->dm->check_status_login();

		$data['dataUser'] = $this->dm->getDataUser();
		$data['unit'] = $this->tm->getAllUnit();
		$data['afdeling'] = $this->afm->getAllAfdeling();

		// buat tanggal default
		$tanggal_awal = date('Y-m-d 00:00:00');
		$tanggal_akhir = date('Y-m-d 00:00:00');
		// Jika akun super administrator yang login
		if ($this->session->userdata('jabatan') == 'Administrator') {
			$data['jumlah_status_panen_semua'] = $this->tm->getJumlahStatusPanen('semua')->row_array();
			$data['jumlah_status_panen_accafdeling'] = $this->tm->getJumlahStatusPanen('accafdeling')->row_array();
			$data['jumlah_status_panen_accunit'] = $this->tm->getJumlahStatusPanen('accunit')->row_array();
			$data['jumlah_status_panen_selesai'] = $this->tm->getJumlahStatusPanen('selesai')->row_array();
			$status_panen = $this->uri->segment(3, 0);
			if ($status_panen) {
				$data['panen'] = $this->tm->getAllPanen($status_panen);
			} else {
				$data['panen'] = $this->tm->getAllPanen();
			}
		} elseif ($this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {

			$data['panen'] = $this->tm->getPanenOPSAdministrator($tanggal_awal, $tanggal_akhir);
		} elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {

			$data['panen'] = $this->tm->getPanenUnitAdministrator($tanggal_awal, $tanggal_akhir);
		} else {

			$data['panen'] = $this->tm->getPanenAfdelingAdministrator($tanggal_awal, $tanggal_akhir);
		}

		$data['jumlah_status_panen_accafdeling'] = $this->tm->getJumlahStatusPanen('accafdeling')->row_array();
		$data['jumlah_status_panen_accunit'] = $this->tm->getJumlahStatusPanen('accunit')->row_array();
		$data['jumlah_status_panen_selesai'] = $this->tm->getJumlahStatusPanen('selesai')->row_array();
		// $data['title'] = ucwords('daftar panen - ') . $data['dataUser']['username'];
		$data['title'] = ucwords('Panen | Aplikasi Panen TBS Kelapa Sawit');

		$this->tm->updatePanen($id);
	}


	public function deletePanen($id)
	{
		// jika belum login pindahkan ke halaman user
		if (!$this->session->userdata('id_user')) {
			redirect('auth/index');
		}

		$this->session->unset_userdata('kode_panen');
		if ($this->session->userdata('status_panen')) {
			$this->session->unset_userdata('status_panen');
		}
		$this->tm->deletePanen($id);
	}

	public function ubahStatusPanen($id)
	{
		$this->dm->check_status_login();

		$this->tm->ubahStatusPanen($id);
	}

	public function tolakPanen($id)
	{

		$data['panen'] = $this->tm->getPanenById($id);

		$id_panen = $data['panen']['id_panen'];

		$data = [
			'status_panen' => 'ditolak',
			'penolak' => $this->input->post('penolak', true),
			'keterangan' => $this->input->post('keterangan', true),
		];

		$this->db->where('panen.id_panen', $id);
		$this->db->update('panen', $data);
		$data['panen'] = $this->tm->getPanenById($id);
		$this->session->set_flashdata('message-success', 'Panen ' . $data['panen']['kode_panen'] . ' berhasil diubah');
		redirect('panen');
	}

	public function ubahPanenUnit($id)
	{

		$data['panen'] = $this->tm->getPanenById($id);

		$id_panen = $data['panen']['id_panen'];

		$data = [
			'status_panen' => 'accunit',
			'penolak' => '',
			'keterangan' => '',
			'tanggal_diangkut' => $this->input->post('tanggal_diangkut', true),
			'nama_supir' => $this->input->post('nama_supir', true),
			'plat' => $this->input->post('plat', true),
		];

		$this->db->where('panen.id_panen', $id);
		$this->db->update('panen', $data);
		$data['panen'] = $this->tm->getPanenById($id);
		$this->session->set_flashdata('message-success', 'Panen ' . $data['panen']['kode_panen'] . ' berhasil diperbarui!');
		redirect('panen');
	}



	// public function perbaruiPanen($id)
	// {
	// 	$data['panen'] = $this->getPanenById($id);
	// 	$id_panen = $data['panen']['id_panen'];

	// 	$data = [
	// 		'jumlah_tandan' => $this->input->post('jumlah_tandan', true),
	// 		'tandan_kg' => $this->input->post('tandan_kg', true),
	// 		'rata_tandan' => $this->input->post('rata_tandan', true),
	// 		'brondolan' => $this->input->post('brondolan', true),
	// 		'tandan_mentah' => $this->input->post('tandan_mentah', true),
	// 		'id_unit' => $this->input->post('id_unit', true),
	// 		'id_afdeling' => $this->input->post('id_afdeling', true)
	// 	];

	// 	$this->db->where('panen.id_panen', $id);
	// 	$this->db->update('panen', $data);
	// 	$data['panen'] = $this->getPanenById($id);
	// 	$this->session->set_flashdata('message-success', 'Panen ' . $data['panen']['kode_panen'] . ' berhasil diubah');
	// 	redirect('panen');

	// 	$data['panen'] = $this->tm->getPanenById($id);

	// 	if ($data['panen']['status_panen'] == 'ditolak' && $data['panen']['penolak'] == 'Asisten Afdeling') {
	// 		$data = (['status_panen' => 'accafdeling'] && ['penolak' => ''] && ['keterangan' => '']);

	// 	} elseif ($data['panen']['status_panen'] == 'ditolak' && $data['panen']['penolak'] == 'Manajer Unit') {
	// 		$data = (['status_panen' => 'accunit' && ['penolak' => ''] && ['keterangan' => '']);

	// 	} elseif ($data['panen']['status_panen'] == 'ditolak' && $data['panen']['penolak'] == 'Kepala Bagian Operasional') {
	// 		$data = (['status_panen' => 'accops'&& ['penolak' => ''] && ['keterangan' => '']);
	// 	}
	// 	$this->session->set_flashdata('message-success', 'Status Panen ' . $data['panen']['kode_panen'] . ' berhasil diperbarui!');

	// 	$this->db->where('panen.id_panen', $id);
	// 	$this->db->update('panen', $data);
	// 	redirect('panen');
	// }


}
