<?php 
$id = $this->session->userdata('id_user');
$this->db->join('biodata', 'biodata.id_user = user.id_user');
$cek_biodata = $this->db->get_where('user', ['user.id_user' => $id])->row_array();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Icon -->
	<link href="<?php echo base_url(); ?>assets/login/img/iconptpn7.png" rel="icon">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">

	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- Datatables CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/datatables/css/dataTables.bootstrap4.min.css'); ?>">
	<!-- Sweetalert2 CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.css'); ?>">
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/select2/select2.min.css'); ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
	<!-- Fancybox CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/fancybox/jquery.fancybox.min.css'); ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<title><?= $title; ?></title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

	<?php if ($cek_biodata !== NULL): ?>

		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
				</ul>
				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
          <!-- <li class="nav-item ">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li> -->
          <li class="nav-item dropdown user user-menu mb-2">
          	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          		<img src="<?= base_url('assets/img/img_profiles/') . $dataUser['foto']; ?>" class="img-circle elevation-1" style="width: 35px; height:35px" alt="User Image">
          		<span class="hidden-xs"> <?= $dataUser['jabatan']; ?></span>
          	</a>
          	<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          		<!-- User image -->
          		<li class="user-header bg-primary">
          			<img src="<?= base_url('assets/img/img_profiles/') . $dataUser['foto']; ?>" class="img-circle elevation-2" style="width: 100px; height:100px" alt="User Image">
          			<p>
          				<?= ucwords(strtolower($dataUser['nama_lengkap'])); ?> - <?= $dataUser['jabatan']; ?>
          				<small>Member since Nov. 2012</small>
          			</p>
          		</li>
          		<!-- Menu Body -->
          		<li class="user-body">
          			<div class="row">
          				<div class="col-12 text-center">
          					<a href="<?= base_url('profile'); ?>" class="btn btn-block btn-primary"><i class="nav-icon fas fa-edit"></i> Profile</a>
          				</div>
                 <!--  <div class="col-6 text-center">
                    <a href="" data-toggle="modal" data-target="#changePassword" class="btn btn-block btn-primary"><i class="nav-icon fas fa-edit"></i> Password</a>
                  </div> -->
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer text-center">
              	<div class="pull-right">
              		<a data-toggle="modal" data-target="#logoutModal" href="" class="btn btn-block btn-danger">
              			<i class="nav-icon fa-solid fa-power-off"></i> Logout</a>
              		</div>
              	</li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        	<!-- Brand Logo -->
        	<a href="<?= base_url('dashboard'); ?>" class="brand-link">
        		<img src="<?php echo base_url(); ?>assets/login/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        		<span class="brand-text font-weight-light">PTPN VII</span>
        	</a>

        	<!-- Sidebar -->
        	<div class="sidebar">
        		<!-- Sidebar user panel (optional) -->
        		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        			<div class="image">
        				<img src="<?= base_url('assets/img/img_profiles/') . $dataUser['foto']; ?>" class="img-circle elevation-2" style="width: 35px; height:35px" alt="User Image">
        			</div>
        			<div class="info">
        				<a class="d-block"><?= ucwords(strtolower($dataUser['nama_lengkap'])); ?></a>
        			</div>
        		</div>

        		<!-- Sidebar Menu -->
        		<nav class="mt-2">
        			<ul class="nav nav-pills nav-sidebar flex-column menu" data-widget="treeview" role="menu" data-accordion="false">
        				<li class="nav-item">
        					<a href="<?= base_url('dashboard'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'dashboard' || $this->uri->uri_string() == '') {
        						echo 'active';
        					} ?>">
        					<i class="nav-icon fa-brands fas fa-home"></i>
        					<p>
        						Dashboard
        					</p>
        				</a>
        			</li>
        			<li class="nav-item">
        				<a href="<?= base_url('profile'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'profile' || $this->uri->uri_string() == 'profile/index') {
        					echo 'active';
        				} ?>">
        				<i class="nav-icon fa-solid fa-user"></i>
        				<p>
        					Profile
        				</p>
        			</a>
        		</li>

        		<?php if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>
        		<li class="nav-header">Manajemen Data</li>
        		<li class="nav-item">
        			<a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'user' || $this->uri->uri_string() == 'unit' || $this->uri->uri_string() == 'afdeling') {
        				echo 'active'; 
        			} ?>">
        			<i class="nav-icon fas fa-edit"></i>
        			<p>
        				Manajemen Data
        				<i class="fas fa-angle-left right"></i>
        			</p>
        		</a>
        		<ul class="nav nav-treeview">
        			<li class="nav-item">
        				<a href="<?= base_url('user'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'user') {
        					echo 'active';
        				} ?>">
        				<i class="far fa-circle nav-icon"></i>
        				<p>Pengguna</p>
        			</a>
        		</li>

        		<li class="nav-item">
        			<a href="<?= base_url('unit'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'unit') {
        				echo 'active';
        			} ?>">
        			<i class="far fa-circle nav-icon"></i>
        			<p>Unit</p>
        		</a>
        	</li>
        	<li class="nav-item">
        		<a href="<?= base_url('afdeling'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'afdeling') {
        			echo 'active';
        		} ?>">
        		<i class="far fa-circle nav-icon"></i>
        		<p>Afdeling</p>
        	</a>
        </li>
      </ul>
    </li>
  <?php endif ?>
  <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
  	<li class="nav-header">Data Panen dan Laporan</li>
  <?php else: ?>
  	<li class="nav-header">Data Panen</li>
  <?php endif ?>

  <li class="nav-item">
  	<a href="<?= base_url('panen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'panen' || $this->uri->uri_string() == 'panen/createPanen' || $this->uri->uri_string() == 'panen/index' || $this->uri->uri_string() == 'panen/index/' . 'accafdeling' || $this->uri->uri_string() == 'panen/index/' . 'accunit' || $this->uri->uri_string() == 'panen/index/' . 'accops' || $this->uri->uri_string() == 'panen/index/' . 'selesai') {
  		echo 'active';
  	} ?>">
  	<i class="nav-icon fa-solid fa-clipboard"></i>
  	<p>
  		Panen Hari ini
  	</p>
  </a>
