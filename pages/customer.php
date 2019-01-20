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
    <title>Customer | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/sample1.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <style>
::-webkit-scrollbar{
  width: 12px;
}
::-webkit-scrollbar-thumb{
  background:linear-gradient(darkred,white);
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
      color: #ff0000;
    }

    .nav-txt:hover {
      background-color: #7d0000;
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
      background-color: #7d0000;
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
    .box.box-danger {
    border-top-color: #dd4b39;
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
          <ul class="sidebar-menu">  
            <li class="treeview">
              <a href="#" class="dropdown-toggle nav-txt" data-toggle="dropdown">
                <i class="glyphicon glyphicon-refresh text-white"></i> Reorder
                  <span class="label label-success">
                    <?php 
                    $query=mysqli_query($con,"select COUNT(*) as count from product where prod_qty<=reorder and branch_id='$branch'")or die(mysqli_error());
                    $row=mysqli_fetch_array($query);
                    echo $row['count'];
                    ?>  
                  </span>
              </a>  
              <li class="treeview">
                <a href="#" class="dropdown-toggle nav-txt" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-wrench text-white"></i> Maintenance
                </a>
              <ul class="treeview-menu">
                <li>
                          <li><!-- start notification -->
                            <a href="customer.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Customer
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="category.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Company Name
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="category2.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Category
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="damaged_item.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Damaged Item
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="branch.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Branch
                            </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                  </li>
    <li class="treeview">
      <a href="stockin.php" class="dropdown-toggle nav-txt">
                      <i class="glyphicon glyphicon-list text-white"></i> Product in/out
                      
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                      </li>
                     
                    </ul>
                  </li>
                    <li class="treeview">
                      <a href="#" class="dropdown-toggle nav-txt" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-stats text-white"></i> Report
                      </a>
                        <ul class="treeview-menu">
                          <li><!-- start notification -->
                            <a href="inventory.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-ok text-white"></i>Inventory
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                             <?php if ($role_permission == 'admin'){?>
                            <a href="sales.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Sales Non-gov
                            </a>

                          </li><!-- end notification -->
                          <li><!-- start notification -->
                             
                            <a href="salesgov.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Sales gov
                            </a>

                          </li><!-- end notification -->
                         <!--  <li>
                            <a href="purchase_request.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Purchase Request
                            </a>
                          </li> -->
                          <li><!-- start notification -->
                            <a href="reports_per_branch.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Reports per branch
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="overall_reports.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Overall reports
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="history_logs.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>History logs
                            </a>
                          </li><!-- end notification -->
                          <?php }?>
                          <li><!-- start notification -->
                            <a href="receivables.php" class="subnav-txt" style="display:none;">
                              <i class="glyphicon glyphicon-th-list text-white"></i>Account Receivables
                            </a>
                          </li><!-- end notification -->
                          <li><!-- start notification -->
                            <a href="income.php" class="subnav-txt" style="display:none;">
                              <i class="glyphicon glyphicon-th-list text-white"></i>Branch Income
                            </a>
                          </li><!-- end notification -->
                        </ul>
                    </li>
                    
    <li class="treeview">
      <a href="profile.php" class="dropdown-toggle nav-txt">
                      <i class="glyphicon glyphicon-cog text-white"></i>
                      <?php echo $_SESSION['name'];?>
                    </a>
                  </li>

    <li class="treeview">
       <a href="logout.php" class="dropdown-toggle nav-txt">
                      <i class="glyphicon glyphicon-off text-white"></i> Logout 
                    </a>
                  </li>       
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


          <!-- Main content -->
          <section class="content">
            <div class="row">
	          
			
            <div class="col-xs-12">
              <div class="box box-danger">
    
                <div class="box-header">
                  <h3 class="box-title">Customer List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
            						<th>Account #</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Address</th>
            						<th>Contact #</th>
                        <th>Action</th>
						
                      </tr>
                    </thead>
                    <tbody>
<?php
		$branch=$_SESSION['branch'];
		$query=mysqli_query($con,"select * from customer where branch_id='$branch'")or die(mysqli_error());
		$i=1;
		while($row=mysqli_fetch_array($query)){
		$cid=$row['cust_id'];
?>
                      <tr>
					    <td><?php echo $row['cust_id'];?></td>
                        <td><?php echo $row['cust_last'];?></td>
                        <td><?php echo $row['cust_first'];?></td>
                        <td><?php echo $row['cust_address'];?></td>
						<td><?php echo $row['cust_contact'];?></td>
                        <td>
				<a href="customer_account.php?id=<?php echo $cid; ?>"><i class="glyphicon glyphicon-share-alt text-green"></i></a>
				<a href="#updateordinance<?php echo $row['cust_id'];?>" data-target="#updateordinance<?php echo $row['cust_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
				
						</td>
                      </tr>
				<div id="updateordinance<?php echo $row['cust_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Customer Details</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="customer_update.php" enctype='multipart/form-data'>
                
				<div class="form-group">
					<label class="control-label col-lg-3" for="name">Last Name</label>
					<div class="col-lg-9">
						<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['cust_id'];?>" required>  
						<input type="text" class="form-control" id="name" name="last" value="<?php echo $row['cust_last'];?>" required>  
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3" for="name">First Name</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" id="name" name="first" value="<?php echo $row['cust_first'];?>" required>  
					</div>
				</div>				
				<div class="form-group">
					<label class="control-label col-lg-3" for="file">Address</label>
					<div class="col-lg-9">
					    <textarea class="form-control" id="name" name="address" required><?php echo $row['cust_address'];?></textarea>  
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-lg-3" for="price">Contact Number</label>
					<div class="col-lg-9">
					  <input type="text" class="form-control" id="price" name="contact" value="<?php echo $row['cust_contact'];?>" required>  
					</div>
				</div>
        <br>

              </div><br><br><br><hr>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Save changes</button>
              <button class="btn btn-danger deleteButton" value="<?php echo $row['cust_id'];?>">Delete</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->   	  
                 
<?php $i++;}?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Account #</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Address</th>
              						<th>Contact #</th>
                        <th>Action</th>
                      </tr>					  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
	 
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
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
      });
    </script>
     <script>
      /* $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
      */

      $(document).ready(function(){
              $(".deleteButton").click(function(e) {
              e.preventDefault();
			var confirmation = confirm("are you sure you want to remove the item?");

			if (confirmation) {
              $.ajax({
                  type: "POST",
                  url: "ajax.php",
                  data: { 
                      cust_id: $(this).val(), // < note use of 'this' here
                      process: 'customer'
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
              });
			}
        }); // ajax 

              $(".glyphicon-edit").click(function(){
                  $(".history").html("")
              })


              $(".historyButton").click(function(e) {
              e.preventDefault();
              $.ajax({
                  type: "POST",
                  url: "ajax.php",
                  data: { 
                      cust_id: $(this).val(), // < note use of 'this' here
                      process: 'cust_history'
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
      })
    </script>
  </body>
</html>
