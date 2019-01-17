<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name =$_POST['name'];
	$address =$_POST['address'];
	$contact =$_POST['contact'];
	
	mysqli_query($con,"update branch set branch_name='$name',branch_address='$address',branch_contact='$contact' where branch_id='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated branch details!');</script>";
	echo "<script>document.location='branch.php'</script>";  

	
?>
