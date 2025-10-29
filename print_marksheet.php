<?php
// print_r($_GET);
// die();
include('include/dbcon.php');
$id = $myDB->escape_string(trim(addslashes($_GET['student_id'])));

$scl_name = '';
$scl_class = '';
$scl_roll_no = '';
$scl_reg_no = '';
$scl_session = '';

if (isset($_GET['student_id'])) {
    $sql = "select scl_name,scl_class,scl_roll_no,scl_reg_no,scl_session,image from rrsv_student_registration  where id=$id ";
    $res = mysqli_query($myDB, $sql);
    $rows = mysqli_fetch_array($res);
    $student_image = $rows['image'];

    $scl_name = $rows['scl_name'];
    $scl_class = $rows['scl_class'];
    $scl_roll_no = $rows['scl_roll_no'];
    $scl_reg_no = $rows['scl_reg_no'];
    $scl_session = $rows['scl_session'];

    $sql = "select * from rrsv_marksheet where student_id='$id' and session='$scl_session' and class='$scl_class'  and not subject = 'drawing'";
    $qryresult = mysqli_query($myDB, $sql);
    $totalrecord = mysqli_num_rows($qryresult);
    if ($totalrecord === 0) { ?>

        <script>
            alert('please enter minume 1 unit to print marksheet!');
            window.history.go(-1);
        </script>


        <?php exit();
    }
} //die();

function check_qry($id, $unit, $activity)
{
    include('include/dbcon.php');

    $cur = date('Y');

    switch ($unit) {
        case 1:
            $start_date = $cur . '-01-01';
            $end_date = $cur . '-04-30';
            break;
        case 2:
            $start_date = $cur . '-05-01';
            $end_date = $cur . '-09-30';
            break;
        case 3:
            $start_date = $cur . '-10-01';
            $end_date = $cur . '-12-31';
            break;
        default:
            $start_date = $cur . '-01-01';
            $end_date = $cur . '-12-31';
    }

    $sql = "SELECT COUNT(activties) as activity FROM `rrsv_student_behaviour` WHERE `student_id` = $id AND `activties` = '$activity' AND `date` BETWEEN '$start_date' AND '$end_date'";
    $res = mysqli_query($myDB, $sql);
    $rows = mysqli_fetch_array($res);
    $rrr = $rows['activity'];

    return $rrr;
}

function get_qry($id, $unit, $activity)
{
    $result = (int) check_qry($id, $unit, $activity);
    $data = 'A';
    if ($result > 4) {
        $data = 'B';
    }
    if ($result > 8) {
        $data = 'C';
    }
    if ($result > 12) {
        $data = 'D';
    }


    return $data;
}

// SELECT COUNT(status) as status FROM `rrsv_student_attendence` WHERE `student_id` = $id AND `date` BETWEEN '$start_date' AND '$end_date' AND `status` = 'Absent' AND `class_name` = '$scl_class' AND `scl_session` = $scl_session

function absent_qry($id, $unit, $scl_class, $scl_session)
{
    include('include/dbcon.php');

    $cur = date('Y');

    switch ($unit) {
        case 1:
            $start_date = $cur . '-01-01';
            $end_date = $cur . '-04-30';
            break;
        case 2:
            $start_date = $cur . '-05-01';
            $end_date = $cur . '-09-30';
            break;
        case 3:
            $start_date = $cur . '-10-01';
            $end_date = $cur . '-12-31';
            break;
        default:
            $start_date = $cur . '-01-01';
            $end_date = $cur . '-12-31';
    }

    $sql = "SELECT COUNT(status) as status FROM `rrsv_student_attendence` WHERE `student_id` = $id AND `date` BETWEEN '$start_date' AND '$end_date' AND `status` = 'Absent' AND `class_name` = '$scl_class' AND `scl_session` = $scl_session";
    $res = mysqli_query($myDB, $sql);
    $rows = mysqli_fetch_array($res);
    $rrr = $rows['status'];
    // print_r($rows);
    // die();
    return $rrr;

}


function get_data($student_id, $session, $class, $parm)
{
    include('include/dbcon.php');

    $sql = "SELECT $parm  FROM `rrsv_marksheet_unit` WHERE `student_id` = $student_id AND `session` = '$session' AND `class` = '$class'";
    $res = mysqli_query($myDB, $sql);
    $rows = mysqli_fetch_array($res);
    $rrr = $rows[$parm];

    return $rrr;
}

