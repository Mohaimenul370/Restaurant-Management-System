<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('../../../models/admin/db.php');
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
                <h1 align='center'>Registration</h1>

                <center>
                    <form action="../../../controls/admin/addSupplierCheck.php" method="POST">
                        <table>
                            <tr>
                                <td>Full Name</td>
                                <td><input type="text" name="fullName" id="fullName"></td>

                            </tr>
                            <tr>
                                <td>Age</td>
                                <td><input type="number" name='age' id='age'></td>

                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" id='email'></td>
                                <td id='emailDiv' width="100px" style="color: red;">
                                </td>
                            </tr>
                            <tr>
                                <td>Supply Food</td>
                                <td><input type="text" name='supplyFood' id='supplyFood'></td>

                            </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <fieldset>
                                        <legend>Gender</legend>
                                        <input type="radio" name="gen" id="ad_add_gen1" value="Male">Male
                                        <input type="radio" name="gen" id="ad_add_gen2" value="Female">Female
                                        <input type="radio" name="gen" id="ad_add_gen3" value="Other">Other
                                    </fieldset>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value='Submit' >
                                    <button type="reset">Reset</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php

                    // if (isset($_SESSION["addAdmin_msg"]))
                    //     echo $_SESSION["addAdmin_msg"];
                    // unset($_SESSION["addAdmin_msg"]);
                    // ?>
            </td>
        </tr>
    </table>
    
</body>

</html>