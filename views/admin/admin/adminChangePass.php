<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>


<!DOCTYPE html>
<html>

<head>

    <title>home</title>
</head>

<body>
    <table align="center" width='60%' border="1" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <h3 align="center">Admin</h3>
                <hr>
                <ul>
                    <li><a href="dashboard.php">Admin Dashboard</a></li>
                    <li><a href="adminList.php">Admin List</a></li>
                    <li><a href="adminEdit.php">Edit Profile</a></li>
                    <li><a href="adminChangePass.php">Change Password</a></li>
                    <li><a href="addAdmin.php">Add Admin</a></li>
                    <li><a href="stuffList.php">Staff List</a></li>
                    <li><a href="addStaff.php">Add Staff</a></li>
                    <li><a href="supplierList.php">Supplier List</a></li>
                    <li><a href="addSupplier.php">Add Supplier</a></li>
                    <li><a href="../../../controls/admin/logout.php">Log Out</a></li>
                </ul>
            </td>
            <td>
                <h1 align="center">Change Password<br /></h1>
                <center>
                    <form method="POST" action="../../../controls/admin/changePassword.php" onsubmit="return formValidation()">
                        <table>
                            <tr>
                                <td>Old Password</td>
                                <td><input type="password" name="old_pass" id="old_pass"></td>
                            </tr>
                            <tr>
                                <td>New Password</td>
                                <td><input type="password" name="new_pass" id="new_pass"></td>
                            </tr>
                            <tr>
                                <td>Confirm password</td>
                                <td><input type="password" name="con_pass" id="con_pass"></td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" id="submit">
                                    <button type="reset">Reset</button>
                                </td>

                            </tr>

                        </table>
                    </form>
                    <?php

                    if (isset($_SESSION["checkPassword_msg"]))
                        echo $_SESSION["checkPassword_msg"];
                    unset($_SESSION["checkPassword_msg"]);
                    ?>
                </center>

                </h1>
            </td>
        </tr>
    </table>
    <script src="../../../public/admin/js/adminChangePas.js"></script>
</body>

</html>