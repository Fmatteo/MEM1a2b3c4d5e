<?php
$con = mysqli_connect("localhost","root","","inventorykristel");
$salt="a1Bz20ydqelm8m1wql";

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  date_default_timezone_set("Asia/Manila"); 
?>

