<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$name = $_POST['prod_name'];
	$prod_desc = $_POST['prod_desc'];
	$qty = $_POST['qty'];
	$price = 0;
	$base_price = $_POST['base_price'];

	if(isset($_POST['cat_id'])){
		$cat_id = $_POST['cat_id'];
	}else{
		$cat_id = '';
	}
	if(isset($_POST['prod_desc'])){
		$prod_desc = $_POST['prod_desc'];
	}else{
		$prod_desc = '';
	}
	if(isset($_POST['supplier_id'])){
		$supplier_id = $_POST['supplier_id'];
	}else{
		$supplier_id = '';
	}
	if(isset($_POST['reorder'])){
		$reorder = $_POST['reorder'];
	}else{
		$reorder= '';
	}
	if(isset($_POST['color'])){
		$prod_desc = $prod_desc . ' ' . $_POST['color'];
	}else{
		$prod_desc = '';
	}
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d H:i:s");
	$id=$_SESSION['id'];
	

		
	switch ($cat_id) {
	    case "5":
			mysqli_query($con,"INSERT INTO product(prod_name,prod_desc,supplier_id,cat_id,reorder,prod_qty,branch_id,base_price) VALUES('$name','$prod_desc','$supplier_id','5','$reorder','$qty','$branch','$base_price')")or die(mysqli_error($con));
	        break;
	    case "6":
			mysqli_query($con,"INSERT INTO product(prod_name,prod_desc,supplier_id,cat_id,reorder,prod_qty,branch_id,base_price) VALUES('$name','$prod_desc','$supplier_id','6','$reorder','$qty','$branch','$base_price')")or die(mysqli_error($con));   
	        break;
	    case "7":
			mysqli_query($con,"INSERT INTO product(prod_name,prod_desc,supplier_id,cat_id,reorder,prod_qty,branch_id,base_price) VALUES('$name','$prod_desc','$supplier_id','7','$reorder','$qty','$branch','$base_price')")or die(mysqli_error($con));     
	        break;
	    default:
	        echo "Failed";
	}

		


        $prod_id = mysqli_insert_id($con);
		$remarks="added $qty of $name";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));


			mysqli_query($con,"INSERT INTO stockin(prod_id,qty,date,branch_id,base_price) VALUES('$prod_id','$qty','$date','$branch','$base_price')")or die(mysqli_error($con));

/*
			   $average_base_price_query= mysqli_query($con,"select * from stockin where prod_id='$name'")or die(mysqli_error());
                    while($base_price_row =mysqli_fetch_array($average_base_price_query)){
                          $qty = $base_price_row['qty'];
						  $base_price = $base_price_row['base_price'];
						  $total_qty = $total_qty + $qty;
						  $product_base_price = $base_price * $qty;
						  $total_base_price = $total_base_price + $product_base_price;						  
                    }				
						$average_base_price = $total_base_price /  $total_qty;	



			mysqli_query($con,"UPDATE product SET prod_qty='$total_qty', base_price = '$average_base_price', prod_price = '0' where prod_id='$name' and branch_id='$branch'") or die(mysqli_error($con)); */
			
			echo "<script type='text/javascript'>alert('Successfully added new stocks!');</script>";
				  echo "<script>document.location='stockin.php'</script>";  
	
?>