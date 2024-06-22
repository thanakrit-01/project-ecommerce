<!DOCTYPE html>
<html>
<?php include('check_login.php');?>
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
              <h1>ข้อมูลการสั่งซื้อ</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">



        <table id="ooo" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
            <th>ลำดับ</th>
              <th>วันที่</th>
              <th>ชื่อลูกค้า</th>
              <th>รายการที่สั่ง</th>
              <th>ค่าจัดส่ง</th>
              <th>สถานะ</th>
              <th>อนุมัติ/ไม่อนุมัติ</th>
            </tr>
          </thead>
          <tbody>


            <?php
            //$s_id = $_SESSION['s_id'];
            $sql = "SELECT * FROM tbl_order 
                        INNER JOIN user ON user.id = tbl_order.id ORDER BY tbl_order.or_date DESC ";

            $result_order  = mysqli_query($con, $sql);
            $A = '1';
            while ($data_or = mysqli_fetch_array($result_order )) {

              ?>

              <tr>
              <td><?php echo $A; ?></td>
                <td><?php echo $data_or['or_date']; ?></td>
                <td><?php echo $data_or['firstname']; ?> <?php echo $data_or['lastname']; ?></td>

                <?php
                  //$or_id = $data['or_id'];
                  $sql2 = "SELECT * FROM tbl_orderdetail  WHERE or_id = '" . $data_or['or_id'] . "'";
                  $result_orderdetail = mysqli_query($con, $sql2);
                  $data2 = mysqli_fetch_array($result_orderdetail);

                  ?>

<td><a href="order.php?or_id=<?php echo $data_or['or_id']; ?>&shipping=<?php echo $data_or['shipping_price']; ?>" 
class="btn btn-success btn-sm">รายละเอียด</a></td>

                <td><?php echo $data_or['shipping_price']; ?></td>
                <td>
                  <?php
                    if ($data_or['or_status'] == 'order') {

                      echo 'รอการชำระเงิน';

                    } else if ($data_or['or_status'] == 'delivery') {

                      echo 'ชำระเงินเรียบร้อย';

                    } else if ($data_or['or_status'] == 'cancel') {

                      echo 'ไม่อนุมัติ';
                    }
                    ?>

                </td>

                <td>

                  <?php if ($data_or['or_status'] == 'order') { ?>

                    <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=update_order&or_status=delivery&or_id=<?=$data_or['or_id']?>" class="btn btn-success btn-sm">อนุมัติ</a>
                    <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=update_order&or_status=cancel&or_id=<?=$data_or['or_id']?>" class="btn btn-danger btn-sm">ไม่อนุมัติ</a>

                  <?php } else { ?>

                    เสร็จสิ้น

                  <?php } ?>
                </td>
              </tr>
            <?php $A++;} ?>
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