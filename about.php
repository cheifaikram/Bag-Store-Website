<?php
include 'config.php';
session_start();

$logged_in = isset($_SESSION['user_id']);
$user_id = $logged_in ? $_SESSION['user_id'] : null;
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
    <section class="about-section">
      <div class="about-container">
        <h1 class="history-title">About <span>Us</span></h1>
        <p class="about-desc">Welcome to our luxury bag e-commerce site. We are dedicated to providing the finest selection 
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
        <h2 class="history-title">customer testimonials</h2>
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

    <section class="testimonial-section">
      <div class="container">
        <h2 class="history-title">Customer Experience</h2>
      </div> 

      <section class="con">
        <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper">
          <div class="slide swiper-slide">
            <img src="images/user1.jpg" alt="" class="image" />
            <p>
            "I recently purchased a stunning luxury bag from your website, and I am absolutely 
            in love with it! The craftsmanship is impeccable, and the design is so elegant and unique.
            I receive compliments every time I carry it. Thank you for offering such a high-quality 
            product that truly stands out. I'll definitely be a repeat customer!"
            </p>

            <i class="bx bxs-quote-alt-left quote-icon"></i>

            <div class="details">
              <span class="name"> Sarah W</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="images/user2.jpg" alt="" class="image" />
            <p>
            "I've been a fashion enthusiast for years, and I must say that the luxury bag I 
            bought from your website has exceeded all my expectations. The attention to detail 
            and the choice of materials make it a true work of art. It's not just a bag; it's 
            a statement piece that enhances any outfit. I'm incredibly satisfied with my purchase
             and can't wait to explore more of your exquisite collection!"
            </p>

            <i class="bx bxs-quote-alt-left quote-icon"></i>

            <div class="details">
              <span class="name">Michael R</span>
            </div>
          </div>
          <div class="slide swiper-slide">
            <img src="images/user3.jpg" alt="" class="image" />
            <p>
            "I'm not usually one to write testimonials, but I couldn't resist sharing my wonderful 
            experience with your luxury bag. The entire process, from browsing the website to 
            receiving the package, was seamless and enjoyable. The bag itself is a dream come 
            true – the perfect combination of style and functionality. I appreciate the commitment
             to quality and the excellent customer service. Your brand has earned a loyal customer
              in me!" 
            </p>

            <i class="bx bxs-quote-alt-left quote-icon"></i>

            <div class="details">
              <span class="name"> Emma S </span>
            </div>
          </div>
        </div>
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <div class="swiper-pagination"></div>
      </div>
    </section> 

    </section>
    

    <?php include 'footer.php'; ?>

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

      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        grabCursor: true,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>

  </body>
</html>