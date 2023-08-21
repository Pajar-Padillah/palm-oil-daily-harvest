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
  				<a href="<?= base_url('profile'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'profile') {
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
  		<li class="nav-item menu-open">
  			<a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'user' || $this->uri->uri_string() == 'jabatan' || $this->uri->uri_string() == 'unit' || $this->uri->uri_string() == 'afdeling' || $this->uri->uri_string() == 'user/profile/' . $userProfile['id_user']) {
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
  				<a href="<?= base_url('user'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'user' || $this->uri->uri_string() == 'user/profile/' . $userProfile['id_user']) {
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
	<a href="<?= base_url('riwayat_panen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'riwayat_panen') {
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
				<div class="col-sm-12">
					<h1>Profile - <?= $userProfile['username']; ?></h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body pb-0">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-7 d-flex align-items-stretch flex-column">
						<div class="card bg-light d-flex flex-fill">
							<div class="card-header text-muted border-bottom-0">
								Detail Profile
							</div>
							<div class="ribbon-wrapper ribbon-xl">
								<div class="ribbon bg-primary">
									<?= $userProfile['jabatan']; ?>
								</div>
							</div>
						</div>
						<div class="card-body pt-0">
							<div class="row">
								<div class="col-8">
									<b><h1 class="lead"><b><?= ucwords(strtolower($userProfile['nama_lengkap'])); ?></b></h1></b><br>
									<p class="text-muted text-sm"><b>Username : </b> <?= $userProfile['username']; ?> <br>
										<b>Tempat / Tanggal Lahir : </b> <?= $userProfile['tempat_lahir']; ?> / <?= $userProfile['tanggal_lahir']; ?> <br>
										<b>Jenis Kelamin : </b> <?= ucwords($userProfile['jenis_kelamin']); ?> <br>
										
									</p>

									<ul class="ml-4 mb-0 fa-ul text-muted">

										<li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> E-mail #:  <?php if ($userProfile['email'] == ""): ?> - 
										<?php else: ?>
											<?= $userProfile['email']; ?>
											<?php endif ?></li>
											<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No. Telepon #: <?= $userProfile['telepon']; ?></li>
											<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: <?= $userProfile['alamat']; ?></li>
										</ul>
									</div>
									<div class="col-4 text-center">
										<a href="<?= base_url('assets/img/img_profiles/') . $userProfile['foto']; ?>" class="enlarge">
											<img width="128" height="128" alt="user-avatar" class="img-circle img-fluid" src="<?= base_url('assets/img/img_profiles/') . $userProfile['foto']; ?>" class="card-img" alt="<?= $userProfile['foto']; ?>">
										</a>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="text-right">

									<?php if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>
									<!-- Jika bukan akun super administrator atau yang login super administrator itu sendiri -->
									<?php if ($userProfile['jabatan'] !== 'Administrator' OR $this->session->userdata('id_user') == '1'): ?>
										<!-- bukan akun administrator  atau yang login super administrator -->
										<?php if ($userProfile['jabatan'] !== 'Kepala Bagian Operasional' OR $this->session->userdata('id_user') == '1'): ?>
											<a href="" data-toggle="modal" data-target="#editBiodataModal" class="btn btn-sm btn-primary text-white"><i class="fas fa-fw fa-user-edit"></i> Ubah Biodata</a>
											<!-- jika akun administrator yang login administrator itu sendiri -->
										<?php elseif ($userProfile['id_user'] == $this->session->userdata('id_user')): ?>
											<a href="" data-toggle="modal" data-target="#editBiodataModal" class="btn btn-sm btn-primary text-white"><i class="fas fa-fw fa-user-edit"></i> Ubah Biodata</a>
										<?php endif ?>
									<?php endif ?>
								<?php endif ?>
							</div>
						</div>
						<br>
					</div>
				<!-- <div class="col-md-5">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-text-width"></i>
								Primary Block Quotes
							</h3>
						</div>
						<div class="card-body">
							<blockquote>
								<p><?= $userProfile['jabatan']; ?></p>
								<small>Someone famous in <cite title="Source Title">Source Title</cite></small>
							</blockquote>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="editBiodataModal" tabindex="-1" role="dialog" aria-labelledby="editBiodataModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<form action="<?= base_url('user/updateBiodataProfile'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id_user" value="<?= $userProfile['id_user']; ?>">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editBiodataModalLabel">Ubah Biodata - <?= $userProfile['username']; ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg">
							<div class="text-center">
								<a href="<?= base_url('assets/img/img_profiles/') . $userProfile['foto']; ?>" id="check_enlarge_photo" class="enlarge">
									<img style="width: 75%" src="<?= base_url('assets/img/img_profiles/') . $userProfile['foto']; ?>" id="check_photo" class="img-thumbnail rounded img_fluid" alt="Photo">
								</a>
								<div><small>Click image to zoom</small></div>
							</div>
							
							<div class="custom-file my-3 mb-2">
								<input type="file" class="custom-file-input" id="photo" name="foto">
								<label for="photo" class="custom-file-label">Pilih Foto</label>
							</div>
						</div>
						<div class="col-lg">
							<div class="form-group">
								<label for="nama_lengkap">Nama Lengkap</label>
								<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $userProfile['nama_lengkap']; ?>">
								<?= form_error('nama_lengkap', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="tempat_lahir">Tempat Lahir</label>
										<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $userProfile['tempat_lahir']; ?>">
										<?= form_error('tempat_lahir', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="tanggal_lahir">Tanggal Lahir</label>
										<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $userProfile['tanggal_lahir']; ?>">
										<?= form_error('tanggal_lahir', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm">
										<label for="jenis_kelamin">Jenis Kelamin</label>
									</div>
								</div>
								<div class="row">
									<?php if ($userProfile['jenis_kelamin'] == 'Laki-laki'): ?>
										<div class="col-sm-4">
											<input type="radio" checked name="jenis_kelamin" value="Laki-laki" id="Laki-laki"> <label for="Laki-laki">Laki-laki</label>
										</div>
										<div class="col-sm-4">
											<input type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan"> <label for="Perempuan">Perempuan</label>
										</div>
									<?php elseif ($userProfile['jenis_kelamin'] == 'Perempuan'): ?>
										<div class="col-sm-4">
											<input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki"> <label for="Laki-laki">Laki-laki</label>
										</div>
										<div class="col-sm-4">
											<input type="radio" checked name="jenis_kelamin" value="Perempuan" id="Perempuan"> <label for="Perempuan">Perempuan</label>
										</div>
									<?php else: ?>
										<div class="col-sm-4">
											<input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki"> <label for="Laki-laki">Laki-laki</label>
										</div>
										<div class="col-sm-4">
											<input type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan"> <label for="Perempuan">Perempuan</label>
										</div>
									<?php endif ?>
								</div>
							</div>
							<div class="form-group">
								<label for="telepon">Telepon</label>
								<input type="number" name="telepon" id="telepon" class="form-control"  value="<?= $userProfile['telepon']; ?>">
								<?= form_error('telepon', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" id="email" class="form-control"  value="<?= $userProfile['email']; ?>" placeholder="(Opsional)">
								<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea name="alamat" id="alamat" class="form-control"><?= $userProfile['alamat']; ?></textarea>
								<?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
					<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
				</div>
			</div>
		</form>
	</div>
</div>

