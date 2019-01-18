<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
$id = $_SESSION['id'];

    $branch=$_SESSION['branch'];
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
          <form id = "formE" method="post" action="profile_update.php" onsubmit="">
            <div class="cat-list">
              <h2> Update account </h2>
            </div>
            <?php
              $query = "SELECT * FROM user WHERE user_id = '$id'";
              $sql = mysqli_query($con, $query);

              while ($row = mysqli_fetch_array($sql))
              {
                $name = $row['name'];
                $uname = $row['username']
            ?>
            <div class="form-group form-group-inputs">
                    <label for="date">Full Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $name; ?>" name="name" placeholder="Full Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
          <div class="form-group form-group-inputs">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" value="<?php echo $uname; ?>" name="username" placeholder="Username" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
            <?php }?>
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
          <?php    $query=mysqli_query($con,"select * from user left join branch on user.branch_id = branch.branch_id")or die(mysqli_error());
    while($row=mysqli_fetch_array($query)){ ?>
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
                                <?php }?>
                <?php   //   include 'update_user_modal.php';?>

               </tbody>               
             </table>
            </div>
 
            </div><!-- /.col -->
			       

<!-- EDIT MODAL START ------------------------------------------------------------------------------------------------->
       <div id = "update<?php echo $id;?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
           <div class="modal-dialog modal-md">
                      <div class="modal-content">

                        <div class="modal-header box-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2" style="color:white;">Edit User Details</h4>
                        </div>
                        <div class="modal-body">
                         <form method = "POST" action = "update_user.php"> 
               <input type="hidden" name="user_id" value="<?php echo $id;?>">
                <label>Full name</label>
                  <input type="text" name = "name" class="form-control" value = "<?php echo $row['name'];?>">
                  <br/>               
                <label>Username</label>
                  <input type="text" name = "username" class="form-control" value = "<?php echo $row['username'];?>">
                  <br/>
                <label>Password</label>
                  <input type="password" name = "password" class="form-control" placeholder="Enter to Change Password">
                  <br/>
                <label>Status</label>
                <select name = "status" class = "form-control">
                  <option value = "active">Active</option>
                  <option value = "inactive">Inactive</option>            
                </select>
                  <br/>
                <label>Branch Name</label>
                  <select name = "branch_id" class = "form-control">
                    <option value = "<?php echo $row['branch_id'];?>"><?php echo $row['branch_name'];?></option>
                    <option></option>
                    <?php 
                      include 'dbcon.php';                
                    $query4=mysqli_query($con,"select * from branch")or die(mysqli_error($con));
                    while ($row1=mysqli_fetch_array($query4)){
                      $id3=$row1['branch_id'];
                    ?>
                    <option value = "<?php echo $row1['branch_id'];?>"><?php echo $row1['branch_name'];?></option>
                    <?php } ?>
                    
                  </select>
                  <br/>
              <div style="text-align: center;">
                <button  name = "update" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
                        <div class="modal-footer">
                          
                        </div>
                      </div>
                    </div>
        </div>
<!--EDIT MODAL END ---------------------------------------------------------------------------------------------------->
            
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
              <form action="user_add.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Username</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control" name="username" value = "<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Password</label>
                    <div class="input-group col-md-12">
                      <input type="password" class="form-control" name="password" value = "<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" required="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                 
                  <div class="form-group">
                  <div class="form-group">
                    <label for="date">Fullname</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control" name="name" value = "<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" required="">
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <input type="hidden" name="status" value="active">                
                    <label for="date">Branch</label>
                    <div class="input-group col-md-12">
                    <select name="branch_id" class="form-control">
                      <?php 
                        $query = "SELECT * FROM branch";
                        $sql = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_array($sql))
                        {
                          $branch_id = $row['branch_id'];
                          $branch_name = $row['branch_name'];
                      ?>
                            <option value="<?php echo $branch_id; ?>"><?php echo $branch_name; ?></option>      
                      <?php }?>          
                     </select>
                          <span class="fa form-control-feedback right" aria-hidden="true"></span>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Role</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" name="role" id="prod_id" required>
                        <option value="ADMIN">ADMIN</option>
                        <option value="CASHIER">CASHIER</option>
                        <option value="ENCODER">ENCODER</option>
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
