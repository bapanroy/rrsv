<!DOCTYPE html>
<html>
<?php
session_start();
include '../dbcon.php';
// 🔒 Access Control: Only logged-in teachers can access
if (!isset($_SESSION['user_data']) || $_SESSION['role'] !== 'teacher') {
    header("Location: ../index.php?error=Unauthorized Access");
    exit;
}

$teacher = $_SESSION['user_data'];
include '../../include/config.php';
include('../header.php');

$exam_id = $_GET['exam_id'] ?? 0;

// Fetch exam details
$exam = $con->query("SELECT * FROM rrsv_homework_exam WHERE id='$exam_id'")->fetch_assoc();

// Fetch all questions for this exam
$questions = $con->query("SELECT q.*, a.answer AS teacher_answer 
                           FROM rrsv_homework_exam_questions q
                           LEFT JOIN rrsv_teacher_answers a ON q.id = a.question_id
                           WHERE q.exam_id='$exam_id'");
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
        </header>
        <!-- Sidebar Start -->
        <?php include '../left_navbar.php' ?>
        <!-- sidebar End -->
        <div class="content-wrapper">

       
<section class="content-header">
  <h1>
    <?= htmlspecialchars($exam['book_name']); ?><?= htmlspecialchars($exam['chapter_name']); ?>
    <small>(<?= ucfirst($exam['type']); ?>)</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="homework_exam.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Exam</a></li>
    <li class="active">Questions</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Questions List</h3>
          <div style="text-align:right;">
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addQuestionModal">Add Question</a>
          </div>
        </div>

        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Question</th>
                <th>Options</th>
                <th>Correct Answer</th>
                <th>Teacher Answer</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sn = 1;
              while($q = $questions->fetch_assoc()) { ?>
              <tr>
                <td><?= $sn++; ?></td>
                <td><?= nl2br(htmlspecialchars($q['question'])); ?></td>
                <td>
                  <?php if ($q['option_a']): ?>
                    <b>A:</b> <?= htmlspecialchars($q['option_a']); ?><br>
                    <b>B:</b> <?= htmlspecialchars($q['option_b']); ?><br>
                    <b>C:</b> <?= htmlspecialchars($q['option_c']); ?><br>
                    <b>D:</b> <?= htmlspecialchars($q['option_d']); ?><br>
                  <?php else: ?>
                    <em>No options (Descriptive)</em>
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($q['correct_answer']); ?></td>
                <td><?= nl2br(htmlspecialchars($q['teacher_answer'])); ?></td>
                <td>
                  <a href="edit_homework_exam_question.php?id=<?= $q['id']; ?>&exam_id=<?= $exam_id; ?>" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                  <a href="delete_homework_exam_question.php?id=<?= $q['id']; ?>&exam_id=<?= $exam_id; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete this question?')"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Add Question Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <form action="save_homework_exam_question.php" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Question</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="exam_id" value="<?= $exam_id; ?>">

          <div class="form-group">
            <label>Question</label>
            <textarea name="question" class="form-control" required></textarea>
          </div>

          <div class="form-group">
            <label>Type of Question</label>
            <select id="qtype" class="form-control" onchange="toggleOptions()">
              <option value="mcq">Multiple Choice</option>
              <option value="descriptive">Descriptive</option>
            </select>
          </div>

          <div id="optionsDiv">
            <div class="form-group"><label>Option A</label><input type="text" name="option_a" class="form-control"></div>
            <div class="form-group"><label>Option B</label><input type="text" name="option_b" class="form-control"></div>
            <div class="form-group"><label>Option C</label><input type="text" name="option_c" class="form-control"></div>
            <div class="form-group"><label>Option D</label><input type="text" name="option_d" class="form-control"></div>
            <div class="form-group"><label>Correct Answer (A/B/C/D)</label><input type="text" name="correct_answer" class="form-control"></div>
          </div>

          <div class="form-group">
            <label>Teacher Model Answer (optional)</label>
            <textarea name="teacher_answer" class="form-control"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Question</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
 </div>
<script>
function toggleOptions() {
  var type = document.getElementById('qtype').value;
  document.getElementById('optionsDiv').style.display = (type === 'mcq') ? 'block' : 'none';
}
</script>
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