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
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle1.min.css" />
    
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
          <p class="hidden">Founded with a passion for elegance, our luxury bag online store curated an exquisite collection
             that captivated discerning connoisseurs from the very beginning.</p>
        </div>
      </div>
  
      <div class="timeline-item">
        <div class="timeline-year">2010</div>
        <div class="timeline-content">
          <h3 class="timeline-title">Expansion and Growth</h3>
          <p class="hidden">Our small boutique venture flourished into an iconic destination, delivering unparalleled service 
            and exceptional products that captivated fashion enthusiasts worldwide.</p>
        </div>
      </div>
  
      <div class="timeline-item">
        <div class="timeline-year">2015</div>
        <div class="timeline-content">
          <h3 class="timeline-title">International Presence</h3>
          <p class="hidden">Embracing international markets, our timeless designs transcended cultural boundaries, making our luxury
             bags a statement of global style.</p>
        </div>
      </div>
  
      <div class="timeline-item">
        <div class="timeline-year">2022</div>
        <div class="timeline-content">
          <h3 class="timeline-title">Innovation and Success</h3>
          <p class="hidden">By blending craftsmanship and modern technology, we revolutionized luxury e-commerce, garnering unprecedented
             success and customer satisfaction.</p>
        </div>
      </div>
    </div>
  </div>
</section>

    <section class="philosophy-section">
      <div class="container">
        <h2 class="history-title">Our Philosophy</h2>
        <p>At Kim's Shop, we believe that true luxury lies in the art of simplicity 
          and timeless elegance. Our philosophy centers around the idea that a chic bag is 
          more than just a fashion accessory,it's a statement of sophistication and 
          individuality. Each bag is meticulously designed with an unwavering commitment 
          to quality and ethical practices.</p>
      </div>

      <div class="about-cont">
        <div class="box-container">
          <div class="box">

            <div class="thefront">
              <h2 class="title">Sustainability</h2>
              <p> Our dedication to sustainability drives us to source the finest materials
              ethically, ensuring that our bags leave a positive impact on both fashion and the environment.</p>
            </div>

            <div class="theback">
              <img src="images/sus.jpeg" alt="">
            </div>

          </div>
        </div>

        <div class="box-container">
          <div class="box">

            <div class="thefront">
              <h2 class="title">Elegance</h2>
              <p>We strive to redefine elegance, combining classic designs with contemporary elements 
              to create bags that exude refined charm and everlasting allure.</p>
            </div>

            <div class="theback">
              <img src="images/elegance.jpeg" alt="">
            </div>

          </div>
        </div>

        <div class="box-container">
          <div class="box">

            <div class="thefront">
              <h2 class="title">Artistry</h2>
              <p>Our bags are the result of the passion and expertise of skilled artisans who pour 
            their heart into every stitch, making each piece a work of art.</p>
            </div>

            <div class="theback">
              <img src="images/art.jpg" alt="">
            </div>

          </div>
        </div>

        <div class="box-container">
          <div class="box">

            <div class="thefront">
              <h2 class="title">Individuality</h2>
              <p>We celebrate the uniqueness of each customer, crafting limited-edition 
            collections that reflect diverse styles and personalities.</p>
            </div>

            <div class="theback">
              <img src="images/unique.jpg" alt="">
            </div>

          </div>
        </div>
      </div>

    </section>

    <section class="experience-section">
      <div class="container">
        <h2 class="history-title">Customer Experience</h2>
      </div>
      <div class="experience-cont">
        <div class="experience-card">
          <h2>Free Delivery</h2>
          <img src="images/truck.png" alt="">
          <p>For all the South African countries</p>
        </div>
        
        <div class="experience-card">
          <h2>5 Days Return</h2>
          <img src="images/money.png" alt="">
          <p>You Will Get Your Money Back ASAP</p>
        </div>
        
        <div class="experience-card">
          <h2>Special Gifts</h2>
          <img src="images/gift.png" alt="">
          <p>Free Gifts For Every Candy Order</p>
        </div>

        <div class="experience-card">
          <h2>Highly Secured</h2>
          <img src="images/pay.png" alt="">
          <p>Protected and Secured By Paypal</p>
        </div>
      </div>
    </section>

    <section class="con">
      <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper">
          <div class="slide swiper-slide">
            <img src="images/user1.jpg" alt="" class="image" />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
              saepe provident dolorem a quaerat quo error facere nihil deleniti
              eligendi ipsum adipisci, fugit, architecto amet asperiores
              doloremque deserunt eum nemo.
            </p>

            <i class="bx bxs-quote-alt-left quote-icon"></i>

            <div class="details">
              <span class="name">Marnie Lotter</span>
              <span class="job">Web Developer</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="images/user2.jpg" alt="" class="image" />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
              saepe provident dolorem a quaerat quo error facere nihil deleniti
              eligendi ipsum adipisci, fugit, architecto amet asperiores
              doloremque deserunt eum nemo.
            </p>

            <i class="bx bxs-quote-alt-left quote-icon"></i>

            <div class="details">
              <span class="name">Marnie Lotter</span>
              <span class="job">Web Developer</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="images/user3.jpg" alt="" class="image" />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam,
              saepe provident dolorem a quaerat quo error facere nihil deleniti
              eligendi ipsum adipisci, fugit, architecto amet asperiores
              doloremque deserunt eum nemo.
            </p>

            <i class="bx bxs-quote-alt-left quote-icon"></i>

            <div class="details">
              <span class="name">Marnie Lotter</span>
              <span class="job">Web Developer</span>
            </div>
          </div>
        </div>
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <div class="swiper-pagination"></div>
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

    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/user_script.js"></script>

    <script>
      const timeline = document.querySelector('.timeline');
      timeline.addEventListener('click', function(event) {
        if (event.target.classList.contains('timeline-title')) {
          const timelineContent = event.target.nextElementSibling;
          timelineContent.classList.toggle('hidden');
        }
      });
    </script>

  </body>
</html>