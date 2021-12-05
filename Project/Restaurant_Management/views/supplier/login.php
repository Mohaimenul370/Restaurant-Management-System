<?php

include('../../controls/supplier/logincheck.php');

if(isset($_SESSION['username'])){
header("location: pageone.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../public/supplier/stylesheet/myStyle.css">
</head>
<body> 


<div class="sticky">
<div class="topnav">
  <a href="#">Home</a>
  <a href="#">About US</a>
  

</div>
</div>


  <h1>Login</h1>
<div class="c">

<form action="" method="post">
    <input type="text" name="username" placeholder="Enter your username" required><br><br>
    <input type="password" name="password" placeholder="Enter your password" required><br><br>
    <input name="submit" type="submit" value="LOGIN">

</form>
</div>
<br>
<?php echo $error; ?>

</body>
</html>