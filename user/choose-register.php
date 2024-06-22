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
            <div class="container">
                <div class="starter-template">
                    <div class="row marketmenuboxs">
                        <div class="col-md-6 ">
                            <div class="thumbnail">
                                <div class="caption" style="text-align: center">
                                    <h3>ผู้ซื้อ</h3>
                                    <p>
                                        <a href="registration.php" class="btn btn-primary">
                                            <span class="" aria-hidden=""></span> สมัครสมาชิก
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="thumbnail">
                                <div class="caption" style="text-align: center">
                                    <h3>ผู้ขาย</h3>
                                    <p>
                                        <a href="seller-register.php" class="btn btn-primary">
                                            <span class="" aria-hidden=""></span> สมัครสมาชิก
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>