<?php
$id = $this->session->userdata('id_user');
$this->db->join('biodata', 'biodata.id_user = user.id_user');
$cek_biodata = $this->db->get_where('user', ['user.id_user' => $id])->row_array();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'include-css.php'; ?>
  <title><?= $title; ?></title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <?php if ($cek_biodata !== NULL) : ?>

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
                  <!-- <small>Member since Nov. 2012</small> -->
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

              <?php if ($this->session->userdata('jabatan') == 'Administrator' or $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') : ?>
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
              <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen') : ?>
                <li class="nav-header">Data Panen dan Laporan</li>
              <?php else : ?>
                <li class="nav-header">Data Panen</li>
              <?php endif ?>
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
                <a href="<?= base_url('riwayat_panen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'riwayat_panen') {
                                                                              echo 'active';
                                                                            } ?>">
                  <i class="nav-icon fa-solid fa-history"></i>
                  <p>
                    Riwayat Panen
                  </p>
                </a>
              </li>
              <?php if ($this->session->userdata('jabatan') !== 'Kerani Panen') : ?>
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