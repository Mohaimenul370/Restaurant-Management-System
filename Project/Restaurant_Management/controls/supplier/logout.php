<?php
session_start();

if(session_destroy()) // Destroying All Sessions
{
header("Location: ../../views/supplier/login.php"); // Redirecting To Home Page
}
?>