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

    body {
      background-color: #34495e;
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

    .input-group {
      text-align: center;
      width: 100%;
    }

    .save-btn {
      margin: 5px;
    }

    .stock-btn {
      margin: 5px;
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

    .content-header {
      text-align: right;
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
            <li class="treeview cat-list">
              <h2>Category List</h2>
            </li>
            <li class="treeview">
              <a class="btn btn-md cat-btn" href="#add" data-target="#add" data-toggle="modal" class="small-box-footer"><img src="../dist/img/armchair.png" alt="Furniture Icon" height="24" width="24" style="margin-right: 10px;">Furniture</a> 
            </li>
            <li class="treeview">
              <a class="btn btn-md cat-btn" href="#add" data-target="#add" data-toggle="modal" class="small-box-footer"><img src="../dist/img/soap.png" alt="Beauty Products" height="24" width="24" style="margin-right: 10px;">Beauty Products</a> 
            </li>
            <li class="treeview">
              <a class="btn btn-md cat-btn" href="#add" data-target="#add" data-toggle="modal" class="small-box-footer"><img src="../dist/img/smartphone.png" alt="Mobile Items" height="24" width="24" style="margin-right: 10px;">Mobile Items</a> 
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

        <section class="content">
          <div class="col-sm-12"> <!-- col start -->
            <div class="nav-tabs-custom"> <!-- nav-tabs-custom start -->
              <ul class="nav nav-tabs">
                <li class=""><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Furniture products</a></li>
                <li class=""><a href="#cash" data-toggle="tab">Beauty products</a></li>
                <li class=""><a href="#payments" data-toggle="tab" aria-expanded="false">Mobile items</a></li>
              </ul>
            <div class="tab-content"> <!-- table content start -->
              <div class="tab-pane active" id="fa-icons"> <!----- TABLE ACTIVE START ----->
                <div class="row"> <!-- row start -->
                  <div class="col-sm-12"> <!-- col start -->
                    <div class="box box-primary"> <!-- box start -->
                      <div class="box-header">
                        <h3 class="box-title">Furniture product list</h3>
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
                                while($row=mysqli_fetch_array($query)){?>
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
                    </div><!-- box end -->
                  </div> <!-- col end -->
                </div> <!-- row end -->
              </div> <!----- TABLE ACTIVE END ----->
              <div class="tab-pane" id="cash"> <!----- 2ND TABLE START ----->
                <div class="row">

                </div> <!-- /.col (right) -->
              </div> <!----- 2ND TABLE END ----->
            </div> <!-- table content end -->
            </div> <!-- nav-tabs-custom end -->
          </div> <!-- col end -->
        </section>

          <!-- Main content -->
            <div class="row">
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

         <!-- MODAL --->
         <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Add New Product</h4>
              </div>
            <div class="modal-body">
              <form method="post" action="stockin_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Model</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="Model" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Description</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="Description" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                 
                  <div class="form-group">
                    <label for="date">Company name</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" name="prod_name" id="prod_id" required>
                        <?php include('../dist/includes/dbcon.php');
                          $query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
                          while($row=mysqli_fetch_array($query2)){?>
                        <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Category</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" name="prod_name" id="prod_id" required>
                        <?php include('../dist/includes/dbcon.php');
                          $query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
                          while($row=mysqli_fetch_array($query2)){?>
                        <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->   
                  <div class="form-group">
                    <label for="date">Reorder</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="0" required>
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
                      <button type="submit" class="btn btn-primary save-btn" id="daterange-btn" name="">
                        Save
                      </button>
					            <div class="btn btn-danger stockoutButton stock-btn">Stock Out</div>
                    </div>
                  </div><!-- /.form group -->
				        </form>	
            </div>
        </div><!--end of modal-dialog-->
      </div>
     <!--end of modal-->

    <!-- MODAL FOR MOBILE ITEMS --->
         <div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Add New Product</h4>
              </div>
            <div class="modal-body">
              <form method="post" action="stockin_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Model</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="Model" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">IMEI</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="Description" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                 
                  <div class="form-group">
                    <label for="date">Color</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="Description" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->    
                  <div class="form-group">
                    <label for="date">Category</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" name="prod_name" id="prod_id" required>
                        <?php include('../dist/includes/dbcon.php');
                          $query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
                          while($row=mysqli_fetch_array($query2)){?>
                        <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->   
                  <div class="form-group">
                    <label for="date">Reorder</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="0" required>
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
                      <button type="submit" class="btn btn-primary save-btn" id="daterange-btn" name="">
                        Save
                      </button>
					            <div class="btn btn-danger stockoutButton stock-btn">Stock Out</div>
                    </div>
                  </div><!-- /.form group -->
				        </form>	
            </div>
        </div><!--end of modal-dialog-->
      </div>
     <!--end of modal--> 

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
