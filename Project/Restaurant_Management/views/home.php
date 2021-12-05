<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/homePage/stylesheets/styles.css?v=<?= time() ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b17fe509c6.js" crossorigin="anonymous"></script>
    <title>Restaurant Management</title>
</head>
<body>
    <?php include('./staff/partials/preloader.php'); ?>
    <section class="app-name">
        <h1>Restaurant Management</h1>
    </section>
    <section id="link">
        <div class="links">
        
        <a href="admin/login.php"><i class="fas fa-chevron-circle-right"></i>Admin</a>
        <a href="customer/CustomerLogin.php"><i class="fas fa-chevron-circle-right"></i>Customer</a>
        <a href="staff/login.php"><i class="fas fa-chevron-circle-right"></i>Staff</a>
        <a href="supplier/login.php"><i class="fas fa-chevron-circle-right"></i>Supplier</a>
    </div>
    </section>

    <script src="../public/staff/scripts/jquery-use.js?v=<?= time() ?>"></script>
    <script src="../public/homePage/scripts/script.js?v=<?= time() ?>"></script>
</body>
</html>