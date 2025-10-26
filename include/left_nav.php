<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('config.php');
  ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RRSV</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>libray/css/style.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>libray/css/custom.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>libray/images/logo.jpeg" />
  <style>
    .form-control {
      border-color: #B5D6FD;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }

    .form-control:focus {
      border-color: #FF0000;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    }
  </style>
</head>

<body>
  <div class="container-scroller d-flex">

    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Navigation</p>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            <div class="badge badge-info badge-pill"></div>
          </a>
        </li>
        <li class="nav-item sidebar-category">
          <p>Menu Bar</p>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#front-menu" aria-expanded="false"
            aria-controls="front-menu">
            <i class="mdi mdi-database menu-icon"></i>
            <span class="menu-title">Front Master</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="front-menu">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link"
                  href="<?php echo BASE_URL; ?>admin/admission/manage_admission.php">Admission</a></li>
              <li class="nav-item"> <a class="nav-link"
                  href="<?php echo BASE_URL; ?>admin/syllabus/manage_syllabus.php">Syllabus</a></li>
              <!--<li class="nav-item"> <a class="nav-link"-->
              <!--    href="<?php echo BASE_URL; ?>admin/admission/admission.php">Admission charge</a></li>-->
              <!--<li class="nav-item"> <a class="nav-link"-->
              <!--    href="<?php echo BASE_URL; ?>admin/admission/readmission.php">Re-Admission charge</a>-->
              <!--</li>-->
              <li class="nav-item"> <a class="nav-link"
                  href="<?php echo BASE_URL; ?>admin/routine/manage_routine.php">Routine</a></li>
              <li class="nav-item"> <a class="nav-link"
                  href="<?php echo BASE_URL; ?>admin/vendor/manage_vendor.php">vendor Entry</a></li>
              <li class="nav-item"> <a class="nav-link"
                  href="<?php echo BASE_URL; ?>admin/gallery/manage_gallery.php">Gallery</a></li>
              <li class="nav-item"> <a class="nav-link"
                  href="<?php echo BASE_URL; ?>admin/notice/manage_notice.php">Notice</a></li>
                  <li class="nav-item"> <a class="nav-link"
                  href="<?php echo BASE_URL; ?>admin/permission/permission_list.php">Permission</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-database menu-icon"></i>
            <span class="menu-title">Master</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_class.php">Add Class</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_section.php">Add Section</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_fee.php">Add Student Fees Rate</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_book.php">Add Book Rate</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_subject.php">Add Subject</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_copy.php">Add Copy Rate</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_car.php">Add Car Rate</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_event.php">Add School Events</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_holiday.php">Add Holiday</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_time.php">Add Time</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_expencehead.php">Add Expense Head</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_incomehead.php">Add Income Head</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_stock.php">Add Stock</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_publishers.php">Add Publishers</a></li>
            </ul>
          </div>
        </li>
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="form.php">-->
        <!--    <i class="mdi mdi-view-headline menu-icon"></i>-->
        <!--    <span class="menu-title">Form elements</span>-->
        <!--  </a>-->
        <!--</li>-->
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="teachers.php">-->
        <!--    <i class="mdi mdi-security menu-icon"></i>-->
        <!--    <span class="menu-title">Teachers</span>-->
        <!--  </a>-->
        <!--</li>-->
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account-multiple menu-icon"></i>
            <span class="menu-title">Student</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_registration.php">Add Student Registration</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_student_behaviour.php">Add Student Behaviour</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#teacher2" aria-expanded="false" aria-controls="teacher2">
            <i class="mdi mdi-account-circle menu-icon"></i>
            <span class="menu-title">Teacher</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="teacher2">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_teacher.php">Add Teacher Registration</a></li>

            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#teacher1" aria-expanded="false" aria-controls="teacher1">

            <i class="mdi mdi-cash menu-icon"></i>
            <span class="menu-title">Payment</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="teacher1">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_inquery.php">Admission Form Sell</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_bill.php">Student Bill Payment</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>teacher_salary.php">Teachers Salary</a></li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#attendence" aria-expanded="false"
            aria-controls="teacher1">

            <i class="mdi mdi-clock menu-icon"></i>
            <span class="menu-title">Attendance</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="attendence">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_student_absent_late.php">Students Attendance</a>
              </li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>teacher_attendence.php">Teachers Attendance</a></li>

            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#marksheet" aria-expanded="false"
            aria-controls="marksheet">

            <i class="mdi mdi-certificate menu-icon"></i>
            <span class="menu-title">Marksheet</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="marksheet">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_marksheet.php">Students Marksheet</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#teacher" aria-expanded="false" aria-controls="teacher">
            <i class="mdi mdi-printer menu-icon"></i>
            <span class="menu-title">Print</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="teacher">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_icard.php">Students ID Card</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_teacher_icard.php">Teachers ID Card</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_tc.php">Transfer Certificate</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#expence" aria-expanded="false" aria-controls="expence">

            <i class="mdi mdi-ticket-account menu-icon"></i>
            <span class="menu-title">Income & Expence</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="expence">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_income.php">Add Income</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_expence.php">Add Expence</a></li>

            </ul>
          </div>
        </li>
        <!--<li class="nav-item">-->
        <!--         <a class="nav-link" data-bs-toggle="collapse" href="#income" aria-expanded="false" aria-controls="income">-->

        <!-- <i class="mdi mdi-account-plus menu-icon"></i>-->
        <!--           <span class="menu-title">Income</span>-->
        <!--           <i class="menu-arrow"></i>-->
        <!--         </a>-->
        <!--         <div class="collapse" id="income">-->
        <!--           <ul class="nav flex-column sub-menu">-->

        <!--           </ul>-->
        <!--         </div>-->
        <!--       </li>        -->


        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" data-bs-toggle="collapse" href="#salary" aria-expanded="false" aria-controls="teacher1">-->
        <!--    <i class="mdi mdi-account-key menu-icon"></i>-->
        <!--    <span class="menu-title">Salary</span>-->
        <!--    <i class="menu-arrow"></i>-->
        <!--  </a>-->
        <!--  <div class="collapse" id="salary">-->
        <!--    <ul class="nav flex-column sub-menu">-->
        <!--      <li class="nav-item"> <a class="nav-link" href="teacher_salary.php">Teachers</a></li>-->
        <!--    </ul>-->
        <!--  </div>-->
        <!--</li>-->



        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#teacher3" aria-expanded="false" aria-controls="teacher3">
            <i class="mdi mdi-security menu-icon"></i>
            <span class="menu-title">Reports</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="teacher3">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_status.php">Status Report</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_print.php">Money Report</a></li>

              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_expenditure.php">Income & Expense Report</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>manage_report.php">Profite & Loss Report</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#manage" aria-expanded="false" aria-controls="manage">
            <i class="mdi mdi-security menu-icon"></i>
            <span class="menu-title">Stock</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="manage">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>stock.php"> Stock Manage</a></li>
              <li class="nav-item"> <a class="nav-link" href="<?php echo BASE_URL; ?>return_stock.php"> Stock Return</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>logout.php">
            <i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>export.php">
            <i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Data Backup</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASE_URL; ?>add_chanepassword.php">
            <i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Change Password</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->