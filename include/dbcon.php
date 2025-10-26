<?php
//echo 8475784;
	$DB_NAME="rrsv";
	$DB_USER="Rrsv";
	$DB_PASS="Rrsv_2022";
	$DB_HOST="localhost";

if($myDB= mysqli_connect($DB_HOST,$DB_USER,$DB_PASS))
	{
		mysqli_select_db($myDB,$DB_NAME);	
	}
	else {
	    echo "db not connect";
	}



?>