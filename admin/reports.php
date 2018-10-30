
<?php include 'header.php';?>
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
th{
  color:white;

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
.panel-success{
  border:1px solid black;
  box-shadow: 0px 0px 20px 0px;
  color:black;
  border-radius: 20px;
}



</style>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       <?php include 'main_sidebar.php';?>

        <!-- top navigation -->
       <?php include 'top_nav.php';?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">		

					<?php 
					include 'dbcon.php';
						$query1=mysqli_query($con,"select * from branch ORDER BY branch_name")or die(mysqli_error($con));
						while ($row=mysqli_fetch_array($query1)){
						$id=$row['branch_id'];?>
						<a href  = "page_reports.php?id=<?php echo $row['branch_id'];?>">
						<div class = "col-md-6 col-6-12 col-6">
							
							<div class = "panel panel-success">
								<div class = "panel-heading">
									<i class = "center fa fa-building"></i>
								</div>
								<div class = "panel-body">
										<h1 class = ""><?php echo $row['branch_name'];?></h1>
								</div>
							</div>
							
						</div>
						</a>
						<?php } ?>						
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
