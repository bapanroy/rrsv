<?php
error_reporting(1);
include('include/header.php');
    include('include/dbcon.php');

$ret1code="";
$id=0;
$txtsearch="";
$status="";
$sid=0;
$did=0;
	if(isset($_GET['page'])){
		$current_page=$_GET['page'];
	}else{
		$current_page="";
	}
if(isset($_GET['id'])) {
  $id=$myDB->escape_string(trim(addslashes($_GET['id'])));
}

if(isset($_POST['txtsearch']))
{
  $txtsearch=$myDB->escape_string(trim(addslashes($_POST['txtsearch'])));
}
if(isset($_POST['scl_session']))
{
  $scl_session=$myDB->escape_string(trim(addslashes($_POST['scl_session'])));
}
if(isset($_POST['scl_class']))
{
  $scl_class=$myDB->escape_string(trim(addslashes($_POST['scl_class'])));
}

if(isset($_POST['scl_section']))
{
  $scl_section=$myDB->escape_string(trim(addslashes($_POST['scl_section'])));
}

if(isset($_GET['retcode'])) {
  $retcode=$myDB->escape_string(trim(addslashes($_GET['retcode'])));
}

if($retcode==1) {
  $msg="course has been editted successfully";
}


if($retcode==3) {
  $msg="Organization has been deleted successfully";
}
if($retcode==4) {
  $msg="Organization has been Inactive successfully";
}


if(isset($_GET['mode'])) {
	$mode=$myDB->escape_string($_GET['mode']);
}

if(isset($_GET['status'])) {
	$status=$myDB->escape_string($_GET['status']);
}
if($id > 0) {
if($mode=='sts'){
		  if(trim($status)=='Active')
			  $status='Inactive';
		  else $status='Active';
		
			$sqlsts="update rrsv_student_registration set status='".$status."' where id='".$id."'";
			$resSts=mysqli_query($myDB,$sqlsts) or die("Error into change Student  status:".mysql_error());
			if(mysqli_affected_rows($myDB)>=1) {
				echo '<script language="javascript" type="text/javascript">';
				echo 'window.location.href="manage_bill.php?retcode=4&page='.$current_page.'";';
				echo '</script>';
			}
		  }
	}
?>
<script language="javascript" type="text/javascript">

function dosearch()
  { 
    document.frmsearch.method='post';
    document.frmsearch.action='manage_bill.php';
    document.frmsearch.submit();
    return true;
  }
  
  /*function confirmdel(id){
		if(confirm("Are you sure to delete this Information?")) {
			window.location.href="manage_bill.php?mode=del&id="+id;
			return true;
		}
	}*/
	

	
	
	function confirmsearch(id,status)
	{
				if(confirm("Are you sure to change this Student status?")) {
				//	window.location.href="manage_bill.php?mode=sts&id="+id+"$status="+status+;
			window.location.href="manage_bill.php?mode=sts&id="+id+"&status="+status;
					//	window.location.href="manage_bill.php?mode=sts&id="+id+"&status="+status+'&page=<?=$current_page?>';
			return true;
	}
	}
    </script>
    <style>
        .button.btn.btn-primary.button {
    margin-left: 541px;
    margin-top: -71px;
}
.addstatus {
    margin-top: -43px;
}
    </style>
<link href='libray/DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- jQuery Library -->
        <script src="libray/js/jquery-3.3.1.min.js"></script>
        
        
        
<div class="main-panel">
        <div class="content-wrapper">

            
          
          <div class="col-12 grid-margin">
              <div class="card">
                    <div >
                <div >
            <!-- Table -->
            <div style="
    margin-left: 424px;
    font-weight: bold;
