<!DOCTYPE html>
<html lang="en">
<?php include('check_login.php'); include('../config/condb.php'); ?>
<head>
    <?php include('inc/css.php'); ?>
</head>
<body>

    <?php

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM user where id = $id ";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);

    ?>

    <div class="container">
        <?php include('inc/header.php');?>

        <h5>ข้อมูลส่วนตัว</h5>

        <div class="row">
          <div class="col-sm-3">
            <!--left col-->

          </div>
          <!--/col-3-->
          <div class="col-sm-9">

            <div class="tab-content">
              <div class="tab-pane active" id="home">
                
                <form class="form" enctype="multipart/form-data" action="process.php?action=insert_profile" method="post" id="">

                  <div class="text-center">
                    <div class="col-xs-7">


                      <?php
                      if ($data['image'] == "") {
                        ?>

                        <img style="width:280px; height:290px;" src="img/user.png" class="avatar img-circle img-thumbnail" alt="รูปภาพ">

                      <?php } else { ?>

                        <img style="width:280px; height:290px;" src="img/<?php echo $data['image']; ?>" class="avatar img-circle img-thumbnail" alt="รูปภาพ">

                      <?php } ?>

                      <h6>อัพโหลดรูปภาพ</h6>
                      <input type="file" name="image" class="text-center center-block file-upload">
                      <input type="hidden" name="old_image" value="<?php echo $data['image']; ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-7">
                      <label for="first_name">
                        <h4>ชื่อ</h4>
                      </label>
                      <input type="text" class="form-control" name="firstname" value="<?php echo $data['firstname']; ?>" id="first_name" placeholder=" " title="enter your first name if any.">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-xs-7">
                      <label for="last_name">
                        <h4>นามสกุล</h4>
                      </label>
                      <input type="text" class="form-control" name="lastname" value="<?php echo $data['lastname']; ?>" placeholder=" " title="enter your last name if any.">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-7">
                      <label for="phone">
                        <h4>เบอร์โทรศัพท์</h4>
                      </label>
                      <input type="text" class="form-control" name="phone" value="<?php echo $data['phone']; ?>" placeholder=" " title="enter your phone number if any.">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-7">
                      <label for="mobile">
                        <h4>เบอร์มือถือ</h4>
                      </label>
                      <input type="text" class="form-control" value="<?php echo $data['mobile']; ?>" name="mobile" placeholder="  " title="enter your mobile number if any.">
                    </div>
                  </div>
                  <div class="form-group">

                    <div class="col-xs-7">
                      <label for="email">
                        <h4>อีเมลล์</h4>
                      </label>
                      <input type="email" value="<?php echo $data['email']; ?>" class="form-control" name="email" id="" placeholder="" title="enter your email.">
                    </div>
                  </div>

                  <div class="form-group">

                    <div class="col-xs-7">
                      <label for="location">
                        <h4>ที่อยู่</h4>
                      </label>
                      <input type="location" class="form-control" name="location" value="<?php echo $data['location']; ?>" placeholder="" title="enter a location">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-xs-12">
                      <br>
                      <button class="btn btn-lg btn-success" type="submit"> Save</button>
                      <button class="btn btn-lg" type="reset"> Reset</button>
                    </div>
                  </div>
                </form>

                <hr>

              </div>
              <!--/tab-pane-->


            </div>

          </div>

        </div>
        
        <?php include('footer.php');?>
    </div>
    <?php include('inc/js.php');?>
</body>
</html>