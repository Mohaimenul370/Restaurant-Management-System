<?php
session_start(); 

include ("../../controls/supplier/addproductcheck.php");


if(empty($_SESSION["username"])) 
{
header("Location: ../../controls/supplier/login.php"); // Redirecting To Home Page

}

?>


<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../../public/supplier/stylesheet/myStyle.css">
    <script src="../../public/supplier/js/validation.js"></script>
    </head>
<body>
    <div class="add">
<h2>Add New Item</h2>

<?php echo $error; ?>

<form action="" onsubmit="return validationform()" method="post"  enctype="multipart/form-data">
Item Name: 
<input type="text" name="pname"><br><br>
Item Description: 
<textarea name="pdesc"></textarea><br><br>
Item category: 
<input type="text" name="pcategory"><br><br>
Item Price: 
<input type="number" name="pprice"><br><br>
Item Image: 
<input type="file" name="pimage"><br><br>
<br>
<br>
<input type="submit" name="add" value="ADD ITEM">
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h5> <a href="pageone.php">GO back</a></h5>
</div>
</body>
</html>