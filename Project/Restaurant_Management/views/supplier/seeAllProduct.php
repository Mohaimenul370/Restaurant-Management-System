<?php
session_start(); 
if(empty($_SESSION["username"])) {
    header("Location: ../control/login.php"); // Redirecting To Home Page
}

include('../../models/supplier/db.php');
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowAllProduct($conobj,"item");
// echo $userQuery->num_rows;


?>


<!DOCTYPE html>
<html lang="en">
<head>
  
<link rel="stylesheet" type="text/css" href="../stylesheet/myStyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Items</title>
</head>
<body>
<div class="show">
  <?php

  if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $productId=$row["P_id"];
      $productName=$row["P_Name"];
      $description=$row["P_Desc"];
      $category = $row["P_Category"];
      $price = $row["P_Price"];
      $imgLoc = $row["P_Picture"];

      echo "<br/>"."<img src='$imgLoc' height='150px' width='200px'>";
      echo "<br/>".$productId;
      echo "<br/>".$productName;
      echo "<br/>".$description;
      echo "<br/>".$category;
      echo "<br/>".$price;
      echo "<br/><br/>";

    }

    }
  else {
    echo "0 results";
  }


 

  ?>
    </div>
</body>
</html>