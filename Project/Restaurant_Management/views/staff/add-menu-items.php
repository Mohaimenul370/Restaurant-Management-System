<?php
    include('../../controls/staff/menu-add-controller.php');
    include('partials/header.php');
    include('partials/menu-nav.php');
    include('partials/preloader.php');

?>

<section class="reg form-style editPage">

<form action="" method="POST" enctype="multipart/form-data" onsubmit="return itemValidation()">

    <h1> Add items to menu </h1>
        <table>
            <tr>
                <td>Food name:&nbsp&nbsp</td>
                <td>
                    <input type="text" name="fName" id="fName" size="24" autocomplete="off">
                    <div class="err" id="name-err"></div>
                </td>
            </tr>
            <tr>
                <td><br/>Description:</td>
                <td>
                    
                    <textarea name="description" id="add-menu" cols="30" rows="5" ></textarea>
                    <div class="err" id="email-err"></div>
                </td>
            </tr>
            <tr>
                <td>Image: &nbsp &nbsp</td>
                <td>
                    <input type="file" name="image" id="img">
                    <label for="img" class="img-btn"><i class="fas fa-edit"></i> Choose Image</label><br>
                    <div class="err" id="img-err" style="position:absolute; bottom:10px;"></div>
                </td>
            </tr>
        </table>
        <input type="submit" value="Submit" name="Submit" class="btn">
        <input type="reset" value="Reset" class="btn">
</form>

</section>


<?php include('partials/footer.php'); ?>