">
            Income & Expense Report Search
            </div>
            <!-- Table -->
             <form name="frmsearch" method="post" action="report.php" id="frmsearch" >
            <table id='empTable' class='display dataTable'>
                <thead>
                 <tr>
                        <td class="text" align="center" colspan="8" valign="top">
                        <select name="purpose" class="form-control" style="width: 188px;margin-left: 146px;">
                            <option value="">-Select a  Purpose -</option>
                            <!--<option value="From Sell">From Sell</option>-->
                             <!--<option value="Student Bill Paid">Student Bill Paid</option>-->
                              <option value="Teacher Salary">Teacher Salary</option>
                            
 <?php
        $id=0;
 // echo    $sql="select a.*, b.recep_no,c.from_no as incomefrom_no,d.from_no as exfrom_no,e.from_no as inqfrom_no from rrsv_scl_pl as a left join rrsv_scl_studen_fee b on a.pl_date=b.scl_date left join rrsv_income c on a.pl_date=c.d_o_i left join rrsv_expence d on a.pl_date=d.d_o_e left join rrsv_inquery e on a.pl_date=e.d_o_i ";
   //     echo $sql="select a.*,b.cur_name,c.que,c.start_date,c.start_time from scl_student_registration a left join scl_course b on a.cur_id=b.id left join scl_exam c on a.id=c.stu_id";

      $sql="select * from rrsv_scl_pl group by purpose";
          $res=mysqli_query($myDB,$sql);
          
          while($obj=mysqli_fetch_array($res,MYSQLI_ASSOC))
          {
            ?>
          <option value="<?php echo $obj['purpose'];?>">
          <?php echo $obj['purpose'];?>
          
          </option>
              <?php
          }
          ?>
                        </select>
                        <!--<select name="add_status" class="form-control addstatus" style="width: 216px;margin-left: -139px;">-->
                        <!--    <option value="">--Select Admission Status--</option>-->
                        <!--    <option value="New Admission">New Admission</option>-->
                        <!--    <option value="Readmission">Readmission</option>-->
                        <!--</select>-->
						<input type='date' class='form-control' name='fromDate' style="width: 152px;margin-top: -47px;margin-left: -582px;" value='' id="fromDate">
                        <input type='date' class='form-control' name='endDate' style="width: 152px;margin-top: -47px;margin-left: -250px;" value='' id="endDate">
                        <select name="session" class="form-control" id="session" style="width: 152px;margin-top: -47px;margin-left: -914px;">
                      <option value="">-Select a Session -</option>
                      <?php
                      for ($i = date("Y") - 3; $i <= date("Y") + 10; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>' . PHP_EOL;
                      }

                      ?>
                    </select>
                        <button type="submit" value="" class="btn btn-primary button" valign="center" style="margin-left: 634px;">View Report</button>
                        <!--<a href="report.php" class="btn btn-primary buttonr">Report</a>-->
                        
                </tr>
                </form>
                <!--<td>-->
                <!--     <button type="submit" value="" class="btn btn-primary button" valign="center" style="margin-left: 634px;">View Report</button>-->
                        <!--<button type="submit" value="" name="Reset" class="btn btn-primary buttonr" valign="center">Refresh</button>-->
                <!--</td>-->
                <tr>
                <th>SL.No</th>
                 <th>Bill No</th>
                    <th>Date</th>
                    <th>Purposr</th>
                     <th>Income</th>
                      <th>Expence</th>

                      <!--<th>Action</th>-->
                </tr>
                </thead>
 <?php
 $bgcolor="";
                          $c=0;
                        

                          if(isset($_GET['page']))
                          {
                          $page=$_GET['page'];
                          }
                          else
                          {
                          $page=1;
                          }
                          $perpage=2000;
                          $lowerlimit=($page-1)*$perpage;
                  //       $sql="select a.*, b.recep_no,c.from_no as incomefrom_no,d.from_no as exfrom_no,e.from_no as inqfrom_no from rrsv_scl_pl as a left join rrsv_scl_studen_fee b on a.pl_date=b.scl_date left join rrsv_income c on a.pl_date=c.d_o_i left join rrsv_expence d on a.pl_date=d.d_o_e left join rrsv_inquery e on a.pl_date=e.d_o_i ";
   
                       $sql="select * from rrsv_scl_pl where 1";
                    //  $sql="select a.*,b.class_name from rrsv_student_registration as a,class as b where a.scl_class=b.id ";

                        //  if($txtsearch!="")
                        //  {
                        // $sql.=" and (scl_name LIKE '%$txtsearch%' || scl_reg_no LIKE '%$txtsearch%'  )";
                        
                        //  }
                    //     if($txtsearch!="")
                    //      {
                    //  echo   $sql.=" and (scl_reg_no LIKE '%$txtsearch%' )";
                        
                    //      }
		      //            if($scl_session!="")
        //                  {
        //                  $sql.=" and (scl_session LIKE '%$scl_session%')";
                        
        //                  }
					   //  if($scl_class!="")
        //                  {
        //                  $sql.=" and (scl_class LIKE '$scl_class')";
                        
        //                  }
				    //  if($scl_section!="")
        //                  {
        //                  $sql.=" and (scl_section LIKE '%$scl_section%')";
                        
        //                  }
                         /*if($luid!='1')
                         {
                         $sql.=" and (created_user='$luid' or updated_user='$luid')";
                         }*/

                       
                        
                         $result=mysqli_query($myDB,$sql);
                             $totalrecord=mysqli_num_rows($result);
                             $totalpage=ceil($totalrecord/$perpage);
                            //  $sql .=" group by b.recep_no,a.pl_date,c.from_no,d.from_no,e.from_no  limit $lowerlimit,$perpage";
                             $sql .=" order by id desc limit $lowerlimit,$perpage";
                             $result1=mysqli_query($myDB,$sql);
                             $l=mysqli_num_rows($result1);
                             $result=mysqli_query($myDB,$sql);

                         if($l>0)

                         {

                         while ($rows=mysqli_fetch_array($result1,MYSQLI_ASSOC))

                         {
                      
                        
                          $c++;
						   $id=$rows['id'];
						  $status= $rows['status'];
						   $incomeamount=$incomeamount+$rows['income_amount'];
                          $expamount=$expamount+$rows['exp_amount'];
                          ?>
                      
                      
                        <tr>
                         <td class="text" style="padding-left:10px;" valign="center">#<?php echo $c;?></td>
                        
                        
                         <td class="text" style="padding-left:10px;" valign="center"><?=$rows['bill'];?></td>
                         
                          
                        
                         <td  class="text" valign="center" style="padding-left:10px;"><?=date('d-m-Y',strtotime($rows['pl_date']));?></td>
                         <td  class="text" valign="center" style="padding-left:10px;"><?=$rows['purpose'];?></td>
                        <td  class="text" valign="center" style="padding-left:10px;"><?=$rows['income_amount'];?></td>
                        <td  class="text" valign="center" style="padding-left:10px;"><?=$rows['exp_amount'];?></td>
					
                        
					 <!-- <td  class="text" valign="center" style="padding-left: -50px;">-->
							  
						<!--<a class="btn btn-primary" href="add_bill.php?id=<?=$rows['id'];?>" title="Click to student Bill"  class="btn btn-primary">Bill-->
						<!--</a>-->
                                        
      <!--                 <a href="#" onclick="confirmdel(<?=$rows['id'];?>);" title="Click to delete this Admission"  class="btn btn-danger"><i class="icon_close_alt2"></i></a>-->
                          

      <!--                   </td>-->
                        </tr>
                        
                         <tr>

                         </tr>
                         <?php
						 
                          }
                          }
						  
                          else {
                            echo "<tr>";
                            echo "<td class='errtext' align='center' colspan=6>Records Not Found</td>";
                            echo "</tr>";
                          }
					   
                       ?>
          
          <tr>
    <td>Total Cash in Hand:<?php echo $cash=$incomeamount-$expamount;?>
    
    </td>
    <td></td>
    <td></td>
    
    <td><?php echo $incomeamount;?></td>
    <td></td>
        <td><?php echo $expamount;?></td>
    
