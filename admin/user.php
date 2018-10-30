
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
.x-panel{
  background-color: white;
  border-top-right-radius: 20px;
  border-top-left-radius: 20px;
  padding: 20px;
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
       <?php include 'top_nav.php';?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class = "col-md-4 col-lg-4 col-xs-4">
						<?php include 'add_user_form.php';?>
					</div>
					<div class = "col-md-8 col-lg-8 col-xs-8">
						<div class = "x-panel">
						 <table id="datatable" class="table table-striped table-bordered table-responsive">
							 <thead>
								<tr>
									<th>Fullname</th>
									<th>Branch Name</th>
									<th>Username</th>
									<th>Password</th>
									<th>Status</th>
									<th>Action</th>									
								</tr>
							 </thead>
							 <tbody>
									<?php	
									include 'dbcon.php';								
										$query1=mysqli_query($con,"select * from user NATURAL JOIN branch ORDER BY user_id ASC")or die(mysqli_error($con));
										while ($row=mysqli_fetch_array($query1)){
											$id=$row['user_id'];
											
									?>  
								<tr>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['branch_name'];?></td>
									<td><?php echo $row['username'];?></td>
									<td>****</td>
									<td><?php echo $row['status'];?></td>
									<td>
										<a href="#update<?php echo $id;?>" class="btn btn-success btn-xs" data-toggle = "modal" data-target="#update<?php echo $id;?>"><i class = "fa fa-pencil"></i> Edit</a>
										
									</td>
																
								</tr>
										<?php include 'update_user_modal.php';?>
								<?php }?>
							 </tbody>								
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
