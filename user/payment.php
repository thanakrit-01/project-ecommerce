<!DOCTYPE html>
<html lang="en">
<?php include('../config/condb.php'); ?>

<head>
    <?php include('inc/css.php'); ?>
</head>

<body>

    <div class="container">

        <?php include('inc/header.php'); ?>
        <!-- Body -->
        <div class="row">

            <div class="col-md-12">

                <div class="checkout-steps clearfix">



                </div>

            </div>

        </div>

        <form action="process.php?action=insert_payment"  method="post" enctype="multipart/form-data">
        <div class="row">

            <div class="col-md-6">

                <div class="checkout-box checkout-box-short" > 

                    <h2>เลือกธนาคาร</h2>

                    
                        <?php
                        //$s_id = $_SESSION['s_id'];
                        $sql = "SELECT * FROM tbl_bank";
                        $result = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($result)) {

                            ?>

                            <p class="radios" name="">
                                <input type="radio" id="field-standard" value=" <?php echo $data2['e_id'];?>" name="bank" checked="checked" />
                                 <?php echo $data['b_name']; ?>
                                 <?php echo $data['b_bank']; ?>
                                 <?php echo $data['branch']; ?>
                                 <?php echo $data['account_number']; ?>

                            </p>

                        <?php } ?>
                            

                </div>

            </div>

            <div class="col-md-6">

                <div class="checkout-box checkout-box-short" >

                    <h2>ชำระเงิน</h2>

                    <div class="form-group">
                        <label>วันที่</label>
                        <input type="date" class="form-control" name="date" required>
                    </div>

                    <div class="form-group">
                        <label>เวลา</label>
                        <input type="text" class="form-control" name="time" required>
                    </div>

                    <div class="form-group">
                    <label>สลิป</label>
                        <input multiple="" type="file" name="image" class="form-control" />
                    </div>

                    <div class="form-group">
                    <label>จำนวนเงิน</label>
                        <input  type="cost" name="cost" class="form-control" required placeholder="จำนวน" />
                    </div>

                    <br>
                    <p class="buttons">
                    <button class="btn btn-lg btn-success" type="submit" name="insert"> ชำระเงิน</button>
                    </p>


                </div>

            </div>

        </div>
        </form>

        <?php include('footer.php'); ?>

    </div>

    <?php include('inc/js.php');?>

</body>

</html>