<!DOCTYPE html>
<html>
<?php include('../config/condb.php'); ?>

<head>

    <?php include('theme/css.php'); ?>

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
                        <div class="col-sm-12" style="border-bottom: 1px solid #ccc; padding-bottom: 8px;">
                            <h1>ข้อมูลสินค้า</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <table id="ooo" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>ชื่อสินค้า</th>
                            <th>รายละเอียดสินค้า</th>
                            <th>ประเภทสินค้า</th>
                            <th>ราคา (บาท)</th>
                            <th>จำนวนสินค้า</th>
                            <th>รูปสินค้า</th>
                            <th>แก้ไข/ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $s_id = $_SESSION['s_id'];
                        $sql = "SELECT * FROM tbl_product WHERE s_id = $s_id ";
                        $result = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($result)) {

                            ?>

                            <tr>
                                <td><?php echo $data['date_save']; ?></td>
                                <td><?php echo $data['p_name']; ?></td>
                                <td><?php echo $data['p_detail']; ?></td>
                                <td><?php echo $data['category']; ?></td>
                                <td><?php echo $data['p_price']; ?></td>
                                <td><?php echo $data['p_qty']; ?></td>
                               
                                <?php
                                            $sql2 = "SELECT * FROM tbl_product_image where p_id='" . $data['p_id'] . "'";
                                            $result2 = mysqli_query($con, $sql2);
                                            $data2 = mysqli_fetch_array($result2);

                                ?>

                               
                                <td ><img style="width: 100px;" src="img/<?=$data2['img_name']?>"></td>
                                
                                <td><a href="edit.php?&p_id=<?php echo $data['p_id'] ?>" class="btn btn-success btn-sm">แก้ไข</a>
                                    <a href="process.php?action=delete_product&p_id=<?php echo $data['p_id'] ?>" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?')" class="btn btn-danger btn-sm">ลบ</a>
                                </td>
                                
                            </tr>
                        <?php } ?>


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