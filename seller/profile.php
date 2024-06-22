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
              <h1>ข้อมูลส่วนตัว</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="container bootstrap snippet">
        <div class="row">
          <div class="col-sm-2"><a href="/users" class="pull-right"></a></div>
        </div>
        <div class="row">

          <div class="col-md-3">
            <!--left col-->
            <?php
            include('../config/condb.php');

            $s_id = $_SESSION['s_id'];
            $sql = "SELECT * FROM seller where s_id = $s_id ";
            $result = mysqli_query($con, $sql);
            $data = mysqli_fetch_array($result);


            ?>


            </hr><br>

          </div>
          <!--/col-3-->
          <div class="col-md-6">
            <ul class="a1">
              <li><a data-toggle="tab" style="font-size: 30px;">Profile</a></li>
            </ul>


            <div class="tab-content">
              <div class="tab-pane active" id="home">
                <hr>

                <form class="form" action="process.php?action=update_profile" method="post" enctype="multipart/form-data" id="">

                  <div class="form-group">
                    <div class="text-center">
                      <img src="profile/<?php echo $data['image']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                      <h6>อัพโหลดไฟล์</h6>
                      <input type="file" name="image" class="text-center center-block file-upload">
                      <input type="hidden" name="old_image" value="<?php echo $data['image']; ?>">
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <label for="firstname">
                      <h4>ชื่อ</h4>
                    </label>
                    <input type="text" class="form-control" name="firstname" id="" value="<?php echo $data['firstname']; ?>" placeholder="" title="">
                  </div>
              
              <div class="form-group">

                <div class="col-xs-6">
                  <label for="lastname">
                    <h4>นามสกุล</h4>
                  </label>
                  <input type="text" class="form-control" name="lastname" id="" value="<?php echo $data['lastname']; ?>" placeholder="" title="">
                </div>
              </div>

              <div class="form-group">

                <div class="col-xs-6">
                  <label for="shopname">
                    <h4>ชื่อร้าน</h4>
                  </label>
                  <input type="text" class="form-control" name="shopname" id="" value="<?php echo $data['shopname']; ?>" placeholder="" title="">
                </div>
              </div>

              <div class="form-group">

                <div class="col-xs-6">
                  <label for="phone">
                    <h4>เบอร์โทรศัพท์</h4>
                  </label>
                  <input type="text" class="form-control" name="phone" id="" value="<?php echo $data['phone']; ?>" placeholder="" title="">
                </div>
              </div>

              <div class="form-group">

                <div class="col-xs-6">
                  <label for="email">
                    <h4>อีเมล์</h4>
                  </label>
                  <input type="email" class="form-control" name="s_email" id="" value="<?php echo $data['s_email']; ?>" placeholder="" title="">
                </div>
              </div>

              <div class="form-group">

                <div class="col-xs-6">
                  <label for="location">
                    <h4>ที่อยู่</h4>
                  </label>
                  <input type="location" class="form-control" name="location" id="" value="<?php echo $data['location']; ?>" placeholder="" title="">
                </div>
              </div>
              
             


                <div class="form-group">
                  <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit" name="update"> บันทึก</button>
                    <button class="btn btn-lg" type="reset" name="reset"> ยกเลิก</button>
                  </div>
                </div>
                </form>

                <hr>
                </div>
              </div>
              <!--/tab-pane-->


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