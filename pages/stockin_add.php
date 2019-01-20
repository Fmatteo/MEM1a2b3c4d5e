<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	if (isset($_POST['prod_name']))
		$prod_name = $_POST['prod_name'];
	if (isset($_POST['prod_desc']))
		$prod_desc = $_POST['prod_desc'];
	if (isset($_POST['prod_cat']))
		$prod_cat = $_POST['prod_cat'];
	if (isset($_POST['supplier_id']))
		$supplier = $_POST['supplier_id'];
	if (isset($_POST['reorder']))
		$reorder = $_POST['reorder'];
	if (isset($_POST['qty']))
		$prod_qty = $_POST['qty'];
	if (isset($_POST['base_price']))
		$prod_price = $_POST['base_price'];

	
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d H:i:s");

	$id=$_SESSION['id'];
	
	if (isset($_POST['prod_name']))
	{
		$query = "SELECT * FROM product WHERE prod_name = '$prod_name' AND branch_id='$branch'";
		$sql = mysqli_query($con, $query)or die(mysqli_error());
		$count = mysqli_num_rows($sql);

		if ($count == 0)
		{
			if (isset($_POST['furniture']))
			{
				mysqli_query($con, "INSERT INTO product(prod_name, prod_desc, cat_id, prod_qty, branch_id, reorder, supplier_id, base_price, type)VALUES('$prod_name', '$prod_desc', '$prod_cat', '$prod_qty', '$branch', '$reorder', '$supplier', '$prod_price', 'furniture')")or die(mysqli_error($con));
			}

			if (isset($_POST['cosmetics']))
			{
				mysqli_query($con, "INSERT INTO product(prod_name, prod_desc, cat_id, prod_qty, branch_id, reorder, supplier_id, base_price, type)VALUES('$prod_name', '$prod_desc', '$prod_cat', '$prod_qty', '$branch', '$reorder', '$supplier', '$prod_price', 'cosmetics')")or die(mysqli_error($con));
			}
			if (isset($_POST['mobile']))
			{
				$prod_imei = $_POST['prod_imei'];
				$prod_color = $_POST['prod_color'];

				mysqli_query($con, "INSERT INTO product(prod_name, cat_id, prod_qty, branch_id, reorder, base_price, type, imei, color, supplier_id)VALUES('$prod_name', '$prod_cat', '$prod_qty', '$branch', '$reorder', '$prod_price', 'mobile', '$prod_imei', '$prod_color', '$supplier')")or die(mysqli_error($con));
			}
	    	$prod_id = mysqli_insert_id($con);
		}
		else
		{
			echo "<script>alert('Item with this name is currently exists. Pick another name and try again.')</script>";
			echo "<script>window.history.back();</script>";
			return;
		}	
	}	

	if (isset($_POST['furniture_stockin']) || isset($_POST['cosmetics_stockin']) || isset($_POST['mobile_stockin']))
	{
		$prod_id = $_GET['id'];
		$prod_qty = $_POST['qty'];
		mysqli_query($con, "UPDATE product SET prod_qty = prod_qty + '$prod_qty' WHERE prod_id='$prod_id' AND branch_id='$branch'")or die(mysqli_error());

		$query = mysqli_query($con, "SELECT * FROM product WHERE prod_id = '$prod_id'")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
		$prod_name = $row['prod_name'];
		$prod_price = $row['base_price'];
	}

	$remarks="added $prod_qty of $prod_name";  
	
	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));


	mysqli_query($con,"INSERT INTO stockin(prod_id,qty,date,branch_id,base_price) VALUES('$prod_id','$prod_qty','$date','$branch','$prod_price')")or die(mysqli_error($con));

			
	echo "<script type='text/javascript'>alert('Successfully added new stocks!');</script>";
	echo "<script>document.location='stockin.php'</script>";   
	
?>