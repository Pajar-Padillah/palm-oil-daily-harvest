
<style>
	body {
		font-family: monospace, sans-serif;
	}
	ul {
		list-style: none;
		padding: 0;
		overflow-x: hidden;
	}
	.outer {
		width: 100%;  
	}
	.inner {
		padding-left: 20px;
	}

	li span:first-child {
		padding-right: 0.33em;
		background: #FAFAFA;
	}
	span + span {
		float: right;
		padding-left: 0.33em;
		background: #FAFAFA;
	}
	@media print {
		.hilang-diprint {
			display: none;
		}
	}
</style>
<div class="container-fluid py-2">
	<br>
	<div class="row">
		<div class="col-2 text-left">
			<img width="100%" class="rounded" src="<?= base_url(); ?>assets/login/img/holding.png" alt="logo">
		</div>
		<div class="col-2"></div>
		<div class="col-2"></div>
		<div class="col-2"></div>
		<div class="col-2"></div>
		<div class="col-2">
			<img width="100%" class="rounded" src="<?= base_url(); ?>assets/login/img/ptpnicon.jpg" alt="logo">
		</div>
	</div>
	<div class="row">
		<div class="col-lg">
			<center><h1  style="font-style: serif;"><b> PT. PERKEBUNAN NUSANTARA VII<br></b></h1>
				<h6  style="font-style: serif;"> Kantor Direksi : Jalan Teuku Umar No.300 Bandar Lampung, Lampung, Indonesia - 35141<br>
					Telp. 0721-702233 | Email. sekretariat@ptpn7.com | Website. ptpn7.com<br></h6>
					<div class="mx-n5 my-2" style="border: 1px black solid"></div>				</center>
				</div>
			</div>
			<br>
			<?php if ($this->session->userdata('jabatan') == 'Manajer Unit' OR $this->session->userdata('jabatan') == 'Asisten Afdeling' OR $this->session->userdata('jabatan') == 'Kerani Panen'): ?>
			<div class="row">
				<div class="col-12">
					<table border="0">
						<tr>
							<th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Nama Unit</h6></th>
							<td class="px-2"> : </td>
							<td><?= $panen['nama_unit']; ?></td>
						</tr>
						<?php if ($this->session->userdata('jabatan') == 'Asisten Afdeling' OR $this->session->userdata('jabatan') == 'Kerani Panen'): ?>
						<tr>
							<th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Nama Afdeling</h6></th>
							<td class="px-2"> : </td>
							<td><?= $panen['nama_afdeling']; ?></td>
						</tr>
					<?php endif ?>
					<tr>
						<th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Alamat Unit</h6></th>
						<td class="px-2"> : </td>
						<td><?= $panen['alamat_unit']; ?></td>
					</tr>
					<tr>
						<th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Telepon Unit</h6></th>
						<td class="px-2"> : </td>
						<td><?= $panen['telepon_unit']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	<?php endif ?>
	<div class="row">
		<div class="col-lg">
			<center><h4 class="my-4"> Laporan Panen Dari Tanggal <?= $this->uri->segment(3, 0); ?> Sampai <?= $this->uri->segment(4, 0); ?></h4></center>
			<table class="table table-striped table-bordered text-center">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Panen</th>
						<th>Tanggal Panen</th>
						<th>Tanggal Diangkut</th>
						<?php if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>
						<th>Unit</th>
						<th>Afdeling</th>
					<?php endif ?>
					<?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
						
						<th>Afdeling</th>
					<?php endif ?>
					<th>Nama Supir</th>
					<th>No. Polisi</th>
					<th>Jumlah Tandan</th>
					<th>Berat Tandan (Ton)</th>
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
						<?php if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>

						<td><?= $dt['nama_unit']; ?></td>
						<td><?= $dt['nama_afdeling']; ?></td>
					<?php endif ?>
					<?php if ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
						
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

			<tbody>
				<tr>
					<?php if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>

					<td colspan="8"><b>Jumlah</b></td>

				<?php else: ?>
					<td colspan="7"><b>Jumlah</b></td>
				<?php endif ?>
				<td><b><?php $angka = $jumlah_tandan['jumlah_tandan'];
				$angka_format = number_format($angka);
				if ($angka_format == null) {
					echo 0;
				}
				else {
					echo $angka_format;
				} ?></b></td>
				<td><b><?php $angka = $tandan_kg['tandan_kg'] / 1000;
				$angka_format = number_format($angka,2);
				if ($angka_format == null) {
					echo 0;
				}
				else {
					echo $angka_format;
				} ?></b></td>
				<td><b><?php $angka = $rata_tandan['rata_tandan'] / $jumlah_panen['jumlah_panen'];
				$angka_format = number_format($angka,2);
				if ($angka_format == null) {
					echo 0;
				}
				else {
					echo $angka_format;
				} ?></b></td>
				<td><b><?php $angka = $brondolan['brondolan'];
				$angka_format = number_format($angka);
				if ($angka_format == null) {
					echo 0;
				}
				else {
					echo $angka_format;
				} ?></b></td>
				<td><b><?php $angka = $tandan_mentah['tandan_mentah'];
				$angka_format = number_format($angka);
				if ($angka_format == null) {
					echo 0;
				}
				else {
					echo $angka_format;
				} ?></b></td>
			</tr>

		</tbody>
	</tbody>
</table>
</div>
</div>


<br><br>
<?php if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional'): ?>

<div class="row">
	<div class="col"><!-- <h5 class="ml-1 font-weight-bold">Asisten Afdeling</h5> --></div>
	<div class="col-3"><h5 class="ml-1 font-weight-bold"><center>Kepala Bagian Operasional Kelapa Sawit</center></h5></div>
</div>
<div class="row mt-5 pt-5">
	<div class="col font-weight-bold"><!-- <br>........................... --></div>
	<div class="col-3 font-weight-bold text-right"><br><center>Daniel Solikhin, S.P.</center></div>
</div>

<?php elseif ($this->session->userdata('jabatan') == 'Manajer Unit'): ?>
	<div class="row">
		<div class="col"><!-- <h5 class="ml-1 font-weight-bold">Asisten Afdeling</h5> --></div>
		<div class="col-3 text-right"><h5 class="ml-1 font-weight-bold"><center>Manajer Unit</center></h5></div>
	</div>
	<div class="row mt-5 pt-5">
		<div class="col font-weight-bold"><!-- <br>........................... --></div>
		<div class="col-3 font-weight-bold text-right"><br><center><?= $panen['Manajer_unit']; ?></center></div>
	</div>
<?php else: ?>
	<div class="row">
		<div class="col"><!-- <h5 class="ml-1 font-weight-bold">Asisten Afdeling</h5> --></div>
		<div class="col-3"><h5 class="ml-1 font-weight-bold"><center>Asisten Afdeling</center></h5></div>
	</div>
	<div class="row mt-5 pt-5">
		<div class="col font-weight-bold"><!-- <br>........................... --></div>
		<div class="col-3 font-weight-bold text-right"><br>...........................</div>
	</div>
<?php endif ?>
	<!-- <div class="row my-2">
		<div class="p-4 m-1 rounded text-white bg-info">
			<h3>Penghasilan (Rp.) <?= number_format($penghasilan['penghasilan']); ?></h3>
		</div>
	</div> -->
</div>
