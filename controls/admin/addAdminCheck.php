<?php
include('../../models/admin/db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_POST['submit']) {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])
        && !empty($_POST['gen']) && !empty($_POST['username']) && !empty($_POST['dob'])) 
    {
        $connection = new db();
        $conobj = $connection->OpenCon();

        $userQuery = $connection->addAdmindb($conobj, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['username'], $_POST['gen'], $_POST['dob']);

        if ($userQuery) {
            $_SESSION['addAdmin_msg'] = 'Admin Added';
            header('location: ../../views/admin/admin/addAdmin.php');
        } else {
            $_SESSION['addAdmin_msg'] = 'Sql Error';
            header('location: ../../views/admin/addAdmin.php');
        }
    } 
    else {
        $_SESSION['addAdmin_msg'] = 'All the values are required';
        header('location: ../../views/admin/admin/addAdmin.php');
    }
} 
else {
    $_SESSION['addAdmin_msg'] = 'Submit the form';
    header('location: ../../views/admin/admin/addAdmin.php');
}
