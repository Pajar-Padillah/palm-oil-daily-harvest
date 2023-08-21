  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1><i class="fas fa-file-alt"></i> Laporan</h1>
  				</div>
  				<!-- <div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="#">Home</a></li>
  						<li class="breadcrumb-item active">Ribbons</li>
  					</ol>
  				</div> -->
  			</div>
  		</div><!-- /.container-fluid -->
  	</section>

  	<?php if (validation_errors()): ?>
  		<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			<strong>Gagal!</strong> <?= validation_errors(); ?>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  				<span aria-hidden="true">&times;</span>
  			</button>
  		</div>
  	<?php endif ?>

  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid">
  			<div class="row">
  				<div class="col-12">
  					<div class="card card-primary">
  						<div class="card-header">
  							<h3 class="card-title">Laporan</h3>
  						</div>
  						<!-- /.card-header -->
  						<div class="card-body">
  							<!-- Form Cari Tanggal dan jumlah pelanggan -->
  							<div class="row my-2">
  								<div class="col-lg-12">
  									<div class="p-4 m-1 rounded text-white bg-secondary">
  										<h3>Filter Tanggal Panen</h3>
  										<?php if (isset($_POST['cari_tanggal'])): ?>
  											<?php 
  											$tanggal_awal_heading = date('d-m-Y', strtotime($tanggal_awal));
  											$tanggal_akhir_heading = date('d-m-Y', strtotime($tanggal_akhir));
  											?>
  											<h5>Dari Tanggal <?= $tanggal_awal_heading; ?> Sampai Tanggal <?= $tanggal_akhir_heading; ?></h5>
  										<?php else: ?>
  											<h5>Dari Tanggal <?= date('01-m-Y'); ?> Sampai Tanggal <?= date('d-m-Y'); ?></h5>
  										<?php endif ?>
  										<form action="<?= base_url('laporan'); ?>" method="post">
  											<div class="row">
  												<div class="col-lg my-1">
  													<div class="form-group">
  														<label for="tanggal_awal">Tanggal Awal</label>
  														<?php if (isset($_POST['cari_tanggal'])): ?>
  															<input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal" value="<?= $tanggal_awal; ?>">
  														<?php else: ?>
  															<input type="date" id="tanggal_awal" class="form-control" name="tanggal_awal" value="<?= date('Y-m-01'); ?>">
  														<?php endif ?>
  													</div>
  												</div>
  												<div class="col-lg my-1">
  													<div class="form-group">
  														<label for="tanggal_akhir">Tanggal Akhir</label>
  														<?php if (isset($_POST['cari_tanggal'])): ?>
  															<input type="date" id="tanggal_akhir" class="form-control" name="tanggal_akhir" value="<?= $tanggal_akhir; ?>">
  														<?php else: ?>
  															<input type="date" id="tanggal_akhir" class="form-control" name="tanggal_akhir" value="<?= date('Y-m-d'); ?>">
  														<?php endif ?>
  													</div>
  												</div>
  											</div>
  											<div class="row">
  												<div class="col-sm-6">
  												</div>
  												<div class="col-sm-6">
  													<ol class="float-sm-right">
  														<button type="submit" name="cari_tanggal" class="btn btn-success"><i class="fas fa-fw fa-filter"></i> Filter</button>
  														<a href="<?= base_url('laporan'); ?>" class="btn btn-warning"><i class="fas fa-fw fa-undo"></i> Reset</a>
  													</ol>
  												</div>
  											</div>
  										</form>
  									</div>
  								</div>
  							</div>
  							<!-- ./Form Cari Tanggal  -->
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
  	<?php if (isset($_POST['cari_tanggal'])): ?>
  		<section class="content">
  			<div class="container-fluid">
  				<div class="row">
  					<div class="col-12">
					<!-- <div class="callout callout-info">
						<h5><i class="fas fa-info"></i> Note:</h5>
						This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
					</div> -->


					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row --><br>
						<div class="row">
							<div class="col-12">
								<h4><center>
									<?php if (isset($_POST['cari_tanggal'])): ?>
										<?php 
										$tanggal_awal = date('d-m-Y', strtotime($tanggal_awal));
										$tanggal_akhir = date('d-m-Y', strtotime($tanggal_akhir));
										?>
										<h5><b>Laporan Dari Tanggal <?= $tanggal_awal; ?> Sampai Tanggal <?= $tanggal_akhir; ?></b></h5>
									<?php else: ?>
										<h5><b>Laporan Dari Tanggal <?= date('01-m-Y'); ?> Sampai Tanggal <?= date('d-m-Y'); ?></b></h5>
									<?php endif ?>
								</center></h4>
							</div>
							<!-- /.col -->
						</div><br><br>
						
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped table-bordered text-center" id="table_id_5l">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode Panen</th>
											<th>Tanggal Panen</th>
											<th>Tanggal Diangkut</th>
											<?php if ($this->session->userdata('jabatan') == 'Administrator'): ?>
												<th>Unit</th>
												<th>Afdeling</th>
											<?php endif ?>
											<th>Nama Supir</th>
											<th>No. Polisi</th>
											<th>Jumlah Tandan</th>
											<th>Berat Tandan (Kg)</th>
											<th>Rata-rata Kg/Tandan</th>
											<th>Brondolan (Kg)</th>
											<th>Tandan Mentah</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($panenLaporan as $dt): ?>
											<tr>
												<td><?= $i++; ?></td>
												<td>
													<?= $dt['kode_panen']; ?>
												</td>
												<td><?= $dt['tanggal_panen']; ?></td>
												<td><?= $dt['tanggal_diangkut']; ?></td>
												<?php if ($this->session->userdata('jabatan') == 'Administrator'): ?>
													<td><?= $dt['nama_unit']; ?></td>
													<td><?= $dt['nama_afdeling']; ?></td>
												<?php endif ?>
												<td><?= $dt['nama_supir']; ?></td>
												<td><?= $dt['plat']; ?></td>
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
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<div class="row">
						<!-- accepted payments column -->
						<div class="col-6">
								<!-- <p class="lead">Payment Methods:</p>
								<img src="<?= base_url(); ?>assets/dist/img/credit/visa.png" alt="Visa">
								<img src="<?= base_url(); ?>assets/dist/img/credit/mastercard.png" alt="Mastercard">
								<img src="<?= base_url(); ?>assets/dist/img/credit/american-express.png" alt="American Express">
								<img src="<?= base_url(); ?>assets/dist/img/credit/paypal2.png" alt="Paypal">

								<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
									Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
									plugg
									dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
								</p> -->
							</div>
							<!-- /.col -->
							<br>
							<?php if (isset($_POST['cari_tanggal'])): ?>
								<div class="col-6">
									<b><p class="lead"> Total Hasil Panen</p></b>
									<div class="table-responsive">
										<table class="table">
											
											<tr>
												<th>Jumlah Panen</th>
												<td><?php $angka = $jumlah_panen['jumlah_panen'];
												$angka_format = number_format($angka);
												if ($angka_format == null) {
													echo 0;
												}
												else {
													echo $angka_format;
												} ?></td>
											</tr>
											<tr>
												<th>Tandan:</th>
												<td><?php $angka = $jumlah_tandan['jumlah_tandan'];
												$angka_format = number_format($angka);
												if ($angka_format == null) {
													echo 0;
												}
												else {
													echo $angka_format;
												} ?> Buah</td>
											</tr>

											<tr>
												<th>Tandan</th>
												<td><?php $angka = $tandan_kg['tandan_kg'] / 1000;
												$angka_format = number_format($angka,2);
												if ($angka_format == null) {
													echo 0;
												}
												else {
													echo $angka_format;
												} ?> Ton</td>
											</tr>
											<tr>
												<th>Rata-rata Kg/Tandan</th>
												<td><?php $angka = $rata_tandan['rata_tandan'] / $jumlah_panen['jumlah_panen'];
												$angka_format = number_format($angka,2);
												if ($angka_format == null) {
													echo 0;
												}
												else {
													echo $angka_format;
												} ?> Kg</td>
											</tr>
											<tr>
												<th>Brondolan</th>
												<td><?php $angka = $brondolan['brondolan'];
												$angka_format = number_format($angka);
												if ($angka_format == null) {
													echo 0;
												}
												else {
													echo $angka_format;
												} ?> Kg</td>
											</tr>
											<tr>
												<th>Tandan Mentah</th>
												<td><?php $angka = $tandan_mentah['tandan_mentah'];
												$angka_format = number_format($angka);
												if ($angka_format == null) {
													echo 0;
												}
												else {
													echo $angka_format;
												} ?> Buah</td>
											</tr>
										</table>
									</div>
								</div>
							<?php endif ?>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<?php if (isset($_POST['cari_tanggal'])): ?>
									<?php if(!empty($panenLaporan)) { ?> 
										<a href="<?= base_url('prints/laporan/' . $tanggal_awal . '/' . $tanggal_akhir); ?>" rel="noopener" target="_blank" class="btn btn-default bg-primary"><i class="fas fa-print"></i> Print</a>
									<?php } ?>
									
								<?php endif ?>

								<!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
									Payment
								</button>

								<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
									<i class="fas fa-download"></i> Generate PDF
								</button> -->
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
<?php endif ?>

</div>
<!-- /.content-wrapper -->
