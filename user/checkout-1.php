<!DOCTYPE html>

<html lang="en">

<?php include('../config/condb.php'); ?>

<head>

    <?php include('inc/css.php'); ?>

</head>

<body>



    <div class="container">

        <?php include('inc/header.php'); ?>



        <div class="row">

            <div class="col-md-12">

                <div class="checkout-steps clearfix">



                    <p class="step step-active">

                        <span class="entypo chevron-right"></span>

                        1. กรอกข้อมูล

                    </p>



                    <p class="step">

                        <span class="entypo chevron-right"></span>

                        2. เลือกการจัดส่ง/จ่ายเงิน

                    </p>

                    <p class="step">

                        3. การยืนยัน

                    </p>



                </div>



            </div>

        </div>



        <div class="row">

            <div class="col-md-12">



                <div class="checkout-box checkout-box-long">

                    <h2>กรุณากรอกข้อมูล</h2>

                    <form action="checkout-2.php" method="post">



                        <p>

                            <label for="field-fname">ชื่อ-สกุล <span class="mand">*</span></label>

                            <input required="" type="text" id="field-fname" name="name" class="form-control" />

                        </p>



                        <p>

                            <label for="field-add1">ที่อยู่ปัจจุบัน <span class="mand">*</span></label>

                            <input required="" type="text" id="field-add1" name="addr" class="form-control" />

                        </p>



                        <p>

                            <label for="field-city">จังหวัด <span class="mand">*</span></label>

                            <input required="" type="text" id="field-city" name="province" class="form-control" />

                        </p>



                        <p>

                            <label for="field-county">อำเภอ <span class="mand">*</span></label>

                            <input required="" type="text" id="field-county" name="amphur" class="form-control" />

                        </p>



                        <p>

                            <label for="field-postcode">รหัสไปรษณีย์ <span class="mand">*</span></label>

                            <input required="" type="text" id="field-postcode" name="postcode" class="form-control" />

                        </p>



                        <p>

                            <label for="field-phone">เบอร์มือถือ <span class="mand">*</span></label>

                            <input required="" type="text" id="field-phone" name="phone" class="form-control" />

                        </p>



                        <p class="buttons">

                            <button class="btn btn-primary" type="submit">ตกลง</button>

                        </p>



                    </form>



                </div>



            </div>

        </div>



        <?php include('footer.php'); ?>

    </div>

    <?php include('inc/js.php'); ?>

</body>

</html>