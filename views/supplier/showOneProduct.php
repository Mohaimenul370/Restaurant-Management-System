<?php
    session_start(); 
    if(empty($_SESSION["username"])) {
        header("Location: ./login.php"); // Redirecting To Home Page
    }

    include("../../controls/supplier/showProduct.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../stylesheet/myStyle.css">   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <div class="item">
    <h5>Do you want to see all Item ? </h5>
    <h4><a href="./seeAllProduct.php">See all items</a></h4>

    <form action="" method="post">
        <input type="text" name="p_name" placeholder="Enter product name">
        <input type="submit" name="search-product" value="Search">
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
    <h5>All rights recived 2021</h5>
    
</div>
</body>
</html>