<?php include('../config/condb.php'); ?>

<!DOCTYPE html>
<html>

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
            <?php
            include('../config/condb.php');

            $p_id = $_GET['p_id'];
            $sql = "SELECT * FROM tbl_product where p_id='" . $p_id . "'";
            $result = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($result)) {


                ?>

                <section class="content-header">
                    <div class=""> </div>
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
                                <h1>ฟอร์มเพิ่มสินค้า</h1>
                            </div>
                        </div>
                        <div class="card card-body">

                            <div class="row">
                                <div class="col-md-3"></div>

                                <div class="col-md-6">

                                    <form action="process.php?action=update" method="post" enctype="multipart/form-data" name="" class="form-horizontal" id="">

                                        <div class="form-group">
                                            <p> ชื่อสินค้า</p>
                                            <input type="text" name="p_name" value="<?php echo $data['p_name']; ?>" class="form-control" required placeholder="ชื่อสินค้า" />
                                        </div>

                                        <div class="form-group">
                                            <p> รายละเอียดสินค้า </p>
                                            <input type="text" class="form-control" name="p_detail" value="<?php echo $data['p_detail']; ?>" style="padding: 30px;" required placeholder="รายละเอียดสินค้า" />
                                        </div>

                                        <div class="form-group">
                                            <p> ประเภทสินค้า</p>
                                            <select class="form-control" name="category">
                                                <option value="0">ประเภทสินค้า</option>
                                                <option value="ผักสด" <?php if ($data['category'] == 'ผักสด') {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>ผักสด</option>
                                                <option value="ผลไม้" <?php if ($data['category'] == 'ผลไม้') {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>ผลไม้</option>

                                                <option value="เนื้อสด" <?php if ($data['category'] == 'เนื้อสด') {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>เนื้อสด</option>

                                                <option value="อุปกรณ์" <?php if ($data['category'] == 'อุปกรณ์') {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>อุปกรณ์</option>

                                                <option value="สินค้าแปรรูป" <?php if ($data['category'] == 'สินค้าแปรรูป') {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>>สินค้าแปรรูป</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <p> ราคา (บาท) </p>
                                            <input type="number" name="p_price" value="<?php echo $data['p_price']; ?>" class="form-control" required placeholder="ราคา" />
                                        </div>

                                        <div class="form-group">
                                            <p> จำนวน </p>
                                            <input type="number" name="p_qty" value="<?php echo $data['p_qty']; ?>" class="form-control" required placeholder="จำนวน" />
                                        </div>

                                        <div class="form-group">
                                            <p> ภาพสินค้า </p>
                                            <input multiple="" type="file" name="img[]" class="form-control" />
                                        </div>
                                         
                                        <input type="hidden" class="form-control" name="p_id" value="<?php echo $data['p_id']; ?>">

                                        <?php
                                            $sql = "SELECT * FROM tbl_product_image where p_id='" . $p_id . "'";
                                            $result = mysqli_query($con, $sql);
                                            while ($data = mysqli_fetch_array($result)) {

                                                ?>

                                            <div style="display: inline-block;">
                                                <a href="process.php?action=delete_img&id=<?php echo $data['id'] ?>" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?')"" style="position: absolute; width: 28px; height: 28px; background-color: red; color: #fff; border-radius: 50px; text-align: center; border: 2px solid #ccc; margin-left: 23%;;">x</a>
                                                <img style="width: 150px;" src="img/<?= $data['img_name'] ?>">
                                            </div>

                                        <?php  } ?>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                
                                                <button type="submit" class="btn btn-primary" name="update"> + แก้ไขสินค้า </button>
                                            </div>
                                        </div>
                                    <?php  } ?>
                                    </form>
                                </div>

                                <div class="col-md-3"></div>
                            </div>

                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </section>

        </div>

        <!-- /.content-wrapper -->

        <?php include('theme/footer.php'); ?>

    </div>
    <!-- ./wrapper -->

    <?php include('theme/js.php'); ?>

</body>

</html>