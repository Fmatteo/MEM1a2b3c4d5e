<?php 

include('../dist/includes/dbcon.php');

	$name = $_POST['supplier_name'];
	$address = $_POST['supplier_address'];
	$contact = $_POST['supplier_contact'];	
			
			mysqli_query($con,"INSERT INTO supplier(supplier_name,supplier_address,supplier_contact) 
				VALUES('$name','$address','$contact')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new supplier!');</script>";
					  echo "<script>document.location='category.php'</script>";  
	
?>