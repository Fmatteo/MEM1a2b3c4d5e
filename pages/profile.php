<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account Details | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/sample1.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <style>

    body {
      background-color: #ecf0f5;
    }

    ::-webkit-scrollbar{
      width: 12px;
    }

    ::-webkit-scrollbar-thumb{
      background:linear-gradient(darkred, white);
      border-radius: 6px;
    }

   .sidebar {  
      width: 250;
      height:100%;
      display: block;
      left: -240px;
      top: 0px;
      transition: left 0.3s linear;
    }

    .sidebar.visible {
      left:0px;
      transition: left 0.3s linear;
    }

    .nav-txt {
      color: white;
    }

    .subnav-txt:hover {
      color: #3498db;
    }

    .nav-txt:hover {
      background-color: #3a539b;
      color: white;
      transition: all .2s;
    }

    .main-sidebar {
      background-image: linear-gradient(to left, #22a7f0 , #3498db);
      position: fixed;
      z-index: 5;
    }

    .main-sidebar * a {
      color: white;
    }

    .treeview-menu {
      background-color: #3a539b;
    }

    .reorder-count {
      font-size: 10px !important;
    }

    .box-header {
      background-image: linear-gradient(to left, #22a7f0 , #3498db);
    }

    .menu {
      list-style-type: none;
      margin: 0;
      padding: 10px 15px;
    }

    .box-title {
      color: white;
      text-align: center;
      display: block !important;
    }

    .btn:hover {
      transition: all .2s linear;
    }

    .content-header {
      text-align: right;
      margin-right: 15px;
      overflow: hidden;
    }

    .content-header .btn-1 {
      float: right;
    }

    .content-header .btn-2 {
      float: left;
      margin-left: 15px;
    }

    .input-group {
      text-align: center;
    }
    
    .inputs-btn {
      width: 100%;
    }

    .save-btn {
      margin: 5px;
      background-color: #3a539b !important;
    }

    .save-btn:hover {
      background-color: #3a539b !important;
    }

    .clear-btn {
      margin: 5px;
    }

    .btn:hover {
      transition: all .2s linear;
    }

    .cat-list {
      background-color: #3a539b;
      padding: 20px 10px !important;
      border-bottom: 1px solid rgba(255, 255, 255, .1);
    }

    .cat-list h2 {
      margin: 0;
      padding: 0;
      font-size: 12px;
      letter-spacing: 2px;
      color: white;
      text-align: center;
      text-transform: uppercase;
      color: #fff;
    }

    .cat-btn {
      text-align: left;
      color: #fff !important;
      font-size: 11.5px;
      letter-spacing: 1px;
      padding-left: 25px !important;
    }

    .cat-btn:hover {
      background-color: #3a539b;
      color: #fff;
    }

    .form-group-inputs {
      text-align: center;
      color: #fff;
      margin: 15px auto 0 auto;
      width: 90% !important;
      font-size: 13px;
    }

    input[type="text"] {
      font-size: 13px;
    }

    .save-btn {
    margin: 5px;
    background-color: #3a539b !important;
    }
    
    .add-new-user-modal {
    }
  
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body>
  <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
     
            <!-- Navbar Right Menu -->
            <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <form id = "formE" method="post" action="profile_update.php" onsubmit="return myFunction()">
            <div class="cat-list">
              <h2> Update account </h2>
            </div>
            <div class="form-group form-group-inputs">
                    <label for="date">Full Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $row['name'];?>" name="name" placeholder="Full Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  <div class="form-group form-group-inputs">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $row['username'];?>" name="username" placeholder="Username" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  <div class="form-group form-group-inputs">
                    <label for="date">Change Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="password" name="password" placeholder="Type new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
				  <div class="form-group form-group-inputs">
                    <label for="date">Confirm New Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="cfmPassword" name="newpassword" placeholder="Reenter new password">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
					<div class="form-group form-group-inputs">
                    <label for="date">Enter Old Password to confirm changes</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control pull-right" id="date" name="passwordold" placeholder="Type old password" required>
                    </div><!-- /.input group -->
					
                  </div><!-- /.form group -->
				  
                  <div class="form-group form-group-inputs">
                    <div class="input-group inputs-btn">
                      <input class = "btn btn-primary submit-btn save-btn" type="submit" value="Submit">
					            <button type="reset" class="btn btn-danger clear-btn" id="daterange-btn" value="reset">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
          </form>	
        </section>
        <!-- /.sidebar -->
      </aside>

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-md btn-primary btn-1" href="home.php">Back</a>
              <a class="btn btn-md btn-success btn-2" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;">Add new user <i class="glyphicon glyphicon-plus text-white"></i></a>
            </h1>
          </section>
<?php
		    $id=$_SESSION['id'];
		      $query=mysqli_query($con,"select * from user where user_id='$id'")or die(mysqli_error());
				$row=mysqli_fetch_array($query);
		  ?>	
          <!-- Main content -->
          <section class="content">
            <div class="col-sm-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Account list</h3>
                </div><!-- /.box-header -->
                <div class = "x-panel">
						 <table id="datatable" class="table table-striped table-bordered table-responsive">
							 <thead>
								<tr>
                  <th>Branch name</th>
									<th>Fullname</th>
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
                  <td><?php echo $row['branch_name'];?></td>
									<td><?php echo $row['name'];?></td>
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
 
            </div><!-- /.col -->
			
			
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

        <!-- MODAL --->
        <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content" style="height:auto;">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Add New User</h4>
              </div>
            <div class="modal-body">
              <form action="add_user.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control" name="username" required="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Password</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control" name="name" required="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                 
                  <div class="form-group">
                  <div class="form-group">
                    <label for="date">Fullname</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control" name="name" required="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <input type="hidden" name="status" value="active">                
                    <label for="date">Branch</label>
                    <div class="input-group col-md-12">
                    <select name="branch_id" class="form-control">
						 								<option value="1">AHIRA APPLIANCE CENTER</option>	
														<option value="2">ASHER ALLIED MARKETING</option>	
														<option value="3">SINGER</option>	
														<option value="4">GOLDEN ARROW</option>	
														<option value="5">123</option>								 
						         </select>
                          <span class="fa form-control-feedback right" aria-hidden="true"></span>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Role</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" name="prod_name" id="prod_id" required>
                        <?php include('../dist/includes/dbcon.php');
                          $query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
                          while($row=mysqli_fetch_array($query2)){?>
                        <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->   
                  <div class="form-group">
                    <div class="input-group inputs-btn">
                      <button type="submit" class="btn btn-primary save-btn" id="daterange-btn" name="">
                        Save
                      </button>
					            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div><!-- /.form group -->
				        </form>	
            </div>
        </div><!--end of modal-dialog-->
      </div>
     <!--end of modal-->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
	<script>
function myFunction() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("cfmPassword").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("password").style.borderColor = "#E34234";
        document.getElementById("cfmPassword").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
    }
    return ok;
}
	</script>
  </body>
</html>
