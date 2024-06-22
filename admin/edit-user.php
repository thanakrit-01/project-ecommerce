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
                            <h1>แก้ไขสมาชิก</h1>
                        </div>
                    </div>

                    <div class="card card-body">
                        <?php
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM user where id = $id";
                        $result  = mysqli_query($con, $sql);
                        $data = mysqli_fetch_array($result);

                        ?>
                        <form action="process.php?action=update_password" method="post" class="form-horizontal" id="">

                            <div class="row-md-9">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>ชื่อ-นามสกุล</label>
                                        <input type="" value="<?php echo $data['firstname']; ?> <?php echo $data['lastname']; ?>" class="form-control" name="" required>
                                    </div>
                                    <div class="form-group">
                                        <p> รหัสผ่านเดิม </p>
                                        <input type="" name="password"  class="form-control" required placeholder="" />
                                    </div>
                                    <div class="form-group">
                                        <label>รหัสผ่านใหม่</label>
                                        <input type="" class="form-control" name=new_password">
                                    </div>

                                    <div class="form-group">
                                        <label>ยืนยันหรัสผ่าน</label>
                                        <input type="" class="form-control" name="new_password2">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-1 text-center">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                    <input type="hidden" value="<?php echo $id; ?>" name="id" >
                                        <button type="submit" class="btn btn-primary"> แก้ไข </button>
                                    </div>
                                </div>
                            </div>



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