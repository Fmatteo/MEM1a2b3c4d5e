<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - <?php include('dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--<link rel="stylesheet" type="text/css" href="dist/css/sample1.css">-->
    <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->


  <style>

    body {
      background-image: linear-gradient(to top left, rgba(232,76,61,1) , rgba(193,57,43,1));
      background-repeat: no-repeat;
      height: 100vh;
      overflow: hidden;
    }

    .login-box {
      position: absolute;
      top: 40%;
      left: 50%;
      transform: translate(-50%,-50%);
    }

    .login-box-body {
      height: 450px;
      width: 350px;
      position: relative;
      background-image: linear-gradient(to top left, rgba(106,0,0,1), rgba(106,0,30,1));
    }

    .logo-box {
      width: 225px;
      height: 225px;
      background-color: white;
      position: absolute;
      top: -115px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 50%;
    }

    .logo {
      height: 100%;
      width: 100%;
    }

    .form-box {
      margin-top: 125px;
    }

    .login-box-txt {
      display: block;
      color: white;
      text-align: center;
    }

    .login-box-txt-1 {
      font-size: 17px;
      letter-spacing: 2px;
    }

    .login-box-txt-2 {
      margin-bottom: 15px;
      color: 
    }

  </style>

  <body>
  
    <div class="login-box">
      <div class="login-logo">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div class="logo-box">
          <img src="dist/img/logo.png" class="logo" alt="logo">
        </div>
        <form action="login.php" method="post" class="form-box">
        <span class="login-box-txt login-box-txt-1">WELCOME</span>
        <span class="login-box-txt login-box-txt-2">Sign-in to log into the system</span>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  <div class="form-group has-feedback">
            <select class="form-control select2" style="width:100%" name="branch" required>
                <?php
				include('dist/includes/dbcon.php');

                   $query3=mysqli_query($con,"select * from branch order by branch_name")or die(mysqli_error($con));
                      while($row3=mysqli_fetch_array($query3)){
                ?>
                    <option value="<?php echo $row3['branch_id'];?>"><?php echo $row3['branch_name'];?></option>
                  <?php }?>
                </select>
          </div>
          <div class="row">
			<div class="col-xs-6 pull-right">
			  <button type="reset" class="btn btn-block btn-flat">Clear</button>
            </div><!-- /.col -->
			<div class="col-xs-6 pull-right">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" default>Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
      
           
   
<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    
  </body>
</html>
