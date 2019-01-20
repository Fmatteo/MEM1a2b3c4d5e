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

    body {
      background-color: #ecf0f5;
    }

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

    .form-horizontal .control-label {
      text-align: left;
    }

    .col-md-8-form-wrapper {
      overflow: scroll;
      height: 450px;
      padding: 0;
    }

    .tab-content {
      height: 675px;
    }

    .form-group-wrapper {
      display: flex;
      min-width: 100%;
    }

    .form-group-box {
      width: 20%;
      margin: 5px;
    }
     
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body>
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



          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-md btn-primary" href="home.php">Back</a>
            </h1>
          </section>

          <!-- Main content -->
          <section class="content">

                <div class="col-sm-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class=""><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Add new customer</a></li>
               <!--    <li class=""><a href="#cash" data-toggle="tab">Add item</a></li> -->
                  <li class=""><a href="#payments" data-toggle="tab" aria-expanded="false" style="display: none;">Payments</a></li>
                </ul>
                <div class="tab-content">
                  <!-- Font Awesome Icons -->
                  
              <div class="tab-pane active" id="fa-icons">
                <div class="row">
                  <div class="col-md-7">
                    <div class="box" style="border-top: none;">
                    <div class="box-body">
                    <!-- Date range -->
                      <form method="post" action="customer_add.php" enctype="multipart/form-data" class="form-horizontal">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="date" class="col-sm-4 control-label">Last Name</label>
                            <div class="input-group col-sm-8">
                              <input type="text" class="form-control pull-right" id="date" name="last" placeholder="Customer Last Name" required>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>
                        
                        <div class="col-md-8">  
                          <div class="form-group">
                            <label for="date" class="col-sm-4 control-label">First Name</label>
                            <div class="input-group col-md-8">
                              <input type="text" class="form-control pull-right" id="date" name="first" placeholder="Customer First Name">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>

                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="date" class="col-sm-4 control-label">Contact #</label>
                            <div class="input-group col-md-8">  
                              <input type="text" class="form-control pull-right" id="date" name="contact" placeholder="Contact Number">
                            </div>
                          </div>  
                        </div>
                              
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="date" class="col-sm-4 control-label">Address</label>   
                            <div class="input-group col-md-8">
                              <textarea class="form-control pull-right" id="date" name="address" placeholder="Complete Address"></textarea>
                            </div>
                          </div>
                        </div>     

                        <div class="col-md-8">
                          <div class="col-md-10">
                            <button class="btn btn-lg btn-primary pull-right" id="daterange-btn" name="">Save</button>
                           </div>  
                        </div>  
                  </form> 

                
        
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>

              <div class="col-md-4">
              <div class="box" style="border-top: none;">
                <div class="box-body">
                <form method="post" action="cash_transaction.php" enctype="multipart/form-data">
  
                  <div class="form-group">
                    <label for="date">Search Customer Name</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" style="width: 100%;" name="cid" required>
                      <?php
                       include('../dist/includes/dbcon.php');
                        $query2=mysqli_query($con,"select * from customer where branch_id='$branch' order by cust_last, cust_first")or die(mysqli_error());
                          while($row2=mysqli_fetch_array($query2)){
                      ?>
            <option value="<?php echo $row2['cust_id'];?>"><?php echo $row2['cust_last'].", ".$row2['cust_first'];?></option>
          <?php }?>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
      
                  
                  <div class="form-group">
                    <div class="input-group col-md-12">
                      <button class="btn btn-lg btn-primary pull-right" id="daterange-btn" name="">
                        Search
                      </button>
           
                    </div>
                  </div><!-- /.form group -->
        </form> 
        
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
     
                  </div><!-- /#fa-icons -->
                  </div>
                  <!--------------------------------------------------------------------------------------------------------- TABLE ACTIVE END -->
                  <div class="tab-pane" id="cash"> 
                  <!---------------------------------------------------------------------------------------------------------- 2nd tab -->
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="box" style="border-top: none;">
                      <div class="box-body">
                      <!-- Date range -->
                      <div class="col-md-4"> <!-- ADDITIONAL DIV -->
                      <form method="post" action="transaction_add.php">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="date" style="display: block">Product Name</label>	 
                              <select class="form-control select2" name="prod_name" tabindex="1" style="width: 90%;" autofocus required>
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
                        <div class=" col-md-12">
                          <div class="form-group">
                            <label for="date">Name of customer</label>
                            <div class="input-group">
                              <input type="text" class="form-control pull-right" id="date" name="qty" placeholder="Name of customer" tabindex="2" required>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>
                        <div class=" col-md-12">
                          <div class="form-group">
                            <label for="date">Quantity</label>
                            <div class="input-group">
                              <input type="number" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" tabindex="2" value="1"  required>
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>
                        <div class=" col-md-12">
                          <div class="form-group">
                            <label for="date">Selling Price</label>
                            <div class="input-group">
                              <input type="number" class="form-control pull-right" id="price" name="price" placeholder="Selling Price">
                            </div><!-- /.input group -->
                          </div><!-- /.form group -->
                        </div>
                        <div class="col-md-12"> <!------------------------- MODE OF PAYMENT START ------------------------------------>
                            <div class="form-group">
                            <label for="date" style="display: block">Mode of payment</label>	 
                              <select class="form-control select2" name="prod_name" tabindex="1" style="width: 90%;" autofocus required>
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
                        </div> <!--------------------------------------------- MODE OF PAYMENT END ---------------------------------->
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="date"></label>
                            <div class="input-group">
                              <button class="btn btn-lg btn-success" type="submit" tabindex="3" name="addtocart">Add</button>
                            </div>
                          </div>
                        </form>	
                        </div> <!-- ADDITIONAL DIV END -->
					            </div>
                  </div>
                  <div class="col-md-8 col-md-8-form-wrapper"> <!-- COL 6 START -->

        		<div class="col-md-12" style="padding: 0;">
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
        </div> <!-- COL 6 END -->
				</div>	
               
                  
                  
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-md-12" style="padding: 0;">
              <div class="box box-primary">
               
                <div class="box-body">
                  <!-- Date range -->
          <form method="post" name="autoSumForm" action="sales_add.php">
				  <div class="row">
					 <div class="col-md-12">
           <div class="form-group-wrapper"> <!-- FORM GROUP WRAPPER -->
           <div class="form-group-box">
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
			  
						<?php $total_profit = $grand - $base_total;?>
            </div>
            </div>
            <div class="form-group-box">
						  <div class="form-group">
							<label for="date">Total Profit</label>
							
								<input type="text" class="form-control text-right" id="profit" name="profit" value="<?php echo $total_profit;?>" tabindex="6"  onFocus="" onBlur="" readonly>
						  </div><!-- /.form group -->
              </div>
						  
						  
						  <div class="form-group" style="display: none">
							<label for="date">Discount</label>
							
								<input type="text" class="form-control text-right" id="discount" name="discount" value="0" tabindex="6" placeholder="Discount (Php)" onFocus="startCalc();" onBlur="stopCalc();" readonly>
							<input type="hidden" class="form-control text-right" id="cid" name="cid" value="<?php echo $cid;?>">
						  </div><!-- /.form group -->
              <div class="form-group-box">
						  <div class="form-group">
							<label for="date">Amount Due</label>
							
								<input type="text" style="text-align:right" class="form-control" id="amount_due" name="amount_due" placeholder="Amount Due" value="<?php echo number_format($grand,2);?>" readonly>
							
						  </div><!-- /.form group -->
              </div>
              
              <div class="form-group-box">
              <div class="form-group" id="tendered">
                <label for="date">Cash Tendered</label><br>
                <input type="text" style="text-align:right" class="form-control" onFocus="startCalc();" onBlur="stopCalc();"  id="cash" name="tendered" placeholder="Cash Tendered" required>
              </div><!-- /.form group -->
              </div>
              <div class="form-group-box">
              <div class="form-group" id="change">
                <label for="date">Change</label><br>
                <input type="text" style="text-align:right" class="form-control" id="changed" name="change" placeholder="Change">
              </div><!-- /.form group -->
              </div>
              </div> <!-- FORM GROUP WRAPPER END -->
					</div>
					
				</div>	

                    <div style="text-align: center;width: 100%;">
                      <button class="btn btn-lg btn-primary" id="daterange-btn" name="cash" type="submit"  tabindex="7">
                        Complete Sales
                      </button>
					            <button class="btn btn-lg btn-danger" id="daterange-btn" type="reset"  tabindex="8">
                        <a href="cancel.php" style="color:white;">Cancel Sale</a>
                      </button>
                    </div>
              
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
			
			
 


                  </div><!-- /#fa-icons -->
                  </div><!-- /.row -->
                  <!---------------------------------------------------------------------------------------------------------- 2nd tab end -->
                  <!-- glyphicons-->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div>

          <!------------------------------------------------------------------------------------------------------ SECTION CONTENT END -->
            <div class="row">
        
          
            
            

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
