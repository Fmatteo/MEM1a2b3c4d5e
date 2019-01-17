<?php 

include('../dist/includes/dbcon.php');

	$name = $_POST['branch_name'];
	$address = $_POST['branch_address'];
	$contact = $_POST['branch_contact'];	
			
			mysqli_query($con,"INSERT INTO branch(branch_name,branch_address,branch_contact) 
				VALUES('$name','$address','$contact')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new branch!');</script>";
					  echo "<script>document.location='branch.php'</script>";  
	
?>