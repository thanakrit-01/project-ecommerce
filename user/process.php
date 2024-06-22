<?php include('../config/condb.php');

date_default_timezone_set('Asia/Bangkok');

if (isset($_GET['action']) && $_GET['action'] == "insert_profile") {

  if ($_FILES['image']['name'] != "") {
    $img = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $newfilename = date('dmYHis') . str_replace(" ", "", basename($img));
    if (!empty($newfilename)) {
      //echo $img.'<br>';


      move_uploaded_file($temp, "img/" . $newfilename);
      $image = $newfilename;
    }
  } else {
    $image = $_POST['old_image'];
  }

  $id = $_SESSION['id'];

  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $phone = $_POST['phone'];
  $mobile = $_POST['mobile'];
  $location = $_POST['location'];


  $sql = "UPDATE `user`  SET `email` = '$email', `firstname` = '$firstname',  
   `lastname` = '$lastname', `phone` = '$phone', `mobile` = '$mobile', `location` = '$location',
   `trn_date` = '" . date("Y-m-d H:i:s") . "', `image`= '$image' where id = '$id'";






  //echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location: index.php");
}



if (isset($_GET['action']) && $_GET['action'] == "update_password") {

  date_default_timezone_set('Asia/Bangkok');

  $id = $_SESSION['id'];
  $password = $_POST['new_password'];
  $password1 = $_POST['new_password'];
  $password2 = $_POST['new_password2'];

  $sql = "UPDATE `user`SET `password` = '" . md5($password) . "', `password` = '" . md5($password1) . "', 
                                    `password` = '" . md5($password2) . "' 
                                
                                    WHERE `user`.`id` = $id ";


  //echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location:edit-password.php");
}

if (isset($_GET['action']) && $_GET['action'] == "insert_payment") {

  if($_FILES['image']['name']!=""){
    $img = $_FILES['image']['name'];
      $temp = $_FILES['image']['tmp_name'];
      $newfilename= date('dmYHis').str_replace(" ", "", basename($img));
      if(!empty($newfilename)){
        echo $img.'<br>';
  
        
        move_uploaded_file($temp, "slip/".$newfilename);
        $image = $newfilename;
        
      }
    }
    

  echo $id = $_SESSION['id'];
  echo $date = $_POST['date'];
  echo $time = $_POST['time'];
  echo $cost = $_POST['cost'];
       $status = 'payment';

  

  $sql = "INSERT INTO tbl_payment ( id, pa_date, pa_time, pa_slip, pa_price, status, date) 
    VALUES('$id', '$date', '$time', '$image', '$cost', '$status','" . date("Y-m-d H:i:s") . "')";

  //echo ($sql);
  $result = mysqli_query($con, $sql);
  header("location: index.php");
}


if(isset($_GET['action']) && $_GET['action'] == 'confirm_order'){
        
  //$s_id = $_SESSION['s_id'];
  $id = $_SESSION['id'];
  $shipping_price = $_GET['shipping'];
  $status = 'order';
 //echo $time = $_POST['time'];

  $s_id = '';
   for($i=0;$i<=(int)@$_SESSION["intLine"];$i++){
    if(@$_SESSION["p_id"][$i] != ""){

      $sql = "SELECT * FROM tbl_product ";
              $sql .= " INNER JOIN tbl_product_image ON tbl_product.p_id = tbl_product_image.p_id ";
              $sql .= " LEFT JOIN tbl_promotion ON tbl_product.p_id = tbl_promotion.p_id ";
              $sql .= " WHERE tbl_product.p_id = '".$_SESSION["p_id"][$i]."' ";
              $sql .= " GROUP BY tbl_product.p_id ";
      $query = mysqli_query($con, $sql);
      $result = mysqli_fetch_array($query);

      $s_id .= $result[7].',';

    }
  }

  $s_id = substr($s_id, 0,-1);

  $user_address = $_SESSION['user_address'];
      
 $sql = "INSERT INTO tbl_order ( s_id, id, or_date, or_status,shipping_price,user_address) 
   VALUES('$s_id', '$id', '".date("Y-m-d H:i:s")."', '$status','$shipping_price','$user_address')";

 $result = mysqli_query($con, $sql);
 $or_id = mysqli_insert_id($con);

 $_SESSION['user_address'] = '';

 for($i=0;$i<=(int)@$_SESSION["intLine"];$i++){
  if(@$_SESSION["p_id"][$i] != ""){

    $sql = "SELECT * FROM tbl_product ";
							$sql .= " INNER JOIN tbl_product_image ON tbl_product.p_id = tbl_product_image.p_id ";
							$sql .= " LEFT JOIN tbl_promotion ON tbl_product.p_id = tbl_promotion.p_id ";
							$sql .= " WHERE tbl_product.p_id = '".$_SESSION["p_id"][$i]."' ";
							$sql .= " GROUP BY tbl_product.p_id ";

							$query = mysqli_query($con, $sql);
							$result = mysqli_fetch_array($query);

							$price = 0;
							if(isset($result['p_cost2'])){
								$price = $result['p_cost2'];
							}else{
								$price = $result['p_price'];
              }

              $total_price = $_SESSION['qty'][$i] * $price;
              
              $qty = $_SESSION['qty'][$i];
              $p_id = $_SESSION["p_id"][$i];

              $sql2 = "INSERT INTO tbl_orderdetail ( or_id, p_id,s_id, qty, price, total_price) 
              VALUES('$or_id', '$p_id','$result[7]', '$qty', '$price', '$total_price')";
              mysqli_query($con, $sql2);

              $_SESSION["p_id"][$i] = "";
              $_SESSION["qty"][$i] = "";

  }
 }

 header("location: order-list.php");


   }
