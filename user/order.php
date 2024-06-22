<!DOCTYPE html>
<html lang="en">
<?php include('../config/condb.php'); ?>
<head>
    <?php include('inc/css.php'); ?>
    <style>
        .total-item {
            float: right;
        }

        .total-item div {
            width: 300px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 5px;
            font-size: 20px;
        }

        .total div label {
            text-align: right;
            width: 150px;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php include('inc/header.php');?>

        <div class="row">

            <div class="col-md-12">

                <br><br>
                <table class="basket-table table table-bordered" style="background-color: #fff;;">
                    <thead>
                        <tr>
                            <th width="8%">ลำดับ</th>
                            <th width="15%">ชื่อสินค้า</th>
                            <th width="15%">จำนวนที่สั่ง</th>
                            <th width="15%">ราคา</th>
                            <th width="15%">ราคารวม</th>

                        </tr>
                    </thead>
                    <tbody>

                    <?php
                            //$s_id = $_SESSION['s_id'];
                            $or_id = $_GET['or_id'];

                            $sql2 = "SELECT * FROM tbl_order WHERE or_id = $or_id ";
                            $result2 = mysqli_query($con, $sql2);
                            $data2 = mysqli_fetch_array($result2);

                            $shipping = $_GET['shipping'];
                            $sql = "SELECT * FROM tbl_orderdetail 
                            INNER JOIN tbl_product ON tbl_product.p_id = tbl_orderdetail.p_id 
                            WHERE or_id = $or_id ";

                            $result = mysqli_query($con, $sql);
                            $A = '1';
                            $total = 0;
                            while ($data = mysqli_fetch_array($result)) {
                                $total += $data['total_price'];

                                ?>

                            <tr>
                                <td><?php echo $A; ?></td>
                                <td><?php echo $data['p_name']; ?></td>
                                <td><?php echo $data['qty']; ?></td>
                                <td><?php echo number_format($data['price'],2); ?></td>
                                <td><?php echo number_format($data['total_price'],2); ?></td>
                            </tr>




                        <?php $A++;
                        } ?>

                        <tr>
                            <td colspan="4" align="right">ค่าจัดส่ง</td>
                            <td><?= $_GET['shipping'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">รวม</td>
                            <td><?= number_format($total + $_GET['shipping'], 2) ?></td>
                        </tr>

                        <tr>
                            <td colspan="5" align="center">
                                <?=$data2['user_address']?>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <p class="actions">
                    <a class="btn btn-primary" href="index.php">เลือกซื้อสินค้า</a>
                </p>

            </div>

        </div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>