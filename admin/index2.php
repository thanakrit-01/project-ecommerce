<!DOCTYPE html>
<html>
<?php include('check_login.php'); ?>
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
              <th>ชื่อ</th>
              <th>ชื่อธนาคาร</th>
              <th>สาขา</th>
              <th>เลขบัญชี</th>
              <th>แก้ไข/ลบ</th>
            </tr>
          </thead>
          <tbody>


            <?php
            //$s_id = $_SESSION['s_id'];
            $sql = "SELECT * FROM tbl_bank ";
            $result  = mysqli_query($con, $sql);
            $A = '1';
            while ($data = mysqli_fetch_array($result)) {
            

              ?>

              <tr>
              <td><?php echo $A; ?></td>
                <td><?php echo $data['b_name']; ?></td>
                <td><?php echo $data['b_bank']; ?></td>
                <td><?php echo $data['branch']; ?></td>
                <td><?php echo $data['account_number']; ?></td>

                <td>

                  <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="edit-bank.php?&b_id=<?php echo $data['b_id'] ?>" class="btn btn-success btn-sm">แก้ไข</a>
                  <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=delete_bank&b_id=<?php echo $data['b_id'] ?>" class="btn btn-danger btn-sm">ลบ</a>


                </td>
              </tr>
              <?php $A++;
                        } ?>
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