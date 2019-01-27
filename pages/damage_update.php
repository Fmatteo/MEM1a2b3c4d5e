<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
$branch = $_SESSION['branch'];

include('../dist/includes/dbcon.php');
	$qty = $_POST['qty'];
	$damage_qty =$_POST['damage_qty'];
	$prod_id =$_POST['prod_id'];
	$prod_qty =$_POST['prod_qty'];
	$damage_id =$_POST['damage_id'];
	$final_prod_qty = $prod_qty + $qty;
	$final_qty = $damage_qty - $qty;

	$query = mysqli_query($con, "SELECT extra FROM damage WHERE damage_id='$damage_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($query);
	
	if (strpos($row['extra'], '.') !== false)
	{
		list($id, $type) = explode(".", $row['extra']);

		if ($type == 'mobile')
		{
			mysqli_query($con, "UPDATE mobile SET remarks = '' WHERE id = '$id'")or die(mysqli_error());
		}
		else
		{
			mysqli_query($con, "UPDATE furniture SET remarks = '' WHERE id = '$id'")or die(mysqli_error());
		}
	}


	if ($final_qty == 0){
		$sql = " DELETE FROM damage WHERE damage_id = '$damage_id' AND branch_id = '$branch'";
	   if (mysqli_query($con, $sql)) {	      	
		echo "<script type='text/javascript'>alert('Record deleted successfully');</script>";
	   } else {
	   		echo " ";
		echo "<script type='text/javascript'>alert('Not successfully');</script>";
	   }
	   mysqli_query($con, "UPDATE product SET prod_qty = '$final_prod_qty' WHERE prod_id = '$prod_id' AND branch_id = '$branch'")or die(mysqli_error($con));
	}else{
		mysqli_query($con,"update damage set damage_qty='$final_qty' where damage_id='$damage_id' AND branch_id = '$branch'")or die(mysqli_error());

		mysqli_query($con, "UPDATE product SET prod_qty = '$final_prod_qty' WHERE prod_id = '$prod_id' AND branch_id = '$branch'")or die(mysqli_error($con));

		echo "<script type='text/javascript'>alert('Successfully updated damages details!');</script>";

	}
	
	echo "<script>document.location='damaged_item.php'</script>";

?>
