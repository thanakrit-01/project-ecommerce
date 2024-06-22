<!DOCTYPE html>
<html>
<head>
<?php include('../config/condb.php'); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Seller | Log in</title>
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
    <a href="" style="color: #FFF;"><b>SEL</b>LER</a>
  </div>

  <?php 
         

         if(isset($_POST['s_username'])){
             // removes backslashes
             $s_username = stripslashes($_REQUEST['s_username']);
             // escape special charecters in a string 
             $s_username = mysqli_real_escape_string($con, $s_username);

             $s_password = stripslashes($_REQUEST['s_password']);
             $s_password = mysqli_real_escape_string($con, $s_password);

             // check is user existing in the database or not
             $query = "SELECT * FROM seller WHERE s_username = '$s_username' AND s_password='".md5($s_password)."'";
             
             $result = mysqli_query($con, $query) or die(mysql_error());
             $data = mysqli_fetch_array($result);
             $rows = mysqli_num_rows($result);

             if ($rows == 1 && $data['status_login'] == 1) {
                    $_SESSION['s_username'] = $s_username;
                    $_SESSION['s_id'] = $data['s_id'];
                    // Redirect user to index.php
                    header("Location: order-list.php");
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
          <input type="username" class="form-control" placeholder="username" name="s_username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="s_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">

          <p class="buttons">
          <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
						<a class="btn btn-blank" href="../user/seller-register.php">สมัครสมาชิก</a>
					</p>
            
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
