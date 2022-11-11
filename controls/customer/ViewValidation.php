<?php
    session_start();
    if(!isset($_SESSION['CId'])){
        header("location:CustomerLogout.php");
    }

    include("../../models/customer/db.php");

    $connection = new db();
    $connObj = $connection->openConn();
    $CId = $_SESSION["CId"];
    $userQuery = $connection->viewCustomer($connObj,"customer",$CId);
    $connection->closeConn($connObj);
    
?>
