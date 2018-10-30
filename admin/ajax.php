<?php 
session_start();
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');


if($_POST['process']=='delete'){
	$serial = $_POST['serial'];
	if(! $con ) {
	      die('Could not connect: ' . mysqli_error());
	   }
	   echo 'Connected successfully, ';
	   $sql = " DELETE FROM product WHERE serial = '$serial'";
	   
	   if (mysqli_query($con, $sql)) {
	      	echo "Record deleted successfully ";
	   } else {
	   		echo "Not successfully ";
	   }
	   mysqli_close($con);
}


if($_POST['process']=='categories'){
	$cat_name = $_POST['cat_name'];
	if(! $con ) {
	      die('Could not connect: ' . mysqli_error());
	   }
	   echo 'Connected successfully, ';
	   $sql = " DELETE FROM category WHERE cat_name = '$cat_name'";
	   
	   if (mysqli_query($con, $sql)) {
	      	echo "Record deleted successfully ";
	   } else {
	   		echo "Not successfully ";
	   }
	   mysqli_close($con);

}

if($_POST['process']=='customer'){
	$cust_id = $_POST['cust_id'];	
	if(! $con ) {
	      die('Could not connect: ' . mysqli_error());
	   }
	   echo 'Connected successfully, ';	  
	   
	   $sql = " DELETE FROM customer WHERE cust_id = '$cust_id'";
	   
	   if (mysqli_query($con, $sql)) {
	      	echo "Record deleted successfully ";
	   } else {
	   		echo "Not successfully ";
	   }
	   mysqli_close($con);
}

if($_POST['process']=='supplier'){
	$supplier_name = $_POST['supplier_name'];	
	if(! $con ) {
	      die('Could not connect: ' . mysqli_error());
	   }
	   echo 'Connected successfully, ';	  
	   
	   $sql = " DELETE FROM supplier WHERE supplier_name = '$supplier_name'";
	   
	   if (mysqli_query($con, $sql)) {
	      	echo "Record deleted successfully ";
	   } else {
	   		echo "Not successfully ";
	   }
	   mysqli_close($con);

}

if($_POST['process']=='credito'){
	$supplier_name = $_POST['supplier_name'];	
	if(! $con ) {
	      die('Could not connect: ' . mysqli_error());
	   }
	   echo 'Connected successfully, ';	  
	   
	   $sql = " DELETE FROM creditor WHERE supplier_name = '$supplier_name'";
	   
	   if (mysqli_query($con, $sql)) {
	      	echo "Record deleted successfully ";
	   } else {
	   		echo "Not successfully ";
	   }
	   mysqli_close($con);

}




if($_POST['process']=='cust_history'){


	$cust_id = $_POST['cust_id'];


	$sql="
		SELECT * FROM customer a 
			LEFT JOIN sales b ON a.cust_id = b.cust_id 
			LEFT JOIN sales_details c ON b.sales_id = c.sales_id
			LEFT JOIN product d ON c.prod_id = d.prod_id
			WHERE a.cust_id = '".$cust_id."'";
			echo "<table id='customerTable' style='width:100%'>";
	    	echo "<tr>";
	    	echo "<td>Customer</td>
	    		  <td>Product</td>
	    		  <td>Price</td>
	    		  <td>Date</td>";
			echo "</tr>";			
	if ($result=mysqli_query($con,$sql)) 
	  {
	  // Fetch one and one row
	  while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {
	    	echo "<tr>";
	    	echo "<td>" . $row['cust_first'] . "</td><td>" .$row['prod_name'] . "</td><td> P " . $row['price'] .  "</td><td>" . $row['date_added'].  "</td>";
			echo "</tr>";
	    }
	  // Free result set
	  mysqli_free_result($result);
	}
	echo "</table>";
	mysqli_close($con);


}




?>