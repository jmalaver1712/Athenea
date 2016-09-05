 <!-- Bootstrap 3.3.2 JS 
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
-->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="../plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>

     <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {

        $(".select2").select2();

        $("#example1").dataTable();
        $("#example2").dataTable();
        $("#example3").dataTable();
        $("#example4").dataTable();
        $("#example5").dataTable();
        $("#example6").dataTable();
        $("#example7").dataTable();
        $("#example8").dataTable();
        $("#example9").dataTable();
      });


    </script>
    <?php 
    mysqli_close($conexion);
    ?>