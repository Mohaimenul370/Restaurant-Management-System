<?php 

    include('../../models/staff/db.php');

    session_start();

    if(!isset($_SESSION["SId"])){

        header('location:logout.php');

    }else{

        $sid = $_SESSION['SId'];

        if(isset($_POST["dlt"])){

            $connection = new db();
            $connObj = $connection->openConn();
            $userQuery = $connection->deleteProfile($connObj,'staff',$_POST['pass'],intVal($sid));

            if($userQuery == true){

                header('location:logout.php');

            }

            $connection->closeConn($connObj);
            

        }
    }




?>