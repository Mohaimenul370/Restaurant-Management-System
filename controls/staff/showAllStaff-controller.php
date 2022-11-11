<?php

    session_start();
    if(!isset($_SESSION['SId'])){
        header("location:logout.php");
    }

    include("../../../models/staff/db.php");

    $connection = new db();
    $connObj = $connection->openConn();
    $userQuery = $connection->getAllUsers($connObj,'staff'); 
    $connection->closeConn($connObj);

?>