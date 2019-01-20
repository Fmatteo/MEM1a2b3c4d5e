<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
$branch = $_SESSION['branch'];
$id = $_GET['id'];

$model = $_POST['model'];

$query = "SELECT * FROM product WHERE branch_id = '$branch' AND prod_name='$model' AND prod_id != '$id'";
$sql = mysqli_query($con, $query);
$count = mysqli_num_rows($sql);

if ($count == 0) // CHECKS IF THERE IS ALREADY SAME NAME EXISTING
{
	if (isset($_POST['furniture']))
	{
		// FURNITURE BUTTON WAS SENT
		$desc = $_POST['desc'];
		$supplier = $_POST['supplier'];
		$category = $_POST['category'];
		$reorder = $_POST['reorder'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

		mysqli_query($con, "UPDATE product SET prod_name = '$model', prod_desc = '$desc', cat_id = '$category', prod_qty = '$qty', reorder = '$reorder', supplier_id = '$supplier', base_price = '$price' WHERE prod_id = '$id' AND branch_id = '$branch'")or die(mysqli_error($con));
	}

	if (isset($_POST['cosmetics']))
	{
		// COSMETICS BUTTON WAS SENT
		$desc = $_POST['desc'];
		$supplier = $_POST['supplier'];
		$category = $_POST['category'];
		$reorder = $_POST['reorder'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

		mysqli_query($con, "UPDATE product SET prod_name = '$model', prod_desc = '$desc', cat_id = '$category', prod_qty = '$qty', reorder = '$reorder', supplier_id = '$supplier', base_price = '$price' WHERE prod_id = '$id' AND branch_id = '$branch'")or die(mysqli_error($con));
	}


	if (isset($_POST['mobile']))
	{
		// MOBILE BUTTON WAS SENT
		$imei = $_POST['imei'];
		$color = $_POST['color'];
		$category = $_POST['category'];
		$supplier = $_POST['supplier'];
		$reorder = $_POST['reorder'];
		$qty = $_POST['qty'];
		$price = $_POST['price'];

		mysqli_query($con, "UPDATE product SET prod_name = '$model', cat_id = '$category', prod_qty = '$qty', reorder = '$reorder', base_price = '$price', imei='$imei', color = '$color', supplier_id = '$supplier' WHERE prod_id = '$id' AND branch_id = '$branch'")or die(mysqli_error($con));
	}
	echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
	echo "<script>document.location='stockin.php'</script>";  
}
else
{
	echo "<script type='text/javascript'>alert('This model is already existing. Pick another model name.');</script>";
	echo "<script>window.history.back();</script>";  
}
	
?>
