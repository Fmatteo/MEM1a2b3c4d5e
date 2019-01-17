<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');

	$username =$_POST['username'];
	$password =$_POST['password'];
	$newpassword = $_POST['newpassword'];
	$role = $_POST['role'];
	$name = $_POST['name'];
	$status = $_POST['status'];
	$branch_id = $_POST['branch_id'];
	
	$pass1=md5($password);
	$salt="a1Bz20ydqelm8m1wql";
	$pass1=$salt.$pass1;
	
	


		
				
				if ($newpassword==$password)
				{
					if ($password=="")
					{
						echo "<script type='text/javascript'>alert('Password empty');</script>";
						echo "<script>window.location='profile.php'</script>";   
					}
					else
					{
						mysqli_query($con,"INSERT INTO user
								(username,password,name,status,role,branch_id) 
								VALUES
								('$username','$pass1','$name','$status','$role', '$branch_id')");
					
					echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
					echo "<script>document.location='profile.php'</script>";  
					}					
					
				}
				else
				{
					echo "<script type='text/javascript'>alert('Password mismatch!');</script>";
					echo "<script>document.location='profile.php'</script>";  
				} 
	


?>