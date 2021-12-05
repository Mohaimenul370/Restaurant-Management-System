<?php

    $cid = intval($_SESSION['CId']);
    
    if(isset($_POST['update'])){

        $connObj = $connection->openConn();
        $name_checker = 0;
        $email_checker = 0;
        $pass_checker = 0;
        $gender_checker = 0;
        $img_checker = 0;

        if(!empty($_POST['fName'])){

            $userQuery = $connection->updateCustomer($connObj,'customer','FullName',$_POST['fName'],$cid);

            if($userQuery != true){


                $name_checker = 1;
        
            }
            
        }

        if(!empty($_POST['email'])){

            $userQuery = $connection->updateCustomer($connObj,'customer','Email',$_POST['email'],$cid);

            if($userQuery != true){


                $email_checker = 1;
        
            }
            
        }

        if(!empty($_POST['password']) && $_POST['password']==$_POST['passwordR']){

            $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);

            $userQuery = $connection->updateCustomer($connObj,'customer','Password',$hashed_password,$cid);

            if($userQuery != true){


                $pass_checker = 1;
        
            }
            
        }

        if(!empty($_POST['gender'])){

            $userQuery = $connection->updateCustomer($connObj,'customer','Gender',$_POST['gender'],$cid);
            
            if($userQuery != true){
                
                $gender_checker = 1;

            }

        }

        if(! empty($_FILES['image']['tmp_name'])){

            $target_file = "../../uploads/customer/".time().$_FILES["image"]["name"];

            $userQuery = $connection->updateCustomer($connObj,'customer','Image',$target_file,$cid);
            
            if($userQuery != TRUE){

                $img_checker = 1;

            }else{

                move_uploaded_file($_FILES['image']["tmp_name"],$target_file);

            }

        }

        if(
            $name_checker == 1 ||
            $email_checker == 1 ||
            $pass_checker == 1 ||
            $gender_checker == 1 ||
            $img_checker == 1
        ){

            header('location:CustomerEdit.php'); 

        }else{

            header('location:CustomerView.php');
            
        }

        $connection->closeConn($connObj);

    }


?>