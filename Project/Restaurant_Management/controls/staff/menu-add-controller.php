<?php

    include('checker.php');

    $connection = new db();
    $connObj = $connection->openConn();

    

    if(isset($_POST["Submit"])){

        $FId = 0;
        $SId = intval($_SESSION['SId']);
        $target_file = "../../uploads/stuff/".time().$_FILES["image"]["name"];

        if(empty($_FILES['image']['tmp_name']) || empty($_POST["fName"]) || empty($_POST["description"])){

            echo "Not working";

        }else{

            // echo $SId;

            $userQuery = $connection->addToMenu(

                $connObj,
                'menu',
                $SId,
                $_POST["fName"],
                $_POST["description"],
                $target_file,
                $FId
                
            );

            if($userQuery == true){

                if(move_uploaded_file($_FILES['image']["tmp_name"],$target_file)){

                    echo "Successfully added food to menu";

                }else{
                    echo "* Failed to upload data.";
                }

            }else{
                echo "* Failed to upload data.";
            }

        }

    }
    

    // $userQuery = $connection->addToMenu($connObj,'menu',$SId,);
    
    // var_dump($_SESSION);

?>