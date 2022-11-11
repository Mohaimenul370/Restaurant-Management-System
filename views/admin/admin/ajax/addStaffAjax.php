<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../../../../models/admin/db.php');

if (isset($_POST['add'])) {
    $data  = $_POST['add'];
    $obj = json_decode($data);

    $name = $obj->name;
    $email = $obj->email;
    $designation = $obj->designation;
    $favFood = $obj->favFood;
    $gender = $obj->gender;

    $connection = new db();
    $conobj = $connection->OpenCon();

    $userQuery = $connection->addStaff($conobj, $name,$email,$gender,$designation,$favFood);

    if ($userQuery) {
        // return true;
        echo $userQuery;
    } else {
        // return false;
        echo $userQuery;
    }
}

// echo "Working";

?>
