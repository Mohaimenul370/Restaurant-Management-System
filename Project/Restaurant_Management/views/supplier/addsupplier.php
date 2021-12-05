<?php
session_start(); 

include ("../control/addsuppliercheck.php");


if(empty($_SESSION["username"])) 
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>


<!DOCTYPE html>
<html>
<body>
<h2>Add New Supplier</h2>

<?php echo $error; ?>

<form action=""  method="post"  enctype="multipart/form-data">
User Name: 
<input type="text" name="username"><br><br>
Password: 
<textarea name="password"></textarea><br><br>
First Name: 
<input type="text" name="firstname"><br><br>
Email: 
<input type="text" name="email"><br><br>
Address: 
<input type="text" name="address"><br><br>
Date of Birth: 
<input type="number" name="dob"><br><br>
Gender: 
<input type="text" name="gender"><br><br>
Supply Item: 
<input type="text" name="SupplyItem"><br><br>
Interest: 
<input type="text" name="interests"><br><br>
Supplier Image: 
<input type="file" name="uimage"><br><br>
<br>
<br>
<input type="submit" name="add" value="ADD ITEM">
</form>
<h5> <a href="pageone.php">GO back</a></h5>
</body>
</html>