<?php
include('../../models/admin/db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['submit'])){
    if(!empty($_POST['fullName']) && !empty($_POST['age']) 
    && !empty($_POST['email']) && !empty($_POST['supplyFood']) && !empty($_POST['gen'])){
        $connection = new db();
        $conobj = $connection->OpenCon();

        $userQuery = $connection->addSupplier($conobj, $_POST['fullName'], $_POST['age'], $_POST['email'], $_POST['supplyFood'], $_POST['gen']);

        if ($userQuery) {
            header('location: ../../views/admin/admin/supplierList.php');
        } else {
            header('location: ../../views/admin/admin/supplierList.php');
        }
    }
    else{

    }
}


?>