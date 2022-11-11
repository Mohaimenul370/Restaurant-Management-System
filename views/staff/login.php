<?php
    include("./partials/preloader.php"); 

    
    
    include("../../controls/staff/login-controller.php");
    

    // When gets to this page checks whether the cookie has been set.
    // if set then call a function from login-validator. 
    // function will return either true or false.
    $cookieVal = isset($_COOKIE['tokenId']) == 1 ? $_COOKIE['tokenId'] : '';
    $ret = False;

    if(strlen($cookieVal)>0){
        $ret = validateCookie($cookieVal);
    }

    if($ret == True || isset($_SESSION["SId"])==1){
        header("location:view.php");
    }
    
    $email_input_value = "";
    $password_input_value = "";
    
    include("./partials/header.php");

?>

    <section id="top-message" style="<?php 

        if(!empty($_SESSION['success-msg'])){

            echo ' background-color:green;' ;

        }else if(!empty($_SESSION['err-msg'])){

            echo ' background-color:red;' ;
            
        }
        
        ?>">

        
            <?php 

                $error_msg = "";
                
                if(!empty($_SESSION['success-msg'])){

                    $success_msg = isset($_SESSION['success-msg']) == 1 ? $_SESSION['success-msg'] : '';
                    echo "
                        <div class='top-success-msg'>".$success_msg."</div>";

                    $_SESSION['success-msg'] = "";
                    
                }else if(!empty($_SESSION['err-msg'])){
                    $error_msg = $_SESSION['err-msg'];
                    echo "
                        <div class='top-error-msg'>".$error_msg."</div>";
                    $_SESSION['err-msg'] = "";
                    
                }

            ?>
            
    
    </section>
    <section  class="form-style editPage">
        <form action="" method="POST" onsubmit="return loginValidator()">
            <h1>Login</h1>
            <table>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td>
                        <input type="text" name="email" id="email">
                        <div id="email-validation-err" class="err"></div>
                    </td>
                    <!-- <td><div id="email-validation-err"></div></td> -->
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td>
                        <input type="password" name="password" id="password" >
                        <div id="password-validation-err" class="err"></div>
                    </td>
                    <!-- <td><div id="password-validation-err"></div></td> -->
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="remember-me" id="rm">
                        <label for="rm">Remember me!</label>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        <input type="submit" name="login" value="Submit">
                        <input type="reset" value="Reset">
                    </td>
                </tr> -->
                <tr>
                    <td><label>Not registered ?</label></td>
                    <td><a href="registration.php" class="login-anchors">Click here!</a></td>
                </tr>
                <tr>
                    <td><a href="../home.php" class="login-anchors">Go back</a></td>
                </tr>
            </table>
            <input type="submit" name="login" value="Submit" class="btn">
            <input type="reset" value="Reset" class="btn">
        </form>
    </section>

<?php include("./partials/footer.php"); ?>
