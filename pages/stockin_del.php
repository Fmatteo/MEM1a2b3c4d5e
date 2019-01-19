<?php
session_start();
include("../dist/includes/dbcon.php");

if (isset($_GET['id']))
{
	$pid = $_GET['id'];

	$query = "DELETE FROM product WHERE prod_id = '$pid'";
	mysqli_query($con, $query)or die(mysqli_error());

	echo "<script>alert('Item deleted successfully.');</script>";
	echo "<script>window.location='stockin.php'</script>";
}

?>