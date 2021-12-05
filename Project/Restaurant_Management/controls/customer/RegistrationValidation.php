<?php
    include("../../models/customer/db.php");

    session_start();
    if(isset($_SESSION['err_msg']) == 1){

        echo $_SESSION['err_msg']; 
        session_destroy();
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['Submit'] == 'Submit'){


        $name_err = $email_err = $pass_err = $passR_err = $gender_err = $img_err = 0;

        $full_name = $_REQUEST['fName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $gender = isset($_REQUEST["gender"]) == 1 ? $_REQUEST["gender"] : "";
        $target_file = "../../uploads/customer/".time().$_FILES["image"]["name"];

        if(empty($full_name)){
            $name_err = 1;
        }else if(strlen($full_name)<4){
            $name_err = 1;
        }

        if(empty($email)){
            $email_err = 1;
        }else if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
            $email_err = 1;
        }


        if(empty($password)){
            $pass_err = 1;
        }else if(strlen($password)<6){
            $pass_err = 1;
        }

        if(!isset($_REQUEST["gender"]) == 1){
            $gender_err = 1;
        }

        if(empty($_FILES['image']['tmp_name'])){
            $img_err = 1;
        }

        if($name_err == 1 || $email_err == 1 || $pass_err == 1 ||
            $gender_err == 1 || $img_err == 1){

            $_SESSION['err_msg'] = "Invalid input";
            header('location:CustomerRegistration.php');

        }else{

            $connection = new db();
            $connObj = $connection->openConn();

            $cid = 0;
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

            $token_id = bin2hex(random_bytes(16));
    
            $userQuery = $connection->addCustomer(
                $connObj,
                "customer",
                $cid,
                $full_name,
                $email,
                $hashed_password,
                $gender,
                $target_file,
                $token_id
            );

            if($userQuery==True){
                if(move_uploaded_file($_FILES['image']["tmp_name"],$target_file)){

                    $_SESSION["success-msg"] = "Registration successful";
                    header('location:CustomerLogin.php');

                }else{
                    echo "* Failed to upload data.";
                }
            }else{

                echo $connObj->error;
            }

            $connection->closeConn($connObj);           
        
        }

    }       
?>


