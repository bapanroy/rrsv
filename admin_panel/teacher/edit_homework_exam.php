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
      if (!isset($_GET['id'])) {
        header("Location: homework_exam.php");
        exit;
      }

      $id = intval($_GET['id']);
      $sql = "SELECT * FROM rrsv_homework_exam WHERE id='$id'";
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) == 0) {
        echo "<div class='alert alert-danger'>Invalid record or not found.</div>";
        exit;
      }
      $row = mysqli_fetch_assoc($result);

      // Update Logic
      if (isset($_POST['update_exam'])) {
        $book_name = mysqli_real_escape_string($con, $_POST['book_name']);
        $chapter_name = mysqli_real_escape_string($con, $_POST['chapter_name']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $unit = intval($_POST['unit']);
        $type = mysqli_real_escape_string($con, $_POST['type']);
        $session = mysqli_real_escape_string($con, $_POST['session']);
        $class_id = intval($_POST['class_id']);
        $subject_id = intval($_POST['subject_id']);

        $update = "UPDATE rrsv_homework_exam SET 
        book_name='$book_name',
        chapter_name='$chapter_name',
        description='$description',
        unit='$unit',
        type='$type',
        session='$session',
        class_id='$class_id',
        subject_id='$subject_id'
        WHERE id='$id'";

        if (mysqli_query($con, $update)) {
          echo "<script>alert('Homework/Exam updated successfully!'); window.location='homework_exam.php';</script>";
          exit;
        } else {
          echo "<div class='alert alert-danger'>Error updating record: " . mysqli_error($con) . "</div>";
        }
      }
      ?>

      <!-- Page Header -->
      <section class="content-header">
        <h1>Edit Homework / Exam</h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Homework / Exam</a></li>
          <li class="active">Edit</li>
        </ol>
      </section>

      <!-- Main Content -->
      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h4 class="box-title">Update Homework / Exam</h4>
              </div>
              <form action="" method="POST">
                <div class="box-body">

                  <div class="form-group">
                    <label>Book</label>
                    <input type="text" name="book_name" value="<?= htmlspecialchars($row['book_name']); ?>" required
                      class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Chapter</label>
                    <input type="text" name="chapter_name" value="<?= htmlspecialchars($row['chapter_name']); ?>"
                      required class="form-control">
                  </div>

                  <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"
                      class="form-control"><?= htmlspecialchars($row['description']); ?></textarea>
                  </div>

                  <div class="form-group">
                    <label>Unit</label>
                    <select name="unit" class="form-control" id="unit">
                      <?php
                      for ($u = 1; $u <= 3; $u++) {
                        $unitLabel = ($u == 1) ? '1st Unit' : (($u == 2) ? '2nd Unit' : '3rd Unit');
                        $sel = ($row['unit'] == $u) ? 'selected' : '';
                        echo "<option value='$u' $sel>$unitLabel</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Type</label>
                    <select name="type" class="form-control">
                      <option value="homework" <?= ($row['type'] == 'homework') ? 'selected' : ''; ?>>Homework</option>
                      <option value="exam" <?= ($row['type'] == 'exam') ? 'selected' : ''; ?>>Exam</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Session</label>
                    <select name="session" id="session" class="form-control">
                      <?php
                      $currentYear = date('Y');
                      for ($y = $currentYear; $y >= $currentYear - 5; $y--) {
                        $sel = ($row['session'] == $y) ? 'selected' : '';
                        echo "<option value='$y' $sel>$y</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Class</label>
                    <select name="class_id" class="form-control" id="class_id">
                      <option value="">-Select Class-</option>
                      <?php
                      $res = mysqli_query($con, "SELECT * FROM rrsv_class ORDER BY id");
                      while ($obj = mysqli_fetch_assoc($res)) {
                        $sel = ($row['class_id'] == $obj['id']) ? 'selected' : '';
                        echo "<option value='{$obj['id']}' $sel>{$obj['class_name']}</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Subject</label>
                    <select class="form-control" name="subject_id" id="subject_id" required>
                      <option value="">Select Subject</option>
                      <?php
                      $res2 = mysqli_query($con, "SELECT * FROM rrsv_subject ORDER BY id");
                      while ($obj2 = mysqli_fetch_assoc($res2)) {
                        $sel = ($row['subject_id'] == $obj2['id']) ? 'selected' : '';
                        echo "<option value='{$obj2['id']}' $sel>{$obj2['sub_name']}</option>";
                      }
                      ?>
                    </select>
                  </div>

                </div>

                <div class="box-footer">
                  <button type="submit" name="update_exam" class="btn btn-success">Update</button>
                  <a href="homework_exam_list.php" class="btn btn-default">Cancel</a>
                </div>

              </form>
            </div>
          </div>
        </div>
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