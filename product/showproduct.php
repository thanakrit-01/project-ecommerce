
<!doctype html>
<?php 
     include('condb.php'); 
?>
<html lang="en"></html>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    


    </div>
    <br>
    <div class="container">
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>วันที่</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียด</th>
            <th>ราคา</th>
            <th>จำนวน</th>
            <th>รูปภาพ</th>
            <th>แก้ไข/ลบ</th>
          </tr>
          <?php
          $sql = "SELECT * FROM tbl_product";
          $result = mysqli_query($con,$sql);
          while ($data = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $data['date_save'];?></td>
            <td><?php echo $data['p_name'];?></td>
            <td><?php echo $data['p_detail'];?></td>
            <td><?php echo $data['p_price'];?></td>
            <td><?php echo $data['p_qty'];?></td>
            <td><?php echo $data['p_img'];?></td>
            <td>
              <a href="edit.php?&p_id=<?php echo $data['p_id'] ?>" class="btn btn-success btn-sm">แก้ไข</a>
              <a href="process.php?action=delete&p_id=<?php echo $data['p_id'] ?>" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?')" class="btn btn-danger btn-sm">ลบ</a>
            </td>
          </tr>
          <?php
          }
          ?>

        </table>
      </div>
    </div>

<br>
<br>
<br>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js" ></script>
    <script src="bootstrap/js/popper.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>