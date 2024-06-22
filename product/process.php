<?php
require_once('condb.php');

if (isset($_GET['action']) && $_GET['action']=="update") {


    $id = $_POST['p_id'];
    $date = $_POST['date'];
    $detail = $_POST['detail'];
    $acc_id = $_POST['acc_id'];
    $cost = $_POST['cost'];
    $status = $_POST['status'];
    echo $date;
    echo $detail;
    echo  $acc_id;
    echo  $cost;
    echo  $status;
    $sql = "UPDATE `tbl_product` SET `p_id`=[value-1],`p_name`=[value-2],`p_detail`=[value-3],`p_price`=[value-4],`p_img`=[value-5],`date_save`=[value-6],`p_qty`=[value-7] WHERE 1 ";
    $result = mysqli_query($conn , $sql);
      
  }

if (isset($_GET['action']) && $_GET['action']=="delete") {
   $p_id = $_GET['p_id'];
   $sql = "DELETE FROM tbl_product WHERE p_id = $p_id";
   $result = mysqli_query($con , $sql);
   header("location: showproduct.php");
 }
 mysqli_close($con);
 
 ?>