</tr>
        </table>

            <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
        <?php

                               if($page>1)
                               {
                              ?>
      <li class="page-item"> <a class="page-link" href="manage_expenditure.php?page=<?=($page-1);?>" tabindex="-1">Previous</a>
    </li>
    <?php
                              }
                              ?>
                              <?php
                              for($i=1;$i<=$totalpage;$i++)
                              {
                              ?>
    <li class="page-item"><a class="page-link" href="manage_expenditure.php?page=<?=$i;?>"><?php echo $i ?></a></li>
                              <?php
                              }
                              ?>

                              <?php
                              if($totalpage>$page)
                              {
                              ?>
    <li class="page-item">
      <a class="page-link" href="manage_expenditure.php?page=<?=($page+1);?>">Next</a>
    </li>
      <?php
                              }
                              
                              ?>
  </ul>
</nav>
        </div>
        </div>
            </div>
     </div>

  <script>
  $(document).ready(function () {
     $('#frmsearch').on('submit', function() {
        var fromDate=$('#fromDate').val();
        var endDate=$('#endDate').val();
        var session=$('#session').val();
        //  if(session ==''){
        //     alert('Enter session');
        //     return false; 
        // }
        if(fromDate ==''){
            alert('Enter From Date');
            return false; 
        }
        if(endDate =='' ){
            alert('Enter to Date');
            return false; 
        }
       
});      
 });

  </script>        
          
      
          
        <?php
include('include/footer.php');
?>
