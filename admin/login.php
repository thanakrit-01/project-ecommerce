<!DOCTYPE html>
<?php include('../config/condb.php'); ?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template_admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../template_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template_admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-color: #879897;">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html" style="color: #FFF;"><b>Admin</b></a>
  </div>




  <?php 
         

         if(isset($_POST['username'])){
             // removes backslashes
             $username = stripslashes($_REQUEST['username']);
             // escape special charecters in a string 
             $username = mysqli_real_escape_string($con, $username);

             $password = stripslashes($_REQUEST['password']);
             $password = mysqli_real_escape_string($con, $password);

             // check is user existing in the database or not
             $query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password ='".($password)."'";
             
             $result = mysqli_query($con, $query) or die(mysql_error());
             $data = mysqli_fetch_array($result);
             $rows = mysqli_num_rows($result);

             if ($rows == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['a_id'] = $data['a_id'];
                    // Redirect user to index.php
                    header("Location: index.php");
             } else {
                 echo"<div class='form' style='color: #fff; width: 500px;'>
                 <h3>Username/Password is incorrect.</h3>
                 <br>Click here to <a href='login.php' style='color: yellow;'>Login</a>
                 </div> ";
             }

             } else {
                 
            
    ?>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="username" class="form-control" name="username" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../template_admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../template_admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../template_admin/dist/js/adminlte.min.js"></script>
<?php } ?>
</body>
</html>
