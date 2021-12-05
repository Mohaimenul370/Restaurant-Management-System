<?php
    include('../../controls/staff/view-validator.php');
    include("./partials/header.php"); 
    include("./partials/preloader.php"); 
?>

<?php include("./partials/navigation.php"); ?>

<section class="main">

<div class="img">
    <img src="<?= $userQuery["Image"] ?>" alt="" id="view-img">
</div>


<div class="info">
    <table>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Gender</th>
            <th>Favorite foods</th>
        </tr>
        <tr>
            <td><?= $userQuery["FullName"] ?></td>
            <td><?= $userQuery["Email"] ?></td>
            <td><?= $userQuery["Designation"] ?></td>
            <td><?= $userQuery["Gender"] ?></td>
            <td>
                <?php
                    echo(str_replace('$',',',$userQuery["FavoriteFoods"]))
                ?>
            </td>
        </tr>
    </table>
</div>
</section>

<?php include("./partials/footer.php"); ?>