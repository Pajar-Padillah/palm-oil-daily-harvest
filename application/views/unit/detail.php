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
  <style type="text/css">

    .map-responsive{

      overflow:hidden;

      padding-bottom:56.25%;

      position:relative;

      height:0;

    }

    .map-responsive iframe{

      left:0;

      top:0;

      height:100%;

      width:100%;

      position:absolute;

    }
  </style>
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
              <a href="#" class="nav-link <?php if ($this->uri->uri_string() == 'user' || $this->uri->uri_string() == 'unit' || $this->uri->uri_string() == 'afdeling' || $this->uri->uri_string() == 'unit/detailUnit/' . $detailUnit['id_unit']) {
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
              <a href="<?= base_url('unit'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'unit' || $this->uri->uri_string() == 'unit/detailUnit/' . $detailUnit['id_unit']) {
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
        <div class="col-sm-6">
          <h1><i class="fas fa-industry"></i> Unit <?= $detailUnit['nama_unit']; ?></h1>
        </div>
        <!-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Compose</li>
          </ol>
        </div> -->
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <a href="" data-toggle="modal" data-target="#ubahUnitModal" class="btn btn-primary btn-block mb-3"><i class="fas fa-fw fa-edit"></i> Edit Detail Unit</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Foto Unit</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body text-center">
              <a href="<?= base_url('assets/img/img_unit/') . $detailUnit['foto_unit']; ?>" class="enlarge">
                <img alt="user-avatar" src="<?= base_url('assets/img/img_unit/') . $detailUnit['foto_unit']; ?>" class="card-img" alt="<?= $detailUnit['foto_unit']; ?>">
              </a>
              <span><i><small>Click image to zoom</small></i></span>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a class="nav-link">
                    <i class="fa-solid fa-chart-area"></i> <b>Luas :</b> <?php $angka = $detailUnit['luas_unit'];
                    $angka_format = number_format($angka);
                    if ($angka_format == null) {
                      echo 0;
                    }
                    else {
                      echo $angka_format;
                    } ?> Ha
                    <!-- <div class="badge bg-primary float-right">12</div> -->
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">
                    <i class="fa-solid fa-tree"></i> <b>Jumlah Pohon :</b> <?php $angka = $detailUnit['jumlah_pohon'];
                    $angka_format = number_format($angka);
                    if ($angka_format == null) {
                      echo 0;
                    }
                    else {
                      echo $angka_format;
                    } ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">
                    <i class="fa-solid fa-phone"></i> <b>Telp. :</b> <?= $detailUnit['telepon_unit']; ?>
                    <!-- <div class="badge bg-primary float-right">12</div> -->
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link">
                    <i class="fa-solid fa-location-dot"></i> <b>Alamat :</b> <?= $detailUnit['alamat_unit']; ?>
                  </a>
                </li>
               <!--  <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-file-alt"></i> Drafts
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-filter"></i> Junk
                    <span class="badge bg-warning float-right">65</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-trash-alt"></i> Trash
                  </a>
                </li> -->
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info text-center">
                <br><b>MANAJER UNIT</b>
                <h5><i><?= $detailUnit['manajer_unit']; ?></i></h5><br>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <b>MAP</b>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <div class="map-responsive"><iframe src="<?= $detailUnit['map']; ?>" width="688" height="450" style="border:3;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
             <!--  <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                  <li>
                    <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> Sep2014-report.pdf</a>
                      <span class="mailbox-attachment-size clearfix mt-1">
                        <span>1,245 KB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                      </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> App Description.docx</a>
                      <span class="mailbox-attachment-size clearfix mt-1">
                        <span>1,245 KB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                      </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo1.png</a>
                      <span class="mailbox-attachment-size clearfix mt-1">
                        <span>2.67 MB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                      </span>
                    </div>
                  </li>
                  <li>
                    <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

                    <div class="mailbox-attachment-info">
                      <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> photo2.png</a>
                      <span class="mailbox-attachment-size clearfix mt-1">
                        <span>1.9 MB</span>
                        <a href="#" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                      </span>
                    </div>
                  </li>
                </ul>
              </div> -->
              <!-- /.card-footer -->
              <!-- <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                  <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                </div>
                <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
              </div> -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal Ubah unit -->
  <div class="modal fade" id="ubahUnitModal" tabindex="-1" role="dialog" aria-labelledby="ubahUnitModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <form action="<?= base_url('unit/updateUnit/'); ?>" method="post">
        <input type="hidden" name="id_unit" value="<?= $detailUnit['id_unit']; ?>">

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ubahUnitModalLabel"><i class="fas fa-industry"></i> <sup><i class="fas fa-fw fa-edit"></i></sup> Ubah Unit - <?= $detailUnit['nama_unit']; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg">
                <div class="text-center">
                  <a href="<?= base_url('assets/img/img_unit/') . $detailUnit['foto_unit']; ?>" id="check_enlarge_photo" class="enlarge">
                    <img style="width: 75%" src="<?= base_url('assets/img/img_unit/') . $detailUnit['foto_unit']; ?>" id="check_photo" alt="Photo">
                  </a>
                  <div><small>Click image to zoom</small></div>
                </div>

                <div class="custom-file my-3 mb-2">
                  <input type="file" class="custom-file-input" id="photo" name="foto_unit">
                  <label for="photo" class="custom-file-label">Pilih Foto</label>
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group">
                  <label for="nama_unit">Nama Unit</label>
                  <input required type="text" name="nama_unit" id="nama_unit" class="form-control" value="<?= $detailUnit['nama_unit']; ?>">
                  <?= form_error('nama_unit', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="manajer_unit">Manajer Unit</label>
                  <input required type="text" name="manajer_unit" id="manajer_unit" class="form-control" value="<?= $detailUnit['manajer_unit']; ?>">
                  <?= form_error('manajer_unit', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="row">
                  <div class="col-lg-6">

                    <div class="form-group">
                      <label for="luas_unit">Luas Unit</label>
                      <input required min="0" placeholder="0" type="number" name="luas_unit" id="luas_unit" class="form-control" value="<?= $detailUnit['luas_unit']; ?>">
                      <?= form_error('luas_unit', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="jumlah_pohon">Jumlah Pohon</label>
                      <input required min="0" placeholder="0" type="number" name="jumlah_pohon" id="jumlah_pohon" class="form-control" value="<?= $detailUnit['jumlah_pohon']; ?>">
                      <?= form_error('jumlah_pohon', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="telepon_unit">Telepon Unit</label>
                  <input required type="number" name="telepon_unit" id="telepon_unit" class="form-control" value="<?= $detailUnit['telepon_unit']; ?>">
                  <?= form_error('telepon_unit', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="alamat_unit">Alamat Unit</label>
                  <textarea required name="alamat_unit" id="alamat_unit" class="form-control"><?= $detailUnit['alamat_unit']; ?></textarea>
                  <?= form_error('alamat_unit', '<small class="form-text text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                  <label for="map">Map</label>
                  <textarea required name="map" id="map" class="form-control"><?= $detailUnit['map']; ?></textarea>
                  <?= form_error('map', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
            <button type="submit" name="btnUbahUnit" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>