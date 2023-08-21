<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<!-- col -->
				<div class="col-sm-12">
					<h1 class="m-0"><i class="fas fa-home"></i> Dashboard</h1>
				</div>
				<!-- /.col -->
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Gagal!</strong> <?= validation_errors(); ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif ?>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="callout callout-info">
						<h2><b>Selamat Datang! </b><span style="color: #000080;"><?= ucwords(strtolower($dataUser['nama_lengkap'])); ?> (<?= $dataUser['jabatan']; ?>)</span></h2>
						<h5><i class="fas fa-info"></i> Info:</h5>
						Aplikasi Laporan Hasil Panen Harian TBS Kelapa Sawit ini terintegrasi secara online dengan aplikasi berbasis web dan aplikasi terintegrasi dengan satu database sehingga dapat meningkatkan efisiensi operasional. Selain itu aplikasi dibangun guna memberikan kemudahan dalam pengambilan keputusan, serta meningkatkan pengelolaan dan pencatatan data tersimpan dengan baik, akurat dan lebih cepat dalam proses pencariannya serta meminimalisir pengeluaran biaya yang dikeluarkan.
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- /.content -->
	<!-- Main content -->

	<section class="content">
		<div class="row">
			<div class="col-lg-8">
				<div class="card card-outline card-warning">
					<div class="card-header">
						<h3 class="card-title"><i class="fa-solid fa-filter"></i> Filter</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?= base_url('dashboard'); ?>">
							<div class="row my-2">
								<div class="col-lg-12">
									<div class="p-4 m-1 rounded text-white bg-secondary">
										<?php if (isset($_POST['cari_tanggal'])) : ?>
											<?php
											$tanggal_awal_heading = date('d-m-Y', strtotime($tanggal_awal));
											$tanggal_akhir_heading = date('d-m-Y', strtotime($tanggal_akhir));
											?>
											<h5>Dari Tanggal <?= $tanggal_awal_heading; ?> Sampai Tanggal <?= $tanggal_akhir_heading; ?></h5>
										<?php else : ?>
											<h5>Dari Tanggal <?= date('01-m-Y'); ?> Sampai Tanggal <?= date('d-m-Y'); ?></h5>
										<?php endif ?>

										<div class="row">
											<div class="col-lg my-1">
												<div class="form-group">
													<label>Dari tanggal : </label>
													<?php if (isset($_POST['cari_tanggal'])) : ?>
														<input type="date" name="tanggal_awal" class="form-control" value="<?= $tanggal_awal; ?>">
													<?php else : ?>
														<input type="date" name="tanggal_awal" class="form-control" value="<?= date('Y-m-01'); ?>">
													<?php endif ?>
												</div>
											</div>
											<div class="col-lg my-1">
												<div class="form-group ">
													<label>Sampai tanggal : </label>
													<?php if (isset($_POST['cari_tanggal'])) : ?>
														<input type="date" name="tanggal_akhir" class="form-control" value="<?= $tanggal_akhir; ?>">
													<?php else : ?>
														<input type="date" name="tanggal_akhir" class="form-control" value="<?= date('Y-m-d'); ?>">
													<?php endif ?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm">
												<button class="btn btn-success mx-1" name="cari_tanggal" type="submit"><i class="fas fa-fw fa-filter"></i> Filter</button>
												<a class="btn btn-warning mx-1" href="<?= base_url('dashboard'); ?>"><i class="fas fa-fw fa-redo"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->
			</div>
			<div class="col-lg-4">
				<!-- PIE CHART -->
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">Panen 1 Pekan</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button><!-- 
							<button type="button" class="btn btn-tool" data-card-widget="remove">
								<i class="fas fa-times"></i>
							</button> -->
						</div>
					</div>
					<div class="card-body">
						<canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>

	<!-- /.content -->

	<!-- Form Cari Tanggal dan jumlah pelanggan -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php $angka = isset($jumlah_panen['jumlah_panen']);
								$angka_format = number_format($angka);
								if ($angka_format == null) {
									echo 0;
								} else {
									echo $angka_format;
								} ?></h3>
							<p>Jumlah Panen</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php $angka = isset($jumlah_tandan['jumlah_tandan']);
								$angka_format = number_format($angka);
								if ($angka_format == null) {
									echo 0;
								} else {
									echo $angka_format;
								} ?> <sup style="font-size: 20px">Buah</sup></h3>

							<p>Jumlah Tandan</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php $angka = $tandan_kg['tandan_kg'] / 1000;
								$angka_format = number_format($angka, 2);
								if ($angka_format == null) {
									echo 0;
								} else {
									echo $angka_format;
								} ?> <sup style="font-size: 20px">Ton</sup>
							</h3>

							<p>Berat Tandan</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-orange">
						<div class="inner">
							<h3>
								<?php $angka = 29;
								$angka_format = number_format($angka, 2);
								if ($angka_format == null) {
									echo 0;
								} else {
									echo $angka_format;
								} ?> <sup style="font-size: 20px">Kg</sup>
							</h3>

							<p>Rata-rata Kg/Tandan</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-secondary">
						<div class="inner">
							<h3><?php $angka = empty($brondolan['brondolan']);
								$angka_format = number_format($angka);
								if ($angka_format == null) {
									echo 0;
								} else {
									echo $angka_format;
								} ?> <sup style="font-size: 20px">Kg</sup></h3>

							<p>Brondolan</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-4 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?php $angka = empty($tandan_mentah['tandan_mentah']);
								$angka_format = number_format($angka);
								if ($angka_format == null) {
									echo 0;
								} else {
									echo $angka_format;
								} ?> <sup style="font-size: 20px">Buah</sup></h3>

							<p>Tandan Mentah</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Main row -->

			<div class="row">
				<div class="col-12">

					<div class="card card-outline card-info">
						<div class="card-header">
							<?php if (isset($_POST['cari_tanggal'])) : ?>
								<h4><i class="fas fa-fw fa-handshake"></i> Daftar Terakhir Panen <?= $tanggal_awal_heading; ?> s/d <?= $tanggal_akhir_heading; ?></h4>
							<?php else : ?>
								<h4><i class="fa-solid fa-tractor"></i> Daftar Terakhir Panen</h4>
							<?php endif ?>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered text-center" id="table_id_5l">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Panen</th>
											<th>Tanggal Panen</th>
											<?php if ($this->session->userdata('jabatan') == 'Administrator') : ?>
												<th>Unit</th>
												<th>Afdeling</th>
											<?php endif ?>
											<th>Jumlah Tandan</th>
											<th>Berat Tandan (Kg)</th>
											<th>Rata-rata Kg/Tandan</th>
											<th>Brondolan (Kg)</th>
											<th>Tandan Mentah</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($panenLaporan as $dt) : ?>
											<tr>
												<td><?= $i++; ?></td>
												<td>
													<?= $dt['kode_panen']; ?>
												</td>
												<td><?= $dt['tanggal_panen']; ?></td>
												<?php if ($this->session->userdata('jabatan') == 'Administrator') : ?>
													<td><?= $dt['nama_unit']; ?></td>
													<td><?= $dt['nama_afdeling']; ?></td>
												<?php endif ?>
												<td><?= $dt['jumlah_tandan']; ?></td>
												<td><?= $dt['tandan_kg']; ?></td>
												<td><?= $dt['rata_tandan']; ?></td>
												<td><?= $dt['brondolan']; ?></td>
												<td><?= $dt['tandan_mentah']; ?></td>

											</tr>

										<?php endforeach ?>
									</tbody>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /.card-body -->
					</div>


					<!-- /.col -->
				</div>
				<!-- /.row -->

	</section>
	<!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->