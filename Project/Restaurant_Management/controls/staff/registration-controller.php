<?php
    include("../../models/staff/db.php");

    session_start();
    if(isset($_SESSION['err_msg']) == 1){

        echo $_SESSION['err_msg']; 
        session_destroy();
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['Submit'] == 'Submit'){

           

        $name_err = $email_err = $pass_err = $passR_err = $gender_err = $food_err = $img_err = 0;

        $full_name = $_REQUEST['fName'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $retyped_password = $_REQUEST['passwordR'];
        $gender = isset($_REQUEST["gender"]) == 1 ? $_REQUEST["gender"] : "";
        $designation = $_REQUEST["designation"];
        $target_file = "../../uploads/stuff/".time().$_FILES["image"]["name"];
        $fav_fruits = array();

        //----------------------------------------Name validation
        if(empty($full_name)){
            $name_err = 1;
        }else if(strlen($full_name)<5){
            $name_err = 1;
        }

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

        //----------------------------------------Password retype validation
        if(empty($retyped_password)){
            $passR_err = 1;
        }else if($retyped_password != $password){
            $passR_err = 1;
        }

        //----------------------------------------Gender validation
        if(!isset($_REQUEST["gender"]) == 1){
            $gender_err = 1;
        }

        //----------------------------------------Food validation
        if(isset($_REQUEST['food-1']) != 1
            && isset($_REQUEST['food-2']) != 1 
            && isset($_REQUEST['food-3']) != 1){
                $food_err = 1;
            }

        
        
        if(isset($_REQUEST['food-1']) == 1){
           array_push($fav_fruits,$_REQUEST['food-1']);
        }

        if(isset($_REQUEST['food-2']) == 1){
           array_push($fav_fruits,$_REQUEST['food-2']);
        }

        if(isset($_REQUEST['food-3']) == 1){
           array_push($fav_fruits,$_REQUEST['food-3']);
        }


        //----------------------------------------Image validation
        if(empty($_FILES['image']['tmp_name'])){
            $img_err = 1;
        }


        // ----------------------------------------Redirection
        if($name_err == 1 || $email_err == 1 || $pass_err == 1 ||
            $passR_err == 1 || $gender_err == 1 || $food_err == 1 || $img_err == 1){

            $_SESSION['err_msg'] = "Invalid input";
            header('location:registration.php');

        }else{

            // Inserting new data into database rather than json
            // database connection
            $connection = new db();
            $connObj = $connection->openConn();

            $sid = 0;
            $fav_foods = implode("$",$fav_fruits);
            // Hash password
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

            // Random token 
            $token_id = bin2hex(random_bytes(16));
    
            $userQuery = $connection->addStaff(
                $connObj,
                "staff",
                $sid,
                $full_name,
                $email,
                $hashed_password,
                $gender,
                $designation,
                $target_file,
                $fav_foods,
                $token_id
            );

            if($userQuery==True){
                if(move_uploaded_file($_FILES['image']["tmp_name"],$target_file)){

                    $_SESSION["success-msg"] = "Registration successful";
                    header('location:login.php');

                }else{
                    echo "* Failed to upload data.";
                }
            }else{

                echo $connObj->error;
            }

            $connection->closeConn($connObj);
            

            // var_dump($_POST);
        
        }

    }


        // ====================================== Mid Term ========================================

        // // Redirection from here.
        // if(strlen($_SESSION['name-error'])<1
        //    && strlen($_SESSION['email-error'])<1
        //    && strlen($_SESSION['password-error'])<1
        //    && strlen($_SESSION['passwordR-error'])<1
        //    && strlen($_SESSION['gender-error'])<1
        //    && strlen($_SESSION['food-error'])<1
        //    && strlen($_SESSION['image-error'])<1){

        //     // $form_data = array(
        //     //     'Full name' => $full_name,
        //     //     'Email' => $email,
        //     //     'Password' => $password,
        //     //     'Gender' => $gender,
        //     //     'Designation' => $designation,
        //     //     'Favorite foods' => $fav_fruits,
        //     //     'Image-location' => $target_file
        //     // );

        //     // $existing_data = file_get_contents('../../controls/staff/data.json');
        //     // $temp_json_data = json_decode($existing_data);
        //     // $temp_json_data[] = $form_data;
        //     // $json_data = json_encode($temp_json_data,JSON_PRETTY_PRINT);

        //     // if(file_put_contents('../../controls/staff/data.json',$json_data)){
        //     //     $_SESSION["success-msg"] = "Registration successful";
        //     //     header('location:login.php');
        //     // }    

            

?>


