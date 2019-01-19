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
    html {
      background-image: linear-gradient(to right, rgba(34, 167, 240,.9) , rgba(52, 152, 219,.9)), url(dist/img/login.jpg) !important;
      height: 100%;
      width: 100%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .form-wrapper {
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%,-50%);
      color: #2f3640 !important;
    }

    form {
      height: 500px;
      width: 370px;
      background-color: #f5f6fa;
      padding: 50px 35px;
      border-radius: 5px;
      box-shadow: 0 5px 5px rgba(52, 152, 219, .9);
    }

    h1 {
      font-size: 18px;
      font-weight: bold !important;
      text-align: center;
    }

    h2 {
      color: #718093 !important;
      text-align: center;
      font-size: 15px;
      margin-bottom: 30px;
    }

    input[type="text"], input[type="password"] {
      border: none;
      border-bottom: 2px solid #22a7f0;
      margin: 0 auto 25px auto;
    }

    label {
      font-size: 12px;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
      -webkit-text-fill-color: #2f3640;
      box-shadow: 0 5px 5px rgba(193,57,43,.1);
      transition: background-color 5000s ease-in-out 0s;
    }

    .login-btn {
      background-image: linear-gradient(to left, #22a7f0 , #3498db);
      border: none;
      border-radius: 50px;
      width: 80%;
      margin: 0 auto 25px auto;
      border: 1px solid transparent;
      transition: all .3s linear;
    }

    .login-btn:hover {
      width: 100%;
    }

    .info {
      text-align: center;
      font-size: 11px;
      margin-top: 50px;
    }

    .info h1 {
      font-size: 15px;
    }

    .logo-box {
      width: 240px;
      height: 240px;
      position: absolute;
      top: -150px;
      left: 50%;
      transform: translateX(-50%);
     
    }

    .logo {
      width: 100%;
      height: 100%;
      border-radius: 50%;
    }

    form {
      position: relative;
    }

    .admin-box {
      margin-top: 55px;
    }

    .select2, .select2:focus {
      border-bottom: 2px solid #22a7f0;
    }


  </style>

  <body>

  <div class="form-wrapper">
    <form method="POST" action="login.php">
      <div class="logo-box">
        <img src="dist/img/kristel-logo.jpg" class="logo" alt="logo">
      </div>
      <div class="admin-box">
        <h1>WELCOME</h1>
      </div>
      <div>
        <label> Username </label>
        <input type="text" name = "username" class="form-control" placeholder="Username" required="true" />
      </div>
      <div>
        <label> Password </label>
        <input type="password" name = "password" class="form-control" placeholder="Password" required="true" />
      </div>
      <div class="form-group has-feedback">
          <select class="form-control select2" style="width:100%" name="branch" required>
          <?php include('dist/includes/dbcon.php');
              $query3=mysqli_query($con,"select * from branch order by branch_name")or die(mysqli_error($con));
              while($row3=mysqli_fetch_array($query3)){
            ?>
            <option value="<?php echo $row3['branch_id'];?>"><?php echo $row3['branch_name'];?></option>
          <?php }
            $count = mysqli_num_rows($query3);
            if ($count == 0)
            {
          ?>
            <option value="0"> ADMIN LOGIN </option>
          <?php }?>
          </select>
      </div>
      <div>
        <button class="btn btn-block btn-warning login-btn" name="login"> Log in</button>
      </div>
      <div class="info">
        <h1><i class="fa fa-paw"></i> Sales and Inventory System </h1>
        <p>©2018 All Rights Reserved SYDESO</p>
      </div>
    </form>
  </div>

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
