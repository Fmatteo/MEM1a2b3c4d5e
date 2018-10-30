<?php include 'header_login.php';?>
<link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Raleway" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="dist/css/sample1.css">
<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
<style>
html{
  background: url('../dist/img/admin.jpg') no-repeat center center fixed;
  background-size: cover;
}
.login_content{
  border:1px solid black;
  border-radius: 20px;
  padding:50px;
  box-shadow: 0px 0px 200px 0px;
  color:black;
}
h1{
  color:black;
   font-family: 'Comfortaa', cursive;
}
</style>


  <body class="login">
    <div>
    

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method = "POST" action = "login.php">
              <h1>Administrator Login</h1>
              <div>
                <input type="text" name = "username" class="form-control" placeholder="Username" required="true" />
              </div>
              <div>
                <input type="password" name = "password" class="form-control" placeholder="Password" required="true" />
              </div>
              <div>
                <button  class="btn btn-block btn-warning" name = "login"> Log in</button>
              
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Sales and Inventory System </h1>
                  <p>©2018 All Rights Reserved Mmil Company</p>
                </div>
              </div>
            </form>
          </section>
        </div>

    
      </div>
    </div>
  </body>
</html>
