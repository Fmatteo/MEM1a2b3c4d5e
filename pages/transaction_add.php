<?php 
session_start();
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];	

include('../dist/includes/dbcon.php');

	$cid = $_POST['cid'];
	list($name, $imei) = explode(".", $_POST['prod_name']);
	$qty = $_POST['qty'];
	$price = $_POST['price'];
		
	
		$query=mysqli_query($con,"select * from product where prod_id='$name'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);
		
		$prod_qty=$row['prod_qty'];
		
	if($qty <= $prod_qty ){

		$query1=mysqli_query($con,"select * from temp_trans where prod_id='$name' and branch_id='$branch'")or die(mysqli_error());
		$count=mysqli_num_rows($query1);
		
		$total=$price*$qty;
		
		/*if ($count>0){
			mysqli_query($con,"update temp_trans set qty=qty+'$qty',price=price+'$total' where prod_id='$name' and branch_id='$branch'")or die(mysqli_error());
	
		}
		else{*/
			mysqli_query($con,"INSERT INTO temp_trans(prod_id,qty,price,branch_id,mobile_id) VALUES('$name','$qty','$price','$branch','$imei')")or die(mysqli_error($con));
		//}
	}else{
		echo "<script>alert('Sorry there is not enough stock for this product')</script>";  
	}
		
	
		echo "<script>document.location='cash_transaction.php?cid=$cid'</script>";  
	
?>