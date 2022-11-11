<?php
session_start(); 
if(empty($_SESSION["username"])) {
    header("Location: ../control/login.php"); // Redirecting To Home Page
}

include('../../models/supplier/db.php');
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowAllProduct($conobj,"supplier");
// echo $userQuery->num_rows;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Suppliers</title>
</head>
<body>

  <?php

  if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $username=$row["username"];
      $password=$row["password"];
      $firstname=$row["firstname"];
      $email = $row["email"];
      $address = $row["address"];
      $dob = $row["dob"];
      $gender = $row["gender"];
      $SupplyItem = $row["SupplyItem"];
      $interests = $row["interests"];
      $uimage = $row["uimage"];

      echo "<br/>"."<img src='$uimage' height='150px' width='200px'>";
      echo "<br/>".$username;
      echo "<br/>".$password;
      echo "<br/>".$firstname;
      echo "<br/>".$email;
      echo "<br/>".$address;
      echo "<br/>".$dob;
      echo "<br/>".$gender;
      echo "<br/>".$SupplyItem;
      echo "<br/>".$uimage;
      echo "<br/><br/>";

    }

    }
  else {
    echo "0 results";
  }


 

  ?>
    
</body>
</html>