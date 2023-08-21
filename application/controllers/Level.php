<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Level_model', 'lem');
		$this->load->model('Dashboard_model', 'dm');
	}

	public function index()
	{
		$this->dm->check_status_login();
		
		$data['dataUser'] = $this->dm->getDataUser();
		$data['level'] = $this->lem->getAllLevel();
		$data['title'] = 'Level | Aplikasi Panen TBS Kelapa Sawit';
		

		$this->load->view('level/index', $data);
	}

	public function createLevel()
	{
		$this->dm->check_status_login();
		
		$data['dataUser'] = $this->dm->getDataUser();
		$data['level'] = $this->lem->getAllLevel();
		$data['title'] = ucwords('daftar level - ') . $data['dataUser']['username'];
		
		$this->form_validation->set_rules('nama_level', 'Nama Level', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('level/index', $data);
		} else {
			$this->lem->createLevel();
		}
	}

	public function updateLevel($id)
	{
		$this->dm->check_status_login();
		
		$data['dataUser'] = $this->dm->getDataUser();
		$data['level'] = $this->lem->getAllLevel();
		$data['title'] = ucwords('daftar level - ') . $data['level']['nama_level'];

		$this->form_validation->set_rules('nama_level', 'Nama Level', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('level/index', $data);
		} else {
			$this->lem->updateLevel($id);
		}
	}

	public function deleteLevel($id)
	{
		$this->dm->check_status_login();
		
		$this->lem->deleteLevel($id);
	}
}


<?php if ($this->session->userdata('jabatan') == 'Kerani Panen'): ?>
	<?php if ($dt['status_panen'] == 'accafdeling'): ?>
		<span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Asisten Afdeling</span>
	<?php elseif ($dt['status_panen'] == 'accunit'): ?>
		<span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Manajer Unit</span>
	<?php elseif ($dt['status_panen'] == 'accops'): ?>
		<span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Kepala Bagian Operasional</span>
	<?php elseif ($dt['status_panen'] == 'selesai'): ?>
		<span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($dt['status_panen'])); ?></span>
	<?php elseif ($dt['status_panen'] == 'ditolak'): ?>
		<span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak<br>Asisten Afdeling</span>
	<?php else: ?>
		<span class="badge badge-info"><?= ucwords(strtolower($dt['status_panen'])); ?></span>
	<?php endif ?>

	<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php else: ?>
	<?php if ($dt['status_panen'] == 'accafdeling'): ?>

		<?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
			<span class="badge badge-danger"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
		<?php else: ?>
			<span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Asisten Afdeling</span>
		<?php endif ?>

	<?php elseif ($dt['status_panen'] == 'ditolak'): ?>
		<?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
			<span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak<br>Manajer Unit</span>
		<?php else: ?>
			<span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Manajer Unit</span>
		<?php endif ?>

		<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

	<?php elseif ($dt['status_panen'] == 'accunit'): ?>
		<?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>

			<span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
		<?php else: ?>
			<span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Manajer Unit</span>
		<?php endif ?>

	<?php elseif ($dt['status_panen'] == 'ditolak'): ?>
		<?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
			<span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak<br>Kepala Bagian Operasional</span>
		<?php else: ?>
			<span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Manajer Unit</span>
		<?php endif ?>

		<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<?php elseif ($dt['status_panen'] == 'accops'): ?>

		<?php if ($this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>
			<span class="badge badge-primary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
		<?php else: ?>
			<span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve<br>Kepala Bagian Operasional</span>
		<?php endif ?>

	<?php elseif ($dt['status_panen'] == 'selesai'): ?>
		<span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($dt['status_panen'])); ?></span>
	<?php else: ?>
		<span class="badge badge-info"><?= ucwords(strtolower($dt['status_panen'])); ?></span>
	<?php endif ?>
	<?php endif ?>