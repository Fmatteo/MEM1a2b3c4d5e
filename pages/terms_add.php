<script language="JavaScript"><!--
javascript:window.history.forward(1);
//--></script>
<?php 
session_start();
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];
include('../dist/includes/dbcon.php');
$sid=$_SESSION['sid'];

date_default_timezone_set('Asia/Manila');

	$day=date('d');	
	$month=date('m');	

	$span = $_POST['span'];
	$terms = $_POST['terms'];
	$down = $_POST['down'];
	$interest = $_POST['interest'];
	$total = $_POST['grandtotal'];
	$balance=$total-$down;	
	$date=date("Y-m-d");
	$due_date = date("Y-m-d",strtotime("+$span months"));
	$cid=$_POST['cid'];
	$date=date("Y-m-d"); 
	$query=mysqli_query($con,"select * from term where sales_id='$sid'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query);

		$query1=mysqli_query($con,"SELECT or_no FROM payment NATURAL JOIN sales WHERE modeofpayment =  'credit' and or_no<>'0' ORDER BY payment_id DESC LIMIT 0 , 1")or die(mysqli_error($con));

			$row1=mysqli_fetch_array($query1);
				$or=$row1['or_no'];	

				if ($or==0)
				{
					$or=1;
				}
				else
				{
					$or=intval($or)+1;
				}
	
	
		$due=$balance;
		$i = 1;
		
			$due_date1 = date("Y-m-d",strtotime("+$i months"));

				mysqli_query($con,"INSERT INTO payment(cust_id,payment_for,due,interest,payment,user_id,branch_id,remaining,sales_id,or_no) 
			VALUES('$cid','$due_date1','$due','0','0','$id','$branch','$due','$sid','$or')")or die(mysqli_error($con));		

		
	mysqli_query($con,"INSERT INTO term(payable_for,term,due,payment_start,down,due_date,interest,sales_id) 
		VALUES('$span','$terms','$due','$date','$down','$due_date','$interest','$sid')")or die(mysqli_error($con));
		
	mysqli_query($con,"UPDATE customer SET balance='$balance' where cust_id='$cid'") or die(mysqli_error($con)); 
	
		/* mysqli_query($con,"INSERT INTO payment(cust_id,payment,payment_date,user_id,payment_for,branch_id,due,status,sales_id,or_no) 
			VALUES('$cid','$down','$date','$id','$date','$branch','$down','paid','$sid','$or')")or die(mysqli_error($con));	*/
	
	echo "<script>document.location='receipt1.php'</script>";  	

?>
