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
                if (isset($_REQUEST['s_username'])) {
                    // removes backslashes
                    $s_username = stripslashes($_REQUEST['s_username']);
                    //escapes special characters in a string
                    $s_username = mysqli_real_escape_string($con, $s_username);

                    $email = stripslashes($_REQUEST['email']);
                    $email = mysqli_real_escape_string($con, $email);

                    $s_password = stripslashes($_REQUEST['s_password']);
                    $s_password = mysqli_real_escape_string($con, $s_password);

                    $shopname = stripslashes($_REQUEST['shopname']);
                    $shopname = mysqli_real_escape_string($con, $shopname);
                    
                    $firstname = stripslashes($_REQUEST['firstname']);
                    $firstname = mysqli_real_escape_string($con, $firstname);

                    $lastname = stripslashes($_REQUEST['lastname']);
                    $lastname = mysqli_real_escape_string($con, $lastname);

                    $location = stripslashes($_REQUEST['location']);
                    $location = mysqli_real_escape_string($con, $location);

                    $phone = stripslashes($_REQUEST['phone']);
                    $phone = mysqli_real_escape_string($con, $phone);

                    $trn_date = date("Y-m-d H:i:s");

                    $sql = "INSERT into `seller` (s_username, s_password, s_email, shopname, firstname, lastname, location, phone, trn_date)
                    VALUES ('$s_username', '" . md5($s_password) . "', '$email', '$shopname', '$firstname', '$lastname', '$location', '$phone', '$trn_date')";

                    $result = mysqli_query($con, $sql);

                    if ($result) {
                        echo "<div class='form text-center'>
                   <h3>สมัครสมาชิกสำหรับร้านค้าเรียบร้อย</h3>
                   <br>คลิกเพื่อเข้าสู่ระบบ <a href='../seller/login.php'>Login</a>
                   </div>";
                    }
                }
                ?>

                <div class="member-box">

                    <h2 class="text-center">สมัครสมาชิก สำหรับผู้ขาย (ร้านค้า)</h2>
                    <form fame="seller-register" action="" method="post">

                    <p>
                            <label for="firstname">ชื่อ <span class="mand">*</span></label>
                            <input type="text" name="firstname" placeholder="" required />
                        </p>

                        <p>
                            <label for="lastname">นามสกุล <span class="mand">*</span></label>
                            <input type="text" name="lastname" placeholder="" required />
                        </p>

                        <p>
                            <label for="s_username">username <span class="mand">*</span></label>
                            <input type="text" name="s_username" placeholder="" required />
                        </p>

                        <p>
                            <label for="email">อีเมลล์ <span class="mand">*</span></label>
                            <input type="email" name="email" placeholder="" required />
                        </p>

                        <p>
                            <label for="s_password">รหัสผ่าน <span class="mand">*</span></label>
                            <input type="password" name="s_password" placeholder="" required />
                        </p>
                        <p>
                            <label for="shopname">ชื่อร้านค้า <span class="mand">*</span></label>
                            <input type="text" name="shopname" placeholder="" required />
                        </p>

                        <p>
                            <label for="location">ที่อยู่ <span class="mand">*</span></label>
                            <input type="text" name="location" placeholder="" required />
                        </p>
                        <p>
                            <label for="phone">เบอร์โทรศัพท์ <span class="mand">*</span></label>
                            <input type="number" name="phone" placeholder="" required />
                        </p>
                        <p class="buttons">
                            <button class="btn btn-primary" type="submit">สมัครสมาชิก</button>
                        </p>

                    </form>
                    <p> Click here to login!<a href="login.php">Login here</a></p>
                </div>

            </div>

        </div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>