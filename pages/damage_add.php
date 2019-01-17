<?php 

include('../dist/includes/dbcon.php');
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$prod_id = $_POST['prod_id'];
	$prod_qty = $_POST['prod_qty'];
	$qty = $_POST['qty'];
	$remarks = $_POST['remarks'];		
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d H:i:s");
	$id=$_SESSION['id'];	
	if($prod_qty > $qty){
	$prod_left = $prod_qty - $qty;
	mysqli_query($con,"INSERT INTO damage(prod_id,damage_qty,date,remarks,branch_id) VALUES('$prod_id','$qty','$date','$remarks','$branch')")or die(mysqli_error($con));
	// $prod_id = mysqli_insert_id($con);
	$remarks2="added damage $qty of product id of $id";  
	
	mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
		// $qty = $qty - ($qty * 2);
		// mysqli_query($con,"INSERT INTO stockin(prod_id,qty,date,branch_id,base_price) VALUES('$id','$qty','$date','$branch','$base_price')")or die(mysqli_error($con));

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


*/
	mysqli_query($con,"UPDATE product SET prod_qty='$prod_left' where prod_id='$prod_id' and branch_id='$branch'") or die(mysqli_error($con)); 
			
	echo "<script type='text/javascript'>alert('Successfully added new damaged items!');</script>";
}else{
	echo "<script type='text/javascript'>alert('Sorry, damaged items cant be more than the quantity of the product');</script>";
}
	echo "<script>document.location='damaged_item.php'</script>";  
	
?>
	
