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
    <title>Home | <?php include('../dist/includes/title.php');?></title>
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
    <script src="../dist/js/jquery.min.js"></script>
    <script language="JavaScript"><!--
javascript:window.history.forward(1);
//--></script>
<style>
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

    .btn:hover {
      transition: all .2s linear;
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
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-danger" href="home.php">Back</a>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Product</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-9">
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Sales Transaction</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="transaction_add.php">
				  <div class="row" style="min-height:400px">
					
					 <div class="col-md-6">
						  <div class="form-group">
							<label for="date">Product Name</label>
							 
								<select class="form-control select2" name="prod_name" tabindex="1" autofocus required>
								<?php
                  $branch=$_SESSION['branch'];
                  $cid=$_REQUEST['cid'];
								  include('../dist/includes/dbcon.php');
									 $query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
									    while($row=mysqli_fetch_array($query2)){
								?>
										<option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name']." Available(".$row['prod_qty'].")";?></option>
								  <?php }?>
								</select>
						    <input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>   
						  </div><!-- /.form group -->
					</div>
					<div class=" col-md-2">
						<div class="form-group">
							<label for="date">Quantity</label>
							<div class="input-group">
							  <input type="number" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" tabindex="2" value="1"  required>
							</div><!-- /.input group -->
						</div><!-- /.form group -->
					 </div>
           <div class=" col-md-2">
            <div class="form-group">
              <label for="date">Selling Price</label>
              <div class="input-group">
                <input type="number" class="form-control pull-right" id="price" name="price" placeholder="Selling Price">
              </div><!-- /.input group -->
            </div><!-- /.form group -->
           </div> 
					<div class="col-md-2">
						<div class="form-group">
							<label for="date"></label>
							<div class="input-group">
								<button class="btn btn-lg btn-success" type="submit" tabindex="3" name="addtocart">+</button>
							</div>
						</div>	
					</form>	
					</div>
					<div class="col-md-12">
<?php 
$base_total = 0;
$total_profit = 0;
$queryb=mysqli_query($con,"select balance from customer where cust_id='$cid'")or die(mysqli_error());
     $rowb=mysqli_fetch_array($queryb);
        $balance=$rowb['balance'];

        if ($balance>0) $disabled="disabled=true";else{$disabled="";}
?>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
						       
                        <th>Product Name</th>
						            <th>Selling Price</th>
                        <th>Total Amount</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		
		$query=mysqli_query($con,"select * from temp_trans natural join product where branch_id='$branch'")or die(mysqli_error());
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				$id=$row['temp_trans_id'];
				$total= $row['qty']*$row['price'];
				$grand=$grand+$total;
				$base_price = $row['base_price'] * $row['qty'];
				$base_total = $base_total + $base_price;						
?>
                      <tr >
						<td><?php echo $row['qty'];?></td>
                        <td class="record"><?php echo $row['prod_name'];?></td>
						<td><?php echo number_format($row['price'],2);?></td>
						<td><?php echo number_format($total,2);?></td>
                        <td>
							
							<a href="#updateordinance<?php echo $row['temp_trans_id'];?>" data-target="#updateordinance<?php echo $row['temp_trans_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

              <a href="#delete<?php echo $row['temp_trans_id'];?>" data-target="#delete<?php echo $row['temp_trans_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
              
						</td>
                      </tr>
					  <div id="updateordinance<?php echo $row['temp_trans_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	
	
	
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Sales Details</h4>
              </div>
              <div class="modal-body">
			 <!--  <form class="form-horizontal" method="post" action="transaction_update.php" enctype='multipart/form-data'> -->
       <form class="form-horizontal" method="post" action="transaction_update.php" enctype='multipart/form-data'>
					<input type="hidden" class="form-control" name="tran" value="purchase">  	
					<input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>  	
					<input type="hidden" class="form-control" id="price" name="id" value="<?php echo $row['temp_trans_id'];?>" required>  
				<div class="form-group">
					<label class="control-label col-lg-3" for="price">Qty</label>
					<div class="col-lg-9">
					  <input type="text" class="form-control" id="price" name="qty" value="<?php echo $row['qty'];?>" required>  
					</div>
				</div>
				
              </div><br>
              <div class="modal-footer">
		            <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->  
<div id="delete<?php echo $row['temp_trans_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Delete Item</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="transaction_del.php" enctype='multipart/form-data'>
          <input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>   
          <input type="hidden" class="form-control" id="price" name="id" value="<?php echo $row['temp_trans_id'];?>" required>  
        <p>Are you sure you want to remove <?php echo $row['prod_name'];?>?</p>
        
              </div><br>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </form>
            </div>
      
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->  
<?php }?>					  
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->

				</div>	
               
                  
                  
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-md-3">
              <div class="box box-primary">
               
                <div class="box-body">
                  <!-- Date range -->
          <form method="post" name="autoSumForm" action="sales_add.php">
				  <div class="row">
					 <div class="col-md-12">
						  
						  <div class="form-group">
							<label for="date">Total</label>
							
								<input type="text" style="text-align:right" class="form-control" id="total" name="total" placeholder="Total" 
								value="<?php echo $grand;?>" onFocus="startCalc();" onBlur="stopCalc();"  tabindex="5" readonly>
           

                <!--CREDIT INPUT 
            <form method="post" name="autoSumForm" action="credit_add.php">
          <div class="row">
           <div class="col-md-12">
              
              <div class="form-group">
              <label for="date">Total</label>
                <input type="hidden" class="form-control" name="cid" value="<?php echo $cid;?>" required>    
                <input type="text" style="text-align:right" class="form-control" id="total" name="total" placeholder="Total" 
                value="<?php echo number_format($grand,2);?>" tabindex="5" readonly>
           	  </div> /.form group -->
			  
						<?php $total_profit = $grand - $base_total;
							
						?>
						  <div class="form-group">
							<label for="date">Total Profit</label>
							
								<input type="text" class="form-control text-right" id="profit" name="profit" value="<?php echo $total_profit;?>" tabindex="6"  onFocus="" onBlur="" readonly>
						  </div><!-- /.form group -->
						  
						  
						  <div class="form-group" style="display: none">
							<label for="date">Discount</label>
							
								<input type="text" class="form-control text-right" id="discount" name="discount" value="0" tabindex="6" placeholder="Discount (Php)" onFocus="startCalc();" onBlur="stopCalc();" readonly>
							<input type="hidden" class="form-control text-right" id="cid" name="cid" value="<?php echo $cid;?>">
						  </div><!-- /.form group -->
						  <div class="form-group">
							<label for="date">Amount Due</label>
							
								<input type="text" style="text-align:right" class="form-control" id="amount_due" name="amount_due" placeholder="Amount Due" value="<?php echo number_format($grand,2);?>" readonly>
							
						  </div><!-- /.form group -->    

              <div class="form-group">
                <label for="modeofpayment">Mode of payment</label>
                <select class="form-control" id="modeofpayment" name="modeofpayment">
                  <option value="cash" selected>Cash</option>
                  <option value="homecredit">Home Credit</option>
                  <option value="check">Check</option>                  
                </select>
              </div>
              <div class="form-group" id="tendered">
                <label for="date">Cash Tendered</label><br>
                <input type="text" style="text-align:right" class="form-control" onFocus="startCalc();" onBlur="stopCalc();"  id="cash" name="tendered" placeholder="Cash Tendered" required>
              </div><!-- /.form group -->
              <div class="form-group" id="change">
                <label for="date">Change</label><br>
                <input type="text" style="text-align:right" class="form-control" id="changed" name="change" placeholder="Change">
              </div><!-- /.form group -->
					</div>
					
					

				</div>	
                      <button class="btn btn-lg btn-block btn-primary" id="daterange-btn" name="cash" type="submit"  tabindex="7">
                        Complete Sales
                      </button>


					            <button class="btn btn-lg btn-block btn-danger" id="daterange-btn" type="reset"  tabindex="8">
                        <a href="cancel.php" style="color:white;">Cancel Sale</a>
                      </button>
              
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
	<script>
  
    
      $("#cash").click(function(){
          $("#tendered").show('slow');
          $("#change").show('slow');
      });

    $(function() {

      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
	$.ajax({
	type: "GET",
	url: "temp_trans_del.php",
	data: dataString,
	success: function(){
		
	      }
	  });
	  
	  $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	  .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    
</script>

<!--sample only -->
<script>
  
  
  
    $("#credit").click(function(){
        $("#tendered").hide('slow');
        $("#change").hide('slow');
      });

      $("#cash").click(function(){
          $("#tendered").show('slow');
          $("#change").show('slow');
      });

    $(function() {

      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
  $.ajax({
  type: "GET",
  url: "temp_trans_del.php",
  data: dataString,
  success: function(){
    
        }
    });
    
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>




	
	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
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
          "ordering": true,x`
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
