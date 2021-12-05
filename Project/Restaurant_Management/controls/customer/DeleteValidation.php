<?php 

    include('../../models/customer/db.php');

    session_start();

    if(!isset($_SESSION["CId"])){

        header('location:CustomerLogout.php');

    }else{

        $cid = $_SESSION['CId'];

        if(isset($_POST["dlt"])){

            $connection = new db();
            $connObj = $connection->openConn();
            $userQuery = $connection->deleteProfile($connObj,'customer',$_POST['pass'],intVal($cid));

            if($userQuery == true){

                header('location:CustomerLogout.php');

            }

            $connection->closeConn($connObj);
            

        }
    }




?>