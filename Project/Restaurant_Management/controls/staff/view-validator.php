<?php
    session_start();
    // var_dump($_SESSION);
    if(!isset($_SESSION['SId'])){
        header("location:logout.php");
    }

    include("../../models/staff/db.php");

    $connection = new db();
    $connObj = $connection->openConn();
    $SId = $_SESSION["SId"];
    $userQuery = $connection->viewStaff($connObj,"staff",$SId);
    $connection->closeConn($connObj);
    
?>

