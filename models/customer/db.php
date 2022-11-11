<?php

    class db{
        function openConn(){

            $serverName = "localhost";
            $userName = "newUser";
            $password = "shahed1998";
            $dbName = "restaurantmanagementapp";

            $conn = new mysqli($serverName,$userName,$password,$dbName);

            if($conn->connect_error){
                die("Failed to connect");
            }
            
            return $conn;

}

        function addCustomer($conn,$table,$cid,$fName,$email,$password,$gender,$image,$token_id){

            $stmt = $conn->prepare(
                "INSERT INTO $table
                 VALUES (?,?,?,?,?,?,?)"
            );

            $sql = "SELECT * FROM $table WHERE Email = '$email' ";
            $ret = $conn->query($sql);

            if($ret->num_rows>0){
                echo "Email already exists";
                return False;
            
            }else{

                $stmt->bind_param('issssss',$cid,$fName,$email,$password,$gender,$image,$token_id);

                if($stmt->execute()){

                    $stmt->close();

                    $result = True; 

                }else{

                    $result = False;

                }

                return $result;
            }
        }



        function LoginCustomer($conn,$table,$email,$pass){

            $sql = "SELECT * FROM $table WHERE Email='$email' ";
            $ret = $conn->query($sql);

            
            if($ret->num_rows == 1 ){

                $row= $ret->fetch_assoc();
                $options = ['cost'=>11];

                if(password_verify($pass,$row["Password"])){

                    if(password_needs_rehash($row["Password"],PASSWORD_DEFAULT,$options)){

                        $newHash = password_hash($pass,PASSWORD_DEFAULT,$options);

                    }

                    $result = [True,$row["tokenID"],$row["CId"]];

                }else{

                    $result = [False,'',''];

                }

                
            }else{

                $result = [False,''];

            }



            return $result;




        }


        function getCookie($conn,$table,$cookie_value){

            $sql = "SELECT * FROM $table WHERE tokenId = '$cookie_value' ";
            $ret = $conn->query($sql);

            if($ret->num_rows == 1){

                $row= $ret->fetch_assoc();
                $result =  $row["CId"];

            }else{

                $result =  False;

            }

            return $result;

        }


        function viewCustomer($conn,$table,$CId){

            $sql = "SELECT * FROM $table WHERE CId = $CId";
            $ret = $conn->query($sql);

            if($ret->num_rows>0){

                $row=$ret->fetch_assoc();

                $result = $row;


            }else{
                $result = False;
            }

            return $result;

        }


        function allCustomer($conn,$table){

            $sql = "SELECT CId, FullName, Email, Gender FROM $table";
            $ret = $conn->query($sql);

            if($ret->num_rows>0){

               while ($row=$ret->fetch_assoc()){

                echo "<tr><td>". $row["CId"]. "</td><td>". $row["FullName"]."</td><td>".$row["Email"]. "</td><td>".$row["Gender"]. "</td> </tr>";

               }

                $result = $row;


            }
            
            else
            {
                $result = False;
            }

            return $result;

        }




        function updateCustomer($connObj,$table,$updateWhich,$value,$cid){
            
            $sql = "SELECT * FROM $table WHERE CId = $cid";
            $res = $connObj->query($sql);


            if($res->num_rows > 0){

                while($row = $res->fetch_assoc()){

                    if($row[$updateWhich] == $value){

                        return False;

                    }else{

                        $stmt = $connObj->prepare("UPDATE $table SET $updateWhich=? WHERE CId=$cid");
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

        function deleteProfile($connObj,$table,$pass,$cid){


            $sql = "SELECT * FROM $table WHERE CId=$cid ";
            $res = $connObj->query($sql);

            $row= $res->fetch_assoc();

            if($res->num_rows == 1 ){

                if(password_verify($pass,$row["Password"])){

                    
                    $sql1 = "DELETE FROM $table WHERE CId = $cid";

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

        function closeConn($conn){

            $conn->close();
            

        }

    }

?>