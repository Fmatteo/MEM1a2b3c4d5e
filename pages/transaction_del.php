<?php
session_start();
include("../dist/includes/dbcon.php");
$id = $_REQUEST['id'];
$cid = $_POST['cid'];
//$tran = $_POST['tran'];
$result=mysqli_query($con,"DELETE FROM temp_trans WHERE temp_trans_id ='$id'")
	or die(mysqli_error());
	
	
	/*if($tran == "purchase"){
		echo "<script>document.location='cash_transaction.php?cid=$cid'</script>";  	
	}else{
		//echo "<script>document.location='transaction.php?cid=$cid'</script>";  
		//echo "<script>document.location='cash_transaction.php?cid=$cid'</script>";  	

	}*/

	echo "<script>document.location='cash_transaction.php?cid=$cid'</script>";  
?>