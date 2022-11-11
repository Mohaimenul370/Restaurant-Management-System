<?php

    include("../../models/customer/db.php");
    
    session_start();
    if(isset($_SESSION['err_msg']) == 1){
        echo $_SESSION['err_msg']; 
    }

    $_SESSION['err_msg'] = "";
    $email_err = $pass_err = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        if(empty($email)){
            $email_err = 1;
        }else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
            $email_err = 1;
        }

        if(empty($password)){
            $pass_err = 1;
        }else if(strlen($password)<8){
            $pass_err = 1;
        }

        if($email_err == 1 || $pass_err == 1){

            $_SESSION['err_msg'] = "Error: Wrong Email or password!";
            header('location:CustomerLogin.php');

        }else{



            $connection = new db();
            $connObj = $connection->openConn();
            $userQuery = $connection->LoginCustomer($connObj,"customer",$email,$password);
            

            if($userQuery[0] == 1){

                $_SESSION["Email"] = $email;
                $_SESSION["Password"] = $password;
                $_SESSION["CId"] = $userQuery[2];

                if(isset($_POST['remember-me'])){

                    $cookie_name = 'tokenId';
                    $cookie_value = $userQuery[1];
                    setcookie($cookie_name,$cookie_value,time()+(86400*7));

                }

                header('location:CustomerView.php');

            }else{

                $_SESSION['err-msg'] = "User not found";
                
            }

        }

    }

    function validateCookie($cookieVal){

        $connection = new db();
        $connObj = $connection->openConn();
        $cookie_value = $cookieVal;
        $userQuery = $connection->getCookie($connObj,"customer",$cookie_value); 
        $connection->closeConn($connObj);

        if($userQuery!=False){
            $_SESSION["CId"] = $userQuery;
        }

        return $userQuery;

    }

?>
