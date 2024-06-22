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
              <h1></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="container bootstrap snippet">
        <div class="row">
          <div class="col-sm-2"><a href="" class="pull-right"></a></div>
        </div>
        <div class="row">

          <div class="col-md-3">
            

          </div>
          <!--/col-3-->
          <div class="col-md-6">
            <ul class="a1">
              <li><a data-toggle="tab" style="font-size: 30px;">แก้ไขรหัสผ่าน</a></li>
            </ul>


            <div class="tab-content">
              <div class="tab-pane active" id="home">
                <hr>

                      

                <form class="form" action="process.php?action=update_password" method="post" enctype="multipart/form-data" id="">

                  <div class="col-xs-6">
                    <label for="">
                      <h4>รหัสผ่าน</h4>
                    </label>
                    <input type="password" class="form-control" name="password" required >
                  </div>
              
              <div class="form-group">

                <div class="col-xs-6">
                  <label for="">
                    <h4>รหัสผ่านใหม่</h4>
                  </label>
                  <input type="password" class="form-control" name="new_password"  >
                </div>
              </div>

              <div class="form-group">

                <div class="col-xs-6">
                  <label for="">
                    <h4>ยืนยันรหัสผ่านใหม่</h4>
                  </label>
                  <input type="password" class="form-control" name="new_password2"  required >
                </div>
              </div>

              <div class="form-group">
                <div class="form-group">
                  <div class="col-xs-12">
                    <br>
  
                    <button class="btn btn-lg btn-success" type="submit" name="update"> แก้ไข </button>
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



    </div>
    <!-- ./wrapper -->

    <?php include('theme/footer.php'); ?>

    <?php include('theme/js.php'); ?>


</body>

</html>