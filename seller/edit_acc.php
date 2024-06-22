<!DOCTYPE html>
<html>
<?php include('../config/condb.php'); ?>

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
                    <div class="row-md-6">
                        <div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
                            <h1>จัดการบัญชี</h1>
                        </div>
                    </div>

                    <div class="card card-body">
                        <form action="process.php?action=update_acc" method="post" class="form-horizontal" id="">


                            <?php

                            $acc_id = $_GET['acc_id'];
                            $sql = "SELECT * FROM tbl_accounting where acc_id='" . $acc_id . "'";
                            $result = mysqli_query($con, $sql);
                            while ($data = mysqli_fetch_array($result)) {


                                ?>

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>วันที่</label>
                                            <input type="date" value="<?php echo $data['acc_date']; ?>" class="form-control" name="date" >
                                        </div>
                                        <div class="form-group">
                                            <p> รายรับ </p>
                                            <input type="" name="list" value="<?php echo $data['acc_list']; ?>" class="form-control"  placeholder="ชื่อรายการ" />
                                        </div>
                                        <div class="form-group">
                                            <label>จำนวนเงิน</label>
                                            <input type="cost" value="<?php echo $data['acc_amount']; ?>" class="form-control" name="cost">
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>วันที่</label>
                                            <input type="date" value="<?php echo $data['acc_date2']; ?>" class="form-control" name="date2" >
                                        </div>

                                        <div class="form-group">
                                            <p> รายจ่าย </p>
                                            <input type="" value="<?php echo $data['acc_list2']; ?>" name="list2" class="form-control"  placeholder="ชื่อรายการ" />
                                        </div>
                                        <div class="form-group">
                                            <label>จำนวนเงิน</label>
                                            <input type="text" value="<?php echo $data['acc_amount2']; ?>" class="form-control" name="cost2">
                                        </div>


                                    </div>

                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <input type="hidden" value="<?php echo $acc_id; ?>"  name="acc_id" >
                                            <button type="submit" class="btn btn-primary"> + แก้ไขรายการ </button>
                                        </div>
                                    </div>
                                </div>


                            <?php  } ?>
                        </form>
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