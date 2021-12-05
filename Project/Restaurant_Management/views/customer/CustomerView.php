<?php
    include('../../controls/customer/ViewValidation.php');
    include("./header.php"); 
    include("./nav.php"); 
?>


<div class="info">
    <table>
        <tr>
            <th>Image </th>
            <th>Full Name</th> 
            <th>Email</th> 
            <th>Gender</th> 
        </tr>
        <tr>
            <td> <img src="<?= $userQuery["Image"] ?>" alt="" id="view-img"> </td>
            <td><?= $userQuery["FullName"] ?></td>
            <td><?= $userQuery["Email"] ?></td>
            <td><?= $userQuery["Gender"] ?></td>
        </tr>
    </table>
</div>




