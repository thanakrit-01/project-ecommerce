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
              <h1>ประวัติการสั่งซื้อ</h1>
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
              <th>รายการสั่งซื้อ</th>
              <th>สถานะ</th>
              <th>อนุมัติ/ไม่อนุมัติ</th>
            </tr>
          </thead>
          <tbody>


            <?php
            $s_id = $_SESSION['s_id'];
            $sql4 = "SELECT * FROM tbl_order 
                        INNER JOIN user ON user.id = tbl_order.id WHERE s_id LIKE '%".$s_id."%' AND or_status = 'delivery_success' ORDER BY tbl_order.or_date DESC ";

            $result4 = mysqli_query($con, $sql4);
            $A = '1';
            while ($data4 = mysqli_fetch_array($result4)) {

              ?>

              <tr>
              <td><?php echo $A; ?></td>
                <td><?php echo $data4['or_date']; ?></td>
                <td><?php echo $data4['firstname']; ?> <?php echo $data4['lastname']; ?></td>

                <?php
                  //$or_id = $data['or_id'];
                  $sql3 = "SELECT * FROM tbl_orderdetail  WHERE or_id = '" . $data4['or_id'] . "'";
                  $result3 = mysqli_query($con, $sql3);
                  $data3 = mysqli_fetch_array($result3);

                  ?>

                <td><a href="order.php?or_id=<?php echo $data4['or_id']; ?>&shipping=<?php echo $data4['shipping_price']; ?>" class="btn btn-success btn-sm">รายละเอียด</a></td>
                <td>
                  <?php
                    if ($data4['or_status'] == 'order') {

                      echo 'รอการชำระเงิน';

                    } else if ($data4['or_status'] == 'delivery') {

                      echo 'ชำระเงินเรียบร้อย';

                    } else if ($data4['or_status'] == 'cancel') {

                      echo 'ไม่อนุมัติ';
                    }else if ($data4['or_status'] == 'delivery_waiting') {

                      echo 'อยู่ระหว่างการจัดส่ง';
                    }else if ($data4['or_status'] == 'delivery_success') {

                      echo 'จัดส่งเรียบร้อย';
                    }
                    ?>

                </td>
                <td>

                  <?php if ($data4['or_status'] == 'order') { ?>

                    ระบบกำลังดำเนินการ

                  <?php } else { ?>

                    <?php if($data4['or_status'] == 'delivery'){ ?>
                      <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=update_order&or_status=delivery_waiting&or_id=<?=$data4['or_id']?>" class="btn btn-success btn-sm">จัดส่ง</a>
                    <?php }else if($data4['or_status'] == 'delivery_waiting'){ ?>
                      <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=update_order&or_status=delivery_success&or_id=<?=$data4['or_id']?>" class="btn btn-primary btn-sm">จัดส่งเรียบร้อย</a>
                    <?php }else if($data4['or_status'] == 'delivery_success'){ ?>
                      เสร็จสิ้น
                    <?php } ?>

                  <?php } ?>
                </td>
               
              </tr>
            <?php $A++; } ?>
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