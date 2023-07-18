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
    <title>about</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <h1>about page</h1>
    <section class="about-section">
      <div class="container">
        <h1>About Us</h1>
        <p>Welcome to our luxury bag e-commerce site. We are dedicated to providing the finest selection 
          of luxury bags to our esteemed customers.</p>
      </div>
    </section>

    <section class="history-section">
  <div class="container">
    <h2 class="history-title">Our Journey</h2>
    <p class="history-description">Discover the remarkable story of our company</p>
  
    <div class="timeline">
      <div class="timeline-item">
        <div class="timeline-year">2005</div>
        <div class="timeline-content">
          <h3 class="timeline-title">Company Founding</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus nulla eu aliquet mollis.</p>
        </div>
      </div>
  
      <div class="timeline-item">
        <div class="timeline-year">2010</div>
        <div class="timeline-content">
          <h3 class="timeline-title">Expansion and Growth</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus nulla eu aliquet mollis.</p>
        </div>
      </div>
  
      <div class="timeline-item">
        <div class="timeline-year">2015</div>
        <div class="timeline-content">
          <h3 class="timeline-title">International Presence</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus nulla eu aliquet mollis.</p>
        </div>
      </div>
  
      <div class="timeline-item">
        <div class="timeline-year">2020</div>
        <div class="timeline-content">
          <h3 class="timeline-title">Innovation and Success</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus nulla eu aliquet mollis.</p>
        </div>
      </div>
    </div>
  </div>
</section>



    <section class="philosophy-section">
      <div class="container">
        <h2>Our Philosophy</h2>
        <p>Share the philosophy and values that drive your brand. Explain what sets your luxury bags apart in terms of quality, craftsmanship, and design.</p>
      </div>
    </section>

    <section class="product-section">
      <div class="container">
        <h2>Our Luxury Bags</h2>
        <p>Describe the range of luxury bags you offer. Talk about different categories, materials used, and unique features that make your bags special.</p>
      </div>
    </section>

    <section class="experience-section">
      <div class="container">
        <h2>Customer Experience</h2>
        <p>Explain your commitment to providing an excellent customer experience. Mention easy online shopping, secure payment options, and fast shipping.</p>
      </div>
    </section>

    <section class="testimonials-section">
      <div class="container">
        <h2>Testimonials</h2>
        <p>Include testimonials or reviews from satisfied customers to build trust and credibility. Showcase positive feedback about your luxury bags and customer service.</p>
      </div>
    </section>

    <br><br><br>
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
</body>
</html>