</li>
<li class="nav-item">
	<a href="<?= base_url('riwayat_panen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'riwayat_panen' ) {
		echo 'active';
	} ?>">
	<i class="nav-icon fa-solid fa-history"></i>
	<p>
		Riwayat Panen
	</p>
</a>
</li>
<?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
	<li class="nav-item">
		<a href="<?= base_url('laporan'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'laporan') {
			echo 'active';
		} ?>">
		<i class="nav-icon fa-solid fa-file-lines"></i>
		<p>
			Laporan
		</p>
	</a>
</li>
<?php endif ?>
<li class="nav-header">Log-out</li>
<li class="nav-item">
	<a data-toggle="modal" data-target="#logoutModal" href="" class="nav-link <?php if ($this->uri->uri_string() == 'logout') {
		echo 'active';
	} ?>">
	<i class="nav-icon fa-solid fa-power-off"></i>
	<p>
		Logout
	</p>
</a>
</li>
</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>


<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="logoutModalLabel">Keluar Aplikasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Apakah anda yakin ingin keluar dari aplikasi?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
				<a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-sign-out-alt"></i> Keluar</a>
			</div>
		</div>
	</div>
</div>

<?php endif ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<?php if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>
					<h1><i class="fa-solid fa-history"></i> Riwayat Panen</h1>
				<?php elseif ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
					<h1><i class="fa-solid fa-history"></i> Riwayat Panen - Unit <?= $dataUser['nama_unit']; ?></h1>
				<?php else: ?>
					<h1><i class="fa-solid fa-history"></i> Riwayat Panen - Unit <?= $dataUser['nama_unit']; ?> - <?= $dataUser['nama_afdeling']; ?></h1>
				<?php endif ?>
			</div>
		</div>
		<div class="row my-2">
			<div class="col-lg-12">
				<?php if (validation_errors()): ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert"><br>
						<strong>Gagal!</strong> <?= validation_errors(); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
			</div>
		</div>

	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">

			<div class="card card-outline card-info">
				<div class="card-body">


					<?php if ($this->uri->segment(3, 0)): ?>
						<div class="row my-2">
							<div class="col-lg">
								<div class="table-responsive">
									<table class="table table-striped table-bordered text-center" id="table_id">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Panen</th>
												<th>Tanggal Panen</th>
												<th>Kerani Panen</th>


												<?php if ($this->session->userdata('jabatan') == '1'): ?>
													<th>Unit</th>
													<th>Afdelinng</th>
												<?php endif ?>
												<th>Jumlah Tandan</th>
												<th>Status Panen</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($panen as $dt): ?>
												<tr>
													<td><?= $i++; ?></td>
													<td><?= $dt['kode_panen']; ?></td>

													<td><?= $dt['tanggal_panen']; ?></td>
													<td><?= $dt['username']; ?></td>


													<?php if ($this->session->userdata('jabatan') == '1'): ?>
														<td><?= $dt['nama_unit']; ?></td>
														<td><?= $dt['nama_afdeling']; ?></td>

													<?php endif ?>
													<td><?= $dt['jumlah_tandan']; ?></td>
													
													<td>
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
													</td>

													<td class="row">
														
														<a href="<?= base_url('riwayat_panen/detailpanen/') . $dt['id_panen']; ?>" class="m-1 badge badge-warning text-white"><i class="fas fa-fw fa-align-justify"></i> Detail</a>
														<a href="" data-toggle="modal" data-target="#ubahPanenModal<?= $dt['id_panen']; ?>" class="m-1 badge badge-success"><i class="fas fa-fw fa-edit"></i> Ubah</a>
														<!-- Jika super administrator atau administrator -->
														<?php if ($this->session->userdata('jabatan') == '1'): ?>
															<a href="<?= base_url('panen/deletePanen/') . $dt['id_panen']; ?>" class="btn-delete m-1 badge badge-danger" data-text="<?= $dt['kode_panen']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
														<?php endif ?>
													</td>
												</tr>
												<!-- Modal Ubah Panen -->
												<div class="text-left modal fade" id="ubahPanenModal<?= $dt['id_panen']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahPanenModalLabel<?= $dt['id_panen']; ?>" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<form action="<?= base_url('panen/updatePanen/') . $dt['id_panen']; ?>" method="post">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="ubahPanenModalLabel<?= $dt['id_panen']; ?>"><i class="fas fa-fw fa-handshake"></i> <sup><i class="fas fa-fw fa-edit"></i></sup> Ubah Panen - <?= $dt['kode_panen']; ?></h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<div class="row">
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label for="id_unit<?= $dt['id_panen']; ?>">Nama Unit</label>
																				<input type="hidden" name="id_unit" value="<?= $dt['id_unit']; ?>">
																				<input style="cursor: not-allowed;" disabled type="text" value="<?= $dataUser['nama_unit']; ?>" class="form-control">
																			</div>
																		</div>
																		<div class="col-sm-6">
																			<div class="form-group">
																				<label for="id_afdeling<?= $dt['id_panen']; ?>">Nama Afdeling</label>
																				<input type="hidden" name="id_afdeling" value="<?= $dt['id_afdeling']; ?>">
																				<input style="cursor: not-allowed;" disabled type="text" value="<?= $dataUser['nama_afdeling']; ?>" class="form-control">
																			</div>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-lg-6">
																			<div class="form-group">
																				<label for="jumlah_tandan<?= $dt['kode_panen']; ?>">Jumlah Tandan</label>
																				<input min="0" placeholder="0" type="number" onkeyup="pembagian()" name="jumlah_tandan" id="jumlah_tandan<?= $dt['jumlah_tandan']; ?>" class="form-control" value="<?= $dt['jumlah_tandan']; ?>">
																				<?= form_error('jumlah_tandan', '<small class="form-text text-danger">', '</small>'); ?>
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<div class="form-group">
																				<label for="tandan_kg<?= $dt['kode_panen']; ?>">Tandan (Kg)</label>
																				<input min="0" placeholder="0" type="number" onkeyup="pembagian()"  name="tandan_kg" id="tandan_kg<?= $dt['tandan_kg']; ?>" class="form-control" value="<?= $dt['tandan_kg']; ?>">
																				<?= form_error('tandan_kg', '<small class="form-text text-danger">', '</small>'); ?>
																			</div>
																		</div>
																	</div>

																	<div class="form-group">
																		<label for="rata_tandan<?= $dt['kode_panen']; ?>">Rata-rata Kg/Tandan</label>
																		<input readonly min="0" placeholder="0" type="number" name="rata_tandan" id="rata_tandan<?= $dt['rata_tandan']; ?>" class="form-control" value="<?= $dt['rata_tandan']; ?>">
																		<?= form_error('rata_tandan', '<small class="form-text text-danger">', '</small>'); ?>
																	</div>


																	<div class="row">

																		<div class="col-lg-6">
																			<div class="form-group">
																				<label for="brondolan<?= $dt['kode_panen']; ?>">Brondolan (Kg)</label>
																				<input min="0" placeholder="0" type="number" name="brondolan" id="brondolan<?= $dt['brondolan']; ?>" class="form-control" value="<?= $dt['brondolan']; ?>">
																				<?= form_error('brondolan', '<small class="form-text text-danger">', '</small>'); ?>
																			</div>
																		</div>
																		<div class="col-lg-6">
																			<div class="form-group">
																				<label for="tandan_mentah<?= $dt['kode_panen']; ?>">Tandan Mentah</label>
																				<input min="0" placeholder="0" type="number" name="tandan_mentah" id="tandan_mentah<?= $dt['tandan_mentah']; ?>" class="form-control" value="<?= $dt['tandan_mentah']; ?>">
																				<?= form_error('tandan_mentah', '<small class="form-text text-danger">', '</small>'); ?>
																			</div>
																		</div>
																	</div>
																	<?php if ($this->session->userdata('jabatan') == '1'): ?>
																		<div class="form-group">
																			<label for="status_panen<?= $dt['kode_panen']; ?>">Status Panen</label>
																			<select name="status_panen" id="status_panen<?= $dt['kode_panen']; ?>" class="form-control">
																				<?php if ($dt['status_bayar'] == 'sudah dibayar'): ?>
																					<?php if ($dt['status_panen'] == 'accafdeling'): ?>
																						<option value="accafdeling">accafdeling</option>
																						<option value="accunit">accunit</option>
																						<option value="accops">accops</option>
																						<option value="selesai">selesai</option>
																					<?php elseif ($dt['status_panen'] == 'accunit'): ?>
																						<option value="accunit">accunit</option>
																						<option value="accops">accops</option>
																						<option value="selesai">selesai</option>
																					<?php elseif ($dt['status_panen'] == 'accops'): ?>
																						<option value="accops">accops</option>
																						<option value="selesai">selesai</option>
																						<option value="accunit">accunit</option>
																					<?php elseif ($dt['status_panen'] == 'selesai'): ?>
																						<option value="selesai">selesai</option>
																						<option value="accunit">accunit</option>
																						<option value="accops">accops</option>
																					<?php endif ?>
																				<?php else: ?>
																					<?php if ($dt['status_panen'] == 'accafdeling'): ?>
																						<option value="accafdeling">accafdeling</option>
																						<option value="accunit">accunit</option>
																						<option value="accops">accops</option>
																					<?php elseif ($dt['status_panen'] == 'accunit'): ?>
																						<option value="accunit">accunit</option>
																						<option value="accops">accops</option>
																						<option value="accafdeling">accafdeling</option>
																					<?php elseif ($dt['status_panen'] == 'accops'): ?>
																						<option value="accops">accops</option>
																						<option value="accafdeling">accafdeling</option>
																						<option value="accunit">accunit</option>
																					<?php elseif ($dt['status_panen'] == 'selesai'): ?>
																						<option value="selesai">selesai</option>
																						<option value="accops">accops</option>
																						<option value="accunit">accunit</option>
																						<option value="accafdeling">accafdeling</option>
																					<?php endif ?>
																				<?php endif ?>
																			</select>
																		</div>
																	<?php endif ?>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
																	<button type="submit" name="btnUbahPanen" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					<?php elseif ($this->uri->segment(3, 0) == FALSE): ?>
						<div class="row my-2">
							<div class="col-lg">
								<div class="table-responsive">
									<table class="table table-striped table-bordered text-center" id="table_id">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Panen</th>
												<th>Tanggal Panen</th>
												<th>Kerani Panen</th>
												<?php if ($this->session->userdata('jabatan') == '1'): ?>
													<th>Unit</th>
													<th>Afdeling</th>
												<?php endif ?>

												<th>Jumlah Tandan</th>
												<th>Status Panen</th>
												<!-- <th>Penolak</th> -->

												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; ?>
											<?php foreach ($panen as $dt): ?>
												<tr>
													<td><?= $i++; ?></td>
													<td><?= $dt['kode_panen']; ?></td>
													<td><?= $dt['tanggal_panen']; ?></td>
													<td><?= $dt['username']; ?></td>
													<?php if ($this->session->userdata('jabatan') == '1'): ?>
														<td><?= $dt['nama_unit']; ?></td>
														<td><?= $dt['nama_afdeling']; ?></td>
													<?php endif ?>
													<td><?= $dt['jumlah_tandan']; ?></td>
													<td>
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
													</td>
													<!-- <td><?= $dt['penolak']; ?></td> -->

													<td class="row">
														
														<a href="<?= base_url('riwayat_panen/detailpanen/') . $dt['id_panen']; ?>" class="m-1 badge badge-warning text-white"><i class="fas fa-fw fa-align-justify"></i> Detail</a>
														<?php if ($dt['status_panen'] !== 'selesai'): ?>
															<?php if ($this->session->userdata('jabatan') == 'Kerani Panen' OR $this->session->userdata('jabatan') == '1'): ?>
															<a href="" data-toggle="modal" data-target="#ubahPanenModal<?= $dt['id_panen']; ?>" class="m-1 badge badge-success"><i class="fas fa-fw fa-edit"></i> Ubah</a>
														<?php endif ?>
													<?php endif ?>
													<!-- Jika super administrator atau administrator -->
													<?php if ($this->session->userdata('jabatan') == '1'): ?>
														<a href="<?= base_url('panen/deletePanen/') . $dt['id_panen']; ?>" class="btn-delete m-1 badge badge-danger" data-text="<?= $dt['kode_panen']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
													<?php endif ?>
												</td>
											</tr>
											<!-- Modal Ubah Panen -->
											<div class="text-left modal fade" id="ubahPanenModal<?= $dt['id_panen']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahPanenModalLabel<?= $dt['id_panen']; ?>" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<form action="<?= base_url('panen/updatePanen/') . $dt['id_panen']; ?>" method="post">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="ubahPanenModalLabel<?= $dt['id_panen']; ?>"><i class="fas fa-fw fa-handshake"></i> <sup><i class="fas fa-fw fa-edit"></i></sup> Ubah Panen - <?= $dt['kode_panen']; ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>

															<div class="modal-body">
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label for="id_unit<?= $dt['id_panen']; ?>">Nama Unit</label>
																			<input type="hidden" name="id_unit" value="<?= $dt['id_unit']; ?>">
																			<input style="cursor: not-allowed;" disabled type="text" value="<?= $dataUser['nama_unit']; ?>" class="form-control">
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label for="id_afdeling<?= $dt['id_panen']; ?>">Nama Afdeling</label>
																			<input type="hidden" name="id_afdeling" value="<?= $dt['id_afdeling']; ?>">
																			<input style="cursor: not-allowed;" disabled type="text" value="<?= $dataUser['nama_afdeling']; ?>" class="form-control">
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label for="jumlah_tandan<?= $dt['kode_panen']; ?>">Jumlah Tandan</label>
																			<input min="0" placeholder="0" type="number" onkeyup="pembagian()" name="jumlah_tandan" id="jumlah_tandan<?= $dt['jumlah_tandan']; ?>" class="form-control" value="<?= $dt['jumlah_tandan']; ?>">
																			<?= form_error('jumlah_tandan', '<small class="form-text text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label for="tandan_kg<?= $dt['kode_panen']; ?>">Tandan (Kg)</label>
																			<input min="0" placeholder="0" type="number" onkeyup="pembagian()"  name="tandan_kg" id="tandan_kg<?= $dt['tandan_kg']; ?>" class="form-control" value="<?= $dt['tandan_kg']; ?>">
																			<?= form_error('tandan_kg', '<small class="form-text text-danger">', '</small>'); ?>
																		</div>
																	</div>

																</div>

																<div class="form-group">
																	<label for="rata_tandan<?= $dt['kode_panen']; ?>">Rata-rata Kg/Tandan</label>
																	<input readonly min="0" placeholder="0" type="number" name="rata_tandan" id="rata_tandan<?= $dt['rata_tandan']; ?>" class="form-control" value="<?= $dt['rata_tandan']; ?>">
																	<?= form_error('rata_tandan', '<small class="form-text text-danger">', '</small>'); ?>
																</div>


																<div class="row">

																	<div class="col-lg-6">
																		<div class="form-group">
																			<label for="brondolan<?= $dt['kode_panen']; ?>">Brondolan (Kg)</label>
																			<input min="0" placeholder="0" type="number" name="brondolan" id="brondolan<?= $dt['brondolan']; ?>" class="form-control" value="<?= $dt['brondolan']; ?>">
																			<?= form_error('brondolan', '<small class="form-text text-danger">', '</small>'); ?>
																		</div>
																	</div>
																	<div class="col-lg-6">
																		<div class="form-group">
																			<label for="tandan_mentah<?= $dt['kode_panen']; ?>">Tandan Mentah</label>
																			<input min="0" placeholder="0" type="number" name="tandan_mentah" id="tandan_mentah<?= $dt['tandan_mentah']; ?>" class="form-control" value="<?= $dt['tandan_mentah']; ?>">
																			<?= form_error('tandan_mentah', '<small class="form-text text-danger">', '</small>'); ?>
																		</div>
																	</div>
																</div>
																<?php if ($this->session->userdata('jabatan') == '1'): ?>
																	<div class="form-group">
																		<label for="status_panen<?= $dt['kode_panen']; ?>">Status Panen</label>
																		<select name="status_panen" id="status_panen<?= $dt['kode_panen']; ?>" class="form-control">
																			<?php if ($dt['status_bayar'] == 'sudah dibayar'): ?>
																				<?php if ($dt['status_panen'] == 'accafdeling'): ?>
																					<option value="accafdeling">accafdeling</option>
																					<option value="accunit">accunit</option>
																					<option value="accops">accops</option>
																					<option value="selesai">selesai</option>
																				<?php elseif ($dt['status_panen'] == 'accunit'): ?>
																					<option value="accunit">accunit</option>
																					<option value="accops">accops</option>
																					<option value="selesai">selesai</option>
																				<?php elseif ($dt['status_panen'] == 'accops'): ?>
																					<option value="accops">accops</option>
																					<option value="selesai">selesai</option>
																					<option value="accunit">accunit</option>
																				<?php elseif ($dt['status_panen'] == 'selesai'): ?>
																					<option value="selesai">selesai</option>
																					<option value="accunit">accunit</option>
																					<option value="accops">accops</option>
																				<?php endif ?>
																			<?php else: ?>
																				<?php if ($dt['status_panen'] == 'accafdeling'): ?>
																					<option value="accafdeling">accafdeling</option>
																					<option value="accunit">accunit</option>
																					<option value="accops">accops</option>
																				<?php elseif ($dt['status_panen'] == 'accunit'): ?>
																					<option value="accunit">accunit</option>
																					<option value="accops">accops</option>
																					<option value="accafdeling">accafdeling</option>
																				<?php elseif ($dt['status_panen'] == 'accops'): ?>
																					<option value="accops">accops</option>
																					<option value="accafdeling">accafdeling</option>
																					<option value="accunit">accunit</option>
																				<?php elseif ($dt['status_panen'] == 'selesai'): ?>
																					<option value="selesai">selesai</option>
																					<option value="accops">accops</option>
																					<option value="accunit">accunit</option>
																					<option value="accafdeling">accafdeling</option>
																				<?php endif ?>
																			<?php endif ?>
																		</select>
																	</div>
																<?php endif ?>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
																<button type="submit" name="btnUbahPanen" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				<?php endif ?>
			</div>
			<!-- <div class="card-footer">
				Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
			</div> -->
		</div>

	</div>
	<!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
	function pembagian(){
		var nilai1 = $('input[name="jumlah_tandan"]').val();
		var nilai2 = $('input[name="tandan_kg"]').val();
		var hasil = parseFloat(nilai2) / parseFloat(nilai1);
		if (!isNaN(hasil)) {
			$('input[name="rata_tandan"]').val(hasil);
		} else {
			$('input[name="rata_tandan"]').val(0);
		}
		
	}
	
</script>
