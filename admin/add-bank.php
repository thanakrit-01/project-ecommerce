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

                    <div class="card card-body">
                        <form action="process.php?action=insert_bank" method="post" class="form-horizontal" id="">

                            <div class="row-md-9">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>ชื่อ-นามสกุล</label>
                                        <input type="" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <p> ชื่อธนาคาร </p>
                                        <input type="" name="n_bank" class="form-control" required placeholder="ชื่อธนาคาร" />
                                    </div>
                                    <div class="form-group">
                                        <label>สาขา</label>
                                        <input type="" class="form-control" name="branch">
                                    </div>

                                    <div class="form-group">
                                        <label>เลขบัญชี</label>
                                        <input type="" class="form-control" name="number">
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary"> + เพิ่มรายการ </button>
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