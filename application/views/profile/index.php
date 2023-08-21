  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-12">
  					<h1><i class="fas fa-user"></i> Profil</h1><br>
  					<?php if (validation_errors()): ?>
  						<div class="alert alert-danger alert-dismissible fade show" role="alert">
  							<strong>Gagal!</strong> <?= validation_errors(); ?>
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  								<span aria-hidden="true">&times;</span>
  							</button>
  						</div>
  					<?php endif ?>
  				</div>
  				<!-- <div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="#">Home</a></li>
  						<li class="breadcrumb-item active">User Profile</li>
  					</ol>
  				</div> -->
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<form action="<?= base_url('profile/updateBiodata'); ?>" method="post" enctype="multipart/form-data">
  				<div class="row">
  					<div class="col-md-3">
  						<!-- Profile Image -->
  						<input type="hidden" name="id_user" value="<?= $dataUser['id_user']; ?>">
  						<div class="card card-primary card-outline">
  							<div class="card-body box-profile">
  								<div class="text-center">
  									<a href="<?= base_url('assets/img/img_profiles/') . $dataUser['foto']; ?>" id="check_enlarge_photo" class="enlarge">
  										<img class="profile-user-img img-fluid img-circle"
  										src="<?= base_url('assets/img/img_profiles/') . $dataUser['foto']; ?>" id="check_photo"
  										alt="Photo">
  									</a>
  								</div>
  								<div class="text-center"><i><small>Click image to zoom</small></i></div><br>


  								<h3 class="profile-username text-center"><?= $dataUser['username']; ?></h3>

  								<p class="text-muted text-center"><?= $dataUser['jabatan']; ?></p>
  								<div class="custom-file my-3 mb-2">
  									<input type="file" class="custom-file-input" id="photo" name="foto">
  									<label for="photo" class="custom-file-label">Pilih Foto</label>
  								</div>
  							</div>
  							<!-- /.card-body -->
  						</div>
  						<!-- /.card -->
  					</div>
  					<!-- /.col -->
  					<div class="col-md-9">
  						<div class="card card-primary card-outline">
  							<div class="card-header p-2">
  								<ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#biodata" data-toggle="tab"><i class="fas fa-fw fa-edit"></i> Biodata</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab"><i class="fas fa-fw fa-key"></i> Ubah Password</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                <div class="active tab-pane" id="biodata">
                                 <form class="form-horizontal">
                                    <div class="form-group row">
                                       <label for="inputName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                       <div class="col-sm-9">
                                          <input required type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $dataUser['nama_lengkap']; ?>">
                                          <?= form_error('nama_lengkap', '<small class="form-text text-danger">', '</small>'); ?>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                                    <div class="col-sm-4">
                                        <input required type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= $dataUser['tempat_lahir']; ?>">
                                        <?= form_error('tempat_lahir', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <input required type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $dataUser['tanggal_lahir']; ?>">
                                        <?= form_error('tanggal_lahir', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <?php if ($dataUser['jenis_kelamin'] == 'pria'): ?>
                                        <div class="col-sm-4">
                                            <input type="radio" checked name="jenis_kelamin" value="pria" id="pria"> <label for="pria">Pria</label>
                                        </div>

                                    <?php elseif ($dataUser['jenis_kelamin'] == 'wanita'): ?>
                                        <div class="col-sm-4">
                                            <input type="radio" name="jenis_kelamin" value="pria" id="pria"> <label for="pria">Pria</label>
                                        </div>

                                    <?php else: ?>
                                        <div class="col-sm-4">
                                            <input type="radio" name="jenis_kelamin" value="pria" id="pria"> <label for="pria">Pria</label>
                                        </div>

                                    <?php endif ?>
                                </div>
                                <div class="form-group row">
                                   <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                   <div class="col-sm-9">
                                      <input type="email" name="email" id="email" class="form-control"  value="<?= $dataUser['email']; ?>" placeholder="(Opsional)">
                                      <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                                  </div>
                              </div>
                              <div class="form-group row">
                               <label for="inputName2" class="col-sm-3 col-form-label">Telepon</label>
                               <div class="col-sm-9">
                                  <input required type="number" name="telepon" id="telepon" class="form-control"  value="<?= $dataUser['telepon']; ?>">
                                  <?= form_error('telepon', '<small class="form-text text-danger">', '</small>'); ?>
                              </div>
                          </div>
                          <div class="form-group row">
                           <label for="inputExperience" class="col-sm-3 col-form-label">Alamat</label>
                           <div class="col-sm-9">
                              <textarea required name="alamat" id="alamat" class="form-control"><?= $dataUser['alamat']; ?></textarea>
                              <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                          </div>
                      </div>
                      <div class="form-group row">
                         <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                  </div>
              </form>
          </div>
      </form>

      <div class="tab-pane" id="password">
         <form class="form-horizontal" action="<?= base_url('profile/changePassword'); ?>" method="post">
            <div class="form-group row">
                <label for="inputName" class="col-sm-3 col-form-label"> Password Lama<sup style="color: red;"> *</sup></label>
                <div class="col-sm-9">
                  <input required type="password" name="password_old" id="password_old" class="form-control">
                  <?= form_error('password_old', '<small class="form-text text-danger">', '</small>'); ?>
              </div>
          </div>
          <div class="form-group row">
           <label for="inputName" class="col-sm-3 col-form-label"> Password Baru<sup style="color: red;"> *</sup></label>
           <div class="col-sm-9">
              <input required type="password" name="password_new" id="password_new" class="form-control">
              <?= form_error('password_new', '<small class="form-text text-danger">', '</small>'); ?>
          </div>
      </div>
      <div class="form-group row">
       <label for="inputName" class="col-sm-3 col-form-label"> Password Verifikasi<sup style="color: red;"> *</sup></label>
       <div class="col-sm-9">
          <input required type="password" name="password_verify" id="password_verify" class="form-control">
          <?= form_error('password_verify', '<small class="form-text text-danger">', '</small>'); ?>
      </div>
  </div>
  <div class="form-group row">
    <div class="offset-sm-3 col-sm-9">
      <button type="submit" class="btn btn-danger">Submit</button>
  </div>
</div>
</form>
</div>




</div>
<!-- /.tab-content -->
</div><!-- /.card-body -->
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
