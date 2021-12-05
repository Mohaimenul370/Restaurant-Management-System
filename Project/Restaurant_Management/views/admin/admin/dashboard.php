<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../../../models/admin/db.php');
$connection = new db();
$conobj = $connection->OpenCon();
$userlist = $connection->getAdminInfo($conobj, $_SESSION['username']);
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
                <h1 align="center">Welcome <?php echo $_SESSION['username'] ?> <br />
                    <h2>Name: <?php echo $userlist['name'] ?></h2>
                    <img width="100px" height="100px" src="../../../uploads/admin/<?php echo $userlist['profile_pic'] ?>" >
                    <h2>User Name: <?php echo $userlist['username'] ?></h2>

                    <h2>Email: <?php echo $userlist['email'] ?></h2>
                    <h2>Gender: <?php echo $userlist['gender'] ?></h2>
                    <h2>Date: <?php echo $userlist['dob'] ?></h2>

                </h1>
            </td>
        </tr>
    </table>
</body>

</html>