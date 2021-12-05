<?php 
    include('../../models/supplier/db.php');

    if(isset($_POST["search-product"])){

        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->showOneProduct($conobj,"item",$_POST["p_name"]);

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



    }
   
    

?>