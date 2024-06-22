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
              <th>ชื่อ-นามสกุล</th>
              <th>อีเมลล์</th>
              <th>เบอร์โทรศัพท์</th>
              <th>ที่อยู่</th>
              <th>แก้ไข/ลบ</th>
            </tr>
          </thead>
          <tbody>


            <?php
            //$s_id = $_SESSION['s_id'];
            $sql = "SELECT * FROM user ";
            $result  = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($result)) {
            $A = '0';

              ?>

              <tr>
                <td><?php echo $A++ ?></td>
                <td><?php echo $data['firstname']; ?> <?php echo $data['lastname']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['phone']; ?></td>
                <td><?php echo $data['location']; ?></td>

                <td>

                  <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="edit-user.php?&id=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">แก้ไข</a>
                  <a onclick="return confirm('ยืนยันการทำรายการหรือไม่')" href="process.php?action=delete_user&id=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">ลบ</a>


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