<!DOCTYPE html>
<html lang="en">
<?php include('../config/condb.php'); ?>
<head>
    <?php include('inc/css.php'); ?>
</head>
<body>

    <div class="container">
        <?php include('inc/header.php');?>

        <div class="row">

                     <div class="col-md-8 col-md-offset-2">

                            <?php
                            if (isset($_REQUEST['username'])) {
                                   // removes backslashes
                                   $username = stripslashes($_REQUEST['username']);
                                   //escapes special characters in a string
                                   $username = mysqli_real_escape_string($con, $username);

                                   $email = stripslashes($_REQUEST['email']);
                                   $email = mysqli_real_escape_string($con, $email);

                                   $password = stripslashes($_REQUEST['password']);
                                   $password = mysqli_real_escape_string($con, $password);
                                   
                                   $trn_date = date("Y-m-d H:i:s");

                                   $sql = "INSERT into `user` (username, password, email, trn_date)
                                   VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";

                                   $result = mysqli_query($con, $sql);

                                   if ($result) {
                                          echo "<div class='form text-center'><h3>สมัครสมาชิกเรียบร้อย.</h3><br>Click เพื่อเข้าสู่ระบบ <a href='login.php'>เข้าสู่ระบบ</a></div>";
                                   }
                            }
                            ?>

                            <div class="member-box">

                                   <h2 class="text-center">สมัครสมาชิก สำหรับผู้ซื้อ</h2>
                                   <form fame="registration" action="" method="post">
                                          <p>
                                                 <label for="username">ชื่อผู้ใช้ <span class="mand">*</span></label>
                                                 <input type="text" name="username" placeholder="" required />
                                          </p>

                                          <p>
                                                 <label for="email">อีเมล์ <span class="mand">*</span></label>
                                                 <input type="email" name="email" placeholder="" required />
                                          </p>

                                          <p>
                                                 <label for="password">รหัสผ่าน <span class="mand">*</span></label>
                                                 <input type="password" name="password" placeholder="" required />
                                          </p>
                                          <p class="buttons">
                                                 <button class="btn btn-primary" type="submit">สมัครสมาชิก</button>
                                          </p>

                                   </form>
                                   <p> หากเป็นสมาชิกแล้ว <a href="login.php">คลิกเพื่อเข้าสู่ระบบ</a></p>
                            </div>

                     </div>

              </div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>