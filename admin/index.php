<?php include 'header_login.php';?>
<link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Raleway" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="dist/css/sample1.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

<style>
    html {
      background-image: linear-gradient(to right, rgba(232,76,61,.9) , rgba(193,57,43,.9)), url(images/login.jpg) !important;
      height: 100%;
      width: 100%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .form-wrapper {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      color: #2f3640 !important;
    }

    form {
      height: 550px;
      width: 370px;
      background-color: #f5f6fa;

      padding: 50px 35px;
      border-radius: 5px;
      box-shadow: 0 5px 5px rgba(193,57,43,.9);
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
      margin-bottom: 50px;
    }

    input[type="text"], input[type="password"] {
      border: none;
      border-bottom: 2px solid #dd4b39;
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
      background-image: linear-gradient(to left, rgba(232,76,61,1) , rgba(193,57,43,1));
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
      margin-top: 80px;
    }

    .info h1 {
      font-size: 15px;
    }

    
</style>


<body class="login">

  <div class="form-wrapper">
  <form method = "POST" action = "login.php">
    <h1>WELCOME</h1>
    <h2>Administrator Login</h2>
    <div>
      <label> Username </label>
      <input type="text" name = "username" class="form-control" placeholder="Username" required="true" />
    </div>
    <div>
      <label> Password </label>
      <input type="password" name = "password" class="form-control" placeholder="Password" required="true" />
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

  </body>
</html>
