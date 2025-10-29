<?php
include '../../include/config.php';
include '../dbcon.php';

$class_id = $_POST['class_id']??'';
$subject_id = $_POST['subject_id']??'';
$teacher_id = $_POST['teacher_id']??'';
$session = $_POST['session']??'';
$class_date= $_POST['class_date']??'';
$unit = $_POST['unit']??'';
$chapter_name = $_POST['chapter_name']??'';
$book_name = $_POST['book_name']??'';
$description = $_POST['description']??'';
$type = $_POST['type']??'';

$sql = "INSERT INTO rrsv_homework_exam (class_id, subject_id,teacher_id,session,unit,class_date, book_name,chapter_name, description, type)
        VALUES ('$class_id', '$subject_id','$teacher_id', '$session','$unit','$class_date','$book_name', '$chapter_name','$description', '$type' )";

if ($con->query($sql)) {

    header("Location: homework_exam.php?msg=added");
} else {
    echo "Error: " . $con->error;
}
?>