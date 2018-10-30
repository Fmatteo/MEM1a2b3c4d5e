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
    <title>Product | <?php include('../dist/includes/title.php');?></title>
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
  background:linear-gradient(#000, green);
  border-radius: 6px;
}
    .box-primary{
      font-family: 'Comfortaa', cursive;
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
      h3{
        font-family: 'Comfortaa', cursive;
        color:white;
      }
      
        .content-wrapper{
        border-top-left-radius: 100px;
        border-top-right-radius: 100px;
      } 
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-warning" href="home.php">Back</a>
              
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Product</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Stockin Products</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="stockin_add.php" enctype="multipart/form-data">
  
                  <div class="form-group">
                    <label for="date">Product Name</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" name="prod_name" id="prod_id" required>
                      <?php
			 include('../dist/includes/dbcon.php');
				$query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
				  while($row=mysqli_fetch_array($query2)){
		      ?>
				    <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
		      <?php }?>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
		  
                  <div class="form-group">
                    <label for="date">Quantity</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="qty" name="qty" placeholder="Input Quantity" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                   <div class="form-group">
                    <label for="date">Base Price</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="0" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  <div class="form-group">
                    <div class="input-group">
                      <button type="submit" class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
					<div class="btn btn-warning stockoutButton">Stock Out</div>
                    </div>
                  </div><!-- /.form group -->
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-8">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Product Stockin List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Qty</th>
				        <th>Distributor</th>
				        <th>Date Delivered</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$branch=$_SESSION['branch'];
			$sql="
			SELECT * FROM stockin a 
			LEFT JOIN product b ON a.prod_id = b.prod_id 
			LEFT JOIN supplier c ON b.supplier_id = c.supplier_id
			WHERE a.branch_id='$branch'
			order by date desc
			";
		
		
		
		$query=mysqli_query($con,$sql)or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['qty'];?></td>
            						<td><?php echo $row['supplier_name'];?></td>
            						<td><?php echo $row['date'];?></td>
                      
                      </tr>
                   
<?php }?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Distributor</th>
                        <th>Date Delivered</th>
                        
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
	
		
			$(".stockoutButton").click(function(e) {
              e.preventDefault();
              $.ajax({
                  type: "POST",
                  url: "ajax.php",
                  data: { 
					  prod_id: $("#prod_id").val(), // < note use of 'this' here
					  qty: $("#qty").val(), // < note use of 'this' here
                      process: 'stockout'
                  },
                  success: function(result) {
                      if(result == ""){ 
                          alert("bad")                        
                      }else{
                          alert("success")
						  location.reload();
                      }
                      
                  },
                  error: function(result) {
                      alert('error');
                  }
              });
        }); // ajax 		
		
		
		
      });
    </script>
  </body>
</html>