// echo get_data(137,2022,'STANDERD 1','2nd_unit_home_project');
// die();
function cal_percentage($num_amount, $num_total)
{
    $count1 = $num_amount / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);
    return $count;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .heading h4 {
            text-align: center;

        }

        .heading p {
            font-size: 25px;
            font-family: serif;
            text-align: center;
            margin-left: 15%;
            margin-right: 15%;
        }

        table,
        td,
        tr,
        th {
            font-size: 8px;
            border: 2px solid black;
            font-weight: bold;
        }

        .marks {
            margin-top: 50px;
        }

        .disclaim {

            font-style: italic;
            text-align: center;


        }

        h6 {
            padding: 120px;
            text-decoration: overline;
            text-align: end;
        }

        .container {
            font-size: 8px;
        }

        .fd {
            font-size: 13px;

        }

        table.borderless tr,
        table.borderless td,
        table.borderless th {
            border: none !important;
        }
    </style>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .heading h4 {
            text-align: center;
        }

        .heading p {
            font-size: 25px;
            font-family: serif;
            text-align: center;
            margin-left: 15%;
            margin-right: 15%;
        }

        table,
        td,
        tr,
        th {
            font-size: 8px;
            border: 2px solid black;
            font-weight: bold;
        }

        .marks {
            margin-top: 50px;
        }

        .disclaim {
            font-style: italic;
            text-align: center;
        }

        h6 {
            padding: 120px;
            text-decoration: overline;
            text-align: end;
        }

        .container {
            font-size: 8px;
        }

        .fd {
            font-size: 13px;
        }

        table.borderless tr,
        table.borderless td,
        table.borderless th {
            border: none !important;
        }

        @media print {
            body {
                margin: 0;
                padding: 10px;
                font-size: 12px;
                /* Increase the font size */
            }

            .heading p {
                font-size: 30px;
                /* Adjust heading font size */
            }

            table,
            td,
            tr,
            th {
                font-size: 20px;
                /* Adjust table font size */
                padding: 4px;
                /* Adjust cell padding */
            }

            .container {
                max-width: 100%;
            }

            .marks {
                margin-top: 20px;
                /* Reduce space to save layout */
            }

            button {
                display: none;
                /* Hide buttons in print */
            }

            img {
                max-width: 80px;
                max-height: 80px;
                /* Scale down images if needed */
            }

            table {
                width: 100%;
                /* Ensure the table fits the page */
                border-collapse: collapse;
                /* Avoid unnecessary spacing */
            }
        }
    </style>

    <title>Student Marksheet</title>
</head>

<body>
    <button type="button" onclick="window.history.back()" class="btn btn-info" style="color: #fff">Back</button>
    <button type="button" onclick="printDiv('print')" class="btn btn-info">Print</button>
    <div id="print">
        <div class="container">

            <div class="heading">


                <h4 style="text-decoration:underline">RASULPUR RAMKRISHNA SARADA VIDYAPITH</h4>

            </div>
            <div class="container">
                <div>
                    <table class="table borderless text-center">

                        <tr>
                            <th class="col-md-2"><img src="libray/images/logo.jpeg" class="img" alt="image" style="
    width: 94px;
    height: 89px;
    margin-left: 0px;
