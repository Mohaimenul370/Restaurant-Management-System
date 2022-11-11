<?php

    session_start();

    if(!isset($_SESSION["SId"])){
        header("location:logout.php");
    }

    include("../../models/staff/db.php");

?>