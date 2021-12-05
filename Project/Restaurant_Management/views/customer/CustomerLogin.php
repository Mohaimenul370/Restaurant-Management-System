<?php
    include("../../controls/customer/LoginValidation.php");

    $cookieVal = isset($_COOKIE['tokenId']) == 1 ? $_COOKIE['tokenId'] : '';
    $ret = False;

    if(strlen($cookieVal)>0){
        $ret = validateCookie($cookieVal);
    }

    if($ret == True || isset($_SESSION["CId"])==1){
        header("location:CustomerView.php");
    }
    
    $email_input_value = "";
    $password_input_value = "";
    
    include("./header.php");


    $error_msg = "";
                
    if(!empty($_SESSION['success-msg']))
    {
    $success_msg = isset($_SESSION['success-msg']) == 1 ? $_SESSION['success-msg'] : '';
    echo "
    <div class='top-success-msg'>".$success_msg."</div>";
    $_SESSION['success-msg'] = "";
    }

    else if(!empty($_SESSION['err-msg']))
    {
    $error_msg = $_SESSION['err-msg'];
    echo "
    <div class='top-error-msg'>".$error_msg."</div>";
    $_SESSION['err-msg'] = "";                
    }

?>
            
    

    <div  class="login">
        <form action="" method="POST" onsubmit="return loginValidator()">
            <h1>Customer Login</h1>
            <table>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="text" name="email" id="email">
                        <div id="email-validation-err" class="err"></div>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" name="password" id="password" >
                        <div id="password-validation-err" class="err"></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="remember-me" id="rm">
                        <label for="rm">Remember me!</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Not registered ?</label></td>
                    <td><a href="CustomerRegistration.php" class="login-anchors">Click here!</a></td>
                </tr>
                <tr>
                    <td><a href="../home.php" class="login-anchors">Go back</a></td>
                </tr>
            </table>
            <input type="submit" name="login" value="Submit" id="btn">
            <input type="reset" value="Reset" id="btn">
        </form>
    </div>