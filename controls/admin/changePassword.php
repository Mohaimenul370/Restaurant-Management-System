<?php
include('../../models/admin/db.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_POST['submit'])
{
    if(($_SESSION['password'] == $_POST['old_pass'])  ){
        if($_POST['new_pass'] == $_POST['con_pass'] && !empty(($_POST['new_pass'])))
        {
            $connection = new db();
            $conobj = $connection->OpenCon();

            $userQuery = $connection->editAdminPasword($conobj, $_POST['new_pass'], $_SESSION['username']);

            if ($userQuery) {

                $_SESSION['checkPassword_msg'] = 'Password Changed';
                $_SESSION['password'] == $_POST['new_pass'];
                header('location: ../../views/admin/admin/adminChangePass.php');
                
            }
            else{
                $_SESSION['checkPassword_msg'] = 'Sql Error';
                header('location: ../../views/admin/adminChangePass.php');
            }
        
        }
        else{
            $_SESSION['checkPassword_msg'] = 'New Password and Confirm Password dont match Or it can not be empty';
            header('location: ../../views/admin/adminChangePass.php');
        }
    }

    else{
        $_SESSION['checkPassword_msg'] = 'Old Password does not match';
        header('location: ../../views/admin/adminChangePass.php');
    }
}
else{
    $_SESSION['checkPassword_msg'] = 'Submit the form';
    header('location: ../../views/admin/adminChangePass.php');
}