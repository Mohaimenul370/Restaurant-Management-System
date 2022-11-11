<?php

    class db{
        //-----------------------------------------------------connect with database.
        function openConn(){

            $serverName = "localhost";
            $userName = "newUser";
            $password = "shahed1998";
            $dbName = "restaurantmanagementapp";

            // creating connection
            $conn = new mysqli($serverName,$userName,$password,$dbName);

            // checking connection
            if($conn->connect_error){
                die("Failed to connect");
            }
            
            return $conn;

        }

        //---------------------------------------------------Insert staffs using prepared statement.
        function addStaff($conn,$table,$sid,$fName,$email,$password,$gender,$designation,$image,$favFoods,$token_id){

            // Prepared statement.
            $stmt = $conn->prepare(
                "INSERT INTO $table
                 VALUES (?,?,?,?,?,?,?,?,?)"
            );

            // First check whether the user input email exists in the db.
            // If it does not exist then bind the parameters.
            // Else echo this email already exists.
            $sql = "SELECT * FROM $table WHERE Email = '$email' ";
            $ret = $conn->query($sql);

            if($ret->num_rows>0){
                echo "Email already exists";
                return False;
            
            }else{

                $stmt->bind_param('issssssss',$sid,$fName,$email,$password,$gender,$designation,$image,$favFoods,$token_id);

                if($stmt->execute()){

                    $stmt->close();

                    $result = True; 

                }else{

                    $result = False;

                }

                return $result;
            }
        }

        //-----------------------------------------------------------------------------Login verification

        // 1) searches user in db with their unique email address.
        // 2) If email is not available then returns false. 
        // 3) else returns true.
        // 4) if the email is available then compares the user input value with hashed value using password_verify
        // 5) if password doesn't match then return False. 
        // 6) else if password also matches then checks if the password needs rehashing.
 
        
        function searchStaff($conn,$table,$email,$pass){

            $sql = "SELECT * FROM $table WHERE Email='$email' ";
            $ret = $conn->query($sql);

            
            if($ret->num_rows == 1 ){

                $row= $ret->fetch_assoc();
                $options = ['cost'=>11];

                // checks whether user input password matches hashed password
                if(password_verify($pass,$row["Password"])){

                    // checks whether the default password algorithm needs to be changed.
                    if(password_needs_rehash($row["Password"],PASSWORD_DEFAULT,$options)){

                        $newHash = password_hash($pass,PASSWORD_DEFAULT,$options);

                    }

                    $result = [True,$row["tokenID"],$row["SId"]];

                }else{

                    $result = [False,'',''];

                }

                
            }else{

                $result = [False,''];

            }



            return $result;




        }



        //-----------------------------------------------gets email and password according to cookie value.
        function getCookie($conn,$table,$cookie_value){

            $sql = "SELECT * FROM $table WHERE tokenId = '$cookie_value' ";
            $ret = $conn->query($sql);

            if($ret->num_rows == 1){

                $row= $ret->fetch_assoc();
                $result =  $row["SId"];

            }else{

                $result =  False;

            }

            return $result;

        }

        //--------------------------------------------------------View staffs
        function viewStaff($conn,$table,$SId){

            $sql = "SELECT * FROM $table WHERE SId = '$SId'";
            $ret = $conn->query($sql);

            if($ret->num_rows>0){

                $row=$ret->fetch_assoc();

                $result = $row;


            }else{
                $result = False;
            }

            return $result;

        }

        //--------------------------------------------------------Get all users

        function getAllUsers($connObj,$table){

            $sql = "SELECT * FROM $table";
            $ret = $connObj->query($sql);

            $result = "

            <table>
                <tr>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Gender</th>
                    <th>Favorite foods</th>
                </tr>

            ";

            
            if($ret->num_rows>0){

                while($rows = $ret->fetch_assoc()){

                    $favoriteFoods = str_replace('$',',',$rows['FavoriteFoods']);
                    $result .= "<tr>".
                    "<td><img src='".$rows['Image']."' alt='' style='width:60px; border-radius:50%; border:1px solid #000;'></td>".
                    "<td>".$rows['FullName']."</td>".
                    "<td>".$rows['Email']."</td>".
                    "<td>".$rows['Designation']."</td>".
                    "<td>".$rows['Gender']."</td>".
                    "<td>".$favoriteFoods."</td>".
                    "</tr>";

                }

                $result .= "</table>";


            }else{
                $result = FALSE;
            }
            return $result;
        }


        function getCertainUsers($connObj,$table,$name){

            $sql = "SELECT * FROM $table WHERE FullName LIKE '$name%'";
            $ret = $connObj->query($sql);

            $result = "

            <table>
                <tr>
                    <th>Image</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Gender</th>
                    <th>Favorite foods</th>
                </tr>

            ";

            
            if($ret->num_rows>0){

                while($rows = $ret->fetch_assoc()){

                    $favoriteFoods = str_replace('$',',',$rows['FavoriteFoods']);
                    $result .= "<tr>".
                    "<td><img src='".$rows['Image']."' alt='' style='width:60px; border-radius:50%; border:1px solid #000;'></td>".
                    "<td>".$rows['FullName']."</td>".
                    "<td>".$rows['Email']."</td>".
                    "<td>".$rows['Designation']."</td>".
                    "<td>".$rows['Gender']."</td>".
                    "<td>".$favoriteFoods."</td>".
                    "</tr>";

                }

                $result .= "</table>";


            }else{
        
                $result .= "</table>";

            }

            return $result;
            
        }

        // -------------------------------------------------------Update profile
        function updateStaff($connObj,$table,$updateWhich,$value,$sid){
            
            $sql = "SELECT * FROM $table WHERE SId = $sid";
            $res = $connObj->query($sql);


            if($res->num_rows > 0){

                while($row = $res->fetch_assoc()){

                    if($row[$updateWhich] == $value){

                        return False;

                    }else{

                        $stmt = $connObj->prepare("UPDATE $table SET $updateWhich=? WHERE SId=$sid");
                        $stmt->bind_param('s',$value);
                        if($stmt->execute()){

                            $stmt->close();
                            return True; 

                        }else{

                            return False;

                        }

                        

                    }

                }

            }else{

                return False;

            }



        }

        // ------------------------------------------------------ Delete users
        function deleteProfile($connObj,$table,$pass,$sid){


            $sql = "SELECT * FROM $table WHERE SId=$sid ";
            $res = $connObj->query($sql);

            $row= $res->fetch_assoc();

            if($res->num_rows == 1 ){


                // checks whether user input password matches hashed password
                if(password_verify($pass,$row["Password"])){

                    
                    $sql1 = "DELETE FROM $table WHERE SId = $sid";

                    if ($connObj->query($sql1) === TRUE) {

                        return true;

                    }else {

                        return false;

                    }
                    

                }else{

                    return false;

                }

            }else{

                return false;
            }




        }



        // -------------------------------------------------------Add to menu
        function addToMenu(

                $connObj,
                $table,
                $SId,
                $foodName,
                $description,
                $image,
                $FId
                
        ){
            
            $stmt = $connObj->prepare("INSERT INTO $table (SId,FoodName,FoodDescription,FoodImage,FId
            ) VALUES (?,?,?,?,?)");
            $stmt->bind_param('isssi',$SId,$foodName,$description,$image,$FId);

            if($stmt->execute()){
                $res = true;
            }else{
                
                $res = false;
            }

            $stmt->close();
            return $res;
            
        }
        //--------------------------------------------------------Close connection
        function closeConn($conn){

            $conn->close();
            

        }

    }

?>