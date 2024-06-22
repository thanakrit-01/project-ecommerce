<!DOCTYPE html>
<html>
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
            <h1>หน้าแรก</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php 
         require('condb.php');
         ?>

<?php

//$p_id = $_GET['p_id'];
            $sql = "SELECT * FROM seller ";
            $result = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($result)) {

                ?>
   
    </section>
    <p align="center">welcome <?php echo $_SESSION ['s_username'];?></p>
      <p align="center">this is homepage and secure area.</p>

  </div>
  <!-- /.content-wrapper -->

  <?php include('theme/footer.php'); ?>

</div>
<!-- ./wrapper -->

<?php include('theme/js.php'); ?>
            <?php }?>
</body>
</html>
