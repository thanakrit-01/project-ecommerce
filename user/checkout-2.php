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
            <div class="col-md-12">
                <div class="checkout-steps clearfix">

                    <p class="step ">
                        <span class="entypo chevron-right"></span>
                        1. กรอกข้อมูล
                    </p>

                    <p class="step step-active">
                        <span class="entypo chevron-right"></span>
                        2. เลือกการจัดส่ง/วิธีเลือกชำระ
                    </p>
                    <p class="step">
                        3. การยืนยัน
                    </p>

                </div>

            </div>
        </div>

        <form action="checkout-3.php" method="post">
            <div class="row">

                <div class="col-md-6">

                    <div class="checkout-box checkout-box-short">

                        <h2>เลือกการจัดส่ง</h2>

                        <?php
                        $name = $_POST['name'];
                        $addr = $_POST['addr'];
                        $province = $_POST['province'];
                        $amphur = $_POST['amphur'];
                        $postcode = $_POST['postcode'];
                        $phone = $_POST['phone'];

                        $txt = 'ชื่อผู้สั่งซื้อ : '.$name;
                        $txt .= ' ที่อยู่ : '.$addr;
                        $txt .= ' จังหวัด : '.$province;
                        $txt .= ' อำเภอ : '.$amphur;
                        $txt .= ' รหัสไปรษณีย์ : '.$postcode;
                        $txt .= ' เบอร์ติดต่อ : '.$phone;

                        echo $txt;
                        echo '<hr>';

                        ?>

                        <input type="hidden" name="user_address" value="<?=$txt?>">

                        <?php
                        //$s_id = $_SESSION['s_id'];
                        $sql = "SELECT * FROM tbl_delivery";
                        $result = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($result)) {

                            ?>

                            <?php
                                //$s_id = $_SESSION['s_id'];
                                $sql2 = "SELECT * FROM tbl_expenses ";
                                $result2 = mysqli_query($con, $sql2);
                                $data2 = mysqli_fetch_array($result2);

                                ?>

                            <p class="radios" name="delivery">
                                <input type="radio" id="field-standard" value=" <?php echo $data2['e_id']; ?>" name="shipping" checked="checked" />
                                <?php echo $data2['e_id']; ?> <?php echo $data['d_name']; ?>
                                <?php echo $data2['e_price']; ?><br />

                            </p>



                        <?php } ?>



                    </div>

                </div>

                <div class="col-md-6">

                    <div class="checkout-box checkout-box-short">


                        <p class="radios" name="delivery">
                            <input type="radio" id="field-standard" name="" checked="checked" /> โอนจ่าย

                        </p>


                        <br>
                        <p class="buttons">
                            <a class="btn btn-primary" href="checkout-1.php">ก่อนหน้านี้</a>
                            <button class="btn btn-primary" type="submit">ตกลง</button>
                        </p>



                    </div>

                </div>
            </div>
        </form>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>