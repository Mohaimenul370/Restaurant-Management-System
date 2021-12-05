<?php
    session_start();
    include('./header.php'); 
    include("./nav.php"); 
    include("../../models/customer/db.php");
?>

<div class="info">
    <table>
        <tr>
            <th>Customer ID </th>
            <th>Full Name</th> 
            <th>Email</th> 
            <th>Gender</th> 
        </tr>
        <tr> <?php
            $connection = new db();
            $connObj = $connection->openConn();
            $userQuery = $connection->allCustomer($connObj,"customer");
            $connection->closeConn($connObj); ?>
        </tr>
    </table>
</div>