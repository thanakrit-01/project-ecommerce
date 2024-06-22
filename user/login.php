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

            <div class="col-md-6 col-md-offset-3">
                <?php 
                     if(isset($_POST['username'])){
                         // removes backslashes
                         $username = stripslashes($_REQUEST['username']);
                         // escape special charecters in a string 
                         $username = mysqli_real_escape_string($con, $username);
                         $password = stripslashes($_REQUEST['password']);
                         $password = mysqli_real_escape_string($con, $password);

                         // check is user existing in the database or not
                         $query = "SELECT * FROM user WHERE username = '$username' AND password='".md5($password)."'";
                         
                         
                         $result = mysqli_query($con, $query) or die(mysql_error());
                         //echo ($query);
                         $rows = mysqli_num_rows($result);

                        if ($rows == 1) {

                                $data = mysqli_fetch_assoc($result);
                                $_SESSION['id'] = $data["id"];
                                $_SESSION['username'] = $username;

                                // Redirect user to index.php
                                header("Location: index.php");
                         } else {
                             echo"<div class='form text-center'>
                             <h3>ชื่อผู้ใช้ / รหัสผ่าน ไม่ถูกต้อง.</h3>
                             </div> ";
                         }
                    }         
                    
                ?>
                <div class="member-box">

                    <h2>เข้าสู่ระบบ</h2>

                    <form action="" method="post">

                        <p>
                            <label for="username">ชื่อผู้ใช้ <span class="mand">*</span></label>
                            <input required="" type="text" id="username" name="username" class="form-control" />
                        </p>

                        <p>
                            <label for="password">รหัสผ่าน <span class="mand">*</span></label>
                            <input required="" type="password" id="password" name="password" class="form-control" />
                        </p>
                        
                        <p class="buttons">
                            <button class="btn btn-primary" type="submit">เข้าสู่ระบบ</button>
                            <a class="btn btn-blank" href="registration.php">หรือสมัครสมาชิกใหม่</a>
                        </p>
                    </form>
                </div>

                
                        
            </div>
            
        </div>
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>