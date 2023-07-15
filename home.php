<?php
include 'config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
  
    echo "Welcome, User!";
  } else {
    echo "Welcome, Anonymous User!";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>

<div class="main--container">
    <h1>HOMEEEEE</h1>
</div>

<section class="footer">

   <div class="box-container">

      <div class="box">
         <h3>quick links</h3>
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
         <a href="shop.php">Shop</a>
         <a href="contact.php">Contact</a>
      </div>

      <div class="box">
        <h3>extra links</h3>
        <a href="index.html">Login / Register</a>
        <?php
          if (isset($_SESSION['user_id'])) {
         ?>
          <a href="cart.php">Cart</a>
          <a href="order.php">Orders</a>
         <?php
        } ?>
            
    
      </div>

      <div class="box">
         <h3>contact info</h3>
         <p> <i class='bx bx-phone'></i> 055557836 </p>
         <p> <i class='bx bx-phone'></i> 06634273542 </p>
         <p> <i class='bx bx-envelope'></i> ikramch@gmail.com   </p>
         <p> <i class='bx bx-map' ></i> Tipaza, Algeria </p>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class='bx bxl-facebook'></i> Facebook </a>
         <a href="#"> <i class="bx bxl-twitter"></i> Twitter </a>
         <a href="#"> <i class="bx bxl-instagram"></i> Instagram </a>
         <a href="#"> <i class="bx bxl-linkedin"></i> Linkedin </a>
      </div>

   </div>


</section>
</body>
</html>