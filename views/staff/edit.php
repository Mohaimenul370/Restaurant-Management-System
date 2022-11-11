<?php
    include('../../controls/staff/view-validator.php');
    include("../../controls/staff/edit-controller.php");
    include("./partials/header.php"); 
    include("./partials/preloader.php"); 

    
?>

<!-- Navigation bar -->
<?php include("./partials/navigation.php"); ?>

    

    <section class="reg form-style editPage">
    
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return editValidation()">
        <h1>Edit info</h1>
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
                <td>Retype password:</td>
                <td>
                    <input type="password" id="passR" name="passwordR">
                    <div class="err" id="passR-err"></div>
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
                <td>Update favorite foods: &nbsp</td>
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
                <td>Update image: &nbsp &nbsp</td>
                <td>
                    <input type="file" name="image" id="img">
                    <label for="img" class="img-btn"><i class="fas fa-edit"></i> Choose Image</label><br>
                    <div class="err" id="img-err"></div>
                </td>
            </tr>
           
        
        </table>
        <input type="submit" value="Update" name="update" class="btn">
        <input type="reset" value="Reset" class="btn">
    </form>
    </section>

<?php include("./partials/footer.php"); ?>