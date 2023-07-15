<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
           <div class="logo">
              <h2><span>KIM</span> Store.</h2>
           </div>
        </div>
        <div class="navigation">
            <ul class="menu menu-mob">

                <li class="list <?php echo ($current_page == 'home.php') ? 'active' : ''; ?>"> 
                    <a href="home.php">
                        <span class="icon">
                          <i class="ri-home-2-line"></i>
                        </span>
                        <span class="text">Home</span>
                        <span class="circle"></span>
                    </a>
                </li>

                <li class="list <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">
                    <a href="about.php">
                        <span class="icon">
                           <i class="ri-information-line"></i>
                        </span>
                        <span class="text">About</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list <?php echo ($current_page == 'shop.php') ? 'active' : ''; ?>">
                    <a href="shop.php">
                        <span class="icon">
                           <i class="ri-handbag-line"></i>
                        </span>
                        <span class="text">Shop</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list <?php echo ($current_page == 'order.php') ? 'active' : ''; ?>">
                    <a href="order.php">
                        <span class="icon">
                           <i class="ri-shopping-cart-2-line"></i>
                        </span>
                        <span class="text">Orders</span>
                        <span class="circle"></span>
                    </a>
                </li>
                <li class="list <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">
                    <a href="contact.php">
                        <span class="icon">
                           <i class="ri-message-line"></i>
                        </span>
                        <span class="text">Contact</span>
                        <span class="circle"></span>
                    </a>
                </li>
              </ul>
        </div>

        <!-- <div class="dark--theme--btn">
            <i class="ri-sun-line sun" style="display: none;"></i>
            <i class="ri-moon-line moon"></i>
        </div>  -->

        <div class="navbar-right">
            <?php
            if (isset($_SESSION['user_id'])) {
                ?>
                
                <div class="logo-icons">
                    <i class="ri-moon-line moon"></i>
                    <i class="ri-search-2-line"></i>
                    <i id="user-btn" class="ri-user-line"></i>
                    <?php
                      $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                      $cart_rows_number = mysqli_num_rows($select_cart_number); 
                    ?>
                    <a href="cart.php"> <i class="ri-shopping-cart-2-line"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
                </div>

                <?php
            } else {
                ?>
                <div class="log-reg">
                    <a href="index.html" class="log-reg-btn">Login</a>
                    <a href="index.html" class="log-reg-btn">Register</a>
                </div>
                <div class="logo-icons">
                    <i class="ri-moon-line moon"></i>
                    <i class="ri-search-2-line"></i>
                </div>
                
                <?php
            }
            ?>
        </div>
        <div class="account-box">
            <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <div class="dbtn_container">
                <a href="logout.php" class="delete-btn">Logout</a>
            </div>
        </div>
    </nav>
      
      
      
    <script src="js/user_script.js"></script>
</body>
</html>