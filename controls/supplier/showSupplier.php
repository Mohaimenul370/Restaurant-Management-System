<?php 
    include('../model/db.php');

    if(isset($_POST["search-product"])){

        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->showOneProduct($conobj,"supplier",$_POST["username"]);

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



    }
   
    

?>