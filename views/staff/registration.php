<?php
    include("../../controls/staff/registration-controller.php");
    include("./partials/header.php");
    include("./partials/preloader.php"); 
?>


    <!-- <h1>Staff Registration</h1><hr> -->

    <section class="reg form-style editPage">
    
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
                <td>Retype password: &nbsp &nbsp</td>
                <td>
                    <input type="password" id="passR" name="passwordR">
                    <div class="err" id="passR-err"></div>
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
                <td>Designation: &nbsp</td>
                <td>
                    <select name="designation">
                        <option value="Manager">Manager</option>
                        <option value="Chef">Chef</option>
                        <option value="Waiter">Waiter</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Favorite foods: &nbsp</td>
                <td>
                    <input type="checkbox" name="food-1"  value="chinese" id="chinese">
                    <label for="chinese">Chinese</label>
                    <input type="checkbox" name="food-2" value="local" id="local">
                    <label for="local">Local</label>
                    <input type="checkbox" name="food-3" value="fast-food" id="fast-food">
                    <label for="fast-food">Fast food</label>
                    <div class="err" id="food-err"></div>
                </td>
            </tr>
            <tr>
                <td>Image: &nbsp &nbsp</td>
                <td>
                    <input type="file" name="image" id="img">
                    <label for="img" class="img-btn"><i class="fas fa-edit"></i> Choose Image</label><br>
                    <div class="err" id="img-err"></div>
                </td>
            </tr>
            <tr>
                <td><a href="login.php" class="login-anchors">Go back</a></td>
            </tr>
        </table>
        <input type="submit" value="Submit" name="Submit" class="btn">
        <input type="reset" value="Reset" class="btn">
    </form>
    </section>

<?php include("./partials/footer.php"); ?>