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
      color: #fff !important;
      font-size: 11.5px;
      letter-spacing: 1px;
      width: 100%;
      text-align: left;
      padding-left: 45px;
      margin-top: 10px;
      background-color: transparent !important;
      border: none;
      border-radius: 0;
    }

    .cat-btn:hover {
      background-color: #3a539b !important;
      color: #fff;
      border: none;
      border-radius: 0;
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
              <button class="btn btn-md cat-btn small-box-footer" data-toggle="modal" data-target="#modal-1"><img src="../dist/img/armchair.png" alt="Furniture Icon" height="24" width="24" style="margin-right: 10px;">Furniture</button> 
            </li>
            <li class="treeview">
              <button class="btn btn-md cat-btn small-box-footer" data-toggle="modal" data-target="#modal-2"><img src="../dist/img/soap.png" alt="Beauty Products" height="24" width="24" style="margin-right: 10px;">Beauty Products</button> 
            </li>
            <li class="treeview">
              <button class="btn btn-md cat-btn small-box-footer" data-toggle="modal" data-target="#modal-3"><img src="../dist/img/smartphone.png" alt="Mobile Items" height="24" width="24" style="margin-right: 10px;">Mobile Items</button> 
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
                <li class=""><a href="#cash" data-toggle="tab" aria-expanded="false">Beauty products</a></li>
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
                              <th>Model</th>
                              <th>Description</th>
                              <th>Company name</th>
                              <th>Category</th>
                              <th>Reorder</th>
                              <th>Quantity</th>
                              <th>Base price</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $branch=$_SESSION['branch'];
                                  $sql="
                                  SELECT * FROM product a
                                  LEFT JOIN supplier b on a.supplier_id = b.supplier_id
                                  LEFT JOIN category c on a.cat_id = c.cat_id
                                  WHERE a.branch_id = '$branch' AND a.type='furniture' order by prod_name
                                  ";
                                $query=mysqli_query($con,$sql)or die(mysqli_error());
                                while($row=mysqli_fetch_array($query)){?>
                            <tr>
                              <td><?php echo $row['prod_name'];?></td>
                              <td><?php echo $row['prod_desc'];?></td>
                              <td><?php echo $row['supplier_name'];?></td>
                              <td><?php echo $row['cat_name'];?></td>
                              <td><?php echo $row['reorder'];?></td>
                              <td><?php echo $row['prod_qty'];?></td>
                              <td><?php echo number_format($row['base_price'], 2);?></td>
                              <td>
                                <a href="#updateitem<?php echo $row['prod_id'];?>" data-target="#updateitem<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
                                <a href="stockin_del.php?id=<?php echo $row['prod_id']; ?>" onclick="return confirm('Are you sure to delete this item?');" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-blue"></i></a>
                                <a href="#stockin_fur<?php echo $row['prod_id']; ?>" data-target="#stockin_fur<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><button type="button" class="btn btn-primary">Stock in</button></a>
                              </td>
                            </tr> 

                            <div id="stockin_fur<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                  <div class="modal-header box-header" style="color:white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Stockin Quantity</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="stockin_add.php?id=<?php echo $row['prod_id']; ?>" enctype='multipart/form-data'>
                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Enter Quantity</label>
                                        <div class="col-lg-9">
                                          <input type="number" class="form-control" id="model" name="qty" required>  
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name = "furniture_stockin" class="btn btn-primary">Add Quantity</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </form>
                                  </div>
                                </div> <!-- END OF MODAL DIALOG -->
                              </div> <!-- END OF MODAL CONTENT -->
                            </div> <!-- END OF MODAL -->   

                            <div id="updateitem<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                  <div class="modal-header box-header" style="color:white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Update Product Details</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="product_update.php?id=<?php echo $row['prod_id']; ?>" enctype='multipart/form-data'>
                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Model</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="model" name="model" value="<?php echo $row['prod_name'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $row['prod_desc'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Company Name</label>
                                        <div class="col-lg-9">
                                          <select name = "supplier" class = "form-control" required>
                                            <?php 
                                              $query1 = "SELECT * FROM supplier order by supplier_name";
                                              $sql1 = mysqli_query($con, $query1)or die(mysqli_error($con));

                                              while($row1 = mysqli_fetch_array($sql1))
                                              {
                                            ?>
                                              <option value = "<?php echo $row1['supplier_id']; ?>"> <?php echo $row1['supplier_name']; ?> </option>
                                            <?php }?>
                                          </select>
                                          
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-9">
                                          <select name = "category" class = "form-control" required>
                                            <?php 
                                              $query2 = "SELECT * FROM category WHERE cat_for='Furniture' order by cat_name";
                                              $sql2 = mysqli_query($con, $query2)or die(mysqli_error($con));

                                              while($row2 = mysqli_fetch_array($sql2))
                                              {
                                            ?>
                                              <option value = "<?php echo $row2['cat_id']; ?>"> <?php echo $row2['cat_name']; ?> </option>
                                            <?php }?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Reorder</label>
                                        <div class="col-lg-9">
                                          <input type="number" class="form-control" id="reorder" name="reorder" value="<?php echo $row['reorder'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Quantity</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="qty" name="qty" value="<?php echo $row['prod_qty'];?>" required readonly>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Base Price</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['base_price'];?>" required>  
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name = "furniture" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </form>
                                  </div>
                                </div> <!-- END OF MODAL DIALOG -->
                              </div> <!-- END OF MODAL CONTENT -->
                            </div> <!-- END OF MODAL -->              
                            <?php } ?>					  
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Model</th>
                              <th>Description</th>
                              <th>Company name</th>
                              <th>Category</th>
                              <th>Reorder</th>
                              <th>Quantity</th>
                              <th>Base price</th>
                              <th>Actions</th>
                            </tr>					  
                          </tfoot>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- box end -->
                  </div> <!-- col end -->
                </div> <!-- row end -->
              </div> <!----- TABLE ACTIVE END ----->

                                 

              <div class="tab-pane" id="cash"> <!----- 2ND TABLE START ----->
                <div class="row"> <!-- row start -->
                <div class="col-sm-12"> <!-- col start -->
                    <div class="box box-primary"> <!-- box start -->
                      <div class="box-header">
                        <h3 class="box-title">Beauty product list</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Model</th>
                              <th>Description</th>
                              <th>Company name</th>
                              <th>Category</th>
                              <th>Reorder</th>
                              <th>Quantity</th>
                              <th>Base price</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $branch=$_SESSION['branch'];
                                  $sql = "SELECT * FROM product a
                                  LEFT JOIN supplier b ON a.supplier_id = b.supplier_id
                                  LEFT JOIN category c ON a.cat_id = c.cat_id
                                  WHERE a.branch_id = '$branch' AND a.type = 'cosmetics'";
                                $query=mysqli_query($con,$sql)or die(mysqli_error());
                                while($row=mysqli_fetch_array($query)){?>
                            <tr>
                              <td><?php echo $row['prod_name'];?></td>
                              <td><?php echo $row['prod_desc'];?></td>
                              <td><?php echo $row['supplier_name'];?></td>
                              <td><?php echo $row['cat_name'];?></td>
                              <td><?php echo $row['reorder'];?></td>
                              <td><?php echo $row['prod_qty'];?></td>
                              <td><?php echo number_format($row['base_price'], 2);?></td>
                              <td>
                                <a href="#updatecostmetics<?php echo $row['prod_id'];?>" data-target="#updatecostmetics<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
                                <a href="stockin_del.php?id=<?php echo $row['prod_id']; ?>" onclick="return confirm('Are you sure to delete this item?');" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-blue"></i></a>
                                <a href="#stockin_cos<?php echo $row['prod_id']; ?>" data-target="#stockin_cos<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><button type="button" class="btn btn-primary">Stock in</button></a>
                              </td>
                            </tr>   

                            <div id="stockin_cos<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                  <div class="modal-header box-header" style="color:white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Stockin Quantity</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="stockin_add.php?id=<?php echo $row['prod_id']; ?>" enctype='multipart/form-data'>
                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Enter Quantity</label>
                                        <div class="col-lg-9">
                                          <input type="number" class="form-control" id="model" name="qty" required>  
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name = "cosmetics_stockin" class="btn btn-primary">Add Quantity</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </form>
                                  </div>
                                </div> <!-- END OF MODAL DIALOG -->
                              </div> <!-- END OF MODAL CONTENT -->
                            </div> <!-- END OF MODAL -->   

                            <div id="updatecostmetics<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                  <div class="modal-header box-header" style="color:white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Update Product Details</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="product_update.php?id=<?php echo $row['prod_id']; ?>" enctype='multipart/form-data'>
                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Model</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="model" name="model" value="<?php echo $row['prod_name'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $row['prod_desc'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Company Name</label>
                                        <div class="col-lg-9">
                                          <select name = "supplier" class = "form-control" required>
                                            <?php 
                                              $query1 = "SELECT * FROM supplier order by supplier_name";
                                              $sql1 = mysqli_query($con, $query1)or die(mysqli_error($con));

                                              while($row1 = mysqli_fetch_array($sql1))
                                              {
                                            ?>
                                              <option value = "<?php echo $row1['supplier_id']; ?>"> <?php echo $row1['supplier_name']; ?> </option>
                                            <?php }?>
                                          </select>
                                          
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-9">
                                          <select name = "category" class = "form-control" required>
                                            <?php 
                                              $query2 = "SELECT * FROM category WHERE cat_for='Beauty Products' order by cat_name";
                                              $sql2 = mysqli_query($con, $query2)or die(mysqli_error($con));

                                              while($row2 = mysqli_fetch_array($sql2))
                                              {
                                            ?>
                                              <option value = "<?php echo $row2['cat_id']; ?>"> <?php echo $row2['cat_name']; ?> </option>
                                            <?php }?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Reorder</label>
                                        <div class="col-lg-9">
                                          <input type="number" class="form-control" id="reorder" name="reorder" value="<?php echo $row['reorder'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Quantity</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="qty" name="qty" value="<?php echo $row['prod_qty'];?>" required readonly>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Base Price</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['base_price'];?>" required>  
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name = "cosmetics" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </form>
                                  </div>
                                </div> <!-- END OF MODAL DIALOG -->
                              </div> <!-- END OF MODAL CONTENT -->
                            </div> <!-- END OF MODAL -->             
                            <?php }?>           
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Model</th>
                              <th>Description</th>
                              <th>Company name</th>
                              <th>Category</th>
                              <th>Reorder</th>
                              <th>Quantity</th>
                              <th>Base price</th>
                              <th>Actions</th>
                            </tr>           
                          </tfoot>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- box end -->
                  </div> <!-- col end -->
                </div> <!-- row end -->
              </div> <!----- 2ND TABLE END ----->

                <div class="tab-pane" id="payments"> <!----- 3RD TABLE START ----->
                <div class="row"> <!-- row start -->
                <div class="col-sm-12"> <!-- col start -->
                    <div class="box box-primary"> <!-- box start -->
                      <div class="box-header">
                        <h3 class="box-title">Mobile item list</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body">
                        
                        <table id="example3" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Model</th>
                              <th>IMEI</th>
                              <th>Color</th>
                              <th>Category</th>
                              <th>Company Name</th>
                              <th>Reorder</th>
                              <th>Quantity</th>
                              <th>Base price</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $branch=$_SESSION['branch'];

                                  $sql = "
                                  SELECT * FROM product a
                                  LEFT JOIN supplier b ON a.supplier_id = b.supplier_id
                                  LEFT JOIN category c ON a.cat_id = c.cat_id
                                  WHERE a.branch_id='$branch' AND a.type = 'mobile'";
                                $query=mysqli_query($con,$sql)or die(mysqli_error());
                                while($row=mysqli_fetch_array($query)){?>
                            <tr>
                              <td><?php echo $row['prod_name'];?></td>
                              <td><?php echo $row['imei'];?></td>
                              <td><?php echo $row['color'];?></td>
                              <td><?php echo $row['cat_name'];?></td>
                              <td><?php echo $row['supplier_name'];?></td>
                              <td><?php echo $row['reorder'];?></td>
                              <td><?php echo $row['prod_qty'];?></td>
                              <td><?php echo $row['base_price'];?></td>
                              <td>
                                <a href="#updatemobile<?php echo $row['prod_id'];?>" data-target="#updatemobile<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>
                                <a href="stockin_del.php?id=<?php echo $row['prod_id']; ?>" onclick="return confirm('Are you sure to delete this item?');" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-blue"></i></a>
                                <a href="#stockin_mob<?php echo $row['prod_id']; ?>" data-target="#stockin_mob<?php echo $row['prod_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><button type="button" class="btn btn-primary">Stock in</button></a>
                              </td>
                            </tr>     

                            <div id="stockin_mob<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                  <div class="modal-header box-header" style="color:white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Stockin Quantity</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="stockin_add.php?id=<?php echo $row['prod_id']; ?>" enctype='multipart/form-data'>
                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Enter Quantity</label>
                                        <div class="col-lg-9">
                                          <input type="number" class="form-control" id="model" name="qty" required>  
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name = "mobile_stockin" class="btn btn-primary">Add Quantity</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </form>
                                  </div>
                                </div> <!-- END OF MODAL DIALOG -->
                              </div> <!-- END OF MODAL CONTENT -->
                            </div> <!-- END OF MODAL -->   

                            <div id="updatemobile<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content" style="height:auto">
                                  <div class="modal-header box-header" style="color:white">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Update Product Details</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-horizontal" method="post" action="product_update.php?id=<?php echo $row['prod_id']; ?>" enctype='multipart/form-data'>
                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Model</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="model" name="model" value="<?php echo $row['prod_name'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">IMEI</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="desc" name="imei" value="<?php echo $row['imei'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Color</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="desc" name="color" value="<?php echo $row['color'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Category</label>
                                        <div class="col-lg-9">
                                          <select name = "category" class = "form-control" required>
                                            <?php 
                                              $query2 = "SELECT * FROM category WHERE cat_for='Mobile' order by cat_name";
                                              $sql2 = mysqli_query($con, $query2)or die(mysqli_error($con));

                                              while($row2 = mysqli_fetch_array($sql2))
                                              {
                                            ?>
                                              <option value = "<?php echo $row2['cat_id']; ?>"> <?php echo $row2['cat_name']; ?> </option>
                                            <?php }?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Company Name</label>
                                        <div class="col-lg-9">
                                          <select name = "supplier" class = "form-control" required>
                                            <?php 
                                              $query1 = "SELECT * FROM supplier order by supplier_name";
                                              $sql1 = mysqli_query($con, $query1)or die(mysqli_error($con));

                                              while($row1 = mysqli_fetch_array($sql1))
                                              {
                                            ?>
                                              <option value = "<?php echo $row1['supplier_id']; ?>"> <?php echo $row1['supplier_name']; ?> </option>
                                            <?php }?>
                                          </select>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Reorder</label>
                                        <div class="col-lg-9">
                                          <input type="number" class="form-control" id="reorder" name="reorder" value="<?php echo $row['reorder'];?>" required>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Quantity</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="qty" name="qty" value="<?php echo $row['prod_qty'];?>" required readonly>  
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-lg-3">Base Price</label>
                                        <div class="col-lg-9">
                                          <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['base_price'];?>" required>  
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" name = "mobile" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                  </form>
                                  </div>
                                </div> <!-- END OF MODAL DIALOG -->
                              </div> <!-- END OF MODAL CONTENT -->
                            </div> <!-- END OF MODAL -->            
                            <?php }?>           
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Model</th>
                              <th>IMEI</th>
                              <th>Color</th>
                              <th>Category</th>
                              <th>Company Name</th>
                              <th>Reorder</th>
                              <th>Quantity</th>
                              <th>Base price</th>
                              <th>Actions</th>
                            </tr>           
                          </tfoot>
                        </table>
                      </div><!-- /.box-body -->
                    </div><!-- box end -->
                  </div> <!-- col end -->
                </div> <!-- row end -->
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
      

      <!-- MODAL FOR FURNITURE -->
       <div id="modal-1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title-1">Add New Product (Furniture)</h4>
              </div>
            <div class="modal-body">
              <form method="post" action="stockin_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Model</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="prod_name" name="prod_name" placeholder="Model" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Description</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="prod_desc" name="prod_desc" placeholder="Description" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Category(Sub-category)</label>
                    <div class="input-group col-md-12">
                      <select class="form-control" name="prod_cat" required>
                        <?php 
                          $query = "SELECT * FROM category WHERE cat_for='Furniture' ORDER BY cat_name";
                          $sql = mysqli_query($con, $query)or die(mysqli_error());

                          while ($row = mysqli_fetch_array($sql))
                          {
                            $cat_id = $row[0];
                            $cat_name = $row[1];
                        ?>
                          <option value = "<?php echo $cat_id; ?>"> <?php echo $cat_name; ?> </option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                         
                              <div class="form-group">
                                 <label for="supplier_id">Company</label>
                                 <select class="form-control" id="supplier_id" name="supplier_id" required>
                                    <?php 
                                      $query = "SELECT * FROM supplier";
                                      $sql = mysqli_query($con, $query)or die(mysqli_error());

                                      while ($row = mysqli_fetch_array($sql))
                                      {
                                        $supplier_id = $row[0];
                                        $supplier_name = $row[1];
                                    ?>
                                      <option value="<?php echo $supplier_id; ?>"> <?php echo $supplier_name; ?> </option>
                                    <?php }?>
                                 </select>
                              </div>
                              <!-- suppier list -->
                              <!-- category list -->
                              <input type='hidden' name='cat_id' value='6'>

                  <div class="form-group">
                    <label for="date">Reorder</label>
                    <div class="input-group col-md-12">
                      <input type="number" class="form-control pull-right" id="reorder" name="reorder" placeholder="Reorder" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                 
                  <div class="form-group">
                    <label for="date">Quantity</label>
                    <div class="input-group col-md-12">
                      <input type="number" class="form-control pull-right" id="qty" name="qty" placeholder="Quantity" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Base Price</label>
                    <div class="input-group col-md-12">
                      <input type="number" class="form-control pull-right" id="base_price" name="base_price" placeholder="Base price" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <div class="input-group">
                      <button type="submit" name = "furniture" class="btn btn-primary save-btn" id="daterange-btn" name="">
                        Save
                      </button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div><!-- /.form group -->
				        </form>	
            </div>
        </div><!--end of modal-dialog-->
      </div>
      </div>
     <!--end of modal--> 

      <!-- MODAL FOR BEAUTY PRODUCTS -->
      <div id="modal-2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title-2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title-2">Add New Product (Beauty products)</h4>
              </div>
            <div class="modal-body">
            <form method="post" action="stockin_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Model</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="prod_name" name="prod_name" placeholder="Model" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Description</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="prod_desc" name="prod_desc" placeholder="Description" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Category(Sub-category)</label>
                    <div class="input-group col-md-12">
                      <select name = "prod_cat" class="form-control" required>
                        <?php 
                          $query = "SELECT * FROM category WHERE cat_for ='Beauty Products' order by cat_name";
                          $sql = mysqli_query($con, $query)or die(mysqli_error());

                          while($row = mysqli_fetch_array($sql))
                          {
                        ?>
                          <option value="<?php echo $row['cat_id']; ?>"> <?php echo $row['cat_name']; ?> </option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                        
                  <div class="form-group">
                    <label for="date">Company</label>
                    <div class="input-group col-md-12">
                      <select name = "supplier_id" class="form-control" required>
                        <?php 
                          $query = "SELECT * FROM supplier order by supplier_name";
                          $sql = mysqli_query($con, $query)or die(mysqli_error());

                          while($row = mysqli_fetch_array($sql))
                          {
                        ?>
                          <option value = "<?php echo $row['supplier_id']; ?>"> <?php echo $row['supplier_name']; ?> </option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                        
                  <div class="form-group">
                    <label for="date">Reorder</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="reorder" name="reorder" placeholder="Reorder" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                 
                  <div class="form-group">
                    <label for="date">Quantity</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="qty" name="qty" placeholder="Quantity" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Base Price</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="Base price" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <div class="input-group">
                      <button type="submit" name="cosmetics" class="btn btn-primary save-btn" id="daterange-btn" name="">
                        Save
                      </button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div><!-- /.form group -->
				        </form>	
            </div>
        </div><!--end of modal-dialog-->
      </div>
     <!--end of modal--> 
    </div><!-- ./wrapper -->

         <!-- MODAL FOR MOBILE ITEM --->
         <div id="modal-3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-title-3" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content" style="height:auto">
              <div class="modal-header box-header" style="color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title-3">Add New Products (Mobile items)</h4>
              </div>
            <div class="modal-body">
            <form method="post" action="stockin_add.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="date">Model</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="prod_name" name="prod_name" placeholder="Model" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">IMEI</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="prod_imei" name="prod_imei" placeholder="Description" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                   
                  <div class="form-group">
                    <label for="date">Color</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="prod_color" name="prod_color" placeholder="Color" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->    
                  <div class="form-group">
                    <label for="date">Category</label>
                    <div class="input-group col-md-12">
                      <select class="form-control" name="prod_cat" required>
                        <?php 
                          $query = "SELECT * FROM category WHERE cat_for='Mobile' order by cat_name";
                          $sql = mysqli_query($con, $query)or die(mysqli_error());

                          while ($row = mysqli_fetch_array($sql))
                          {
                        ?>
                          <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?> </option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group --> 
                  <div class="form-group">
                    <label for="date">Company Name</label>
                    <div class="input-group col-md-12">
                      <select class="form-control" name="supplier_id" required>
                        <?php 
                          $query = "SELECT * FROM supplier";
                          $sql = mysqli_query($con, $query)or die(mysqli_error());

                          while ($row = mysqli_fetch_array($sql))
                          {
                            $supplier_id = $row[0];
                            $supplier_name = $row[1];
                        ?>
                          <option value="<?php echo $supplier_id; ?>"> <?php echo $supplier_name; ?> </option>
                        <?php }?>
                      </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->     
                  <div class="form-group">
                    <label for="date">Reorder</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="reorder" name="reorder" placeholder="Reorder" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->                 
                  <div class="form-group">
                    <label for="date">Quantity</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="qty" name="qty" placeholder="Quantity" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Base Price</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="base_price" name="base_price" placeholder="Base price" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <div class="input-group">
                      <button type="submit" name="mobile" class="btn btn-primary save-btn" id="daterange-btn" name="">
                        Save
                      </button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div><!-- /.form group -->
				        </form>	
            </div>
        </div><!--end of modal-dialog-->
      </div>
     <!--end of modal-->

    <!-- MODAL FOR MOBILE ITEMS --->

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
        $("#example2").DataTable();
        $("#example3").DataTable();
        $('#example').DataTable({
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
