
<?php


class db
{

    function OpenCon()
    {
        $serverName = "localhost";
        $userName = "newUser";
        $password = "shahed1998";
        $dbName = "restaurantmanagementapp";
        // creating connection
        $conn = new mysqli($serverName,$userName,$password,$dbName);

        if ($conn) {
            return $conn;
        } else {
            die("Connection error:" . mysqli_connect_error());
        }
    }

    function CheckUser($conn, $table, $username, $password)
    {
        $result = $conn->query("SELECT * FROM " . $table . " WHERE username='" . $username . "' AND password='" . $password . "'");
        return $result;
    }

    function getAdminInfo($conn,$user){
        $result = $conn->query("SELECT * from admin where username = '$user' ");
        
        if($result)
		{
			$row = mysqli_fetch_assoc($result);

			if(count($row)>0)
			{
				return $row;
			}
			else{
				return false;
			}
		}
		else
		{
			return false;
		}
    }


    function ShowAllAdmin($conn)
    {
        $result = $conn->query("SELECT * FROM  admin");
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
    
        return $users;
    }

    function editAdmin($conn,$name,$email,$username,$fileNameNew){
        $result = $conn->query( "UPDATE admin SET name='{$name}', email='{$email}', profile_pic = '{$fileNameNew}'
        WHERE username='{$username}'");
        return $result;
    }

    function editAdminPasword($conn,$password,$username){
        $result = $conn->query( "UPDATE admin SET password='{$password}'
        WHERE username='{$username}'");
        return $result;
    }

    function addAdmindb($conn,$name,$email,$password,$username,$gender,$dob)
    {
        $result = $conn->query("INSERT INTO admin
        VALUES ('{$username}', '{$password}','null', '{$name}','{$email}','{$gender}','{$dob}' )");
        return $result;
    }

    function showStuffList($conn)
    {
        $result = $conn->query("SELECT * FROM  staff");
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
    
        return $users;
    }

    function deleteStuff($conn, $name){
        $result = $conn->query("DELETE FROM staff WHERE FullName='{$name}'");
        return $result;
    }

    function  addStaff($conn,$fullName,$email,$gender,$designation,$favFoods){
        // $result = $conn->query("INSERT INTO staff
        // VALUES (93,'{$fullName}','{$email}','aaa','{$gender}','{$designation}','bbb','{$favFoods}','ccc')");
        // // var_dump($result);
        // return $result;
        $table = "staff";

        $stmt = $conn->prepare(
                "INSERT INTO $table
                 VALUES (?,?,?,?,?,?,?,?,?)"
        );

        $sid = 0;
        $image = "abcde";
        $token_id = "fghij";


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

    function showSupplierList($conn)
    {
        $result = $conn->query("SELECT * FROM  supplier");
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
    
        return $users;
    }

    function deleteSupplier($conn, $id){
        $result = $conn->query("DELETE FROM supplier WHERE SlId='{$id}'");
        return $result;
    }

    function  addSupplier($conn,$fullName,$age,$email,$supplyfood,$gen){

        $table = "supplier";

        $stmt = $conn->prepare(
                "INSERT INTO $table
                 VALUES (?,?,?,?,?,?,?,?)"
        );

        $slId = 0;
        $fullName = 'abcde';
        $email = "abc@gmail.com";
        $supplyfood = "abcde";
        $gen = "male";
        $image = "abcde";
        // $token_id = "fghij";
        


            // First check whether the user input email exists in the db.
            // If it does not exist then bind the parameters.
            // Else echo this email already exists.
            $sql = "SELECT * FROM $table WHERE Email = '$email' ";
            $ret = $conn->query($sql);

            if($ret->num_rows>0){
                echo "Email already exists";
                return False;
            
            }else{

                $stmt->bind_param('isssssss',$slId,$fullName,'24',$email,$supplyfood,'abc',$gen,$image);

                if($stmt->execute()){

                    $stmt->close();

                    $result = True; 

                }else{

                    $result = False;

                }

                return $result;
            }


















        // $val=1;
        // $result = $conn->query("INSERT INTO supplier
        // VALUES ('','{$fullName}', '{$age}','{$email}', '{$supplyfood}','','{$gen}','' )");
        // return $result;
    }


    function CloseCon($conn)
    {
        $conn->close();
    }
}
?>