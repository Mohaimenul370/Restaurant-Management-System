<?php
include('../../models/admin/db.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// store session data
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION["login_msg"] = "Username or Password is empty";
        header('location: ../../views/admin/login.php');
        exit();
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $connection = new db();
        $conobj = $connection->OpenCon();

        $userQuery = $connection->CheckUser($conobj, "admin", $username, $password);

        if ($userQuery->num_rows > 0) {

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            // $connection->CloseCon($conobj);
            header('location: ../../views/admin/admin/dashboard.php');
            exit();
        } else {
            $_SESSION["login_msg"] = "Username or Password is invalid";

            // $connection->CloseCon($conobj);
            header('location: ../../views/admin/login.php');
            exit();
        }
    }
} else {
    $_SESSION["login_msg"] = "Submit the form";
    header('location: ../../views/admin/login.php');
    exit();
}
