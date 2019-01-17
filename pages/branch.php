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
    <title>branch Name | <?php include('../dist/includes/title.php');?></title>
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
    }

    .input-group {
      text-align: center;
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

    .form-group {
      text-align: center;
      color: #fff;
      margin: 15px auto 0 auto;
      width: 90% !important;
      font-size: 13px;
    }

    input[type="text"] {
      font-size: 13px;
    }

    .stock-btn {
      margin: 5px;
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
          <form method="post" action="branch_add.php" enctype="multipart/form-data">
            <div class="cat-list">
              <h2> Add branch </h2>
            </div>
            <div class="form-group">
              <label for="date">Branch name</label>
              <div class="input-group col-md-12">
                <input type="text" class="form-control pull-center" id="date" name="branch_name" placeholder="Branch Name" required>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
              <label for="date">Address</label>
              <div class="input-group col-md-12">
                <input type="text" class="form-control pull-center" id="date" name="branch_address" placeholder="Branch Address" required>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
              <label for="date">Contact #</label>
              <div class="input-group col-md-12">
                <input type="text" class="form-control pull-center" id="date" name="branch_contact" placeholder="Branch Contact" required>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
              <div class="input-group">
                <button class="btn btn-primary save-btn" id="daterange-btn" name="">
                  Save
                </button>
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
              <a class="btn btn-md btn-primary" href="home.php">Back</a>
            </h1>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="col-sm-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">branch Name List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Branch name</th>
                              <th>Address</th>
                              <th>Contact number</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $query=mysqli_query($con,"select * from branch order by branch_name")or die(mysqli_error());
                                while($row=mysqli_fetch_array($query)){?>
                                <tr>
                              <td><?php echo $row['branch_name'];?></td>
                              <td><?php echo $row['branch_address'];?></td>
                              <td><?php echo $row['branch_contact'];?></td>   
                                                      <td>
        <a href="#updateordinance<?php echo $row['branch_id'];?>" data-target="#updateordinance<?php echo $row['branch_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
        
            </td>                           
                            </tr>   
<div id="updateordinance<?php echo $row['branch_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Branch Name Details</h4>
              </div>
               <form class="form-horizontal" method="post" action="branch_update.php" enctype='multipart/form-data'>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['branch_id'];?>" required>  
              <div class="modal-body row">
       
        <div class="form-group">
          <label class="control-label col-lg-12 text-black text-left" for="name">Branch Name</label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['branch_name'];?>" required style="margin-bottom: 25px !important">  
          </div>
        </div> 
         <div class="form-group">
          <label class="control-label col-lg-12 text-black text-left" for="address">Branch Address</label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['branch_address'];?>" required style="margin-bottom: 25px !important"> 
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-12 text-black text-left" for="contact">Branch Contact</label>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['branch_contact'];?>" required>  
          </div>
        </div> 
  
  
          <div class="history">
          </div>
          </div>
              <div class="modal-footer" style="margin-top:20px">
                <button class="btn btn-danger deleteButton" value="<?php echo $row['branch_name'];?>">Delete</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

              </div>

        </form>
      
      
        </div><!--end of modal-dialog-->
 </div> </div>
                            <?php }?>					  
                          </tbody>
                          <tfoot>
                            <tr>
                            <tr>
                              <th>Branch name</th>
                              <th>Address</th>
                              <th>Contact number</th>
                              <th>Action</th>
                            </tr>					  
                          </tfoot>
                        </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

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
       <style>
	table tr td{
		border:1px solid #ddd;
		padding:8px;
		
	}
	table{
		margin-bottom:40px;
	}
	</style> 
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

        $(".deleteButton").click(function(e) {
            e.preventDefault();
			var confirmation = confirm("are you sure you want to remove the item?");

			if (confirmation) {
              $.ajax({
                  type: "POST",
                  url: "ajax.php",
                  data: { 
                      branch_name: $(this).val(), // < note use of 'this' here
                      process: 'branch'
                  },
                  success: function(result) {
                      if(result == ""){ 
                        if(alert(result)){}
                            else    window.location.reload(); 
                        
                      }else{
                        if(alert(result)){}
                            else    window.location.reload(); 
                      }                    
                      
                  },
                  error: function(result) {
                      alert('error');
                  }
              }); // ajax 
			}
		});
			

			$(".historyButton").click(function(e) {
              e.preventDefault();
              $.ajax({
                  type: "POST",
                  url: "ajax.php",
                  data: { 
                      cat_id: $(this).val(), // < note use of 'this' here
                      process: 'cat_history'
                  },
                  success: function(result) {
                      if(result == ""){ 
                          alert("bad")                        
                      }else{
                          $(".history").html(result);
                      }
                      
                  },
                  error: function(result) {
                      alert('error');
                  }
              });
        }); // ajax 		
			
		  $(".glyphicon-edit").click(function(){
			  $(".history").html("");
		  })

      });
    </script>
  </body>
</html>
