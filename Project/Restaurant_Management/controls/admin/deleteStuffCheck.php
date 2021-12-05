<?php
    include('../../models/admin/db.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $name =$_GET['msg'];
    // echo $id;
    $connection = new db();
    $conobj = $connection->OpenCon();

    $userQuery = $connection->deleteStuff($conobj, $name);
    if ($userQuery) {


        header('location: ../../views/admin/admin/stuffList.php');
        
    }
    else{
        echo 'Sql Error';
    }
?>