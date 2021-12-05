<?php

    include('../../controls/staff/allStaff-controller.php');
    include('./partials/header.php'); 
    include("./partials/preloader.php"); 
    include('./partials/navigation.php');
 
?>

<section class="main">

    <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" name="search-box" id="search-box" placeholder= "Search staff by entering their name">
    </div>

    

    <div class="info allStaffInfo">
        
    </div>

</section>


<script src="../../public/staff/scripts/ajax.js?v=<?php time() ?>"></script>
<?php include('./partials/footer.php'); ?>

    