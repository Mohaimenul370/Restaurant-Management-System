<?php 
    
    include('partials/header.php');
    include("./partials/preloader.php"); 
    include('partials/navigation.php');
    include('../../controls/staff/delete-controller.php');

    
?>
<section class="reg form-style editPage">
<form action="" method="post">
    <h1>Do you want to delete your profile ?</h1>
    <input type="password" name="pass" id="pass" placeholder="To delete enter password" class="delete-inp">
    <input type="submit" name="dlt" value="Delete" class="delete-btn btn">
</form>
</section>

<?php include('partials/footer.php'); ?>