<!DOCTYPE html>
<html>
<?php include('../config/condb.php'); ?>

<head>

    <?php include('theme/css.php'); ?>

    <style>
	.total-item{
		float: right;
	}
	.total-item div{
		width: 300px;
		background-color: #fff;
		border: 1px solid #ccc;
		padding: 5px;
		font-size: 20px;
	}
	.total div label{
		text-align: right;
		width: 150px;
	}
</style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->

        <?php include('theme/header.php'); ?>

        <?php include('theme/menu.php'); ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>รายละเอียดการสั่งซื้อ</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">



                <table id="ooo" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวนที่สั่ง</th>
                            <th>ราคา</th>
                            <th>ราคารวม</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $s_id = $_SESSION['s_id'];
                        $or_id = $_GET['or_id'];
                        $shipping = $_GET['shipping'];

                        $sql2 = "SELECT * FROM tbl_order WHERE or_id = $or_id ";
                        $result2 = mysqli_query($con, $sql2);
                        $data2 = mysqli_fetch_array($result2);

                        $sql = "SELECT * FROM tbl_orderdetail 
                        INNER JOIN tbl_product ON tbl_product.p_id = tbl_orderdetail.p_id 
                        WHERE or_id = $or_id AND tbl_orderdetail.s_id = $s_id ";

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
                            <td><?=$_GET['shipping']?></td>
                        </tr>
                        <tr>
                            <td colspan="4" align="right">รวม</td>
                            <td><?=number_format($total + $_GET['shipping'],2)?></td>
                        </tr>
                        <tr>
                            <td colspan="5" align="center">
                                <?=$data2['user_address']?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </section>

        </div>
        <!-- /.content-wrapper -->

        <?php include('theme/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <?php include('theme/js.php'); ?>

    <script>
        $(document).ready(function() {
            $('#ooo').DataTable();
        });
    </script>

</body>

</html>