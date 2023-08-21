  <!-- Content Wrapper. Contains page content -->
  <!--   <div class="content-wrapper"> -->
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1>Isi Biodata - <?= $userBiodata['username']; ?></h1>
  					
  				</div>
  				<div class="col-sm-6">

  				</div>
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<form action="<?= base_url('user/createBiodata/') . $userBiodata['id_user']; ?>" method="post" enctype="multipart/form-data">
  				<div class="row">
  					<div class="col-md-3">
  						<!-- Profile Image -->
  						<input type="hidden" name="id_user" value="<?= $userBiodata['id_user']; ?>">
  						<div class="card card-primary card-outline">
  							<div class="card-body box-profile">
  								<div class="text-center">
  									<a href="<?= base_url('assets/img/img_profiles/default.png'); ?>" id="check_enlarge_photo" class="enlarge">
  										<img class="profile-user-img img-fluid img-circle"
  										src="<?= base_url('assets/img/img_profiles/default.png'); ?>" id="check_photo"
  										alt="Photo">
  									</a>
  								</div>
  								<div class="text-center"><i><small>Click image to zoom</small></i></div><br>

  								<h3 class="profile-username text-center"><?= $userBiodata['username']; ?></h3>
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
  						<div class="card card-primary">
  							<div class="card-header p-2">
  								<h3 class="card-title">Biodata</h3>
  							</div><!-- /.card-header -->
  							<div class="card-body">
  								<div class="tab-content">
  									<form class="form-horizontal">
  										<div class="form-group row">
  											<label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
  											<div class="col-sm-10">
  												<input  placeholder="nama lengkap" required type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= set_value('nama_lengkap'); ?>">
  												<?= form_error('nama_lengkap', '<small class="form-text text-danger">', '</small>'); ?>
  											</div>
  										</div>
  										<div class="form-group row">
  											<label for="inputEmail" class="col-sm-2 col-form-label">Tempat Lahir</label>
  											<div class="col-sm-10">
  												<input  placeholder="tempat lahir" required type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir'); ?>">
  												<?= form_error('tempat_lahir', '<small class="form-text text-danger">', '</small>'); ?>
  											</div>
  										</div>
  										<div class="form-group row">
  											<label for="inputEmail" class="col-sm-2 col-form-label">Tanggal Lahir</label>
  											<div class="col-sm-10">
  												<input required type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir'); ?>">
  												<?= form_error('tanggal_lahir', '<small class="form-text text-danger">', '</small>'); ?>
  											</div>
  										</div>

  										<div class="form-group row">
  											<label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
  											<div class="col-sm-5">
  												<input type="radio" name="jenis_kelamin" value="Laki-laki" id="Laki-laki"> <label for="Laki-laki">Laki-laki</label>
  											</div>
  											<div class="col-sm-5">
  												<input type="radio" name="jenis_kelamin" value="Perempuan" id="Perempuan"> <label for="Perempuan">Perempuan</label>
  											</div>
  										</div>

  										<div class="form-group row">
  											<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
  											<div class="col-sm-10">
  												<input type="email" name="email" id="email" class="form-control"  value="<?= set_value('email'); ?>" placeholder="e-mail">
  												<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
  											</div>
  										</div>
  										<div class="form-group row">
  											<label for="inputName2" class="col-sm-2 col-form-label">Telepon</label>
  											<div class="col-sm-10">
  												<input  placeholder="telepon" required type="number" name="telepon" id="telepon" class="form-control"  value="<?= set_value('telepon'); ?>">
  												<?= form_error('telepon', '<small class="form-text text-danger">', '</small>'); ?>
  											</div>
  										</div>
  										<div class="form-group row">
  											<label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
  											<div class="col-sm-10">
  												<textarea  placeholder="alamat" required name="alamat" id="alamat" class="form-control"><?= set_value('alamat'); ?></textarea>
  												<?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
  											</div>
  										</div>
                      <!-- <div class="form-group row">
                         <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                           <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>
              </div> -->
              <div class="form-group row">
               <div class="offset-sm-2 col-sm-10">
                <button type="submit" name="btnTambahBiodata" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</form>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->

