<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
include('../dist/includes/dbcon.php');
$id = $_SESSION['id'];
$query_role=mysqli_query($con,"select * from user where user_id = '$id' ")or die(mysqli_error());
while($rowrole=mysqli_fetch_array($query_role)){ 
$role_permission = $rowrole['role'];
}
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
    <script scr="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <style>
   
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

    .transactions-link {
      display: inline-block;
    }

    .transactions-box {
      background-image: linear-gradient(to left, #22a7f0 , #3498db);
      display: flex;
      height: 150px;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      border-radius: 4px;
      position: relative;
      overflow: hidden;
    }

    .transactions-box:hover .transactions-title-visible {
      transform: translateX(-100%);
      transition: all .5s;
    }

    .transactions-box:hover .transactions-title-invisible {
      right: 0;
      transition: all .5s;
    }

    .transactions-title {
      color: white;
      letter-spacing: 2px;
      display: inline-block;
      font-size: 17px;
      margin: 10px 0 0 0;
      width: 100%;
      padding: 5px;
      text-align: center;
      font-variant: bold;
    }

    .transactions-title-invisible {
      position: absolute;
      width: 100%;
      top: 85px;
      right: -100%;
    }

    .transaction-title-visible {
      width: 100%;
    }

    .transactions-wrapper {
      display: grid;
      grid-template-columns: repeat(3,300px);
      grid-gap: 15px;
      justify-content: center;
      margin-top: 25px;
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
                             <?php if ($role_permission == 'admin'){?>
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
         

          <!-- Main content -->
          <section>
                <div class="box-header with-border">
                  <h3 class="box-title">Transactions</h3>
                </div><!-- /.box-header -->
                  <div class="transactions-wrapper">
                    <a href="cust_new.php" class="transactions-link">
                    <div class="transactions-box">
                      <img src="../dist/img/purchase.png" alt="purchase">
                      <span class="transactions-title transactions-title-visible">PURCHASE</span>
                      <span class="transactions-title transactions-title-invisible">VIEW</span>
                    </div>
                    </a>
                    <a href="stockin.php" class="transactions-link">
                    <div class="transactions-box">
                      <img src="../dist/img/stockinout.png" alt="purchase">
                      <span class="transactions-title transactions-title-visible">PRODUCT IN/OUT</span>
                      <span class="transactions-title transactions-title-invisible">VIEW</span>
                    </div>
                    </a>
                    <a href="inventory.php" class="transactions-link">
                    <div class="transactions-box">
                      <img src="../dist/img/reports.png" alt="purchase">
                      <span class="transactions-title transactions-title-visible">REPORTS</span>
                      <span class="transactions-title transactions-title-invisible">VIEW</span>
                    </div>
                    </a>
                   <!--<a href="creditor.php" class="transactions-link">
                    <div class="transactions-box">
                      <img src="../dist/img/credit.png" alt="purchase">
                      <span class="transactions-title transactions-title-visible">CREDIT</span>
                      <span class="transactions-title transactions-title-invisible">VIEW</span>
                    </div>
                    </a>
                    <a href="product.php" class="transactions-link">
                    <div class="transactions-box">
                      <img src="../dist/img/products.png" alt="purchase">
                      <span class="transactions-title transactions-title-visible">PRODUCTS</span>
                      <span class="transactions-title transactions-title-invisible">VIEW</span>
                    </div>
                    </a>
                    <a href="expensesinput.php" class="transactions-link">
                    <div class="transactions-box">
                      <img src="../dist/img/history.png" alt="purchase">
                      <span class="transactions-title transactions-title-visible">EXPENSES</span>
                      <span class="transactions-title transactions-title-invisible">VIEW</span>
                    </div>
                    </a>-->
                  </div>
          </section><!-- /.content -->


        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->


      
      <script>
        
          $(document).ready(function(){
              $('#sidebar-btn').click(function(){
                $('.sidebar').toggleClass('visible');
              });
          });


      </script>
   
  <script>
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
    <script scr="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
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
