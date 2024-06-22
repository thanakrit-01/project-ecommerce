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
                        <div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
                            <h1>จัดการโปรโมชั่น</h1>
                        </div>
                    </div>
                    <div class="card card-body col-md-6 col-md-offset-3">
                        <?php

                        $pm_id = $_GET['pm_id'];
                        $sql = "SELECT * FROM tbl_promotion where pm_id = $pm_id";
                        $result = mysqli_query($con, $sql);
                        $data = mysqli_fetch_array($result);
                        ?>

                        <form action="promotionProcess.php?action=update_promotion" method="post" enctype="multipart/form-data" name="" class="form-horizontal" id="">

                            <div class="row">
                                <div class="col-md-3"></div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>วันที่เริ่มต้น</label>
                                        <input type="date" class="form-control" name="date" value="<?php echo $data['s_time']; ?>" required>
                                    </div>


                                    <div class="form-group">
                                        <label>วันที่สิ้นสุด</label>
                                        <input type="date" class="form-control" name="date2" value="<?php echo $data['s_time-end']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <p>โปรโมชั่น</p>
                                        <select class="form-control" name="promotion">
                                            <option value="ประเภทโปรโมชั่น"></option>
                                            <option value="ลดราคา" <?php if ($data['promotion'] == 'ลดราคา') {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>ลดราคา</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <p>สินค้า</p>
                                                                                        
                                        <?php
                                        $s_id = $_SESSION['s_id'];
                                        $sql2 = "SELECT * FROM tbl_product WHERE p_id ='" . $data['p_id'] . "'";
                                        $result2 = mysqli_query($con, $sql2);
                                        $data2 = mysqli_fetch_array($result2);
                                                     // เกี่ยวกับเรียกข้อมูล  tbl_product                      
                                        ?>
                                        <input type="text" class="form-control" name="p_name" value="<?php echo $data2['p_name'];?>" required>

                                    </div>

                                    <div class="form-group">
                                        <p> ราคาโปรโมชั่น </p>
                                        <input type="text" name="newcost" class="form-control" value="<?php echo $data['p_cost2']; ?>" required placeholder="ราคา" />
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <input type="hidden" class="form-control" name="pm_id" value="<?php echo $data['pm_id']; ?>" required>
                                            <button type="submit" class="btn btn-primary" name="update"> แก้ไข </button>
                                            <button type="reset" class="btn btn-danger">ล้างฟอร์ม</button>
                                        </div>
                                    </div>

                        </form>
                    </div>
                </div>
                
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content-wrapper -->



    </div>
    <?php include('theme/footer.php'); ?>
    <!-- ./wrapper -->

    <?php include('theme/js.php'); ?>
</body>

</html>