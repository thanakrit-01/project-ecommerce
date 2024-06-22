<?php 

    session_start();

    date_default_timezone_set('Asia/Bangkok');

    if(isset($_GET['action']) && $_GET['action'] == 'add_cart'){
        
        $p_id = $_GET['p_id'];
        
        if(!isset($_SESSION["intLine"])){

            $_SESSION["intLine"] = 0;
	        $_SESSION["p_id"][0] = $p_id;
            $_SESSION["qty"][0] = 1;
            
            echo 'success';

        }else{

            $key = array_search($p_id, $_SESSION["p_id"]);
            if((string)$key != ""){

                if(isset($_GET['qty'])){
                    $_SESSION["qty"][$key] = $_GET['qty'];
                }else{
                    $_SESSION["qty"][$key] = $_SESSION["qty"][$key] + 1;
                }
                

            }else{
                
                $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
                $intNewLine = $_SESSION["intLine"];
                $_SESSION["p_id"][$intNewLine] = $p_id;
                $_SESSION["qty"][$intNewLine] = 1;
            }

        }

        header('location: basket.php');

    }

    if(isset($_GET['action']) && $_GET['action'] == 'delete_cart'){
        
        $Line = $_GET["Line"];
        $_SESSION["p_id"][$Line] = "";
        $_SESSION["qty"][$Line] = "";

        header('location: basket.php');

    }

    //print_r($_SESSION);
    //session_destroy();

 