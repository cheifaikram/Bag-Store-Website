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
<body class="body">
<?php include 'header.php'; ?>

<div class="main--container">
  <!-- HOME SECTION  -->
  <section class="home-container">
    <div class="left-cont">
      <h1 class="home-title"> With <span>Kim's Shop</span> a Bag Would Change Your Life</h1>
    </div>
    <div class="right-cont">
      <img src="images/home-img.png" alt="woman holding a channel bag">
    </div>
  </section>

  <!-- BRANDS SECTION  -->
  <section class="brands-container">
    <h1 class="brand-title"> Top Rated Brands</h1>

    <div class="brand-images">
      <img src="images/Gucci-Logo.png" alt="gucci">
      <img src="images/prada-logo-1.png" alt="prada">
      <img src="images/Balenciaga-Logo.wine.png" alt="balenciaga">
      <img src="images/Saint-Laurent-logo.png" alt="ysl">
    </div>

  </section>

  <!-- BAGS SECTION  -->
  <section class="bags-container">
    <h1 class="bag-title"> Our Best Selling Bags </h1>
    <div class="bag-cont">
      <div class="bag-box">
        <img src="images/bag_img1.jpg" alt="">
        <p class="brand-bag">Hermes</p>
        <h2 class="bag-name"> Taurillon Novillo Birkin 25 </h2>
        <p class="bag-price">$21695</p>
      </div>

      <div class="bag-box">
        <img src="images/bag_img2.jpg" alt="">
        <p class="brand-bag">Celine</p>
        <h2 class="bag-name">Shiny Calfskin Triomphe Bag</h2>
        <p class="bag-price">$2695</p>
      </div>

      <div class="bag-box">
        <img src="images/bag_img3.jpeg" alt="">
        <p class="brand-bag">Louis vuitton</p>
        <h2 class="bag-name">Neverfull Nm Tote Monogram Canvas</h2>
        <p class="bag-price">$1580</p>
      </div>

      <div class="bag-box">
        <img src="images/bag_img4.jpeg" alt="">
        <p class="brand-bag">Fendi</p>
        <h2 class="bag-name">Fabric Jacquard Mini Baguette</h2>
        <p class="bag-price">$2275</p>
      </div>
    </div>
    <div class="button-cont">
      <a href="shop.php" class="bag-btn">See All Products</a>
    </div>

  </section>


  


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