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
// Fetch all exams
// Fetch classes, sections, subjects for dropdowns
$classes = mysqli_query($con, "SELECT id, class_name FROM rrsv_class");
$sections = mysqli_query($con, "SELECT id, section_name FROM rrsv_section");
$subjects = mysqli_query($con, "SELECT id, sub_name FROM rrsv_subject");
$result = $con->query("SELECT * FROM rrsv_homework_exam ORDER BY id DESC");
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
                <h1>Admin <small>Homework / Exam</small></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin Exam</a></li>
                    <li class="active">Homework / Exam List</li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Homework / Exam List</h3>
                                <div style="text-align: right;">
                                    <a href="#" class="btn-sm btn btn-primary" data-toggle="modal"
                                        data-target="#addExamModal" style="margin-bottom:4px;">Add Homework / Exam</a>
                                </div>
                            </div>

                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Book</th>
                                            <th>Chapter</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sn = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?= $sn++; ?></td>
                                                <td><?= htmlspecialchars($row['book_name']); ?></td>
                                                <td><?= ucfirst($row['type']); ?></td>
                                                <td><?= $row['class_id']; ?></td>
                                                <td><?= htmlspecialchars($row['chapter_name']); ?></td>
                                                <td><?= $row['created_at']; ?></td>
                                                <td>
                                                    <a href="homework_exam_questions.php?exam_id=<?= $row['id']; ?>"
                                                        class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
                                                    <a href="edit_homework_exam.php?id=<?= $row['id']; ?>"
                                                        class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                                    <a href="delete_homework_exam.php?id=<?= $row['id']; ?>"
                                                        class="btn btn-danger btn-xs"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa fa-trash"></i></a>
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
            <!-- /.content -->
        </div>
        <!-- Modal Add Homework/Exam -->
        <div class="modal fade" id="addExamModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form action="save_homework_exam.php" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Homework / Exam</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Book</label>
                                <input type="text" name="book_name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Chapter</label>
                                <input type="text" name="chapter_name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <select name="unit" class="form-control" id="unit">
                                    <?php
                                    $selectedUnit = $_POST['unit'] ?? 1; // default to 1st Unit
                                    for ($u = 1; $u <= 3; $u++) {
                                        $unitLabel = ($u == 1) ? '1st Unit' :
                                            (($u == 2) ? '2nd Unit' :
                                                (($u == 3) ? '3rd Unit' : $u . 'th Unit'));
                                        $sel = ($selectedUnit == $u) ? 'selected' : '';
                                        echo "<option value='$u' $sel>$unitLabel</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control">
                                    <option value="homework">Homework</option>
                                    <option value="exam">Exam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Session</label>
                                <select name="session" id="session" class="form-control">
                                    <?php
                                    $currentYear = date('Y');
                                    echo "<option value='$currentYear' selected>$currentYear</option>";
                                    for ($y = $currentYear - 1; $y >= ($currentYear - 5); $y--) {
                                        echo "<option value='$y'>$y</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Class</label>

                                <select name="class_id" class="form-control" id="class_id">
                                    <option value="">-Select a Class-</option>
                                    <?php
                                    $id = 0;
                                    $sql = "select * from rrsv_class order by id";
                                    $res = mysqli_query($con, $sql);
                                    while ($obj = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $obj['id']; ?>">
                                            <?php echo $obj['class_name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Subject <span class="text-red"> * </span></label>
                                <select class="form-control" name="subject_id" id="subject_id" required>
                                    <option value="">Select Subject</option>
                                    <?php
                                    $id = 0;
                                    $sql2 = "select * from rrsv_subject order by id";
                                    $res2 = mysqli_query($con, $sql2);
                                    while ($obj2 = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
                                        ?>
                                        <option value="<?php echo $obj2['id']; ?>">
                                            <?php echo $obj2['sub_name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <input type="hidden" name="teacher_id" value="<?= $teacher['id'] ?? ''; ?>"> <!-- Example -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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