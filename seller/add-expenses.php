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
              <h1>ค่าจัดส่ง</h1>
            </div>
          </div>
          <div class="card card-body col-md-6 col-md-offset-3">
            <form action="process.php?action=insert_expenses" method="post" enctype="multipart/form-data" name="" class="form-horizontal" id="">

              <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">
                
                <div class="form-group">
                  <p>เลือกการจัดส่ง</p>
                  <select class="form-control" name="delivery2">
                    <option value="">เลือกการจัดส่ง</option>
                    <?php
                        $s_id = $_SESSION['s_id'];
                        $sql = "SELECT * FROM tbl_delivery ";
                        $result = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($result)) {

                            ?>
                    <option value="<?php echo $data['d_id']; ?>"><?php echo $data['d_name']; ?></option>

                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <p> ราคาจัดส่ง </p>
                  <input type="cost" name="cost" class="form-control" required placeholder="ราคา" />
                </div>
               

                <div class="form-group">
                  <div class="col-sm-12">
                   
                  <button type="submit" class="btn btn-primary" name="btnadd"> + เพิ่มค่าจัดส่ง </button>
                  <button type="reset" class="btn btn-danger">ล้างฟอร์ม</button>
                  </div>
                </div>
              </div>
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