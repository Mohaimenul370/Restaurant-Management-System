<?php
    include('../../models/admin/db.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id =$_GET['msg'];
    // echo $id;
    $connection = new db();
    $conobj = $connection->OpenCon();

    $userQuery = $connection->deleteSupplier($conobj, $id);
    if ($userQuery) {


        header('location: ../../views/admin/admin/supplierList.php');
        
    }
    else{
        echo 'Sql Error';
    }
?>