</div>
<!-- Mainly scripts -->
  <script src="<?=BACKEND_ASSESTS_JS;?>jquery-3.1.1.min.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>popper.min.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>bootstrap.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <!-- Flot -->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/flot/jquery.flot.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/flot/jquery.flot.spline.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/flot/jquery.flot.resize.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/flot/jquery.flot.pie.js"></script>

  <!-- Peity -->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/peity/jquery.peity.min.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>demo/peity-demo.js"></script>

  <!-- Custom and plugin javascript -->
  <script src="<?=BACKEND_ASSESTS_JS;?>inspinia.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/pace/pace.min.js"></script>

  <!-- jQuery UI -->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- GITTER -->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/gritter/jquery.gritter.min.js"></script>

  <!-- Sparkline -->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/sparkline/jquery.sparkline.min.js"></script>

  <!-- Sparkline demo data  -->
  <script src="<?=BACKEND_ASSESTS_JS;?>demo/sparkline-demo.js"></script>

  <!-- ChartJS-->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/chartJs/Chart.min.js"></script>

  <!-- Toastr -->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/toastr/toastr.min.js"></script>

  <!-- Datatables -->
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/dataTables/datatables.min.js"></script>
  <script src="<?=BACKEND_ASSESTS_JS;?>plugins/dataTables/dataTables.bootstrap4.min.js"></script>

  <!-- Page-Level Scripts -->
  <script>
    $(document).ready(function(){
      $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
          { extend: 'copy'},
          {extend: 'csv'},
          {extend: 'excel', title: 'ExampleFile'},
          {extend: 'pdf', title: 'ExampleFile'},
          {
            extend: 'print',
            customize: function (win){
              $(win.document.body).addClass('white-bg');
              $(win.document.body).css('font-size', '10px');

              $(win.document.body).find('table')
              .addClass('compact')
              .css('font-size', 'inherit');
            }
          }
        ]
      });
    });
  </script>  
</body>
</html>
