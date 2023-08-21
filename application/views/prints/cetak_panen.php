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
  li:not(.nested):before {
    float: left;
    width: 0;
    white-space: nowrap;
    content:"..........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................";
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

<div class="container border border-dark my-2 p-4 px-5 mt-4">
  <div class="mt-4" style="border: 1px black dashed"></div>
  <div class="row justify-content-center mt-3 mb-2">
    <div class="col-2 text-left">
      <img width="100%" class="rounded" src="<?= base_url(); ?>assets/login/img/ptpnicon.jpg" alt="logo">
    </div>
    <div class="col text-center">
      <h4><br>KODE PANEN. <?= $panen['kode_panen']; ?></h4>
    </div>
  </div>
  <div style="border: 1px black dashed"></div>
  <div class="row my-4">
    <div class="col-6">
      <table border="0">
        <tr>
          <th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Nama Unit</h6></th>
          <td class="px-2">       : </td>
          <td><?= $panen['nama_unit']; ?></td>
        </tr>
        <tr>
          <th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Nama Afdeling</h6></th>
          <td class="px-2">       : </td>
          <td><?= $panen['nama_afdeling']; ?></td>
        </tr>
        <tr>
          <th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Alamat Unit</h6></th>
          <td class="px-2">       : </td>
          <td><?= $panen['alamat_unit']; ?></td>
        </tr>
        <tr>
          <th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Telepon Unit</h6></th>
          <td class="px-2">       : </td>
          <td><?= $panen['telepon_unit']; ?></td>
        </tr>
        <tr>
          <th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Tanggal Diangkut</th>
            <td class="px-2">       : </td>
            <td><?= $panen['tanggal_diangkut'];?></td>
          </tr>
          <tr>
            <th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Nama Supir</th>
              <td class="px-2">       : </td>
              <td><?= $panen['nama_supir']; ?></td>
            </tr>
            <tr>
              <th style="min-width: 135px !important"><h6 class="text-dark py-0 my-0 font-weight-bold">Nomor Plat</th>
                <td class="px-2">       : </td>
                <td><?= $panen['plat']; ?></td>
              </tr>
            </table>
          </div>
          <div class="col">
            <table border="0">
              <tr>
                <td style="min-width: 135px !important" class="font-weight-bold">Tanggal Cetak Panen</td>
                <td class="px-2"> : </td>
                <td><?= date('d-m-Y, H:i:s'); ?></td>
              </tr>
              <tr>
                <td style="min-width: 135px !important" class="font-weight-bold">Tanggal Panen</td>
                <td class="px-2"> : </td>
                <td><?= date('d-m-Y, H:i:s', strtotime($panen['tanggal_panen'])); ?></td>
              </tr>
              <tr>
                <td style="min-width: 135px !important" class="font-weight-bold">Status Panen</td>
                <td class="px-2"> : </td>
                <td>
                  <?php if ($panen['status_panen'] == 'accafdeling'): ?>
                    <span class="text-white btn-print btn btn-sm btn-danger"><?= ucwords(strtolower($panen['status_panen'])); ?></span>
                  <?php elseif ($panen['status_panen'] == 'accunit'): ?>
                    <span class="text-white btn-print btn btn-sm btn-warning"><?= ucwords(strtolower($panen['status_panen'])); ?></span>
                  <?php elseif ($panen['status_panen'] == 'accops'): ?>
                    <span class="text-white btn-print btn btn-sm btn-primary"><?= ucwords(strtolower($panen['status_panen'])); ?></span>
                  <?php elseif ($panen['status_panen'] == 'selesai'): ?>
                    <span class="text-white btn-print btn btn-sm btn-success"><?= ucwords(strtolower($panen['status_panen'])); ?></span>
                  <?php else: ?>
                    <span class="text-white btn-print btn btn-sm btn-info"><?= ucwords(strtolower($panen['status_panen'])); ?></span>
                  <?php endif ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div style="border: 1px black dashed"></div>
        <div class="row justify-content-center mt-2 mb-1">
          <div class="col text-center">
            <h4>Detail Panen</h4>
          </div>
        </div>
        <div style="border: 1px black dashed"></div>
        <div class="row">
          <div class="col-lg">
            <table class="table table-striped table-bordered border border-dark mt-3 mb-1">
              <thead>
                <tr class="text-center">

                  <th colspan="2">Keterangan</th>
                  <th>Hasil Panen</th>


                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <tr class="text-center">


                </tr>
                <tr>
                  <td colspan="2">
                    Jumlah Tandan
                  </td>
                  <td class="text-right">
                    <?=$panen['jumlah_tandan']; ?>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                   Tandan (Kg)
                 </td>
                 <td class="text-right">
                  <?=$panen['tandan_kg']; ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Rata-rata Kg/Tandan
                </td>
                <td class="text-right">
                  <?=$panen['rata_tandan']; ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Brondolan
                </td>
                <td class="text-right">
                  <?=$panen['brondolan']; ?>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  Tandan Mentah
                </td>
                <td class="text-right font-weight-bold text-red">
                  <?=$panen['tandan_mentah']; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="mx-n5 my-2" style="border: 1px black solid"></div>
      <br>
      <div class="row">
        <div class="col"><h5 class="ml-1 font-weight-bold">Asisten Afdeling</h5></div>
        <div class="col-3 text-right"><h5 class="ml-1 font-weight-bold"><center>Manajer Unit</center></h5></div>
      </div>
      <div class="row mt-5 pt-5">
        <div class="col font-weight-bold"><br>...........................</div>

        <div class="col-3 font-weight-bold text-right"><br><?= $panen['manajer_unit']; ?></div>
        <!-- <div class="col-3 font-weight-bold text-right"><br>...........................</div> -->
      </div>

<!-- <div class="mt-5" style="border: 1px black dashed"></div>
<p class="text-center mt-4 text-dark">Terima kasih sudah mempercayakan cucian Anda kepada Kami.</p>
</div> -->
