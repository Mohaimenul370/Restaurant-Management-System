<?php
session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location: ../../controls/supplier/logincheck.php"); // Redirecting To Home Page
}

?>


<!DOCTYPE html>
<html>
    <div class="back">
    <head>
    <link rel="stylesheet" type="text/css" href="../../public/supplier/stylesheet/myStyle.css">


    
</head>
<body>


    <div class="start">
<h1>Supplier's Portal</h1></div>


<div class="name">
<h3>Welcome <?php echo $_SESSION["username"];?>,</h3>



</div>

<div id="box">
    <p>Welcome to Supplier's portal. We are not just an employee we are family. Dedication and hard word of every department bring us here.</p>
</div>
<script>
$(document).ready(function()
{
    
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>

<br>
<button id="hidenBtn">Hide</button>
<button id="shownBtn">Hide</button>

<div class="new">


<h5>Do you want to go to <a href="pagetwo.php"> MY Profile</a></h5>
<h5>Do you want to  <a href="addproduct.php"> Add Item</a></h5>
<h5>Do you want to see all Suppliers <a href="seeAllSupplier.php"> See all Suppliers</a></h5>
<h5>Do you want to see all Items <a href="showOneProduct.php"> See all Items</a></h5>
<h5>Do you want to search Supplier <a href="showOneSupplier.php">Search Supplier</a></h5>

<br>
    <br>
    <br>
    <br/>
 <h5>Do you want to <a href="../../controls/supplier/logout.php">logout</a></h5>
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
    
    <br>
    <br>
    <br>
    <h5>All rights received 2021</h5>

</div>
</body>
</div>
</html>

<?php


?>   


