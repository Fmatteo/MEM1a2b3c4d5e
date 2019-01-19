<?php 
include('../dist/includes/dbcon.php');

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM category WHERE cat_id = '$id'")or die(mysqli_error());

echo "<script type='text/javascript'>alert('Successfully deleted category!');</script>";
echo "<script>document.location='category2.php'</script>";  
?>