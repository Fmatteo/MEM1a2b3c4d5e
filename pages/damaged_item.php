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

    .form-group {
      text-align: center;
      color: #fff;
      margin: 15px auto 0 auto;
      width: 90% !important;
      font-size: 13px;
    }

    input[type="text"] {
      font-size: 13px;
    }

    .stock-btn {
      margin: 5px;
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
          <form method="post" action="damage_add.php" enctype="multipart/form-data">
            <div class="cat-list">
              <h2> Damaged item </h2>
            </div>
            <div class="form-group">
              <label for="date">Select item</label>
              <div class="input-group col-md-12">
                <select class="form-control select2" name="prod_id" id="prod_id" required>
                <?php include('../dist/includes/dbcon.php');
                $query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
                while($row=mysqli_fetch_array($query2)){?>
                <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name'];?></option>

                <?php 
                $prod_qty = $row['prod_qty'];
                }?>
                </select>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
              <label for="date">Quantity</label>+
              <input type="hidden" name="prod_qty" value="<?php echo $prod_qty;?>">
              <div class="input-group col-md-12">
                <input type="text" class="form-control pull-right" id="qty" name="qty" placeholder="Input Quantity" required>
              </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
              <label for="remarks">Remarks</label>
              <div class="input-group col-md-12">
                <input type="text" class="form-control pull-right" id="remarks" name="remarks" placeholder="Remarks">
              </div><!-- /.input group -->
            </div><!-- /.form group -->
            <div class="form-group">
              <div class="input-group">                
                <button type="submit" class="btn btn-success stockoutButton stock-btn">Add Damaged</button>
              </div>
            </div><!-- /.form group -->
          </form>	
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
                  <h3 class="box-title">Damaged item list</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Model</th>
                              <th>Qty</th>
                              <th>Supplier</th>
                              <th>Category</th>                              
                              <th>Notification</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                                $branch=$_SESSION['branch'];
                                  $sql="
                                  SELECT * FROM damage a 
                                  LEFT JOIN product b ON a.prod_id = b.prod_id 
                                  LEFT JOIN supplier c ON b.supplier_id = c.supplier_id
                                  LEFT JOIN category d ON b.cat_id = d.cat_id
                                  WHERE a.branch_id='$branch'
                                  order by date desc
                                  ";
                                $query=mysqli_query($con,$sql)or die(mysqli_error());
                                while($row=mysqli_fetch_array($query)){?>
                            <tr>
                              <td><?php if (isset($row['prod_name'])) echo $row['prod_name'];?></td>
                              <td><?php if (isset($row['damage_qty'])) echo $row['damage_qty'];?></td>
                              <td><?php if (isset($row['supplier_name']))echo $row['supplier_name'];?></td>
                              <td><?php if (isset($row['cat_name']))echo $row['cat_name'];?></td>                              
                              <td></td>                              
                              <td><?php if (isset($row['date'])) echo $row['date'];?></td>
                            </tr>               
                            <?php }?>					  
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Model</th>
                              <th>Company name</th>
                              <th>Category</th>
                              <th>Qty</th>
                              <th>Notification</th>
                              <th>Date</th>
                            </tr>					  
                          </tfoot>
                        </table>
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
