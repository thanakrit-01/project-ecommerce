<?php include('../config/condb.php');


if (isset($_GET['action']) && $_GET['action'] == "update") {

  $p_id = $_POST['p_id'];
  $p_name = $_POST['p_name'];
  $p_detail = $_POST['p_detail'];
  $category = $_POST['category'];
  $p_price = $_POST['p_price'];
  $p_qty = $_POST['p_qty'];

  $sql = "UPDATE `tbl_product` SET `p_name` = '$p_name', `p_detail` = '$p_detail', `category` = '$category', `p_price` = '$p_price', `p_qty` = '$p_qty' 
  WHERE `tbl_product`.`p_id` = $p_id ";

  $result = mysqli_query($con, $sql);


  for ($i = 0; $i < count($_FILES['img']['name']); $i++) {
    $img = $_FILES['img']['name'][$i];
    $temp = $_FILES['img']['tmp_name'][$i];
    $newfilename = date('dmYHis') . str_replace(" ", "", basename($img));
    if (!empty($newfilename)) {
      //echo $img.'<br>';


      if (move_uploaded_file($temp, "img/" . $newfilename)) {

        $sql_img = "INSERT INTO tbl_product_image(p_id, img_name) VALUES('$p_id','" . $newfilename . "')";
        $query = mysqli_query($con, $sql_img);
        if ($query) {
          //echo 'insert image success<br>';
        }
      }
    }
  }

  header("location:product.php");
}

if (isset($_GET['action']) && $_GET['action'] == "delete_product") {

  $p_id = $_GET['p_id'];
  $sql = "DELETE FROM tbl_product WHERE p_id = $p_id";
  $result = mysqli_query($con, $sql);
  header("location:product.php");
}

// Delete_img
if (isset($_GET['action']) && $_GET['action'] == "delete_img") {


  $id = $_GET['id'];
  $sql = "DELETE FROM tbl_product_image WHERE id = $id";
  $result = mysqli_query($con, $sql);
  header("location:product.php");
}

//UPDATE Profile
if (isset($_GET['action']) && $_GET['action'] == "update_profile") {

  if ($_FILES['image']['name'] != "") {
    $img = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $newfilename = date('dmYHis') . str_replace(" ", "", basename($img));
    if (!empty($newfilename)) {
      //echo $img.'<br>';


      move_uploaded_file($temp, "profile/" . $newfilename);
      $image = $newfilename;
    }
  } else {
    $image = $_POST['old_image'];
  }

  date_default_timezone_set('Asia/Bangkok');

  $s_id = $_SESSION['s_id'];

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $s_email = $_POST['s_email'];
  $shopname = $_POST['shopname'];
  $phone = $_POST['phone'];
  $location = $_POST['location'];


  $sql = "UPDATE `seller`  SET `firstname` = '$firstname', `lastname` = '$lastname',  
    `s_email` = '$s_email', `shopname` = '$shopname', `phone` = '$phone', `location` = '$location', `trn_date` = '" . date("Y-m-d H:i:s") . "', `image`= '$image' where s_id = '$s_id'";

  //echo ($sql);
  $result = mysqli_query($con, $sql);


  header("location:profile.php");
}


if (isset($_GET['action']) && $_GET['action'] == "update_password") {

  date_default_timezone_set('Asia/Bangkok');

  $s_id = $_SESSION['s_id'];
  $password = $_POST['password'];
  $password1 = $_POST['new_password'];
  $password2 = $_POST['new_password2'];

  $sql = "UPDATE `seller`SET `s_password` = '" . md5($password) . "', `s_password` = '" . md5($password1) . "', 
                                    `s_password` = '" . md5($password2) . "' 
                                
                                WHERE `seller`.`s_id` = $s_id ";


  echo ($sql);
  //$result = mysqli_query($con , $sql);


  //header("location:index.php");
}

if (isset($_GET['action']) && $_GET['action'] == "insert_delivery") {


  $delivery = $_POST['delivery'];

  $sql = "INSERT INTO `tbl_delivery`( `d_name`)

            VALUES ('$delivery' )";

  echo ($sql);
  $result = mysqli_query($con, $sql);
  //header("location: add-promotion.php");
}


if (isset($_GET['action']) && $_GET['action'] == "insert_expenses") {

  $s_id = $_SESSION['s_id'];
  $cost = $_POST['cost'];
  $delivery = $_POST['delivery2'];

  $sql = "INSERT INTO `tbl_expenses`( `s_id`, `e_price`, `d_id`)
            VALUES ('$s_id','$cost', '$delivery' )";

  echo ($sql);
  $result = mysqli_query($con, $sql);
  //header("location: add-promotion.php");
}

if (isset($_GET['action']) && $_GET['action'] == "update_order") {

  $status = $_GET['or_status'];
  $or_id = $_GET['or_id'];


  $sql = "UPDATE `tbl_order` SET `or_status` = '$status' WHERE `tbl_order`.`or_id` = $or_id ";

  $result_or = mysqli_query($con , $sql);
  header("location: order-list.php");
}

if (isset($_GET['action']) && $_GET['action'] == "insert_acc") {

  $s_id = $_SESSION['s_id'];
  $date = $_POST['date'];
  $list = $_POST['list'];
  $cost = $_POST['cost'];
  $date2 = $_POST['date2'];
  $list2 = $_POST['list2'];
  $cost2 = $_POST['cost2'];

  $sql = "INSERT INTO `tbl_accounting`( `s_id`, `acc_date`, `acc_list`, `acc_amount`, `acc_date2`,`acc_list2`, `acc_amount2`)
            VALUES ('$s_id','$date', '$list', '$cost', '$date2', '$list2', '$cost2' )";

  //echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location: add-accounting.php");
}

if (isset($_GET['action']) && $_GET['action'] == "update_acc") {

  $s_id = $_SESSION['s_id'];
  $acc_id = $_POST['acc_id'];

  echo $date = $_POST['date'];
  echo $list = $_POST['list'];
  echo $cost = $_POST['cost'];
  echo $date2 = $_POST['date2'];
  echo $list2 = $_POST['list2'];
  echo $cost2 = $_POST['cost2'];


  $sql = "UPDATE `tbl_accounting` SET `acc_date` = '$date', `acc_list` = '$list', `acc_amount` = '$cost', 
    `acc_date2` = '$date2', `acc_list2` = '$list2', `acc_amount2` = '$cost2'
    WHERE `tbl_accounting`.`acc_id` = $acc_id ";


  //echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location: add-accounting.php");
}

if (isset($_GET['action']) && $_GET['action'] == "delete_acc") {


  $acc_id = $_GET['acc_id'];
  $sql = "DELETE FROM tbl_accounting WHERE acc_id = $acc_id";

  $result = mysqli_query($con, $sql);
  header("location:accounting.php");
}
