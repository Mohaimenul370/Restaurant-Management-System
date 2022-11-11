<?php
    include('../../controls/customer/ViewValidation.php');
    include("../../controls/customer/EditValidation.php");
    include("./header.php"); 
    include("./nav.php"); 
?>

<div class="edit">
    
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return editValidation()">
        <h1>Edit info</h1>
        <h3> <?php echo " Customer ID: $CId" ?> </h3>
        <table>
            <tr>
                <td>Update full name:</td>
                <td>
                    <input type="text" name="fName" id="fName" >
                    <div class="err" id="name-err"></div>
                </td>
            </tr>
            <tr>
                <td>Update email:</td>
                <td>
                    
                    <input type="text" name="email" id="email" >
                    <div class="err" id="email-err"></div>
                </td>
            </tr>
            <tr>
                <td>Update password:</td>
                <td>
                    <input type="password" id="pass" name="password">
                    <div class="err" id="pass-err"></div>
                </td>
            </tr>
            <tr>
                <td>Update gender:</td>
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
                <td>Update image: &nbsp &nbsp</td>
                <td>
                    <input type="file" name="image" id="img">
                    <div class="err" id="img-err"></div>
                </td>
            </tr>
           
        
        </table>
        <input type="submit" value="Update" name="update" id="btn">
        <input type="reset" value="Reset" id="btn">
    </form>
</div>
