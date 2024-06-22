<?php include('../config/condb.php'); ?>

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

      <?php
      date_default_timezone_set('Asia/Bangkok');
      //error_reporting(0);

      if (isset($_POST['btnadd'])) {
        
        $p_name = $_POST['p_name'];
        $p_detail = $_POST['p_detail'];
        $category = $_POST['category'];
        $p_price = $_POST['p_price'];
        $p_qty = $_POST['p_qty'];

        $s_id = $_SESSION['s_id'];

        $sql_product = "INSERT INTO tbl_product (p_name, p_detail, category, s_id, p_price, p_qty, date_save) 
        VALUES('$p_name', '$p_detail', '$category','$s_id', '$p_price', '$p_qty','".date("Y-m-d H:i:s")."')";
        $p_id = null;
        
        if(mysqli_query($con, $sql_product)){
          $p_id = mysqli_insert_id($con);
        }

        for($i = 0; $i < count($_FILES['img']['name']); $i++){
          $img = $_FILES['img']['name'][$i];
          $temp = $_FILES['img']['tmp_name'][$i];
          $newfilename= date('dmYHis').str_replace(" ", "", basename($img));
          if(!empty($newfilename)){
            //echo $img.'<br>';

            
            if(move_uploaded_file($temp, "img/".$newfilename)){
              
              $sql_img = "INSERT INTO tbl_product_image(p_id, img_name) VALUES('$p_id','".$newfilename."')";
              $query = mysqli_query($con, $sql_img);
              if($query){
                //echo 'insert image success<br>';
              }

            }
            
          }

        }

        if($p_id != null){
          echo '<script>alert(\'บันทึกข้อมูลสำเร็จ\'); window.location.href = \'product.php\';</script>';
        }

      }


      ?>

      <section class="content-header">
        <div class=""> </div>
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12" style="border-bottom: 1px solid #ccc;">
              <h1>ฟอร์มเพิ่มสินค้า</h1>
            </div>
          </div>
          <div class="card card-body">

            <div class="row">
              <div class="col-md-3"></div>

              <div class="col-md-6">

                <form action="" method="post" enctype="multipart/form-data" name="" class="form-horizontal" id="">

                  <div class="form-group">
                    <p> ชื่อสินค้า</p>
                    <input type="text" name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
                  </div>

                  <div class="form-group">
                    <p> รายละเอียดสินค้า </p>
                    <textarea name="p_detail" class="form-control" rows="3" required placeholder="รายละเอียดสินค้า"></textarea>
                  </div>

                  <div class="form-group">
                    <p> ประเภทสินค้า</p>
                    <select class="form-control" name="category">
                      <option value="0">ประเภทสินค้า</option>
                      <option value="ผักสด">ผักสด</option>
                      <option value="ผลไม้">ผลไม้</option>
                      <option value="เนื้อสด">เนื้อสด</option>
                      <option value="อุปกรณ์">อุปกรณ์</option>
                      <option value="สินค้าแปรรูป">สินค้าแปรรูป</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <p> ราคา (บาท) </p>
                    <input type="number" name="p_price" class="form-control" required placeholder="ราคา" />
                  </div>

                  <div class="form-group">
                    <p> จำนวน </p>
                    <input type="number" name="p_qty" class="form-control" required placeholder="จำนวน" />
                  </div>

                  <div class="form-group">
                    <p> ภาพสินค้า </p>
                    <input multiple="" type="file" name="img[]" class="form-control" />
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary" name="btnadd"> + เพิ่มสินค้า </button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="col-md-3"></div>
            </div>

          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

    </div>

    <!-- /.content-wrapper -->

    <?php include('theme/footer.php'); ?>

  </div>
  <!-- ./wrapper -->

  <?php include('theme/js.php'); ?>

</body>

</html>