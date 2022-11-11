<?php
    include("../../controls/customer/RegistrationValidation.php");
    include("./header.php");
?>

<div class="reg">
<form action="" method="POST" enctype="multipart/form-data" onsubmit="return registrationValidation()">
        <h1> Register </h1>
        <table>
            <tr>
                <td>Full name:</td>
                <td>
                    <input type="text" name="fName" id="fName" >
                    <div class="err" id="name-err"></div>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    
                    <input type="text" name="email" id="email" >
                    <div class="err" id="email-err"></div>
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" id="pass" name="password">
                    <div class="err" id="pass-err"></div>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Male" id="male"  >
                    <label for="Male">Male</label>
                    <input type="radio" name="gender" value="Female" id="female">
                    <label for="Female">Female</label>
                    <input type="radio" name="gender" value="Others" id="others">
                    <label for="Others">Others</label><br>
                    <div class="err" id="gender-err"></div>
                </td>
            </tr>
            <tr>
                <td>Image: &nbsp &nbsp</td>
                <td>
                    <input type="file" name="image" id="img">
                    <div class="err" id="img-err"></div>
                </td>
            </tr>
            <tr>
                <td><a href="CustomerLogin.php" class="login-anchors">Go back</a></td>
            </tr>
        </table>
        <input type="submit" value="Submit" name="Submit" id="btn">
        <input type="reset" value="Reset" id="btn">
    </form>
</div>