<?php
include '../config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/admin_style.css">

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


</head>
<body class="body">
<section class="head">
        <div class="logo">
            <i class="ri-menu-line menu"></i>
            <h2><span>KIM</span> Store.</h2>
        </div>
        <div class="header--items">
            <div class="dark--theme--btn">
                <i class="ri-moon-line moon"></i>
                <i class="ri-sun-line sun"></i>
            </div>
            
            <div class="icons">
                <img id="user-btn" src="../images/profile.jpeg" alt="">
            </div>
            <div class="account-box">
                <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
                <a href="../logout.php" class="delete-btn">logout</a>  
              </div>
        </div>
    </section>
    

<!-- admin dashboard section starts  -->

<section class="main">
<?php include 'admin_header.php'; ?>
<div class="main--container">
            <div class="section--title">
                <h3 class="title">Welcome back, kim</h3>
            </div>
            <div class="cards">
                <div class="card card-1">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bxs-hourglass-bottom'></i></span>
                        <div>Total Pendings</div>
                    </div>
                    <?php 
                            $total_pendings = 0;
                            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payement_status = 'pending'") or die('query failed');
                            if(mysqli_num_rows($select_pending) > 0){
                                while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                                        $total_price = $fetch_pendings['total_price'];
                                        $total_pendings += $total_price;
                                    };
                            };                 
                    ?>
                    <div class="overall">
                        <h1 class="card--value">$<?php echo $total_pendings; ?>/-</h1>
                    </div>
                </div>

                <div class="card card-2">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bx-check-square'></i></span>
                        <span>Completed Payments</span>
                    </div>
                    <?php
                    $total_completed = 0;
                    $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payement_status = 'completed'") or die('query failed');
                    if(mysqli_num_rows($select_completed) > 0){
                       while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                          $total_price = $fetch_completed['total_price'];
                          $total_completed += $total_price;
                       };
                    };
                 ?>
                 <div class="overall">
                    <h1 class="card--value">$<?php echo $total_completed; ?>/-</h1>
                 </div>
                </div>

                <div class="card card-3">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bx-cart'></i></span>
                        <span>Orders Placed</span>
                    </div>
                    <?php 
                    $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                    $number_of_orders = mysqli_num_rows($select_orders);
                    ?>
                    <div class="overall">
                    <h1 class="card--value"><?php echo $number_of_orders; ?></h1>
                    </div>   
                </div>

                <div class="card card-4">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bx-cart-add'></i></span>
                        <span>Products Added</span>
                    </div>
                    <?php 
                      $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                      $number_of_products = mysqli_num_rows($select_products);
                    ?>
                    <div class="overall">
                       <h1 class="card--value"><?php echo $number_of_products; ?></h>
                    </div>     
                </div>

                <div class="card card-4">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bx-user'></i></span>
                        <span>Normal Users</span>
                    </div>

                    <?php 
                      $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                      $number_of_users = mysqli_num_rows($select_users);
                    ?>
                    <div class="overall">
                       <h1 class="card--value"><?php echo $number_of_users; ?></h1>
                    </div>    
                </div>

                <div class="card card-3">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bxs-user-check'></i></span>
                        <span>Admins</span>
                    </div>
                    <?php 
                      $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                      $number_of_admins = mysqli_num_rows($select_admins);
                    ?>
                    <div class="overall">
                    <h1 class="card--value"><?php echo $number_of_admins; ?></h1>
                    </div>
                </div>

                <div class="card card-2">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bxs-user-account'></i></span>
                        <span>Total Accounts</span>
                    </div>
                    <?php 
                       $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                       $number_of_account = mysqli_num_rows($select_account);
                    ?>
                    <div class="overall">
                       <h1 class="card--value"><?php echo $number_of_account; ?></h1>
                    </div>
                </div>
                <div class="card card-1">
                    <div class="card--title">
                        <span class="card--icon icon"><i class='bx bx-chat'></i></span>
                        <span>New Messages</span>
                    </div>
                    <?php 
                       $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                       $number_of_messages = mysqli_num_rows($select_messages);
                    ?>
                    <div class="overall">
                       <h1 class="card--value"><?php echo $number_of_messages; ?></h1>
                    </div>
                </div>

            </div>
        </div>
</section>



    <script src="../js/admin_script.js"></script> 
</body>
</html>