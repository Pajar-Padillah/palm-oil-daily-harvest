<footer class="main-footer">

  <strong>Copyright &copy; <?= date('Y'); ?> Pajar Padillah</strong>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Sweet Alert 2 -->
<div class="flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
<div class="flashdata-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
<div class="flashdata-failed" data-flashdata="<?= $this->session->flashdata('message-failed'); ?>"></div>
<!-- ./Sweet Alert 2 -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= base_url('assets/vendor/jquery/jquery-3.4.1.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/jquery/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/select2/select2.min.js'); ?>"></script>

<!-- Config JavaScript -->
<script src="<?= base_url('assets/js/config-fancybox.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-sweetalert2.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-sidebar.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-select2.js'); ?>"></script>


<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- Datatable -->
<script src="<?= base_url('assets/vendor/datatables/datatables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/datatables/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-datatables.js'); ?>"></script>
<!-- Fancybox -->
<script src="<?= base_url('assets/vendor/fancybox/jquery.fancybox.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/config-fancybox.js'); ?>"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function() {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




<script type="text/javascript">
  $(document).ready(function() {
    $("#id_afdeling");

    loadAfdeling();

  });

  function loadAfdeling() {

    $("#id_unit").change(function() {
      var getUnit = $("#id_unit").val();

      $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "<?= base_url(); ?>/SelectUnit/getdataAfdeling",
        data: {
          unit: getUnit
        },
        success: function(data) {
          console.log(data);

          var html = "";
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value ="' + data[i].id_afdeling + '">' + data[i].nama_afdeling + '</option>';
          }

          $("#id_afdeling").
          html(html);
          $("#id_afdeling").
          show();


        }
      });


    });
  }
</script>
</body>

</html>