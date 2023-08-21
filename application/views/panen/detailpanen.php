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
    <a href="<?= base_url('panen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'panen' || $this->uri->uri_string() == 'panen/createPanen' || $this->uri->uri_string() == 'panen/index' || $this->uri->uri_string() == 'panen/index/' . 'accafdeling' || $this->uri->uri_string() == 'panen/index/' . 'accunit' || $this->uri->uri_string() == 'panen/index/' . 'accops' || $this->uri->uri_string() == 'panen/index/' . 'selesai' || $this->uri->uri_string() == 'panen/detailpanen/' . $detail_header_panen['id_panen']) {
      echo 'active';
    } ?>">
    <i class="nav-icon fa-solid fa-clipboard"></i>
    <p>
      Panen Hari ini
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('riwayat_panen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'riwayat_panen' || $this->uri->uri_string() == 'riwayat_panen/detailpanen/' . $detail_header_panen['id_panen']) {
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
        Apakah anda ingin keluar dari aplikasi?
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
        <h1><i class="fas fa-fw fa-align-justify"></i> <sup><i class="fa-solid fa-tractor"></i></sup> Detail Panen</h1>
      </div>
      <!-- <div class="col-sm-6">
       <ol class="breadcrumb float-sm-right">
         <?php if ($this->session->userdata('jabatan') !== 'Asisten Afdeling'): ?>
          <?php if ($detail_header_panen['status_panen'] == 'accunit'): ?>
            <small class="btn btn-info">Jika status panen sudah acc afdeling, tidak dapat diubah!</small>
          <?php else: ?>
            <a href="" data-toggle="modal" data-target="#ubahDetailPanenModal" class="btn btn-primary"><i class="fas fa-fw fa-align-justify"></i> <sup><i class="fas fa-1x fa-handshake"></i></sup> <sup><i class="fas fa-fw fa-edit"></i></sup> Ubah Detail Panen</a>
          <?php endif ?>
        <?php endif ?>
      </ol>
    </div> -->
  </div>
</div><!-- /.container-fluid -->
</section>
<div class="row my-2">
  <div class="col-lg">
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
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

       <!-- Default box -->
       <div class="card">

        <div class="card-body">

          <div class="row my-2 justify-content-center text-center">
            <div class="col-sm-4">
              <span class="badge badge-danger"><i class="fas fa-fw fa-check-circle"></i> Approve Afdeling</span>
            </div>
            <div class="col-sm-4">
              <span class="text-white badge badge-warning"><i class="fas fa-fw fa-check-circle"></i> Approve Unit</span>
            </div>
            <div class="col-sm-4">
              <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> Selesai</span>
            </div>
          </div>  
          <div class="row my-2 mb-3">
            <div class="col-sm">
              <?php if ($detail_header_panen['status_panen'] == 'accafdeling' OR $detail_header_panen['status_panen'] == 'ditolak' && $detail_header_panen['penolak'] == 'Asisten Afdeling'): ?>
                <div class="progress">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 16%" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              <?php elseif ($detail_header_panen['status_panen'] == 'accunit' OR $detail_header_panen['status_panen'] == 'ditolak' && $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              <?php endif ?>
            </div>
          </div>

          <br>    

          <?php if ($detail_header_panen['status_panen'] == 'ditolak' && $detail_header_panen['penolak'] == 'Asisten Afdeling' && $this->session->userdata('jabatan') == 'Kerani Panen'): ?>            
            <table class="table">
              <tr>
                <td class="font-weight-bold">Kode Panen</td>
                <td class="px-2"> : </td>
                <td><?= $detail_header_panen['kode_panen']; ?></td>
              </tr>

              <tr>
                <td class="font-weight-bold">Tanggal Panen</td>
                <td class="px-2"> : </td>
                <td><?= date('d-m-Y, H:i:s', strtotime($detail_header_panen['tanggal_panen'])); ?></td>
              </tr>

              <tr>
                <td class="font-weight-bold">Status Panen</td>
                <td class="px-2"> : </td>
                <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
                  <td>
                    <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>

                      <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                        <span class="badge badge-danger"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                      <?php else: ?>
                        <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                      <?php endif ?>

                    <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Asisten Afdeling'): ?>
                      <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>

                    <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                      <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                        <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Manajer Unit</span>
                      <?php else: ?>
                        <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                      <?php endif ?>

                      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                    <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                      <?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
                        <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                      <?php else: ?>
                        <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                      <?php endif ?>

                    <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                      <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>

                      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                    <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                      <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                    <?php else: ?>
                      <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                    <?php endif ?>
                  </td>
                <?php else: ?>
                  <td>
                    <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>
                      <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                    <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                      <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                    <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                      <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                    <?php elseif ($detail_header_panen['status_panen'] == 'ditolak'): ?>
                      <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Asisten Afdeling</span>
                    <?php else: ?>
                      <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                    <?php endif ?>
                  </td>
                <?php endif ?>
              </tr>
              <tr>
                <td class="font-weight-bold">Keterangan Ditolak</td>
                <td class="px-2"> : </td>
                <td><?= $detail_header_panen['keterangan']; ?></td>
              </tr>

            </table>
            <hr class="mt-0 pt-0 mb-2 pb-2">
            <div class="table-responsive">
              <table class="table table-striped table-bordered border border-dark mt-3 mb-1">
                <thead>
                  <tr class="text-center">

                    <th>Nama Unit</th>
                    <th>Nama Afdeling</th>
                    <th>Hasil Panen</th>

                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <tr class="text-center">

                    <td><?= $detail_header_panen['nama_unit']; ?></td>
                    <td><?= $detail_header_panen['nama_afdeling']; ?></td>

                    <td class="text-right"></td>
                  </tr>
                  <form action="<?= base_url('panen/updatePanen/') . $detail_header_panen['id_panen']; ?>" method="post">
                    <tr>
                      <td colspan="2">
                        Jumlah Tandan
                      </td>
                      <td class="text-right">
                        <input type="number" class="form-control" style="width: 100px" name="jumlah_tandan" value="<?php echo $detail_header_panen['jumlah_tandan']; ?>">
                        Buah
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                       Jumlah Berat Tandan
                     </td>
                     <td class="text-right">
                      <input type="number" class="form-control" style="width: 100px" style="width: 10px" name="tandan_kg" value="<?php echo $detail_header_panen['tandan_kg']; ?>">
                  <!-- 
                  <?php $angka = $detail_header_panen['tandan_kg'];
                  $angka_format = number_format($angka,2);
                  if ($angka_format == null) {
                    echo 0;
                  }
                  else {
                    echo $angka_format;
                  } ?> -->   Ton
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Rata-rata Kg/Tandan
                </td>
                <td class="text-right">
                  <input type="number" class="form-control" style="width: 100px" name="rata_tandan" value="<?php echo $detail_header_panen['rata_tandan']; ?>">

                  <!-- <?php $angka = $detail_header_panen['rata_tandan'];
                  $angka_format = number_format($angka,2);
                  if ($angka_format == null) {
                    echo 0;
                  }
                  else {
                    echo $angka_format;
                  } ?> --> Kg
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Brondolan
                </td>
                <td class="text-right">
                  <input type="number" class="form-control" style="width: 100px" name="brondolan" value="<?php echo $detail_header_panen['brondolan']; ?>">

                 <!--  <?php $angka = $detail_header_panen['brondolan'];
                  $angka_format = number_format($angka);
                  if ($angka_format == null) {
                    echo 0;
                  }
                  else {
                    echo $angka_format;
                  } ?> --> Kg

                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Tandan Mentah
                </td>
                <td class="text-right font-weight-bold text-red">
                  <input type="number" class="form-control" style="width: 100px" name="tandan_mentah" value="<?php echo $detail_header_panen['tandan_mentah']; ?>">
                 <!--  <?php $angka = $detail_header_panen['tandan_mentah'];
                  $angka_format = number_format($angka);
                  if ($angka_format == null) {
                    echo 0;
                  }
                  else {
                    echo $angka_format;
                  } ?> --> Buah
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-10"></div> 
          <div class="col-sm-2">
            <button type="submit" name="btnUbahPanen" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Update</button>
          </form>
        </div>
      </div>

    <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' && $detail_header_panen['penolak'] == 'Manajer Unit' && $this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>            
      <div class="row my-4">
        <div class="col-sm-6">
          <table class="table">
            <tr>
              <td class="font-weight-bold">Kode Panen</td>
              <td> : </td>
              <td><?= $detail_header_panen['kode_panen']; ?></td>
            </tr>

            <tr>
              <td class="font-weight-bold">Tanggal Panen</td>
              <td> : </td>
              <td><?= date('d-m-Y, H:i:s', strtotime($detail_header_panen['tanggal_panen'])); ?></td>
            </tr>

            <tr>
              <td class="font-weight-bold">Status Panen</td>
              <td> : </td>
              <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
                <td>
                  <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>

                    <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                      <span class="badge badge-danger"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                    <?php else: ?>
                      <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                    <?php endif ?>

                  <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Asisten Afdeling'): ?>
                    <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>

                  <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                    <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                      <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Manajer Unit</span>
                    <?php else: ?>
                      <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                    <?php endif ?>

                    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                  <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                    <?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
                      <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                    <?php else: ?>
                      <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                    <?php endif ?>

                  <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                    <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>

                    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                  <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                    <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                  <?php else: ?>
                    <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                  <?php endif ?>
                </td>
              <?php endif ?>
            </tr>
            <tr>
              <td class="font-weight-bold">Keterangan Ditolak</td>
              <td> : </td>
              <td><?= $detail_header_panen['keterangan']; ?></td>
            </tr>
          </table>
        </div>
        <div class="col-sm-6">
          <table class="table">
            <tr>
              <form action="<?= base_url('panen/ubahPanenUnit/') . $detail_header_panen['id_panen']; ?>" method="post">
                <td class="font-weight-bold">Tanggal Diangkut</td>
                <td> : </td>
                <td><?php 
                $tanggal_diangkut = $detail_header_panen['tanggal_diangkut'];
                $tanggal_diangkut_timestamp = strtotime($tanggal_diangkut);
                ?>
                <input required type="datetime-local" name="tanggal_diangkut" id="tanggal_diangkut" class="form-control" value="<?= date('Y-m-d', $tanggal_diangkut_timestamp) . 'T' . date('H:i', $tanggal_diangkut_timestamp); ?>"></td>
              </tr>
              <tr>
                <td class="font-weight-bold">Nama Supir</td>
                <td> : </td>
                <td><input type="text" required class="form-control" name="tanggal_diangkut" placeholder="Enter ..." value="<?= $detail_header_panen['nama_supir']; ?>"></td>
              </tr>
              <tr>
                <td class="font-weight-bold">Nomor Plat</td>
                <td> : </td>
                <td><input type="text" required class="form-control" name="tanggal_diangkut" placeholder="Enter ..." value="<?= $detail_header_panen['plat']; ?>"></td>
              </tr>
            </table>
          </div>
        </div>


        <hr class="mt-0 pt-0 mb-2 pb-2">
        <div class="table-responsive">
          <table class="table table-striped table-bordered border border-dark mt-3 mb-1">
            <thead>
              <tr class="text-center">

                <th>Nama Unit</th>
                <th>Nama Afdeling</th>
                <th>Hasil Panen</th>

              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <tr class="text-center">

                <td><?= $detail_header_panen['nama_unit']; ?></td>
                <td><?= $detail_header_panen['nama_afdeling']; ?></td>

                <td class="text-right"></td>
              </tr>
              <tr>
                <td colspan="2">
                  Jumlah Tandan
                </td>
                <td class="text-right">
                  <?php $angka = $detail_header_panen['jumlah_tandan'];
                  $angka_format = number_format($angka);
                  if ($angka_format == null) {
                    echo 0;
                  }
                  else {
                    echo $angka_format;
                  } ?> Buah
                </td>
              </tr>
              <tr>
                <td colspan="2">
                 Tandan (Kg)
               </td>
               <td class="text-right">
                <?php $angka = $detail_header_panen['tandan_kg'];
                $angka_format = number_format($angka,2);
                if ($angka_format == null) {
                  echo 0;
                }
                else {
                  echo $angka_format;
                } ?> Kg
              </td>
            </tr>
            <tr>
              <td colspan="2">
                Rata-rata Kg/Tandan
              </td>
              <td class="text-right">
                <?php $angka = $detail_header_panen['rata_tandan'];
                $angka_format = number_format($angka,2);
                if ($angka_format == null) {
                  echo 0;
                }
                else {
                  echo $angka_format;
                } ?> Kg
              </td>
            </tr>
            <tr>
              <td colspan="2">
                Brondolan
              </td>
              <td class="text-right">
                <?php $angka = $detail_header_panen['brondolan'];
                $angka_format = number_format($angka);
                if ($angka_format == null) {
                  echo 0;
                }
                else {
                  echo $angka_format;
                } ?> Kg

              </td>
            </tr>
            <tr>
              <td colspan="2">
                Tandan Mentah
              </td>
              <td class="text-right font-weight-bold text-red">
                <?php $angka = $detail_header_panen['tandan_mentah'];
                $angka_format = number_format($angka);
                if ($angka_format == null) {
                  echo 0;
                }
                else {
                  echo $angka_format;
                } ?> Buah
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-10"></div> 
        <div class="col-sm-2">
          <button type="submit" class="btn btn-block btn-success"><i class="fas fa-fw fa-check-circle"></i> Update</button>
        </form>
      </div>
    </div>


  <?php elseif ($detail_header_panen['status_panen'] == 'accafdeling' && $this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>            
    <div class="row my-4">
      <div class="col-sm-6">
        <table class="table">
          <tr>
            <td class="font-weight-bold">Kode Panen</td>
            <td> : </td>
            <td><?= $detail_header_panen['kode_panen']; ?></td>
          </tr>

          <tr>
            <td class="font-weight-bold">Tanggal Panen</td>
            <td> : </td>
            <td><?= date('d-m-Y, H:i:s', strtotime($detail_header_panen['tanggal_panen'])); ?></td>
          </tr>

          <tr>
            <td class="font-weight-bold">Status Panen</td>
            <td> : </td>
            <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
              <td>
                <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>

                  <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                    <span class="badge badge-danger"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                  <?php else: ?>
                    <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                  <?php endif ?>

                <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Asisten Afdeling'): ?>
                  <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>

                <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                  <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                    <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Manajer Unit</span>
                  <?php else: ?>
                    <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                  <?php endif ?>

                  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                  <?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
                    <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                  <?php else: ?>
                    <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                  <?php endif ?>

                <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                  <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>

                  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                  <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                <?php else: ?>
                  <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                <?php endif ?>
              </td>
            <?php endif ?>
          </tr>
        </table>
      </div>
      <div class="col-sm-6">
        <table class="table">
          <tr>
            <form action="<?= base_url('panen/ubahPanenUnit/') . $detail_header_panen['id_panen']; ?>" method="post">
              <td class="font-weight-bold">Tanggal Diangkut</td>
              <td> : </td>
              <td><?php 
              $tanggal_diangkut = $detail_header_panen['tanggal_diangkut'];
              $tanggal_diangkut_timestamp = strtotime($tanggal_diangkut);
              ?>
              <input required type="datetime-local" name="tanggal_diangkut" id="tanggal_diangkut" class="form-control" value="<?= date('Y-m-d', $tanggal_diangkut_timestamp) . 'T' . date('H:i', $tanggal_diangkut_timestamp); ?>"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Nama Supir</td>
              <td> : </td>
              <td><input type="text" required class="form-control" name="nama_supir" placeholder="Enter ..." value="<?= $detail_header_panen['nama_supir']; ?>"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Nomor Plat</td>
              <td> : </td>
              <td><input type="text" required class="form-control" name="plat" placeholder="Enter ..." value="<?= $detail_header_panen['plat']; ?>"></td>
            </tr>
          </table>
        </div>
      </div>


      <hr class="mt-0 pt-0 mb-2 pb-2">
      <div class="table-responsive">
        <table class="table table-striped table-bordered border border-dark mt-3 mb-1">
          <thead>
            <tr class="text-center">

              <th>Nama Unit</th>
              <th>Nama Afdeling</th>
              <th>Hasil Panen</th>

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <tr class="text-center">

              <td><?= $detail_header_panen['nama_unit']; ?></td>
              <td><?= $detail_header_panen['nama_afdeling']; ?></td>

              <td class="text-right"></td>
            </tr>
            <tr>
              <td colspan="2">
                Jumlah Tandan
              </td>
              <td class="text-right">
                <?php $angka = $detail_header_panen['jumlah_tandan'];
                $angka_format = number_format($angka);
                if ($angka_format == null) {
                  echo 0;
                }
                else {
                  echo $angka_format;
                } ?> Buah
              </td>
            </tr>
            <tr>
              <td colspan="2">
               Tandan (Kg)
             </td>
             <td class="text-right">
              <?php $angka = $detail_header_panen['tandan_kg'];
              $angka_format = number_format($angka,2);
              if ($angka_format == null) {
                echo 0;
              }
              else {
                echo $angka_format;
              } ?> Kg
            </td>
          </tr>
          <tr>
            <td colspan="2">
              Rata-rata Kg/Tandan
            </td>
            <td class="text-right">
              <?php $angka = $detail_header_panen['rata_tandan'];
              $angka_format = number_format($angka,2);
              if ($angka_format == null) {
                echo 0;
              }
              else {
                echo $angka_format;
              } ?> Kg
            </td>
          </tr>
          <tr>
            <td colspan="2">
              Brondolan
            </td>
            <td class="text-right">
              <?php $angka = $detail_header_panen['brondolan'];
              $angka_format = number_format($angka);
              if ($angka_format == null) {
                echo 0;
              }
              else {
                echo $angka_format;
              } ?> Kg

            </td>
          </tr>
          <tr>
            <td colspan="2">
              Tandan Mentah
            </td>
            <td class="text-right font-weight-bold text-red">
              <?php $angka = $detail_header_panen['tandan_mentah'];
              $angka_format = number_format($angka);
              if ($angka_format == null) {
                echo 0;
              }
              else {
                echo $angka_format;
              } ?> Buah
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <table class="table-borderless">
      <tr>
        <td colspan="6">
          <form action="<?= base_url('panen/tolakPanen/') . $detail_header_panen['id_panen']; ?>" method="post">
            <input type="hidden" name="status_panen" value="<?php echo $detail_header_panen['status_panen'] ?>">
            <input type="hidden" name="penolak" value="<?php echo $this->session->userdata('jabatan'); ?>">
            <p><sup style="color: red;">*</sup> Keterangan tolak:</p>
            <textarea required name="keterangan" id=""  cols="30" rows="5"></textarea><br>
          </td>
        </tr>
        <tr>
          <td>
            <button type="submit" class="btn btn-block btn-danger"><i class="fas fa-fw fa-check-circle"></i> Tolak</button>
          </form>
        </td>
        <td>
         <button type="submit" class="btn btn-block btn-success"><i class="fas fa-fw fa-check-circle"></i> Approve</button>
       </td>
     </tr>
   </table>
 </div>


<?php elseif ($detail_header_panen['status_panen'] == 'accafdeling' && $this->session->userdata('jabatan') == 'Kerani Panen'): ?>            
  <div class="row my-4">
    <div class="col-sm-12">
      <table class="table">
        <tr>
          <td class="font-weight-bold">Kode Panen</td>
          <td class="px-2"> : </td>
          <td><?= $detail_header_panen['kode_panen']; ?></td>
        </tr>

        <tr>
          <td class="font-weight-bold">Tanggal Panen</td>
          <td class="px-2"> : </td>
          <td><?= date('d-m-Y, H:i:s', strtotime($detail_header_panen['tanggal_panen'])); ?></td>
        </tr>

        <tr>
          <td class="font-weight-bold">Status Panen</td>
          <td class="px-2"> : </td>
          <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
            <td>
              <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>

                <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                  <span class="badge badge-danger"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                <?php else: ?>
                  <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                <?php endif ?>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Asisten Afdeling'): ?>
                <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                  <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Manajer Unit</span>
                <?php else: ?>
                  <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                <?php endif ?>

                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

              <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                <?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
                  <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                <?php else: ?>
                  <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                <?php endif ?>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>

                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

              <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
              <?php else: ?>
                <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
              <?php endif ?>
            </td>
          <?php else: ?>
            <td>
              <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>
                <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
              <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
              <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak'): ?>
                <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Asisten Afdeling</span>
              <?php else: ?>
                <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
              <?php endif ?>
            </td>
          <?php endif ?>
        </tr>
      </table>
    </div>


    <hr class="mt-0 pt-0 mb-2 pb-2">
    <div class="table-responsive">
      <table class="table table-striped table-bordered border border-dark mt-3 mb-1">
        <thead>
          <tr class="text-center">

            <th>Nama Unit</th>
            <th>Nama Afdeling</th>
            <th>Hasil Panen</th>

          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <tr class="text-center">

            <td><?= $detail_header_panen['nama_unit']; ?></td>
            <td><?= $detail_header_panen['nama_afdeling']; ?></td>

            <td class="text-right"></td>
          </tr>
          <tr>
            <td colspan="2">
              Jumlah Tandan
            </td>
            <td class="text-right">
              <?php $angka = $detail_header_panen['jumlah_tandan'];
              $angka_format = number_format($angka);
              if ($angka_format == null) {
                echo 0;
              }
              else {
                echo $angka_format;
              } ?> Buah
            </td>
          </tr>
          <tr>
            <td colspan="2">
             Tandan (Kg)
           </td>
           <td class="text-right">
            <?php $angka = $detail_header_panen['tandan_kg'];
            $angka_format = number_format($angka,2);
            if ($angka_format == null) {
              echo 0;
            }
            else {
              echo $angka_format;
            } ?> Kg
          </td>
        </tr>
        <tr>
          <td colspan="2">
            Rata-rata Kg/Tandan
          </td>
          <td class="text-right">
            <?php $angka = $detail_header_panen['rata_tandan'];
            $angka_format = number_format($angka,2);
            if ($angka_format == null) {
              echo 0;
            }
            else {
              echo $angka_format;
            } ?> Kg
          </td>
        </tr>
        <tr>
          <td colspan="2">
            Brondolan
          </td>
          <td class="text-right">
            <?php $angka = $detail_header_panen['brondolan'];
            $angka_format = number_format($angka);
            if ($angka_format == null) {
              echo 0;
            }
            else {
              echo $angka_format;
            } ?> Kg

          </td>
        </tr>
        <tr>
          <td colspan="2">
            Tandan Mentah
          </td>
          <td class="text-right font-weight-bold text-red">
            <?php $angka = $detail_header_panen['tandan_mentah'];
            $angka_format = number_format($angka);
            if ($angka_format == null) {
              echo 0;
            }
            else {
              echo $angka_format;
            } ?> Buah
          </td>
        </tr>
      </tbody>
    </table>
  </div>




<?php elseif ($detail_header_panen['status_panen'] == 'accunit' AND $this->session->userdata('jabatan') == 'Manajer Unit'): ?>            
  <div class="row my-4">
    <div class="col-sm-6">
      <table class="table">
        <tr>
          <td class="font-weight-bold">Kode Panen</td>
          <td> : </td>
          <td><?= $detail_header_panen['kode_panen']; ?></td>
        </tr>

        <tr>
          <td class="font-weight-bold">Tanggal Panen</td>
          <td> : </td>
          <td><?= date('d-m-Y, H:i:s', strtotime($detail_header_panen['tanggal_panen'])); ?></td>
        </tr>

        <tr>
          <td class="font-weight-bold">Status Panen</td>
          <td> : </td>
          <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
            <td>
              <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>

                <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                  <span class="badge badge-danger"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                <?php else: ?>
                  <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                <?php endif ?>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Asisten Afdeling'): ?>
                <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                  <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Manajer Unit</span>
                <?php else: ?>
                  <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                <?php endif ?>

                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

              <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                <?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
                  <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                <?php else: ?>
                  <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                <?php endif ?>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>

                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

              <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
              <?php else: ?>
                <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
              <?php endif ?>
            </td>
          <?php endif ?>
        </tr>
      </table>
    </div>
    <div class="col-sm-6">
      <table class="table">
        <tr>
          <td class="font-weight-bold">Tanggal Diangkut</td>
          <td> : </td>
          <td><?= date('d-m-Y, H:i:s', strtotime($detail_header_panen['tanggal_diangkut'])); ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold">Nama Supir</td>
          <td> : </td>
          <td><?= $detail_header_panen['nama_supir']; ?></td>
        </tr>
        <tr>
          <td class="font-weight-bold">Nomor Plat</td>
          <td> : </td>
          <td><?= $detail_header_panen['plat']; ?></td>
        </tr>
      </table>
    </div>
  </div>


  <hr class="mt-0 pt-0 mb-2 pb-2">
  <div class="table">
    <table class="table table-striped table-bordered border border-dark mt-3 mb-1">
      <thead>
        <tr class="text-center">

          <th>Nama Unit</th>
          <th>Nama Afdeling</th>
          <th>Hasil Panen</th>

        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <tr class="text-center">

          <td><?= $detail_header_panen['nama_unit']; ?></td>
          <td><?= $detail_header_panen['nama_afdeling']; ?></td>

          <td class="text-right"></td>
        </tr>
        <tr>
          <td colspan="2">
            Jumlah Tandan
          </td>
          <td class="text-right">
            <?php $angka = $detail_header_panen['jumlah_tandan'];
            $angka_format = number_format($angka);
            if ($angka_format == null) {
              echo 0;
            }
            else {
              echo $angka_format;
            } ?> Buah
          </td>
        </tr>
        <tr>
          <td colspan="2">
           Tandan (Kg)
         </td>
         <td class="text-right">
          <?php $angka = $detail_header_panen['tandan_kg'];
          $angka_format = number_format($angka,2);
          if ($angka_format == null) {
            echo 0;
          }
          else {
            echo $angka_format;
          } ?> Kg
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Rata-rata Kg/Tandan
        </td>
        <td class="text-right">
          <?php $angka = $detail_header_panen['rata_tandan'];
          $angka_format = number_format($angka,2);
          if ($angka_format == null) {
            echo 0;
          }
          else {
            echo $angka_format;
          } ?> Kg
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Brondolan
        </td>
        <td class="text-right">
          <?php $angka = $detail_header_panen['brondolan'];
          $angka_format = number_format($angka);
          if ($angka_format == null) {
            echo 0;
          }
          else {
            echo $angka_format;
          } ?> Kg

        </td>
      </tr>
      <tr>
        <td colspan="2">
          Tandan Mentah
        </td>
        <td class="text-right font-weight-bold text-red">
          <?php $angka = $detail_header_panen['tandan_mentah'];
          $angka_format = number_format($angka);
          if ($angka_format == null) {
            echo 0;
          }
          else {
            echo $angka_format;
          } ?> Buah
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table-borderless">
    <tr>
      <td colspan="6">
        <form action="<?= base_url('panen/tolakPanen/') . $detail_header_panen['id_panen']; ?>" method="post">
          <input type="hidden" name="status_panen" value="<?php echo $detail_header_panen['status_panen'] ?>">
          <input type="hidden" name="penolak" value="<?php echo $this->session->userdata('jabatan'); ?>">
          <p><sup style="color: red;">*</sup> Keterangan tolak:</p>
          <textarea required name="keterangan" class="form-control" id=""  cols="30" rows="5"></textarea><br>
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" style="width: 100px;" class="btn btn-block btn-danger"><i class="fas fa-fw fa-check-circle"></i> Tolak</button>
        </form>
      </td>
      <td>
        <a href="<?= base_url('panen/ubahStatusPanen/') . $detail_header_panen['id_panen']; ?>" class="text-white badge btn-status" data-status1="accunit" data-status2="selesai"><button class="btn btn-block btn-success"><i class="fas fa-fw fa-check-circle"></i> Approve</button></a>
      </td>
    </tr>
  </table>
</div>


<?php else: ?>
  <div class="row my-4">
    <div class="col-sm-6">
      <table class="table">
        <tr>
          <td class="font-weight-bold">Kode Panen</td>
          <td class="px-2"> : </td>
          <td><?= $detail_header_panen['kode_panen']; ?></td>
        </tr>

        <tr>
          <td class="font-weight-bold">Tanggal Panen</td>
          <td class="px-2"> : </td>
          <td><?= date('d-m-Y, H:i:s', strtotime($detail_header_panen['tanggal_panen'])); ?></td>
        </tr>

        <tr>
          <td class="font-weight-bold">Status Panen</td>
          <td class="px-2"> : </td>
          <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen'): ?>
            <td>
              <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>

                <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                  <span class="badge badge-danger"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                <?php else: ?>
                  <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                <?php endif ?>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Asisten Afdeling'): ?>
                <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling'): ?>
                  <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Manajer Unit</span>
                <?php else: ?>
                  <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                <?php endif ?>

                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

              <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                <?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
                  <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                <?php else: ?>
                  <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
                <?php endif ?>

              <?php elseif ($detail_header_panen['status_panen'] == 'ditolak' AND $detail_header_panen['penolak'] == 'Manajer Unit'): ?>
                <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>

                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                <!-- <?php elseif ($detail_header_panen['status_panen'] == 'accops'): ?>

                  <?php if ($this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>
                    <span class="badge badge-primary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve</span>
                  <?php else: ?>
                    <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Kepala Bagian Operasional</span>
                    <?php endif ?> -->

                  <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
                    <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                  <?php else: ?>
                    <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
                  <?php endif ?>
                </td>
              <?php else: ?>
                <td>
                 <?php if ($detail_header_panen['status_panen'] == 'accafdeling'): ?>
                  <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Asisten Afdeling</span>
                <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
                  <span class="text-white badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Manajer Unit</span>
             <!--  <?php elseif ($detail_header_panen['status_panen'] == 'accops'): ?>
             <span class="badge badge-secondary"><i class="fas fa-fw fa-clock"></i> Menunggu Approve Kepala Bagian Operasional</span> -->
           <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
            <span class="badge badge-success"><i class="fas fa-fw fa-check-circle"></i> <?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
          <?php elseif ($detail_header_panen['status_panen'] == 'ditolak'): ?>
            <span class="badge badge-danger"><i class="fa-solid fa-circle-exclamation"></i> Ditolak Asisten Afdeling</span>
          <?php else: ?>
            <span class="badge badge-info"><?= ucwords(strtolower($detail_header_panen['status_panen'])); ?></span>
          <?php endif ?>
        </td>
      <?php endif ?>
    </tr>
  </table>
</div>

<div class="col-sm-6">
  <table class="table">
    <tr>
      <td class="font-weight-bold">Tanggal Diangkut</td>
      <td> : </td>
      <td><?= $detail_header_panen['tanggal_diangkut'];?></td>
    </tr>
    <tr>
      <td class="font-weight-bold">Nama Supir</td>
      <td> : </td>
      <td><?= $detail_header_panen['nama_supir']; ?></td>
    </tr>
    <tr>
      <td class="font-weight-bold">Nomor Plat</td>
      <td> : </td>
      <td><?= $detail_header_panen['plat']; ?></td>
    </tr>
  </table>
</div>
</div>

<hr class="mt-0 pt-0 mb-2 pb-2">
<div class="table-responsive">
  <table class="table table-striped table-bordered border border-dark mt-3 mb-1">
    <thead>
      <tr class="text-center">

        <th>Nama Unit</th>
        <th>Nama Afdeling</th>
        <th>Hasil Panen</th>

      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <tr class="text-center">

        <td><?= $detail_header_panen['nama_unit']; ?></td>
        <td><?= $detail_header_panen['nama_afdeling']; ?></td>

        <td class="text-right"></td>
      </tr>
      <tr>
        <td colspan="2">
          Jumlah Tandan
        </td>
        <td class="text-right">
          <?php $angka = $detail_header_panen['jumlah_tandan'];
          $angka_format = number_format($angka);
          if ($angka_format == null) {
            echo 0;
          }
          else {
            echo $angka_format;
          } ?> Buah
        </td>
      </tr>
      <tr>
        <td colspan="2">
         Tandan (Kg)
       </td>
       <td class="text-right">
        <?php $angka = $detail_header_panen['tandan_kg'];
        $angka_format = number_format($angka,2);
        if ($angka_format == null) {
          echo 0;
        }
        else {
          echo $angka_format;
        } ?> Kg
      </td>
    </tr>
    <tr>
      <td colspan="2">
        Rata-rata Kg/Tandan
      </td>
      <td class="text-right">
        <?php $angka = $detail_header_panen['rata_tandan'];
        $angka_format = number_format($angka,2);
        if ($angka_format == null) {
          echo 0;
        }
        else {
          echo $angka_format;
        } ?> Kg
      </td>
    </tr>
    <tr>
      <td colspan="2">
        Brondolan
      </td>
      <td class="text-right">
        <?php $angka = $detail_header_panen['brondolan'];
        $angka_format = number_format($angka);
        if ($angka_format == null) {
          echo 0;
        }
        else {
          echo $angka_format;
        } ?> Kg

      </td>
    </tr>
    <tr>
      <td colspan="2">
        Tandan Mentah
      </td>
      <td class="text-right font-weight-bold text-red">
        <?php $angka = $detail_header_panen['tandan_mentah'];
        $angka_format = number_format($angka);
        if ($angka_format == null) {
          echo 0;
        }
        else {
          echo $angka_format;
        } ?> Buah
      </td>
    </tr>
  </tbody>
</table>
</div>
<?php endif ?>
<br>
<div class="row">
  <div class="col-sm-3">

    <?php if ($detail_header_panen['status_panen'] == 'accafdeling' OR $detail_header_panen['status_panen'] == 'accunit'): ?>
      <?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling' OR $this->session->userdata('jabatan') == 'Manajer Unit'): ?>
      <div class="col-sm-9 text-right">
        <!-- <a href="<?= base_url('panen/ubahStatusPanen/') . $detail_header_panen['id_panen']; ?>" class="badge btn-status" data-status1="accafdeling" data-status2="accunit"><button class="btn btn-block btn-success"><i class="fas fa-fw fa-check-circle"></i> Approve</button></a> -->
      <?php endif ?>
    <?php elseif ($detail_header_panen['status_panen'] == 'accunit'): ?>
      <?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>


      <?php endif ?>
    <?php elseif ($detail_header_panen['status_panen'] == 'selesai'): ?>
      <a href="<?= base_url('prints/cetakPanen/') . $detail_header_panen['id_panen']; ?>" target="_blank" class="m-1 badge"><button class="btn btn-block btn-primary"><i class="fas fa-fw fa-print"></i> Cetak</button></a>

    <?php endif ?>

  </div>
</div>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal Ubah DetailPanen -->
<!-- <div class="text-left modal fade" id="ubahDetailPanenModal<?= $detail_header_panen['id_panen']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahDetailPanenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="<?= base_url('detailPanen/updateDetailPanen/') . $detail_header_panen['id_panen']; ?>" method="post">
      <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="ubahDetailPanenModalLabel"><i class="fas fa-fw fa-align-justify"></i> <sup><i class="fas fa-1x fa-handshake"></i></sup> <sup><i class="fas fa-fw fa-plus"></i></sup> Ubah Detail Panen - <?= $detail_header_panen['kode_panen']; ?></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="form-group">
          <label for="id_panen<?= $detail_header_panen['kode_panen']; ?>">Kode Panen</label>
          <input style="cursor: not-allowed;" class="form-control" id="id_panen<?= $detail_header_panen['kode_panen']; ?>" disabled type="text" value="<?= $detail_header_panen['kode_panen']; ?>">
          <input type="hidden" name="id_panen" value="<?= $detail_header_panen['id_panen']; ?>">
        </div>
        <div class="form-group bg-success text-white p-3 rounded">
          <?php foreach ($paket as $dp): $s=false; ?>
           <div class="my-3">
            <input type="hidden" name="id_paket[]" value="<?= $dp['id_paket']; ?>">
            <h6 class="font-weight-bold"><?= ucwords($dp['nama_jenis_paket']); ?> | <?= $dp['nama_paket']; ?> | Rp. <?= number_format($dp['harga_paket']); ?></h6>
            <?php foreach ($detail_panen_paket as $ddtp): ?>
             <?php if ($dp['id_paket'] == $ddtp['id_paket']): $s=true;?>
              <input type="hidden" name="id_detail_panen[]" value="<?= $ddtp['id_detail_panen']; ?>">
              <label for="kuantitas<?= $detail_header_panen['id_panen']; ?>">Kuantitas</label>
              <input type="number" style="width: 100px" class="form-control my-1" name="kuantitas[]" placeholder="kuantitas" value="<?= $ddtp['kuantitas']; ?>">
              <label for="keterangan<?= $detail_header_panen['id_panen']; ?>">Keterangan</label>
              <textarea name="keterangan[]" id="keterangan" class="form-control my-1" placeholder="Keterangan <?= $dp['nama_paket']; ?>"><?= $ddtp['keterangan']; ?></textarea>
            <?php endif ?>
          <?php endforeach ?>
          <?php if ($s == false): ?>
           <input type="hidden" name="id_detail_panen[]">
           <label for="kuantitas<?= $detail_header_panen['id_panen']; ?>">Kuantitas</label>
           <input type="number" id="kuantitas<?= $detail_header_panen['id_panen']; ?>" class="form-control my-1" name="kuantitas[]" placeholder="kuantitas">

           <label for="keterangan<?= $detail_header_panen['id_panen']; ?>">Keterangan</label>
           <textarea name="keterangan[]" id="keterangan<?= $detail_header_panen['id_panen']; ?>" class="form-control my-1" placeholder="Keterangan <?= $dp['nama_paket']; ?>"></textarea>
         <?php endif ?>
       </div>
     <?php endforeach ?>
     <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
      <button type="submit" name="btnUbahDetailPanen" class="btn btn-primary"><i class="fas fa-fw fa-paper-plane"></i> Kirim</button>
    </div>
  </div>
</form>
</div>
</div>
-->
