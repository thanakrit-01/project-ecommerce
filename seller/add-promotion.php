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
            <form action="promotionProcess.php?action=insert" method="post" enctype="multipart/form-data" name="" class="form-horizontal" id="">

              <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">

                  <div class="form-group">
                    <label>วันที่เริ่มต้น</label>
                    <input type="date" class="form-control" name="date" required>
                  </div>
                  

                  <div class="form-group">
                    <label>วันที่สิ้นสุด</label>
                    <input type="date" class="form-control" name="date2" required>
                  </div>

                <div class="form-group">
                  <p>โปรโมชั่น</p>
                  <select class="form-control" name="promotion">
                    <option value="ประเภทโปรโมชั่น">ประเภทโปรโมชั่น</option>
                    <option value="ลดราคา">ลดราคา</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <p>สินค้า</p>
                  <select class="form-control" name="p_id">
                    <option value="">สินค้า</option>
                    <?php
                        $s_id = $_SESSION['s_id'];
                        $sql = "SELECT * FROM tbl_product WHERE s_id = $s_id ";
                        $result = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($result)) {

                            ?>
                    <option value="<?php echo $data['p_id']; ?>"><?php echo $data['p_name']; ?></option>

                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <p> ราคาโปรโมชั่น </p>
                  <input type="text" name="newcost" class="form-control" required placeholder="ราคา" />
                </div>
               

                <div class="form-group">
                  <div class="col-sm-12">
                   
                  <button type="submit" class="btn btn-primary" name="btnadd"> + เพิ่มโปรโมชั่น </button>
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