
<!DOCTYPE html>
<html>
    <?php include 'header.php'?>
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
   <?php include 'top_navbar.php'?>
  </header><!-- Header End -->
  <!-- Left side column. contains the logo and sidebar -->
  
  

  
  
  
  
<!-- Sidebar Start -->
   <?php include 'left_navbar.php'?>
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Admin
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin Exam</a></li>
        <li class="active">Student</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    
    
    
    
    
      <div class="row">
        <!-- Note Start -->
  <!--    <div class="col-md-12">-->
		<!--<div class="box box-danger">-->
		<!--	<div class="box-header with-border">-->

  <!--            <h3 class="box-title"><i class="fa fa-warning text-yellow"></i> Note:</h3> Dont Send any Promotional sms in Transactional Route,Other wise your Account will Be Blocked.	-->
		<!--	</div>-->
		<!--</div>-->
	 <!-- </div>-->
        <!-- Note End -->
        <!-- Send sms box start -->
	<div class="col-md-12">
          <div class="box box-primary">
           <!-- /.header-->
            <div class="box-header with-border">
              <h3 class="box-title">Students</h3>
              
               <div style="text-align: right";>
               <a href="#" class="btn-sm btn btn-primary" data-toggle="modal" data-target="#formModal" style="margin-bottom:4px;" target="_blank">Add Student</a>
		
 
                </div>
                
		 </div>
             <!-- /.header-->
            
			
              <div class="box-body">
               
				 <!-- /box-body-->
				
                 <table id="example1" class="table table-bordered table-striped" >
                <thead>
                <tr>
                  <th>S.NO</th>
				  
                  <th> Name</th>
				  
                                  <th>roll</th>
                                  <th>Branch</th>
                                   <th>user</th>
                                  <th>pass</th>
                                   <th>due</th>
                                  <th>status</th>
                                  <th>Actions</th>
                               
                 
                </tr>
                </thead>
                <tbody><tr>
		 <td>1</td>
                  <td>Rrkk</td>
		
                  <td>8138975720</td>
                   <td>COPA</td>
                   <td>rrk</td>
                   <td>6655</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=rrk" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=38"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=38"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=rrk"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr><tr>
		 <td>2</td>
                  <td>Raju</td>
		
                  <td>12</td>
                   <td>COPA</td>
                   <td>admin</td>
                   <td>6655</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=admin" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=39"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=39"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=admin"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr><tr>
		 <td>3</td>
                  <td>Biswajit Ghosh</td>
		
                  <td>3989</td>
                   <td>COPA</td>
                   <td>BISWAJIT GHOSH</td>
                   <td>000S23dicsm</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=BISWAJIT GHOSH" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=58"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=58"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=BISWAJIT GHOSH"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr><tr>
		 <td>4</td>
                  <td>Urmila Pramanik</td>
		
                  <td>3990</td>
                   <td>COPA</td>
                   <td>URMILA PRAMANIK</td>
                   <td>000S23dicsm</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=URMILA PRAMANIK" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=59"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=59"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=URMILA PRAMANIK"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr><tr>
		 <td>5</td>
                  <td>Tanushree Das</td>
		
                  <td>3991</td>
                   <td>COPA</td>
                   <td>TANUSHREE DAS</td>
                   <td>000S23dicsm</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=TANUSHREE DAS" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=60"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=60"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=TANUSHREE DAS"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr><tr>
		 <td>6</td>
                  <td>Susovan Maity</td>
		
                  <td>3992</td>
                   <td>COPA</td>
                   <td>SUSOVAN MAITY</td>
                   <td>000S23dicsm</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=SUSOVAN MAITY" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=61"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=61"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=SUSOVAN MAITY"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr><tr>
		 <td>7</td>
                  <td>Koushik Das</td>
		
                  <td>3993</td>
                   <td>COPA</td>
                   <td>KOUSHIK DAS</td>
                   <td>000S23dicsm</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=KOUSHIK DAS" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=62"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=62"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=KOUSHIK DAS"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr><tr>
		 <td>8</td>
                  <td>Pallabi</td>
		
                  <td>102</td>
                   <td>COPA</td>
                   <td>pallabi</td>
                   <td>000S23dicsm</td>
                    
                    <td>0</td>
                  
              <td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle">
  <a href="update.php?ddue=pallabi" class="btn btn-success btn-xs" ><i class="fa fa-minus-square" aria-hidden="true"></i></a>
 
  <a title="Veiw User" href="edit_student.php?q=veiw_student&id=63"  class="btn btn-warning btn-xs" ><i class="fa fa-eye" aria-hidden="true"></i></a>
   <a title="Edit User" href="edit_student.php?q=edit_student&id=63"  class="btn btn-info btn-xs" ><i class="fa fa-edit" aria-hidden="true"></i></a>
    <a title="Delete User" href="update.php?dusername=pallabi"  class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true"></i></a> 
  
  </td>
  </tr> </tbody>
	</table>				 
               
			
             
             
              
              
              
              <div class="box-footer">
                
				 <!-- /.footer-->
				
                </div>
              <!-- /.box-footer -->
             
          </div>
          
          
   
        <!-- Send sms box end -->
		
		
            
 	<div class="box-body"  style="background-color:#E6E6FA">
			 
	
	 </div>
          
          </div>
          <!-- /.box -->
		</div>
		<!-- template message box end-->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Footer Start -->
  <?php include 'footer.php'?>
  <div class="control-sidebar-bg"></div>
</div>







  
  
  

<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/js/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
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