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
                    <li><a href="../../../controls/admin/logout.php">Log Out</a></li>
                </ul>
            </td>
            <td>
                <h1 align='center'>Registration</h1>

                <center>
                    <form id="form">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="fullName" id="fullName"></td>

                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" name="email" id='email'></td>
                                <td id='emailDiv' width="100px" style="color: red;">
                                </td>
                            </tr>
                            <tr>
                                <td>Designation</td>
                                <td><input type="text" name='designation' id='designation'></td>

                            </tr>
                            <tr>
                                <td>Favourite Food</td>
                                <td><input type="text" name="favFood" id="favFood"></td>
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
                            <td>
                                <div id='msg'>
                                </div>
                            </td>
                            <tr>
                                <td colspan="2">
                                    <input type="button" name="submit" value='Submit' onclick="return formSubmit()">
                                    <button type="reset">Reset</button>
                                </td>
                            </tr>
                        </table>
                    </form>
            </td>
        </tr>
    </table>
    <script type='text/javascript' src="../../../public/admin/js/addStaff.js?v=<?= time(); ?>"></script>
</body>

</html>