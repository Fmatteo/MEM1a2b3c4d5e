<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$cat_for = $_POST['cat_for'];
	$cat_name =$_POST['cat_name'];
	
	
	$query="SELECT * FROM category WHERE cat_name = '$cat_name' AND cat_for = '$cat_for' AND cat_id != '$id'";
	$sql = mysqli_query($con, $query)or die(mysqli_error());

	$count = mysqli_num_rows($sql);

	if ($count == 0)
	{
		mysqli_query($con,"update category set cat_name='$cat_name', cat_for ='$cat_for' where cat_id='$id'")or die(mysqli_error());
		
		echo "<script type='text/javascript'>alert('Successfully updated category!');</script>";
		echo "<script>document.location='category2.php'</script>";  
	}
	else
	{
		echo "<script type='text/javascript'>alert('Category already exist!');</script>";
		echo "<script>document.location='category2.php'</script>"; 
	}
	
?>
