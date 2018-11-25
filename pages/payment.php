<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer Payment | <?php include('../dist/includes/title.php');?></title>
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
  
}
      img.profile_pic {
    width: 152px;
    height: 125px;
    border: 5px solid #ccc;
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
      background-image: linear-gradient(to left, rgba(232,76,61,1) , rgba(193,57,43,1));
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
      background-image: linear-gradient(to right, rgba(232,76,61,1) , rgba(193,57,43,1));
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

    .form-group {
      margin-top: 15px;
    }

    .btn:hover {
      transition: all .2s linear;
    }

    .nav-tabs-custom>.nav-tabs>li.active {
      border-top-color: #dd4b39;
    }

    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body>
    <div class="wrapper">
      <?php include('../dist/includes/header.php');
      include('../dist/includes/dbcon.php');
      ?>
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
                            <a href="category.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Company Name
                            </a>
                          </li><!-- end notification -->
                          <li class="nav-txt"><!-- start notification -->
                            <a href="customer.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Customer
                            </a>
                          </li><!-- end notification -->
                          <li class="nav-txt"><!-- start notification -->
                            <a href="creditor.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Credit Applicants
                            </a>
                          </li><!-- end notification -->
              <li class="nav-txt"><!-- start notification -->
                            <a href="product.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-cutlery text-white"></i> Product
                            </a>
                          </li><!-- end notification -->
             
              <li class="nav-txt"><!-- start notification -->
                            <a href="supplier.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-send text-white"></i> Distributor
                            </a>
                          </li><!-- end notification -->
                         
             <li><!-- start notification -->
                            <a href="expenses.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-user text-white"></i> Expenses
                            </a>
                          </li><!-- end notification -->

                        </ul>
                      </li>
                     
                    
                  </li>
    <li class="treeview">
      <a href="stockin.php" class="dropdown-toggle nav-txt">
                      <i class="glyphicon glyphicon-list text-white"></i> Stock in/out
                      
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
                         <a href="sales.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Sales
                            </a>
                          </li><!-- end notification -->
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
                          <li><!-- start notification -->
                         <a href="purchase_request.php" class="subnav-txt" style="display:none;">
                              <i class="glyphicon glyphicon-usd text-white"></i>Purchase Request
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

          <!-- Content Header (Page header) -->
          <?php 
           $cid=$_REQUEST['cid'];
           $sid=$_REQUEST['sid'];
           $balance = $_REQUEST['balance'];
          ?>
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-danger" href="account_summary.php?cid=<?php echo $cid;?>">Back</a>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Customer</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-4">
              <div class="box box-danger">
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="" enctype="multipart/form-data">
		  <?php
        
		      $query=mysqli_query($con,"select * from customer where cust_id='$cid'")or die(mysqli_error());
			       $row=mysqli_fetch_array($query);
		  ?>	
		    <img class = "profile_pic" src = "../dist/uploads/<?php echo $row['cust_pic'];?>">
                  <div class="form-group">
                    <label for="date">Customer Name</label>
                    <div class="input-group col-md-12">
                      <h3><?php echo $row['cust_last'].", ".$row['cust_first'];?></h3>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
		  
                  <div class="form-group">
                    <label for="date">Address</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['cust_address'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Contact</label>
                    <div class="input-group col-md-12">
                      <?php echo $row['cust_contact'];?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Balance</label>
                    <div class="input-group col-md-12">
                      <h3><?php echo number_format($balance,2);?></h3>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                 
                 <a href="#" data-target="#teacherreg" data-toggle="modal" class="btn btn-block btn-success"><i class="glyphicon glyphicon-plus-sign text-white" style="margin-right:5px;"></i>Add Payment</a>
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-8">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class=""><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Credit History</a></li>
                </ul>
                <div class="tab-content">
                  <!-- Font Awesome Icons -->
                  
                  <div class="tab-pane active" id="fa-icons">
                                     <table id="" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Due Date</th>
                        <th>Amount</th>
                        <th>Interest</th>
                        <th>Remaining</th>
                        <th></th>
                        <th>Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
   // $cid=$_REQUEST['cid'];
    $query1=mysqli_query($con,"select * from payment where sales_id='$sid' order by payment_for")or die(mysqli_error($con));
    while($row1=mysqli_fetch_array($query1)){

      $payment_date=date("M d, Y",strtotime($row1['payment_date']));
      $remainder = $row1['remaining'];
    
     ?>
                      <tr>
                        <td><?php echo date("M d, Y",strtotime($row1['payment_for']));?></td>
                       <td><?php echo number_format($row1['due'],2);?></td>
                        <td><?php 
                        echo number_format($row1['interest'],2);
                        ?></td>
                        <td><?php 
                        echo number_format($row1['remaining'],2);
                        ?></td>
                        <td></td>
                        <td><?php 
                        if ($row1['status']=='paid') 
                        echo "<span class='badge bg-green'>paid</span>";
                        elseif($row1['status']=='partially paid'){
                          echo "<span class='badge bg-orange'>partially paid</span>"; 
                         } 
                         else
                          echo "<span class='badge bg-red'>unpaid</span>";
                        ?>

                      </td>
                        
                      </tr>
    <?php 


  }?>       
                      </tbody>
                  
                  </table>
 
                  </div><!-- /#fa-icons -->

                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div>
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
<?php
   // $cid=$_REQUEST['cid'];
    $query4=mysqli_query($con,"select * from term natural join sales where cust_id='$cid' order by term_id desc limit 0,1")or die(mysqli_error($con));
      $row1=mysqli_fetch_array($query4);    
?>    
<div id="teacherreg" class="modal fade in primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
		  <div class="modal-content">
                      <div class="modal-header box-header" style="color:white;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add Payment</h4>
                      </div>
                      <div class="modal-body">
			  <form class="form-horizontal" method="post" action="payment_add.php" enctype='multipart/form-data'>
                             <input type="hidden" class="form-control" id="tlast" name="cid" value="<?php echo $cid;?>">  
                               <input type="hidden" class="form-control" id="tlast" name="sid" value="<?php echo $sid;?>">  
                            
                             <div class="form-group">
                        				  <label class="control-label col-lg-3" for="tlast">Amount</label>
                        				  <div class="col-lg-8">
                                    <input type="hidden" class="form-control" id="tlast" name="balance" value="<?php echo $remainder;?>">  
                                     <input type="text" class="form-control" id="tlast" name="amount" placeholder="Amount" required>  
				                           </div>
                             </div> 
                             <div class="form-group">
                                  <label class="control-label col-lg-3" for="tlast">Rebate</label>
                                  <div class="col-lg-8">
                                     <input type="text" class="form-control" id="tlast" name="rebate" placeholder="Rebate per month">  
                                   </div>
                             </div> 
                            
                      </div>       
                      <!--end of modal body-->
                      <div class="modal-footer">
			<button type="submit" name="save" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                      </div>
               </div>
               
               <!--end of modal content-->
                </form>
           </div>
        </div>   
<!--end of teacherreg modal-->
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
      $(function () {
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
    </script>
  </body>
</html>
