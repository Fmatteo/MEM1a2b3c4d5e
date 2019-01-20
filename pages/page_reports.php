<?php include 'header.php';

$branch_id = $_GET['id'];

?>

<?php
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
$id = $_SESSION['id'];
$branch=$_SESSION['branch'];
$query_role=mysqli_query($con,"select * from user where user_id = '$id' ")or die(mysqli_error());
while($rowrole=mysqli_fetch_array($query_role)){ 
$role_permission = $rowrole['role'];
}
?>

<?php if ($role_permission == 'admin'){?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Company Name | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/sample1.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

    <link href="../admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="..admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="..admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="..admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="..admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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

    .forms {
      text-align: center;
      color: #fff;
      margin: 15px auto 0 auto;
      width: 90% !important;
      font-size: 13px;
    }

    input[type="text"] {
      font-size: 13px;
    }

    .date-wrapper {
      overflow: hidden;
    }

    .date-wrapper span {
      float: left;
      padding-top: 30px;
      padding-left: 15px;
      font-size: 15px;
      font-weight: 700;

    }

    .date-wrapper a {
      float: right;
      margin-right: 15px;
      margin-top: 15px;
    }

    ul a {
      text-decoration: none !important; 
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
                            <a href="sales.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Sales
                            </a>
                          </li><!-- end notification -->
                          <li style="display: none;"><!-- start notification -->
                            <a href="purchase_request.php" class="subnav-txt">
                              <i class="glyphicon glyphicon-usd text-white"></i>Purchase Request
                            </a>
                          </li><!-- end notification -->
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
          <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="box-header text-center" style="color: white; font-size: 18px">Reports</div> 

					<div class="x-panel">
						<div role="main">
								      
                  <?php          
      $branch=$_GET['id'];
      $query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());  
      $row=mysqli_fetch_array($query);
        
  ?>      
                  <h5><b><?php echo $row['branch_name'];?></b> </h5>  
                  <h6>Address: <?php echo $row['branch_address'];?></h6>
                  <h6>Contact #: <?php echo $row['branch_contact'];?></h6>
          <h5><b>Product Inventory as of today, <?php echo date("M d, Y h:i a");?></b></h5>
                  
				  <a class="btn btn-success btn-print" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Print</a>
				  

				  
				  
							<div class="row tile_count">
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<span class="count_top"><i class="fa fa-money"></i> Total Sales</span>
                <?php 
                $year1 = date("Y");
                $month = date("m");
                $branch_id = $_GET['id'];
                  $query = mysqli_query($con,"select SUM(payment) as total_payment from payment where MONTH(payment_date)='$month' and YEAR(payment_date)='$year1' and branch_id ='$branch_id' ") or die(mysqli_error($con));
                    $row=mysqli_fetch_array($query);
                      
                ?>
                <div class="count">
                  <?php echo $row['total_payment'];?>
                
                </div>
								<span class="count_bottom"><i class="green"></i>For the month of <?php echo date("M, Y");?>
                </div>
								
								<div class="col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<?php 
                $date = date("M. d, Y");
                $branch_id = $_GET['id'];
                  $query = mysqli_query($con,"select SUM(balance) as total_balance from customer where  branch_id ='$branch_id' ") or die(mysqli_error($con));
                    $row1=mysqli_fetch_array($query);
                      
                ?>
                <div class="count green"><?php echo $row1['total_balance'];?></div>
								<span class="count_bottom"><i class="green">Total Receivables as of</i> <?php echo $date;?></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<span class="count_top"><i class="fa fa-user"></i> Active Customers</span>
								<?php 
                  $query = mysqli_query($con,"select COUNT(*) as total_no_customer from customer where  branch_id ='$branch_id' AND balance !='0' ") or die(mysqli_error($con));
                    $row2=mysqli_fetch_array($query);
                ?>
                <div class="count"><?php echo $row2['total_no_customer'];?></div>
								<span class="count_bottom"><i class="red">as of today</i></span>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 tile_stats_count">
								<span class="count_top"><i class="fa fa-user"></i> Number products re-order</span>
								<?php 
                  $query = mysqli_query($con,"select COUNT(*) as total_no_reorder from product where  branch_id ='$branch_id' AND prod_qty <=reorder ") or die(mysqli_error($con));
                    $row3=mysqli_fetch_array($query);
                ?>
                <div class="count"><?php echo $row3['total_no_reorder'];?></div>
								<span class="count_bottom"><i class="green">as of today</i></span>
								</div>
							<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="x_panel">
										  <div class="x_title">
											<h2>Total Monthly Sales <small></small></h2>
											<ul class="nav navbar-right panel_toolbox">
											  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
											  </li>
											  <li class="dropdown">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
												<ul class="dropdown-menu" role="menu">
												  <li><a href="#">Settings 1</a>
												  </li>
												  <li><a href="#">Settings 2</a>
												  </li>
												</ul>
											  </li>
											  <li><a class="close-link"><i class="fa fa-close"></i></a>
											  </li>
											</ul>
											<div class="clearfix"></div>
										  </div>
										  <div class="x_content">
											<div id="graph"></div>
												<table id="example1" class="table table-bordered table-striped">
												<tbody><tr>
												<th>MONTH</th>
												<th class="text-right">SALES</th>
											</tr>
			
                    
                    </tbody>
                    <tbody>
                      <?php
  $_SESSION['branch']=$_GET['id'];
  $year=date("Y");
  $query=mysqli_query($con,"select *,SUM(payment) as payment,DATE_FORMAT(payment_date,'%b') as month from payment where YEAR(payment_date)='$year' and branch_id='$branch' group by MONTH(payment_date)")or die(mysqli_error($con));
      $total=0;
      while($row=mysqli_fetch_array($query)){
        $total=$total+$row['payment'];  
?>
            
      <tr>
                <th><?php echo$row['month'];?></th>
        <td class="text-right"><b><?php echo number_format($row['payment'],2);?></b></td>
      </tr>
  <?php }?> 
      <tr>
                <th><h2>TOTAL</h2></th>
        <th class="text-right"><h2><b><?php echo number_format($total,2);?></b></h2></td>
      </tr>
              </tbody>
                    <tfoot>
          
                  
       
        </tfoot>
       </table>
											
										  </div>
										</div>
							</div>
							</div>
					</div> 

					</div>								
				</div>
			</div>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
    <script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 25
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Sales'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'top',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data.php", function(json) {
			options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    <?php include 'datatable_script.php';?>
	  <?php include 'datatable_script.php';?>
    </script>
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
   
  </body>
</html>
<?php 
}else{
  echo "<script>document.location='home.php'</script>";  
}
?>