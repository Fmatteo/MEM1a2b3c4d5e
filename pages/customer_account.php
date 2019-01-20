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
    <title>Customer Account | <?php include('../dist/includes/title.php');?></title>
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

    <style>
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');
      include('../dist/includes/dbcon.php');
      ?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-warning" href="customer.php">Back</a>
              
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
              <div class="box box-primary">
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="" enctype="multipart/form-data">
      <?php
          $cid=$_REQUEST['id'];
          $query=mysqli_query($con,"select * from customer where cust_id='$cid'")or die(mysqli_error());
      $row=mysqli_fetch_array($query);
      ?>  
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
                    <label for="date">Total Sales</label>
                    <div class="input-group col-md-12">
                      <?php 
                        $query = mysqli_query($con, "SELECT SUM(amount_due)as total FROM sales WHERE cust_id='$cid'")or die(mysqli_error());
                        $row1 = mysqli_fetch_array($query);
                      
                        echo "<h3>".number_format($row1['total'],2)."</h3>";
                      ?>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

        </form> 
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-8">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Order History</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Transaction #</th>
                        <th>Mode of Payment</th>
                        <th>Extra</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
   // $cid=$_REQUEST['cid'];
    $query = mysqli_query($con, "SELECT * FROM sales WHERE cust_id='$cid'")or die(mysqli_error());
    while ($row = mysqli_fetch_array($query))
    {
      $sid = $row['sales_id'];
?>
                      <tr>
                        <td><?php echo $row['sales_id']; ?></td>
                        <td><?php echo strtoupper($row['modeofpayment']); ?></td>
                        <td><?php echo $row['extra']; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($row['date_added'])); ?></td>
                        <td><?php echo $row['amount_due']; ?></td>
                        <td>
                          <a href="#show<?php echo $row['sales_id']; ?>" data-target="#show<?php echo $row['sales_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><button type="button" class="btn btn-primary">VIEW MORE</button></a>
                        </td>
                      </tr>


                      <div id="show<?php echo $row['sales_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 60%;">
                          <div class="modal-content" style="height:auto">
                            <div class="modal-header box-header bg-dark">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title text-dark">Transaction Purchase History</h4>
                            </div>
                            <div class="modal-body">
                              <div class ="container" style="width: 100%;">
                                <div class="row text-bold">
                                  <div class="col">
                                    Product Name
                                  </div>
                                  <div class="col">
                                    Qty
                                  </div>
                                  <div class="col">
                                    Price
                                  </div>
                                  <div class="col">
                                    Amount
                                  </div>
                                </div>

                                <?php 
                                  $sql = mysqli_query($con, "SELECT a.qty, a.price, a.qty * a.price as total, b.prod_name FROM sales_details a LEFT JOIN product b on a.prod_id = b.prod_id WHERE a.sales_id ='$sid'")or die(mysqli_error());
                                  $count = 0;
                                  while($row_details = mysqli_fetch_array($sql))
                                  {
                                    $count++;
                                    if ($count % 2 == 1)
                                    {
                                ?>
                                    <div class="row" style="background-color: #f9f9f9;">
                                      <div class="col"><?php echo $row_details['prod_name']; ?></div>
                                      <div class="col"><?php echo $row_details['qty']; ?></div>
                                      <div class="col"><?php echo $row_details['price']; ?></div>
                                      <div class="col"><?php echo $row_details['total']; ?></div>
                                    </div>
                                <?php }else {?>
                                    <div class="row" style="background-color: #ffffff;">
                                      <div class="col"><?php echo $row_details['prod_name']; ?></div>
                                      <div class="col"><?php echo $row_details['qty']; ?></div>
                                      <div class="col"><?php echo $row_details['price']; ?></div>
                                      <div class="col"><?php echo $row_details['total']; ?></div>
                                    </div>
                                <?php }}?>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div> <!-- END OF MODAL DIALOG -->
                        </div> <!-- END OF MODAL CONTENT -->
                      </div> <!-- END OF MODAL -->   
    <?php }?>       
                    </tbody>
                   
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
      .row
      {
        display: flex;
      }
      .col
      {
        border: 1px solid #f4f4f4;
        padding: 10px 10px; 
        width: 25%;
        overflow: hidden;
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
