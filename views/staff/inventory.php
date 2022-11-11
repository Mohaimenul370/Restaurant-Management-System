<?php
    include('../../controls/staff/inventory-controller.php');
    include('partials/header.php');
    include('partials/navigation.php');
    include('partials/preloader.php');

?>

<div class="menu-links">
    <div class="links">
    <a href="view-menu.php" class="links"><i class="far fa-eye"></i>View menu items</a><br>
    <a href="add-menu-items.php" class="links"><i class="fas fa-plus-circle"></i>Add items to Menu</a><br>
    <a href="edit-menu.php" class="links"><i class="fas fa-edit"></i>Edit menu items</a><br>
    </div>
</div>

<script src="../../public/staff/scripts/inventory-ajax.js"></script>
<?php include('partials/footer.php'); ?>