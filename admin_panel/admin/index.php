
<!DOCTYPE html>
<html>
    
     <?php
    session_start();
    
    // 🔒 Access Control: Only logged-in teachers can access
    if (!isset($_SESSION['user_data']) || $_SESSION['role'] !== 'teacher') {
        header("Location: ../index.php?error=Unauthorized Access");
        exit;
    }
    
    $teacher = $_SESSION['user_data'];
?>
 <?php include('../header.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">

    
    
    
    
    
    
    
<div class="modal" id="formModal">
  <div class="modal-dialog">
  	<form action="update.php?q=std" method="post" id="student_form">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modal_title">Add Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Student Name <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="name" id="student_name" class="form-control" />
                <span id="error_student_name" class="text-danger"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Roll No. <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="rollno" id="student_roll_number" class="form-control" />
                <span id="error_student_roll_number" class="text-danger"></span>
              </div>
            </div>
          </div>
         

          <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">Branch<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <select id="branch" name="branch" placeholder="Select your branch" class="form-control input-md" >
                   <option value="">Select Branch</option>
                  <option value="COPA">COPA</option>
                  <option value="Electrician" >Electrician</option>
                  <option value="Fitter">Fitter</option>
                  <option value="Surveyor">Surveyor</option>
                  <option value="Wireman">Wireman</option>
                  <option value="Welder">Welder</option> 
                  <option value="Diploma">Diploma</option> 
                  <option value="B.TECH">B.TECH</option> 
                  <option value="IMSC">IMSC</option> </select>
              <span id="error_student_grade_id" class="text-danger"></span>
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">user name <span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="username" id="student_dob" class="form-control" />
                <span id="error_student_dob" class="text-danger"></span>
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="row">
              <label class="col-md-4 text-right">password<span class="text-danger">*</span></label>
              <div class="col-md-8">
                <input type="text" name="password" id="student_dob" class="form-control" />
                <span id="error_student_dob" class="text-danger"></span>
              </div>
            </div>
          </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
         <!--	<input type="hidden" name="student_id" id="student_id" />
        	<input type="hidden" name="action" id="action" value="Add" />-->
        	<input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Add" />
          	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>

      </div>
  </form>
  </div>
</div>


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
   <?php include '../top_navbar.php'?>
  </header><!-- Header End -->
  <!-- Left side column. contains the logo and sidebar -->
  
  

  
  
  
  
<!-- Sidebar Start -->
   <?php include '../left_navbar.php'?>
<!-- sidebar End -->

<!-- modal login panel-->
   <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="head">
      <div class="">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        
		<h1 class="br">
<span >Login to Admin<em> </em></span>
</h1>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="pure-form">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Username" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="30" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
    </div>
  </div>
</div>
<!-- modal admin panel-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php include('dashboard.php'); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Footer Start -->
  <?php include '../footer.php'?>
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