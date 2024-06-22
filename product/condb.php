<?php 
    $con = mysqli_connect("localhost","root","","project");

    //check connecttion
    if (mysqli_connect_error()){
        echo"Filed to connect to MySQL: " . 
        mysqli_connect_error();
    }
    mysqli_set_charset($con,"utf8");
    

 ?> 