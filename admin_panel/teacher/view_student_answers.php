<!DOCTYPE html>
<html>
<?php
session_start();
include '../../include/config.php';
include '../dbcon.php';
// 🔒 Access Control: Only logged-in teachers can access
if (!isset($_SESSION['user_data']) || $_SESSION['role'] !== 'teacher') {
    header("Location: ../index.php?error=Unauthorized Access");
    exit;
}

$teacher = $_SESSION['user_data'];
include('../header.php');

?>

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
<?php


$exam_id = $_GET['exam_id'];
$student_id = $_GET['student_id'];

// Fetch exam details
$exam = $con->query("SELECT * FROM rrsv_homework_exam WHERE id='$exam_id'")->fetch_assoc();
$student = $con->query("SELECT name FROM users WHERE id='$student_id'")->fetch_assoc();

// Fetch all questions
$questions = $con->query("SELECT * FROM rrsv_homework_exam_questions WHERE exam_id='$exam_id'");
?>

<section class="content-header">
  <h1>Answers - <?= htmlspecialchars($exam['title']); ?></h1>
  <small>Student: <?= htmlspecialchars($student['name']); ?></small>
</section>

<section class="content">
  <?php
  $i = 1;
  while ($q = $questions->fetch_assoc()) {
    $qid = $q['id'];

    $studentAnswer = $con->query("SELECT answer FROM rrsv_student_answers WHERE question_id='$qid' AND student_id='$student_id'")->fetch_assoc()['answer'] ?? '-';
    $correctAnswer = $con->query("SELECT correct_answer FROM rrsv_homework_exam_questions WHERE id='$qid'")->fetch_assoc()['correct_answer'] ?? '-';
  ?>
  <div class="box <?= (strtoupper(trim($studentAnswer)) == strtoupper(trim($correctAnswer))) ? 'box-success' : 'box-danger'; ?>">
    <div class="box-header with-border">
      <h3 class="box-title">Q<?= $i++; ?>. <?= htmlspecialchars($q['question']); ?></h3>
    </div>
    <div class="box-body">
      <p><strong>Student Answer:</strong> <?= htmlspecialchars($studentAnswer); ?></p>
      <p><strong>Correct Answer:</strong> <?= htmlspecialchars($correctAnswer); ?></p>

      <?php if ($q['option_a']): ?>
      <ul>
        <li>A. <?= htmlspecialchars($q['option_a']); ?></li>
        <li>B. <?= htmlspecialchars($q['option_b']); ?></li>
        <li>C. <?= htmlspecialchars($q['option_c']); ?></li>
        <li>D. <?= htmlspecialchars($q['option_d']); ?></li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <?php } ?>
</section>

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