<?php session_start();
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
                          <li><!-- start notification -->
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
            <div class="col-sm-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Overall reports</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="date-wrapper"><span>Select Date</span><a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a></div>
                <form method="post" >
					<div class="form-group col-md-6">
						<label></label>
						<div class="input-group">
						  <div class="input-group-addon">
							  <i class="fa fa-calendar"></i>
						  </div>
						<select class="form-control select2" name="month" tabindex="1" autofocus required>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
								  
						</select>
					</div>
                <!-- /.input group -->
					</div>
					<div class="form-group col-md-5">
						<label></label>

						<div class="input-group">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						<select class="form-control select2" name="year" tabindex="1" required>
							<option>2017</option>
							<option>2018</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
							<option>2026</option>
							<option>2027</option>
							
								  
						</select>
					</div>
                <!-- /.input group -->
					</div>
              <!-- /.form group --><br>
					<button type="submit" class="btn btn-primary" name="display">Display</button>
				</form>
        <div class="col-md-12 col-sm-12 col-xs-12">					
					<div id="graph"></div>
					
                  
							   
						
												<table id="example1" class="table table-bordered table-striped">
												<tr>
												<th>MONTH</th>
												<th>BRANCH</th>
												<th class="text-right">SALES</th>
											</tr>
			
                    
                    <tbody>
<?php
	
	if (isset($_POST['display'])){
			$year=$_POST['year'];
			$month=$_POST['month'];
			$_SESSION['year']=$year;
			$_SESSION['month']=$month;
			
			$query=mysqli_query($con,"select *,SUM(payment) as payment,DATE_FORMAT(payment_date,'%b') as month from payment natural join branch
			where YEAR(payment_date)='$year' and MONTH(payment_date)='$month' group by branch_id,MONTH(payment_date) order by  MONTH(payment_date)")or die(mysqli_error($con));
			$total=0;
			
			echo "<h2 style='text-align:center'><b>Monthly Sales</b></h2>";
			while($row=mysqli_fetch_array($query)){
				$total=$total+$row['payment'];	
		
	

?>
            
			<tr>
                <th><?php echo $row['month']." ".$year;?></th>
				<th><?php echo $row['branch_name'];?></th>
				<td class="text-right"><b><?php echo number_format($row['payment'],2);?></b></td>
			</tr>
	<?php }
		echo "<tr>
                <th><h2>TOTAL</h2></th>
				<th colspan='2' class='text-right'><h2><b>$total</b></h2></td>
			</tr>";
	}?>	
			
	            </tbody>
                    <tfoot>
					
         				  
       
        </tfoot>
       </table>
				</div>
			</div>
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
                      cat_name: $(this).val(), // < note use of 'this' here
                      process: 'categories'
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
<?php 
}else{
  echo "<script>document.location='home.php'</script>";  
}
?>