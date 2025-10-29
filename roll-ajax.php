<?php
    include('include/dbcon.php');

$result="";
 $scl_class=$_POST['scl_class'];
 $scl_session=$_POST['scl_session'];
 $scl_section=$_POST['scl_section'];
  $sql="select scl_roll_no  from rrsv_student_registration where scl_class='$scl_class' and scl_session='$scl_session' and scl_section='$scl_section' order by id desc limit 0,1";
 $res=mysqli_query($myDB,$sql);
 $c=mysqli_num_rows($res);
 if($c>0)
 {
	$rows=mysqli_fetch_array($res,MYSQLI_ASSOC);
		 $roll=$rows['scl_roll_no'];
	 $roll=$roll+1;
	
	 /*	$result .="<input type='text' class='form-control' name='scl_roll_no' id='scl_roll_no' value='<?php echo $roll;?>'>";*/
 }
 else
 {
	 $roll=1;
 }
echo $roll;
?>
