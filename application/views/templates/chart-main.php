
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: [
      <?php 
      for ($x=6; $x > 0; $x--) :
        $sett   = mktime(0,0,0,date("n"),date("j")-$x,date("Y"));
        $tgl  = date("d-M", $sett);
        ?>
        '<?= $tgl ?>',
      <?php endfor ?>
      'Hari Ini'
      ],
      datasets: [{
        label: ' Jumlah Panen dalam sehari',
        data: [
        <?php 
        for ($z=6; $z > 0; $z--) :
          $sett_awal = mktime(0,0,0,date("n"),date("j")-$z,date("Y"));
          $sett_akhir = mktime(23,59,59,date("n"),date("j")-$z,date("Y"));
          $tgl_awal  = date("Y-m-d H:i:s", $sett_awal);
          $tgl_akhir  = date("Y-m-d H:i:s", $sett_akhir);
          $id_unit = $this->session->userdata('id_unit');
          $id_afdeling = $this->session->userdata('id_afdeling');
          if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {
            $sqlChart = "SELECT COUNT(id_panen) AS jml_panen FROM panen WHERE panen.status_panen = 'selesai' AND tanggal_panen BETWEEN '$tgl_awal' AND '$tgl_akhir'";
          } elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {
            $sqlChart = "SELECT COUNT(id_panen) AS jml_panen FROM panen WHERE panen.status_panen = 'selesai' AND tanggal_panen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND panen.id_unit = '$id_unit'";
          }
          else {
            $sqlChart = "SELECT COUNT(id_panen) AS jml_panen FROM panen WHERE panen.status_panen = 'selesai' AND tanggal_panen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND panen.id_unit = '$id_unit' AND panen.id_afdeling = '$id_afdeling'";
          }
          $dateAssc     = $this->db->query($sqlChart)->row_array();
          ?>
          '<?= $dateAssc['jml_panen']; ?>',
          <?php
        endfor;
        $dateNowAwal  = date("Y-m-d 00:00:00");
        $dateNowAkhir  = date("Y-m-d 23:59:59");
        $id_unit = $this->session->userdata('id_unit');
        $id_afdeling = $this->session->userdata('id_afdeling');
        if ($this->session->userdata('jabatan') == 'Administrator' OR $this->session->userdata('jabatan') == 'Kepala Bagian Operasional') {
          $sqlChart2  = "SELECT COUNT(id_panen) AS jml_panen FROM panen WHERE panen.status_panen = 'selesai' AND tanggal_panen BETWEEN '$dateNowAwal' AND '$dateNowAkhir'";
        } elseif ($this->session->userdata('jabatan') == 'Manajer Unit') {
          $sqlChart2  = "SELECT COUNT(id_panen) AS jml_panen FROM panen WHERE panen.status_panen = 'selesai' AND tanggal_panen BETWEEN '$dateNowAwal' AND '$dateNowAkhir' AND panen.id_unit = '$id_unit'";
        }
        else {
          $sqlChart2  = "SELECT COUNT(id_panen) AS jml_panen FROM panen WHERE panen.status_panen = 'selesai' AND tanggal_panen BETWEEN '$dateNowAwal' AND '$dateNowAkhir' AND panen.id_unit = '$id_unit' AND panen.id_afdeling = '$id_afdeling'";
        }
        $dateAssc2     = $this->db->query($sqlChart2)->row_array();
        ?>
        '<?= $dateAssc2['jml_panen'] ?>',
        ],
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(0, 255, 0, 0.2)'
        ],
        borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(0, 255, 0, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
      }
    }
  });
</script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
      {
        label               : 'Digital Goods',
        backgroundColor     : 'rgba(60,141,188,0.9)',
        borderColor         : 'rgba(60,141,188,0.8)',
        pointRadius          : false,
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : [28, 48, 40, 19, 86, 27, 90]
      },
      {
        label               : 'Electronics',
        backgroundColor     : 'rgba(210, 214, 222, 1)',
        borderColor         : 'rgba(210, 214, 222, 1)',
        pointRadius         : false,
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [65, 59, 80, 81, 56, 55, 40]
      },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>