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
            <h1>จัดการร้านค้า</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php include('../config/condb.php'); ?>

    <!-- Main content -->
    <section class="content">
    
    <table id="ooo" class="table table-striped table-bordered" style="width:100%; font-size: 15px;">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>ชื่อร้านค้า</th>
                            <th>ผู้ประกอบการ</th>
                            <th>จำนวนสินค้า</th>
                            <th>ออร์เดอร์สินค้า</th>
                            <th>จัดการร้านค้า</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
             $sql = "SELECT * FROM seller ORDER BY trn_date DESC";
             $result = mysqli_query($con,$sql);
              while ($data = mysqli_fetch_array($result)) {
                $s_id = $data['s_id'];

                $product = "SELECT * FROM tbl_product WHERE s_id = $s_id ";
                $result_pro = mysqli_query($con,$product);
                $row_pro = mysqli_num_rows($result_pro);

                $order = "SELECT * FROM tbl_order WHERE s_id LIKE '%".$s_id."%' ";
                $result_order = mysqli_query($con,$order);
                $row_order = mysqli_num_rows($result_order);

          ?>

                        <tr>
                            <td><?php echo $data['trn_date'];?></td>
                            <td><?php echo $data['shopname'];?></td>
                            <td><?php echo $data['firstname'];?> <?php echo $data['lastname'];?></td>
                            <td><?=$row_pro?></td>
                            <td><?=$row_order?></td>
                            <td>

                                <a href="process.php?action=delete_seller&s_id=<?=$data['s_id']?>" class="btn btn-danger btn-sm">ลบ</a>
                              <?php } ?>

                             

                              </div>
                        
                            </td>
                        </tr>
         
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
