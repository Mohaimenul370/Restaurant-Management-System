<?php

    $sid = intval($_SESSION['SId']);
    
    if(isset($_POST['update'])){

        $connObj = $connection->openConn();
        $name_checker = 0;
        $email_checker = 0;
        $pass_checker = 0;
        $gender_checker = 0;
        $food_checker = 0;
        $img_checker = 0;

        // ---------------------------------------------- Name update.
        if(!empty($_POST['fName'])){

            $userQuery = $connection->updateStaff($connObj,'staff','FullName',$_POST['fName'],$sid);

            if($userQuery != true){


                $name_checker = 1;
        
            }
            
        }

        // ---------------------------------------------- Email update.
        if(!empty($_POST['email'])){

            $userQuery = $connection->updateStaff($connObj,'staff','Email',$_POST['email'],$sid);

            if($userQuery != true){


                $email_checker = 1;
        
            }
            
        }

        // ---------------------------------------------- Password update.
        if(!empty($_POST['password']) && $_POST['password']==$_POST['passwordR']){

            $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);

            $userQuery = $connection->updateStaff($connObj,'staff','Password',$hashed_password,$sid);

            if($userQuery != true){


                $pass_checker = 1;
        
            }
            
        }

        //------------------------------------------------------------------------Update gender
        if(!empty($_POST['gender'])){

            $userQuery = $connection->updateStaff($connObj,'staff','Gender',$_POST['gender'],$sid);
            
            if($userQuery != true){
                
                $gender_checker = 1;

            }

        }


        //------------------------------------------------------------------------Update fav foods
        if(isset($_POST['food-1']) || isset($_POST['food-2']) || isset($_POST['food-3'])){

            $fav_fruits = array();

            if(isset($_REQUEST['food-1']) == 1){
                array_push($fav_fruits,$_REQUEST['food-1']);
            }

            if(isset($_REQUEST['food-2']) == 1){
                array_push($fav_fruits,$_REQUEST['food-2']);
            }

            if(isset($_REQUEST['food-3']) == 1){
                array_push($fav_fruits,$_REQUEST['food-3']);
            }       

            $fav_foods = implode("$",$fav_fruits);

            $userQuery = $connection->updateStaff($connObj,'staff','FavoriteFoods',$fav_foods,$sid);
            
            if($userQuery != true){
                
               $food_checker = 1;

            }

        }

        //------------------------------------------------------------------------Update image
        if(! empty($_FILES['image']['tmp_name'])){

            $target_file = "../../uploads/stuff/".time().$_FILES["image"]["name"];

            $userQuery = $connection->updateStaff($connObj,'staff','Image',$target_file,$sid);
            
            if($userQuery != TRUE){

                $img_checker = 1;

            }else{

                move_uploaded_file($_FILES['image']["tmp_name"],$target_file);

            }

        }

        
        // ---------------------------------------------------------------- Return 
        if(
            $name_checker == 1 ||
            $email_checker == 1 ||
            $pass_checker == 1 ||
            $gender_checker == 1 ||
            $food_checker == 1 ||
            $img_checker == 1
        ){

            header('location:edit.php'); 

        }else{

            header('location:view.php');
            
        }

        $connection->closeConn($connObj);

    }


?>