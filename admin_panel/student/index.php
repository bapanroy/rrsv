<!DOCTYPE html>
<html>

<?php
session_start();

// 🔒 Access Control: Only logged-in teachers can access
if (!isset($_SESSION['user_data']) || $_SESSION['role'] !== 'student') {
  header("Location: ../index.php?error=Unauthorized Access");
  exit;
}

$teacher = $_SESSION['user_data'];
?>
<?php include('../header.php'); ?>

<body class="hold-transition skin-blue sidebar-mini">


  <div class="wrapper">
    <!-- Header Start -->
    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>MSB</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="assets/css/download.png" style="height:100%;width:44px"></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <?php include '../top_navbar.php' ?>
    </header><!-- Header End -->
    <!-- Left side column. contains the logo and sidebar -->

    <!-- Sidebar Start -->
    <?php include '../left_navbar.php' ?>
    <!-- sidebar End -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Admin
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Admin Management</a></li>
          <li class="active">Exam</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- Note Start -->
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <div class="col-sm-3">
                  <div class="alert bg-green">
                    <h4> Student <i class="pull-right fa fa-users"></i> </h4>
                    <span class="d-block"> 500</span>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="alert bg-blue">
                    <h4>Teachers<i class="pull-right fa fa-graduation-cap"></i></h4>
                    <span class="d-block">10</span>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="alert bg-yellow">
                    <h4>Exam<i class="pull-right fa fa-key"></i></h4>
                    <span class="d-block"> 5</span>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="alert bg-red">
                    <h4>Department<i class="pull-right fa fa-building-o"></i></h4>
                    <span class="d-block"> <span class="live-clock">8</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Note End -->
          <!-- Send sms box start -->
          <div class="col-md-12">
            <div class="box box-primary">
              <!-- /.header-->
              <div class="box-header with-border">
                <h3 class="box-title">Admin</h3>

                <div style="text-align: right" ;>
                  <h4 class="btn btn-success btn-sm">
                    Registration </h4>
                </div>

              </div>
              <!-- /.header-->


              <div class="box-body">

                <!-- /box-body-->









                <div class="box-footer">

                  <!-- /.footer-->

                </div>
                <!-- /.box-footer -->

              </div>



              <!-- Send sms box end -->



              <div class="box-body" style="background-color:#E6E6FA">


              </div>

            </div>
            <!-- /.box -->
          </div>
          <!-- template message box end-->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Footer Start -->
    <?php include '../footer.php' ?>
    <div class="control-sidebar-bg"></div>
  </div>











  <!-- ./wrapper -->
  <!-- jQuery 2.2.3 -->
  <script src="../assets/js/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../assets/js/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../assets/js/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>




</body>

</html>