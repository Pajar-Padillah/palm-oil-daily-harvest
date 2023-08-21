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
					<!-- Messages Dropdown Menu -->
					
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
				<!-- 	<li class="nav-item ">
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
  				<a href="<?= base_url('profile'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'profile') {
  					echo 'active';
  				} ?>">
  				<i class="nav-icon fa-solid fa-user"></i>
  				<p>
  					Profile
  				</p>
  			</a>
  		</li>

  		<?php if ($this->session->userdata('jabatan') == '1' OR $this->session->userdata('jabatan') == '2'): ?>
  		<li class="nav-header">Manajemen Data</li>
  		<li class="nav-item menu-open">
  			<a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'user' || $this->uri->uri_string() == 'jabatan' || $this->uri->uri_string() == 'unit' || $this->uri->uri_string() == 'afdeling') {
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
  		<?php if ($this->session->userdata('jabatan') == '1') : ?>
  			<li class="nav-item">
  				<a href="<?= base_url('jabatan'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'jabatan') {
  					echo 'active';
  				} ?>">
  				<i class="far fa-circle nav-icon"></i>
  				<p>jabatan</p>
  			</a>
  		</li>
  	<?php endif ?>
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
<?php if ($this->session->userdata('jabatan') !== '5'): ?>
	<li class="nav-header">Data Panen dan Laporan</li>
	<li class="nav-item">
		<a href="<?= base_url('panen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'panen' || $this->uri->uri_string() == 'panen/createPanen') {
			echo 'active';
		} ?>">
		<i class="nav-icon fa-solid fa-clipboard"></i>
		<p>
			Panen Hari ini
		</p>
	</a>
</li>
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
					<h1><i class="fas fa-fw fa-user"></i> <sup><i class="fas fa-1x fa-chart-line"></i></sup> jabatan</h1>
				</div>
				<!-- <div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">DataTables</li>
					</ol>
				</div> -->
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-primary card-outline">
						<div class="card-header">
							<div class="row mb-2">
								<div class="col-sm-6">
									<h3>Daftar jabatan</h3>
								</div>
								<div class="col-sm-6">

									<ol class="float-sm-right">
										<!-- Jika super administrator atau administrator -->
										<?php if ($this->session->userdata('jabatan') == '1'): ?>
											<a href="" data-toggle="modal" data-target="#tambahjabatanModal" class="btn btn-primary"><i class="fas fa-fw fa-user"></i> <sup><i class="fas fa-1x fa-chart-line"></i></sup> <sup><i class="fas fa-fw fa-plus"></i></sup> Tambah jabatan</a>
										<?php endif ?>
									</ol>
									<!-- Modal Tambah jabatan -->
									<div class="text-left modal fade" id="tambahjabatanModal" tabindex="-1" role="dialog" aria-labelledby="tambahjabatanModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<form action="<?= base_url('jabatan/createjabatan'); ?>" method="post">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="tambahjabatanModalLabel"><i class="fas fa-fw fa-user"></i> <sup><i class="fas fa-1x fa-chart-line"></i></sup> <sup><i class="fas fa-fw fa-plus"></i></sup> Tambah jabatan</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-group">
															<label for="jabatan">Nama jabatan</label>
															<input required type="text" name="jabatan" id="jabatan" class="form-control" value="<?= set_value('jabatan'); ?>">
															<?= form_error('jabatan', '<small class="form-text text-danger">', '</small>'); ?>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
														<button type="submit" name="btnTambahjabatan" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card-header -->

						<div class="row my-2">
							<div class="col-lg-6">
								<?php if (validation_errors()): ?>
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong>Gagal!</strong> <?= validation_errors(); ?>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								<?php endif ?>
							</div>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered" id="table_id">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama jabatan</th>
											<?php if ($this->session->userdata('jabatan') == '1'): ?>
												<th>Aksi</th>
											<?php endif ?>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($jabatan as $dj): ?>
											<tr>
												<td><?= $i++; ?></td>
												<td><?= $dj['jabatan']; ?></td>
												<?php if ($this->session->userdata('jabatan') == '1'): ?>
													<td>
														<?php if ($dj['jabatan'] !== '1'): ?>
															<a href="" data-toggle="modal" data-target="#ubahjabatanModal<?= $dj['jabatan']; ?>" class="m-1 badge badge-success"><i class="fas fa-fw fa-edit"></i> Ubah</a>
															<a href="<?= base_url('jabatan/deletejabatan/') . $dj['jabatan']; ?>" class="btn-delete m-1 badge badge-danger" data-text="<?= $dj['jabatan']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
														<?php endif ?>
													</td>
												<?php endif ?>
											</tr>
											<!-- Modal Ubah jabatan -->
											<div class="text-left modal fade" id="ubahjabatanModal<?= $dj['jabatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahjabatanModalLabel<?= $dj['jabatan']; ?>" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<form action="<?= base_url('jabatan/updatejabatan/') . $dj['jabatan']; ?>" method="post">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="ubahjabatanModalLabel<?= $dj['jabatan']; ?>"><i class="fas fa-fw fa-user"></i> <sup><i class="fas fa-1x fa-chart-line"></i></sup> <sup><i class="fas fa-fw fa-edit"></i></sup> Ubah jabatan - <?= $dj['jabatan']; ?></h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="form-group">
																	<label for="jabatan<?= $dj['jabatan']; ?>">Nama jabatan</label>
																	<input required type="text" name="jabatan" id="jabatan<?= $dj['jabatan']; ?>" class="form-control" value="<?= $dj['jabatan']; ?>">
																	<?= form_error('jabatan', '<small class="form-text text-danger">', '</small>'); ?>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
																<button type="submit" name="btnUbahjabatan" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
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
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<footer class="main-footer">

	<strong>Copyright &copy; <?= date('Y'); ?> <a href="https://resume-ikhsan.netlify.app" target="_blank">Nur Ikhsan Fajri</a></strong>
	<div class="float-right d-none d-sm-inline-block">
		<b> Tugas Akhir &copy;</b> Manajemen Informatika
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Sweet Alert 2 -->
<div class="flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<div class="flashdata-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
<div class="flashdata-failed" data-flashdata="<?= $this->session->flashdata('message-failed'); ?>"></div>
<!-- ./Sweet Alert 2 -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('assets/vendor/jquery/jquery-3.4.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/select2/select2.min.js'); ?>"></script>

<!-- Config JavaScript -->
<script src="<?= base_url('assets/js/config-fancybox.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-sweetalert2.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-sidebar.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-select2.js'); ?>"></script>


<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- Datatable -->
<script src="<?= base_url('assets/vendor/datatables/datatables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/datatables/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-datatables.js'); ?>"></script>
<!-- Fancybox -->
<script src="<?= base_url('assets/vendor/fancybox/jquery.fancybox.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-fancybox.js'); ?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
	$(function () {
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>



</body>
</html>

