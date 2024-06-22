<?php
include "condb.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
$sql = "SELECT * FROM tbl_product ";
$result = mysqli_query($con,$sql);

 ?>
<div class="container">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br />
        <h4 align="center"> แก้ไขข้อมูลสินค้า </h4>
        <hr/>
        <form action="process.php" method="POST" enctype="multipart/form-data" name="updete" class="form-horizontal" id="updateprd">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อสินค้า</p>
            <select name="form-group" id="p_id"></select>
            <?php   
                while ($data = mysqli_fetch_array($result)) {
                }
            ?>
            <input type="text"  name="p_name" class="form-control" required placeholder="" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
            <textarea name="p_detail" class="form-control"  rows="3"  required placeholder="" value="<?php echo $data2['detail']; ?>" ></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3">
            <p> ราคา (บาท) </p>
            <input type="number"  name="p_price" class="form-control" required placeholder="" />
          </div>
          <div class="col-sm-3">
            <p> จำนวน </p>
            <input type="number"  name="p_qty" class="form-control" required placeholder="" />
          </div>
          <div class="col-sm-8 info">
            <p> ภาพสินค้า </p>
            <input type="file" name="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" name="btnadd"> บันทึก </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="bootstrap/js/popper.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</body>
</html>