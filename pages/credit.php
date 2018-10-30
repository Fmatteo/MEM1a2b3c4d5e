<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;
?><!DOCTYPE html>
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
    <script language="JavaScript"><!--
javascript:window.history.forward(1);
//--></script>
<style>
  ::-webkit-scrollbar{
  width: 12px;
}
::-webkit-scrollbar-thumb{
  background:linear-gradient(#000, green);
  border-radius: 6px;
}
    .box-primary{
        background-color: transparent;
        border-radius: 15px;
        margin-top: 5px;
        border:1px solid black;
        box-shadow: 2px 1px 200px 20px;
        box-shadow: black;
        color:black;
        }
      .content{
        font-family: 'Comfortaa', cursive;
      }
      .content-header{
        font-family: 'Comfortaa', cursive;
      }
      h3{
        font-family: 'Comfortaa', cursive;
        color:white;
      }
       h4{
      font-family: 'Comfortaa', cursive;
      color:white;
      }
      .content-wrapper{
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
      }
       .modal-header{
        background-color: black;
        color:white;
        border-top-left-radius:20px;
        border-top-right-radius:20px;
        font-family: 'Comfortaa', cursive;
        border:1px solid black;
      }
      .modal-content{
        border-radius: 20px;
        background-color: white;
        border:1px solid black;
        box-shadow: 0px 0 50px 0px;
        color:black;
      }
      .row{
        margin-right: 0px;
        margin-left: 0px;
      }
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav" onload="myFunction()">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          
          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Credit Information</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="">
				  <div class="row" style="min-height:400px">
					
					 
					<div class="col-md-12">
    
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Qty</th>
						           <th>Product Name</th>
                       <th>Selling price</th>
            						<th class="pull-right">Total Amount</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$cid=$_REQUEST['cid'];
    $sid=$_SESSION['sid'];
		$query=mysqli_query($con,"select * from sales natural join sales_details natural join product where sales_id='$sid'")or die(mysqli_error());
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				//$id=$row['temp_trans_id'];
				$total= $row['qty']*$row['price'];
				$grand=$grand+$total;
		
?>
          <tr>
						<td><?php echo $row['qty'];?></td>
						<td class="record"><?php echo $row['prod_name'];?></td>
						<td><?php echo number_format($row['price'],2);?></td>
						<td style="text-align:right"><?php echo number_format($total,2);?></td>
              
                      </tr>
					  

<?php }?>			
            <tr>
                        <th colspan="3">Total</th>
                        <th class="pull-right"><?php echo number_format($grand,2);?></th>
                       
            </tr>		  

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
                  <form method="post" name="autoSumForm" action="terms_add.php">
				  <div class="row">
					 <div class="col-md-12">
<?php
$sid=$_SESSION['sid'];
$query=mysqli_query($con,"select * from term where sales_id='$sid'")or die(mysqli_error());

    $row=mysqli_fetch_array($query);
        $down=$row['down'];
        $terms=$row['payment_mode'];
        $span=$row['term'];
        $due=$row['due'];
        $date=$row['payment_start'];
?>        
              <div class="form-group">
               <!-- <label for="date">No interest</label> -->
                <?php $interest=$grand*0;?>
               
                <input type="hidden" name="cid" value="<?php echo $cid;?>">
                <input type="hidden" style="text-align:right" class="form-control" id="date" name="interest" placeholder="Interest" 
                value="<?php echo $interest;?>" tabindex="5" readonly>
              
              </div><!-- /.form group -->

              <div class="form-group">
              <label for="date">Total</label>
              
                <input type="text" style="text-align:right" class="form-control" id="grandtotal" name="grandtotal" placeholder="Total" 
                value="<?php echo $grand+$interest;?>" tabindex="5" readonly>
              
              </div><!-- /.form group -->

						  <div class="form-group">
							<label for="date">Downpayment</label>
								<input type="text" class="form-control" id="down" name="down" tabindex="6" placeholder="Downpayment" value="<?php $down=($grand+$interest)*.2;echo $down;?>" required>
						  </div><!-- /.form group -->
						 
             <div class="form-group" style="display:none">
              <label for="date">Terms</label>
                <select class="form-control select2" name="terms" tabindex="1" required>
                    
                    <option>monthly</option>
                    <option>weekly</option>
                    <option>daily</option>
                </select>
            
              </div><!-- /.form group -->
              <div class="form-group"  style="display:none">>
              <label for="date">Payable for</label>
                <select class="form-control select2" name="span" tabindex="1" required>
                   
                    <option value="1">1 month</option>
                    <option value="2">2 months</option>
                    <option value="3">3 months</option>
                    <option value="4">4 months</option>
                    <option value="5">5 months</option>
                    <option value="6">6 months</option>
                </select>
            
              </div>
              
              
					</div>
					
					

				</div>	
               
                  
            
                      
      <button class="btn btn-lg btn-block btn-success" id="daterange-btn" name="finish" type="submit"  tabindex="7">
                        Finish
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
