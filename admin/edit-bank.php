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
                            <h1>บัญชีธนาคาร</h1>
                        </div>
                    </div>
                    
                    <?php
            //$s_id = $_SESSION['s_id'];
            $b_id = $_GET['b_id'];
            $sql = "SELECT * FROM tbl_bank WHERE b_id='" . $b_id . "'";
            $result  = mysqli_query($con, $sql);
            $data = mysqli_fetch_array($result);
              ?>

                    <div class="card card-body">
                        <form action="process.php?action=update_bank" method="post" class="form-horizontal" id="">

                            <div class="row-md-9">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>ชื่อ-นามสกุล</label>
                                        <input type="" class="form-control" name="name" value="<?php echo $data['b_name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <p> ชื่อธนาคาร </p>
                                        <input type="" name="n_bank" value="<?php echo $data['b_bank']; ?>" class="form-control" required  />
                                    </div>
                                    <div class="form-group">
                                        <label>สาขา</label>
                                        <input type="" class="form-control" name="branch" value="<?php echo $data['branch']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>เลขบัญชี</label>
                                        <input type="" class="form-control" name="number" value="<?php echo $data['account_number']; ?>" required>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <div class="col-sm"12>
                                        <button type="submit" class="btn btn-primary">  แก้ไข </button>
                                        <input type="hidden" value="<?php echo $b_id; ?>"  name="b_id" >
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