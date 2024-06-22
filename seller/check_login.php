<?php

session_start();
if(!isset($_SESSION['s_username'])) {
        header("Location: login.php");
        exit();
   }

?>