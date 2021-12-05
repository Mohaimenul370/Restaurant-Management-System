<?php 
    include('./header.php');
    include('../../controls/customer/DeleteValidation.php'); 
    include("./nav.php"); 
?>

<div class="delete">
<form action="" method="post">
    <h1>Do you want to delete your profile ?</h1>
    <input type="password" name="pass" id="pass" placeholder="To delete enter password" class="delete-inp">
    <input type="submit" name="dlt" value="Delete" id="btn">
</form>
</div>