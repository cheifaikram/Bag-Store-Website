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
  
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

  <link rel="stylesheet" href="css/style.css">
  
</head>

<body>
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

     <!-- SHOWROOM SECTION  -->
     <section class="showroom-container">
    <h1 class="showroom-title"> Our Wellknown Showroom </h1>
    <div class="showroom-cont">
      <div class="about-showroom">
        <p class="showroom-par">"Welcome to our exquisite showrooms, where luxury and elegance meet 
        in a curated collection of the finest and most coveted designer bags. Step into a world of
         opulence and sophistication, where every corner showcases a meticulously handpicked 
         selection of the most sought-after and exclusive bags from renowned fashion houses. 
         Our showrooms are a haven for discerning individuals who appreciate the artistry, 
         craftsmanship, and timeless allure of high-end bags. Immerse yourself in the luxurious 
         ambiance, as the soft lighting accentuates the intricate details and exquisite materials 
         of each bag. From iconic classics to limited editions, our showrooms offer an unparalleled
          experience, allowing you to indulge in the world of exquisite fashion. Discover the 
          embodiment of prestige and style as you explore our showrooms of expensive bags, where 
          every visit is a journey into the epitome of elegance."</p>
      </div>

     <div class="wrapper">
        <i class="fa-solid fa-arrow-left button" id="prev"></i>
        <div class="image-container">
          <div class="carousel">
            <img class="img" src="images/showroom1.jpg" alt="" />
            <img class="img" src="images/showroom2.jpg" alt="" />
            <img class="img" src="images/showroom3.jpg" alt="" />
            <img class="img" src="images/showroom4.jpg" alt="" />
         </div>
         <i class="fa-solid fa-arrow-right button" id="next"></i>
      </div>
    </div>
    </div>
     </section>
    </div>
    <!-- FOOTER SECTION  -->
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
          <?php if (isset($_SESSION['user_id'])) {?>
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
    
    <script>
      const wrapper = document.querySelector(".wrapper");
      const carousel = document.querySelector(".carousel");
      const images = document.querySelectorAll(".img");
      const buttons = document.querySelectorAll(".button");
      
      let imageIndex = 1;
      let intervalId;

      const autoSlide = () => {
        intervalId = setInterval(() => slideImage(++imageIndex), 2000);
      };
      autoSlide();

      const slideImage = () => {
        imageIndex = imageIndex === images.length ? 0 : imageIndex < 0 ? images.length - 1 : imageIndex;
        carousel.style.transform = `translate(-${imageIndex * 100}%)`;
      };

      const updateClick = (e) => {
        clearInterval(intervalId);
        imageIndex += e.target.id === "next" ? 1 : -1;
        slideImage(imageIndex);
        autoSlide();
      };
      
      buttons.forEach((button) => button.addEventListener("click", updateClick));
      wrapper.addEventListener("mouseover", () => clearInterval(intervalId));
      wrapper.addEventListener("mouseleave", autoSlide);

    </script>
    
    <script src="js/user_script.js"></script>
  </body>
</html>