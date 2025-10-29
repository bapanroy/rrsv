<?php
session_start();
include 'dbcon.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
   //print_r($email);die();
    // --- Check Student table ---
    $student_q = mysqli_query($con, "SELECT * FROM rrsv_student_registration WHERE scl_reg_no='$email' AND scl_phone_no='$password'");
    if (mysqli_num_rows($student_q) > 0) {
        $data = mysqli_fetch_assoc($student_q);
        $_SESSION['user_data'] = $data;
        $_SESSION['role'] = 'student';
        header("Location: student/index.php");
        exit;
    }

    // --- Check Teacher table ---
    $teacher_q = mysqli_query($con, "SELECT * FROM rrsv_teacher WHERE tech_phone_no='$email' AND pin='$password'");
    if (mysqli_num_rows($teacher_q) > 0) {
        $data = mysqli_fetch_assoc($teacher_q);
        $_SESSION['user_data'] = $data;
        $_SESSION['role'] = 'teacher';
        header("Location: teacher/index.php");
        exit;
    }

    // --- Check Admin table ---
    $admin_q = mysqli_query($con, "SELECT * FROM rrsv_admin WHERE admin_user='$email' AND admin_pwd='$password'");
    if (mysqli_num_rows($admin_q) > 0) {
        $data = mysqli_fetch_assoc($admin_q);
        $_SESSION['user_data'] = $data;
        $_SESSION['role'] = 'admin';
        header("Location: admin/index.php");
        exit;
    }

    // --- If none match ---
    header("Location: login.php?error=Invalid Login Details");
    exit;

} else {
    header("Location: login.php?error=Please Enter Email and Password");
    exit;
}
?>
