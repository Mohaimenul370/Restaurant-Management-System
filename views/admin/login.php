<?php
// if (isset($_COOKIE['log'])) {
//     header("Location: teacher/dashboard.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <center>
        <h1>Log In</h1>
        <br>
        <br>
        <br>

        <form action="../../controls/admin/loginCheck.php" method="POST" onsubmit="return formValidation()">
            Username:<br>
            <input type="text" name="username" id="username">
            <br><br />


            Password:<br>
            <input type="password" name="password" id="password">
            <br><br>



            <input type="submit" name="submit" value="Submit">
        </form>

        <br>
        <br>
        <br>
        <h1><a href="../home.php">Back</a></h1>

        <?php

        session_start();

        if (isset($_SESSION["login_msg"]))
            echo $_SESSION["login_msg"];
            unset($_SESSION["login_msg"]);
        ?>
    </center>

    <script src="../js/login.js"></script>
</body>

</html>