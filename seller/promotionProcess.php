<?php
include "condb.php";

if (isset($_GET['action']) && $_GET['action']=="insert") {

    $p_id = $_POST['p_id'];
    $s_id = $_SESSION['s_id'];
    $date = $_POST['date'];
    $date2 = $_POST['date2'];
    $promotion = $_POST['promotion'];
    $newcost = $_POST['newcost'];

    $sql = "INSERT INTO `tbl_promotion`( `p_id`, `s_id`, `s_time`, `s_time-end`, `promotion`, `p_cost2`)

            VALUES ('$p_id', '$s_id','$date', '$date2', '$promotion', '$newcost' )";
   
   //echo ($sql);
    $result = mysqli_query($con , $sql);
   header("location: add-promotion.php");
  }



  if (isset($_GET['action']) && $_GET['action']=="delete_promotion") {
     
     
    $pm_id = $_GET['pm_id'];
    $sql = "DELETE FROM tbl_promotion WHERE pm_id = $pm_id";
    $result = mysqli_query($con , $sql);
  header("location:promotion.php");
  }

  if (isset($_GET['action']) && $_GET['action']=="update_promotion") {
      
      //date_default_timezone_set('Asia/Bangkok');

    $pm_id = $_POST['pm_id'];
    $s_id = $_SESSION['s_id'];
    $date = $_POST['date'];
    $date2 = $_POST['date2'];
    $promotion = $_POST['promotion'];
    $newcost = $_POST['newcost'];

    $sql = "UPDATE `tbl_promotion`SET `s_time` = '$date', `s_time-end` = '$date2', 
                                      `promotion` = '$promotion', `p_cost2` = '$newcost'  
                                  
                                  WHERE `tbl_promotion`.`pm_id` = $pm_id ";
   
      
      //echo ($sql);
      $result = mysqli_query($con , $sql);
      
      
      header("location:promotion.php");
    }
  
