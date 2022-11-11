<?php

    session_start();

    if(!isset($_SESSION['SId'])){
        header("location:logout.php");
    }

    include("../../../models/staff/db.php");

    $connection = new db();
    $connObj = $connection->openConn();
    $userQuery = $connection->getCertainUsers($connObj,'staff',$_POST['Full_Name']); 
    $connection->closeConn($connObj);

?>