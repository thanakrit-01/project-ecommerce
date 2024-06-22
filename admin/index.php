<!DOCTYPE html>
<html>

<head>

  <?php include('theme/css.php'); ?>


  <?php
  include('check_login.php');
  ?>

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
              <h1>สลิป</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <?php include('../config/condb.php'); ?>

      <!-- Main content -->
      <section class="content">

        <table id="ooo" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>ไอดี</th>
              <th>วันที่</th>
              <th>เวลา</th>
              <th>ลูกค้า</th>
              <th>สลิป</th>
              <th>จำนวนเงิน</th>
              <th>สถานะ</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php
            $sql = "SELECT * FROM tbl_payment 
             inner join user on tbl_payment.id = user.id order by tbl_payment.pa_id desc ";
            $result = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($result)) {
              ?>

              <tr>
                <td><?php echo $data['pa_id']; ?></td>
                <td><?php echo $data['pa_date']; ?></td>
                <td><?php echo $data['pa_time']; ?></td>
                <td><?php echo $data['firstname']; ?> <?php echo $data['lastname']; ?></td>
                <td>
                  <a href="../user/slip/<?= $data['pa_slip'] ?>" target="_blank">
                    <img style="width: 50px;" src="../user/slip/<?= $data['pa_slip'] ?>">
                  </a>
                </td>
                <td><?php echo $data['pa_price']; ?></td>
                <td>
                  <?php
                    if ($data['status'] == 'payment') {

                      echo 'รอการชำระเงิน';
                    } else if ($data['status'] == 'confirm') {

                      echo 'ชำระเงินเรียบร้อย';
                    } else if ($data['status'] == 'cancel') {

                      echo 'ยกเลิก';
                    }
                    ?>

                </td>

                <td>

                  <?php if ($data['status'] == 'payment') { ?>

                    <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=update_payment&status=confirm&pa_id=<?= $data['pa_id'] ?>" class="btn btn-success btn-sm">อนุมัติ</a>
                    <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=update_payment&status=cancel&pa_id=<?= $data['pa_id'] ?>"" class=" btn btn-danger btn-sm">ไม่อนุมัติ</a>

                  <?php } else { ?>

                    เสร็จสิ้น

                  <?php } ?>
                </td>
              </tr>
            <?php } ?>

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
      $('#ooo').DataTable({
        "order": [
          [3, "desc"]
        ]
      });
    });
  </script>

</body>

</html>