<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../../../models/admin/db.php');
$connection = new db();
$conobj = $connection->OpenCon();
$userlist = $connection->showSupplierList($conobj);
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
                <h1>Stuff List</h1>
                <table border="1">
                    <tr>
                        <td>SlId</td>
                        <td>Full Name</td>
                        <td>Age</td>
                        <td>Email</td>
                        <td>Supply Food</td>
                        <td>Gender</td>
                        <td>Delete</td>
                    </tr>

                    <?php for ($i = 0; $i < count($userlist); $i++) {
                        $un = $userlist[$i]['SlId'];
                    ?>

                        <tr>
                            <td><?= $userlist[$i]['SlId'] ?></td>
                            <td><?= $userlist[$i]['FullName'] ?></td>
                            <td><?= $userlist[$i]['Age'] ?></td>
                            <td><?= $userlist[$i]['Email'] ?></td>
                            <td><?= $userlist[$i]['SupplyFood'] ?></td>
                            <td><?= $userlist[$i]['Gender'] ?></td>
                            <td><a href="../../../controls/admin/deleteSupplier.php?msg=<?php echo ($un) ?>">Delete</a></td>
                        </tr>

                    <?php } ?>
        </tr>
    </table>
</body>

</html>