" /></th>
                            <th class="col-md-8 fd">
                                <p>Reg. No. : SO196094, U-DISE Code : 19251610302, ESTD : 2012<br>Baidyadanga, Rasulpur,
                                    Memari, Purba Bardhaman, Pin -713151</p>
                            </th>
                            <th class="col-md-2"><img src="student_reg_image/<?= $student_image; ?>" class="img"
                                    alt="image" style="width: 94px;height: 89px;margin-left: 0px;" /> /</th>
                        </tr>
                    </table>

                    <table class="table">
                        <tr>
                            <th class="col" colspan="4">Name :&nbsp;<?= $scl_name ?></th>
                        </tr>

                        <tr>
                            <th class="col">Registration No :&nbsp;<span><?= $scl_reg_no; ?></span></th>
                            <th class="col">Session :&nbsp;<span><?= $scl_session ?></span></th>
                            <th class="col">Class :&nbsp;<span><?= $scl_class ?></span></th>
                            <th class="col">Roll No :&nbsp;<span><?= $scl_roll_no ?></span></th>
                        </tr>
                    </table>
                </div>
                <div class="marks">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="col-md-3">Subject</th>
                                <th class="col-md-1">1st Unit Marks(60)</th>
                                <th class="col-md-1">1st Unit H.M(60)</th>
                                <th class="col-md-1">2nd Unit Marks(80)</th>
                                <th class="col-md-1">2nd Unit H.M(80)</th>
                                <th class="col-md-1">3rd Unit Marks(60)</th>
                                <th class="col-md-1">3rd Unit H.M(60)</th>
                                <th class="col-md-1">Total(200)</th>
                                <th class="col-md-1">%</th>
                                <th class="col-md-1">H.M(200)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $frist_marks = 0;
                            $frist_hm = 0;
                            $second_marks = 0;
                            $second_hm = 0;
                            $third_marks = 0;
                            $third_hm = 0;
                            $total_marks = 0;
                            $row_val = 0;
                            while ($rows = mysqli_fetch_array($qryresult, MYSQLI_ASSOC)) {
                                $frist_marks = $frist_marks + (int) $rows['1st_unit_marks'];
                                $frist_hm = $frist_hm + (int) $rows['1st_unit_hm'];
                                $second_marks = $second_marks + (int) $rows['2nd_unit_marks'];
                                $second_hm = $second_hm + (int) $rows['2nd_unit_hm'];
                                $third_marks = $third_marks + (int) $rows['3rd_unit_marks'];
                                $third_hm = $third_hm + (int) $rows['3rd_unit_hm'];
                                $total_marks = $total_marks + $rows['total'];
                                $row_val++;
                                $total_exam_marks = $row_val * 200;
                                ?>
                                <tr>
                                    <td><?= $rows['subject']; ?></td>
                                    <td><?= $rows['1st_unit_marks']; ?></td>
                                    <td><?= $rows['1st_unit_hm']; ?></td>
                                    <td><?= $rows['2nd_unit_marks']; ?></td>
                                    <td><?= $rows['2nd_unit_hm']; ?></td>
                                    <td><?= $rows['3rd_unit_marks']; ?></td>
                                    <td><?= $rows['3rd_unit_hm']; ?></td>
                                    <td><?= $rows['total']; ?></td>
                                    <td><?= $rows['percent']; ?></td>
                                    <td>00</td>
                                    <!--<td><?= $rows['total_hm']; ?></td>-->
                                </tr>

                            <?php } ?>

                            <tr>
                                <td>GRAND TOTAL</td>
                                <td><?= $frist_marks; ?></td>
                                <td><?= $frist_hm; ?></td>
                                <td><?= $second_marks; ?></td>
                                <td><?= $second_hm; ?></td>
                                <td><?= $third_marks; ?></td>
                                <td><?= $third_hm; ?></td>
                                <td><?= $total_marks; ?></td>
                                <td><?= cal_percentage($total_marks, $total_exam_marks); ?></td>
                                <td>---</td>
                            </tr>
                            <tr>
                                <td>DRAWING</td>
                                <?php
                                $sql = "SELECT * FROM `rrsv_marksheet` WHERE `student_id` = $id AND `session` = '$scl_session' AND `class` = '$scl_class' AND `subject` = 'DRAWING' ";
                                //die();
                                $res = mysqli_query($myDB, $sql);
                                $rows = mysqli_fetch_array($res, MYSQLI_ASSOC);
                                $drawing_total_marks = $rows['1st_unit_marks'] + $rows['2nd_unit_marks'] + $rows['3rd_unit_hm'];


                                ?>

                                <td><?= $rows['1st_unit_marks']; ?></td>
                                <td><?= $rows['1st_unit_hm']; ?></td>
                                <td><?= $rows['2nd_unit_marks']; ?></td>
                                <td><?= $rows['2nd_unit_hm']; ?></td>
                                <td><?= $rows['3rd_unit_marks']; ?></td>
                                <td><?= $rows['3rd_unit_hm']; ?></td>
                                <td><?= $drawing_total_marks ?></td>
                                <td><?= cal_percentage($drawing_total_marks, 200); ?></td>
                                <td>--</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table text-center">
                        <thead class="text-center">
                            <tr>
                                <th class="col-md-2">EXAMINATION</th>
                                <th class="col-md-4">Guardian Signature with Date</th>
                                <th class="col-md-4">Principal Signature with Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr rowspan="2">
                                <td>1st unit (Jan to April)</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2nd unit (May to August)</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3rd unit (September to December)</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Teacher Signature with date and comment</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>






                </div>



            </div>
        </div>
    </div>
</body>

</html>
<script>
    function printDiv(id) {
        var printContents = document.getElementById(id).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>