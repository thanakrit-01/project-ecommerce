<?php include('../config/condb.php');



if (isset($_GET['action']) && $_GET['action'] == "insert_delivery") {


  $delivery = $_POST['delivery'];

  $sql = "INSERT INTO `tbl_delivery`( `d_name`)

          VALUES ('$delivery' )";

  //echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location: add-delivery.php");
}

if (isset($_GET['action']) && $_GET['action'] == "update_payment") {

  $status = $_GET['status'];
  $pa_id = $_GET['pa_id'];


  $sql = "UPDATE `tbl_payment` SET `status` = '$status' WHERE `tbl_payment`.`pa_id` = $pa_id ";


  //echo($sql);
  $result = mysqli_query($con, $sql);
  header("location: index.php");
}

if (isset($_GET['action']) && $_GET['action'] == "update_order") {

  $status = $_GET['or_status'];
  $or_id = $_GET['or_id'];

  $sql = "SELECT * FROM tbl_orderdetail 
                 INNER JOIN tbl_product ON tbl_product.p_id = tbl_orderdetail.p_id
                 WHERE or_id = $or_id ";

  $result = mysqli_query($con, $sql);
  while ($data = mysqli_fetch_array($result)) {
    $qty = $data['p_qty'];
    $qty2 = $data['qty'];
    $new_qty = $qty - $qty2;

    $sql_update = "UPDATE tbl_product SET p_qty = $new_qty WHERE p_id = '".$data['p_id']."' ";
    mysqli_query($con, $sql_update);

  }

  $sql_or = "UPDATE `tbl_order` SET `or_status` = '$status' WHERE `tbl_order`.`or_id` = $or_id ";


  //echo($sql_or);
 $result_or = mysqli_query($con , $sql_or);
 header("location: order-list.php");
 
}

if (isset($_GET['action']) && $_GET['action'] == "insert_bank") {


  $name = $_POST['name'];
  $n_bank = $_POST['n_bank'];
  $branch = $_POST['branch'];
  $number = $_POST['number'];

  $sql = "INSERT INTO `tbl_bank`( `b_name`, `b_bank`, `branch`, `account_number`)

          VALUES ('$name', '$n_bank', '$branch', '$number' )";

  echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location: add-bank.php");
}

if (isset($_GET['action']) && $_GET['action'] == "update_bank") {

  $b_id = $_POST['b_id'];
  $name = $_POST['name'];
  $n_bank = $_POST['n_bank'];
  $branch = $_POST['branch'];
  $number = $_POST['number'];


  $sql = "UPDATE `tbl_bank` SET `b_name` = '$name', `b_bank` = '$n_bank',
   `branch` = '$branch', `account_number` = '$number' WHERE `tbl_bank`.`b_id` = $b_id ";


  //echo($sql);
  $result = mysqli_query($con, $sql);
  header("location: index2.php");
}

if (isset($_GET['action']) && $_GET['action'] == "delete_bank") {


  echo $b_id = $_GET['b_id'];
  $sql = "DELETE FROM tbl_bank WHERE b_id = $b_id";

  //echo($sql);
  $result = mysqli_query($con, $sql);
  header("location:index2.php");
}

//จัดการลบสมาชิกร้านค้า
if (isset($_GET['action']) && $_GET['action'] == "delete_seller") {


  echo $s_id = $_GET['s_id'];
  $sql = "DELETE FROM seller WHERE s_id = $s_id";

  //echo($sql);
  $result = mysqli_query($con, $sql);
  header("location:store.php");
}

//จัดการลบสินค้าผู้ขาย
if (isset($_GET['action']) && $_GET['action'] == "delete_product") {

  $p_id = $_GET['p_id'];
  $sql = "DELETE FROM tbl_product WHERE p_id = $p_id";

  echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location:product.php");
}

//จัดการแก้ไขสมาชิกผู้ขาย

if (isset($_GET['action']) && $_GET['action'] == "update_password") {

  date_default_timezone_set('Asia/Bangkok');

  $id = $_POST['id'];
  $password = $_POST['password'];
  $password1 = $_POST['new_password'];
  $password2 = $_POST['new_password2'];

  $sql = "UPDATE `user`SET `password` = '" . md5($password) . "', `password` = '" . md5($password1) . "', 
                                    `password` = '" . md5($password2) . "' 
                                
                                    WHERE `user`.`id` = $id ";
  echo ($sql);
  //$result = mysqli_query($con, $sql);
  //header("location:store.php");
}

//จัดการลบสมาชิกผู้ขาย
if (isset($_GET['action']) && $_GET['action'] == "delete_user") {


  echo $id = $_GET['id'];
  $sql = "DELETE FROM user WHERE id = $id";

  //echo($sql);
  $result = mysqli_query($con, $sql);
  header("location:customer.php");
}


if (isset($_GET['action']) && $_GET['action'] == "seller_login") {

  $s_id = $_GET['s_id'];
  $status_login = $_GET['status_login'];

  $sql = "UPDATE `seller` SET `status_login` = '$status_login' WHERE `seller`.`s_id` = $s_id ";

  //echo($sql);
  $result = mysqli_query($con, $sql);
  header("location: management-store.php");
}
