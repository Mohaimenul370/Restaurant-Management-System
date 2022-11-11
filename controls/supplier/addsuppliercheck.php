<?php
include('../model/db.php');

$error="";

if(isset($_POST['add']))
{
    // var_dump($_POST);
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['firstname']) || empty($_POST['email']) || empty($_Post['address'])  || empty($_Post['dob']) || empty($_Post['gender'])  || empty($_Post['SupplyItem'])  || empty($_Post['interests']) || empty($_FILES['uimage']['name'])) 
    {
        
        echo "Invalid input";
    }
    else
        {

        $connection = new db();
        $conobj=$connection->OpenCon();
        $target_destination="../file/".$_FILES['uimage']['name'];

        $username = 0;
        
        $userQuery=$connection->AddSupplier($conobj,$username,"supplier",$_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["email"],$_POST["address"],$_POST["dob"],$_POST["gender"],$_POST["SupplyItem"],$_POST["interests"],$target_destination);
        if($userQuery==TRUE)
        {
            if (move_uploaded_file($_FILES["uimage"]["tmp_name"],  $target_destination)) {
              echo "file upload done";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        else
        {
            echo "could not update".$conobj->error;    
        }
        $connection->CloseCon($conobj);
        
        }


}