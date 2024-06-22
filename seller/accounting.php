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

          <h1>บัญชี</h1>

        </div><!-- /.container-fluid -->
      </section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered" style="border: 1px solid #000;">
              <tbody>
                <tr>
                  <td colspan="4" rowspan="1" style="text-align:center">รายรับ</td>
                  <td colspan="4" rowspan="1" style="text-align:center">รายจ่าย</td>
                </tr>
                <tr>
                  <td colspan="1" rowspan="2" style="text-align:center">วันที่</td>
                  <td colspan="1" rowspan="2" style="text-align:center">รายการ</td>
                  <td colspan="2" rowspan="1" style="text-align:center">จำนวนเงิน</td>
                  <td colspan="1" rowspan="2" style="text-align:center">วันที่</td>
                  <td colspan="1" rowspan="2" style="text-align:center">รายการ</td>
                  <td colspan="2" rowspan="1" style="text-align:center">จำนวนเงิน</td>
                </tr>
                <tr>
                  <td style="text-align:center">บาท/สต.</td>
                  <td style="text-align:center">ปุ่ม</td>
                  <td style="text-align:center">บาท/สต.</td>
                  <td style="text-align:center">ปุ่ม</td>
                </tr>

                <?php
                $s_id = $_SESSION['s_id'];
                $sql = "SELECT * FROM tbl_accounting where s_id = $s_id ";

                $result = mysqli_query($con, $sql);
                $total = 0;
                $total2 = 0;
                while ($data = mysqli_fetch_array($result)) {
                  $total += $data['acc_amount'];
                  $total2 += $data['acc_amount2'];
                  ?>

                  <tr>
                    <td style="text-align:center"><?php echo $data['acc_date']; ?></td>
                    <td style="text-align:center"><?php echo $data['acc_list']; ?></td>
                    <td style="text-align:center"><?php echo $data['acc_amount']; ?></td>


                    <td style="text-align:center">

                      <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="edit_acc.php?&acc_id=<?php echo $data['acc_id'] ?>" class="btn btn-success btn-sm">แก้ไข</a>
                      <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=delete_acc&acc_id=<?php echo $data['acc_id'] ?>" class="btn btn-danger btn-sm">ลบ</a>

                    </td>

                    <td style="text-align:center"><?php echo $data['acc_date2']; ?></td>
                    <td style="text-align:center"><?php echo $data['acc_list2']; ?></td>
                    <td style="text-align:center"><?php echo $data['acc_amount2']; ?></td>

                    <td style="text-align:center">
                      <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="edit_acc.php?&acc_id=<?php echo $data['acc_id'] ?>" class="btn btn-success btn-sm">แก้ไข</a>
                      <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=delete_acc&acc_id=<?php echo $data['acc_id'] ?>" class="btn btn-danger btn-sm">ลบ</a>

                    </td>
                  </tr>
                  <?php
                } ?>
                  <tr>
                    
                    <td colspan="2" align="right">รวม</td>
                    <td><?php echo number_format($total,2); ?></td>
                    <td style="border-bottom: 1px solid #f4f6f9 !important;"></td>

                    <td colspan="2" align="right">รวม</td>
                    <td><?php echo number_format($total2,2); ?></td>
                    <td style="border-bottom: 1px solid #f4f6f9 !important; border-right: 1px solid #f4f6f9 !important;">

                    </td>
                  </tr>

               

              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->

    <?php include('theme/footer.php'); ?>

  </div>
  <!-- ./wrapper -->

  <?php include('theme/js.php'); ?>

</body>

</html>