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
            <div class="col-sm-6">
              <h1>จัดการโปรโมชั่น</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <table id="ooo" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th style="text-align:center">วันที่เริ่ม</th>
              <th style="text-align:center">วันที่สินสุด</th>
              <th style="text-align:center">โปรโมชั่น</th>
              <th style="text-align:center">ชื่อสินค้า</th>
              <th style="text-align:center">ราคาโปรโมชั่น</th>
              <th style="text-align:center">สถานะโปรโมชั่น</th>
              <th>แก้ไข/ลบ</th>
            </tr>
          </thead>
          <tbody>


            <?php
            $s_id = $_SESSION['s_id'];
            $sql = "SELECT * FROM tbl_promotion where s_id = $s_id";

            $result = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($result)) {
              ?>
              <tr>
                <td style="text-align:center"><?php echo $data['s_time']; ?></td>
                <td style="text-align:center"><?php echo $data['s_time-end']; ?></td>
                <td style="text-align:center"><?php echo $data['promotion']; ?></td>
                <?php
                  $sql2 = "SELECT * FROM tbl_product where p_id='" . $data['p_id'] . "'";
                  $result2 = mysqli_query($con, $sql2);
                  $data2 = mysqli_fetch_array($result2);

                  ?>

                <td style="text-align:center"><?php echo $data2['p_name']; ?></td>
                <td style="text-align:center"><?php echo $data['p_cost2']; ?>บาท</td>
                <th style="text-align:center"></th>
                <td>
                  <a href="edit-promotion.php?pm_id=<?php echo $data['pm_id'] ?>" class="btn btn-success btn-sm">แก้ไข</a>
                  <a href="promotionProcess.php?action=delete_promotion&pm_id=<?php echo $data['pm_id'] ?>" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?')" class="btn btn-danger btn-sm">ลบ</a>
                </td>
              </tr>

            <?php
            }
            ?>
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