<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$name = $_POST['name'];
$branch = $_POST['branch_id'];
$type = $_POST['role'];

//echo $user;

$query = "SELECT * FROM user WHERE username = '$user'";
$sql = mysqli_query($con, $query)or die(mysqli_error());
$count = mysqli_num_rows($sql);


if ($count == 0)
{
	// Insert
	$md5pass = md5($pass);
	$saltedpass = $salt . $md5pass;
	$query = "INSERT INTO user(username, password, name, status, branch_id, type)VALUES('$user', '$saltedpass', '$name', 'active', '$branch', '$type')";
	$sql = mysqli_query($con, $query);
	echo "<script>alert('Account added.');</script>";
echo "<script>document.location='profile.php'</script>";

}
else
{
	
	echo "<script>alert('Username is already taken.');</script>";
echo "<script>window.history.back();</script>";


}
?>