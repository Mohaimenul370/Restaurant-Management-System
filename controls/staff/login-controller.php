<?php

    include("../../models/staff/db.php");
    
    session_start();
    if(isset($_SESSION['err_msg']) == 1){
        echo $_SESSION['err_msg']; 
    }

    $_SESSION['err_msg'] = "";
    $email_err = $pass_err = 0;

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        //----------------------------------------Email validation
        if(empty($email)){
            $email_err = 1;
        }else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
            $email_err = 1;
        }

        //----------------------------------------Password validation
        if(empty($password)){
            $pass_err = 1;
        }else if(strlen($password)<8){
            $pass_err = 1;
        }

        //-----------------------------------------Redirection
        if($email_err == 1 || $pass_err == 1){

            $_SESSION['err_msg'] = "Invalid input";
            header('location:login.php');

        }else{


            //// ---------------------------------- Database connection ----------------------------------

            $connection = new db();
            $connObj = $connection->openConn();
            $userQuery = $connection->searchStaff($connObj,"staff",$email,$password);
            
 
            // 7) if the user query is true store the posted email and password in session and then .
            // 7i) if the remember me checkbox is checked then store email and password in cookies 
            // and then redirect to views page.
            // 7ii) else simply redirect to views page without saving data in cookies.
            // 8) else output error message.

            if($userQuery[0] == 1){

                $_SESSION["Email"] = $email;
                $_SESSION["Password"] = $password;
                $_SESSION["SId"] = $userQuery[2];

                if(isset($_POST['remember-me'])){

                    $cookie_name = 'tokenId';
                    $cookie_value = $userQuery[1];
                    setcookie($cookie_name,$cookie_value,time()+(86400*7));

                }

                header('location:view.php');

            }else{

                $_SESSION['err-msg'] = "User not found";
                
            }

        }

    }

    // -----------------------------------------------Checks whether cookie value has been set.
    function validateCookie($cookieVal){

        $connection = new db();
        $connObj = $connection->openConn();
        $cookie_value = $cookieVal;
        $userQuery = $connection->getCookie($connObj,"staff",$cookie_value); 
        $connection->closeConn($connObj);

        if($userQuery!=False){
            $_SESSION["SId"] = $userQuery;
        }

        return $userQuery;

    }









    /* ============================================= Mid Term ===============================================*/


            // echo $email,$password;

        //----------------------------------------Email validation
        // if(empty($email)){
        //     $_SESSION["email-error"] = "* Email field is missing";
        // }else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
        //     $_SESSION["email-error"] = "* Invalid email";
        // }

        //----------------------------------------Password validation
        // if(empty($password)){
        //     $_SESSION["password-error"] = "* Password field is missing";
        // }else if(strlen($password)<8){
        //     $_SESSION["password-error"] = "* Password must be more than 8 characters long";
        // }


    //     if(strlen($_SESSION['email-error'])<1 && strlen($_SESSION['password-error'])<1){
            
    //         // $existing_data = file_get_contents('../../controls/staff/data.json');
    //         // $temp_json_data = json_decode($existing_data);

    //         // if(!empty($temp_json_data)){
    //         //     foreach($temp_json_data as $obj){
                    
    //         //         if($obj->{'Email'} == $email && $obj->{'Password'} == $password){
       
    //         //             $_SESSION['full_name'] = $obj->{'Full name'};
    //         //             $_SESSION['email'] = $obj->{'Email'};
    //         //             $_SESSION['password'] = $obj->{'Password'};
    //         //             $_SESSION['gender'] = $obj->{'Gender'};
    //         //             $_SESSION['designation'] = $obj->{'Designation'};
    //         //             $_SESSION['favorite food'] = $obj->{'Favorite foods'};
    //         //             $_SESSION['image location'] = $obj->{'Image-location'};

    //         //             // Setting cookie.
    //         //             if(isset($_POST['remember-me']) == 1){
    //         //                 $cookie_name = 'Email';
    //         //                 $cookie_value = $_POST['email'];
    //         //                 setcookie($cookie_name,$cookie_value,time()+(86400*30));
    //         //                 $cookie_name = 'Password';
    //         //                 $cookie_value = $_POST['password'];
    //         //                 setcookie($cookie_name,$cookie_value,time()+(86400*30));
    //         //             }

    //         //             header('location:view.php');
    //         //             break;


    //         //         }
        //         //     }
    //         // }




?>


