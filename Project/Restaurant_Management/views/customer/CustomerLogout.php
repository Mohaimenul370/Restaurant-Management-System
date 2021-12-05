<?php
    session_start();
    if(session_destroy()){
        setcookie('tokenId','',time()-3600);
        header('location:CustomerLogin.php');
    }
?>