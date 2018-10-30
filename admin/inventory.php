<?php include 'header.php';

$branch_id = $_GET['id'];
?>
<link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<style>
::-webkit-scrollbar{
  width: 12px;
}
::-webkit-scrollbar-thumb{
  background:linear-gradient(#000, green);
  border-radius: 6px;
}
.nav-md .container.body .right_col{
  background: url('../dist/img/admin.jpg') no-repeat center center fixed;
  background-size: cover;
  

  
}

.nav_menu{
  font-family: 'Comfortaa', cursive;
  border-radius: 20px;
  background-color: transparent;
  border:3px solid white;
  box-shadow: 0x 0px 200px 0px;
  color:orange;
}
.left_col{


  background: url('../dist/img/admin.jpg') no-repeat center center fixed;
  background-size: cover;
  
  

}
.nav_title{

  background: url('../dist/img/admin.jpg') no-repeat center center fixed;
  background-size: cover;
  
}
footer{
   background: url('../dist/img/admin.jpg') no-repeat center center fixed;
  background-size: cover;
  
}
.sidebar-footer{
   background: url('../dist/img/admin.jpg') no-repeat center center fixed;
  background-size: cover;
  
}
a{
  font-family: 'Comfortaa', cursive;
}
th{
  font-family: 'Comfortaa', cursive;
}
.profile_info{
  font-family: 'Comfortaa', cursive;
}
.dataTables_wrapper{
  background-color: white;
  border-top-right-radius: 20px;
  border-top-left-radius: 20px;
}
.x-panel{
  background-color: white;
  padding: 20px;
  border-radius: 20px;
  border:1px solid black;
  box-shadow: 0px 0px 20px 0px;
  color:black;
}

</style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include 'main_sidebar.php';?>

        <!-- top navigation -->
       <?php include 'top_nav.php';?>      <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">					
						<div class = "x-panel">
	<?php					 
			$branch=$_GET['id'];
			$query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());  
			$row=mysqli_fetch_array($query);
        
	?>      
                  <h5><b><?php echo $row['branch_name'];?></b> </h5>  
                  <h6>Address: <?php echo $row['branch_address'];?></h6>
                  <h6>Contact #: <?php echo $row['branch_contact'];?></h6>
				  <h5><b>Product Inventory as of today, <?php echo date("M d, Y h:i a");?></b></h5>
                  
				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
							 
						
                  <table class="table table-bordered table-striped">
                    <thead>
					
                      <tr>
					  
                        <th>Product Name</th>
                        <th>Qty Left</th>
						
            						<th>Price</th>
            						<th>Total</th>
            						<th>Reorder</th>
                       
                      </tr>
                    </thead>
                    <tbody>
							<?php
									$branch=$_GET['id'];
									$query=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
									$grand=0;
									while($row=mysqli_fetch_array($query)){
										$total=$row['prod_price']*$row['prod_qty'];
										$grand+=$total;
							?>
                      <tr>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['prod_qty'];?></td>
						
						<td><?php echo $row['prod_price'];?></td>
						<td><?php echo number_format($total,2);?></td>
						<td class="text-center"><?php if ($row['prod_qty']<=$row['reorder'])echo "<span class='badge bg-red'><i class='glyphicon glyphicon-refresh'></i>Reorder</span>";?></td>
                       
                      </tr>

<?php }?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3">Total</th>
                        
						
						<th colspan="2">P<?php echo number_format($grand,2);?></th>
						
                        
                      </tr>					  
                    </tfoot>
                  </table>
                </div>
						</div>
				</div>
			</div>
        </div>		
        <!-- /page content -->
	
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Sales and Inventory System <a href="#"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

	<?php include 'datatable_script.php';?>
    <!-- /gauge.js -->
  </body>
</html>
