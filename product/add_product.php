<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv=Content-Type content="text/html; charset=tis-620">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <title>ADD Product</title>
</head>
<body>
  <div class="container">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br />
        <h4 align="center"> ฟอร์มเพิ่มสินค้า </h4>
        <hr/>
        <form action="add_product_db.php" method="POST" enctype="multipart/form-data" name="addprd" class="form-horizontal" id="addprd">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
            <textarea name="p_detail" class="form-control"  rows="3"  required placeholder="รายละเอียดสินค้า"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3">
            <p> ราคา (บาท) </p>
            <input type="number"  name="p_price" class="form-control" required placeholder="ราคา" />
          </div>
          <div class="col-sm-3">
            <p> จำนวน </p>
            <input type="number"  name="p_qty" class="form-control" required placeholder="จำนวน" />
          </div>
          <div class="col-sm-8 info">
            <p> ภาพสินค้า </p>
            <input type="file" name="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" name="btnadd"> + เพิ่มสินค้า </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>