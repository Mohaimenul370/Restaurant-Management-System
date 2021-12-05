<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../../../models/admin/db.php');
$connection = new db();
$conobj = $connection->OpenCon();
$userlist = $connection->ShowAllAdmin($conobj);
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
                    <li><a href="../../controls/admin/logout.php">Log Out</a></li>
                </ul>
            </td>
            <td>
                <h1>Admin List</h1>
                <table border="1">
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td>Gender</td>
                        <td>Date Of Birth</td>
                        
                    </tr>

                    <?php for ($i = 0; $i < count($userlist); $i++) {
                        $un = $userlist[$i]['username'];
                    ?>

                        <tr>
                            <td><?= $userlist[$i]['name'] ?></td>
                            <td><?= $userlist[$i]['email'] ?></td>
                            <td><?= $userlist[$i]['username'] ?></td>
                            <td><?= $userlist[$i]['gender'] ?></td>
                            <td><?= $userlist[$i]['dob'] ?></td>
                        </tr>

                    <?php } ?>
        </tr>
    </table>
</body>

</html>