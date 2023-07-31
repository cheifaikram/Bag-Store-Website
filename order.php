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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include 'header.php'; ?>
  <section class="oreder-section">
   <div class="box-container">
      <?php
         function getOrders($conn, $user_id) {
            $orders = array();
            $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('Query failed');
            if (mysqli_num_rows($order_query) > 0) {
               while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
                  $orders[] = $fetch_orders;
               }
            }
            return $orders;
         }
         $user_orders = getOrders($conn, $user_id);

         if (!empty($user_orders)) {
            foreach ($user_orders as $order) {
      ?>
      <div class="box">
         <p>Placed on: <span><?php echo $order['placed_on']; ?></span></p>
         <p>Name: <span><?php echo $order['name']; ?></span></p>
         <p>Number: <span><?php echo $order['number']; ?></span></p>
         <p>Email: <span><?php echo $order['email']; ?></span></p>
         <p>Address: <span><?php echo $order['adress']; ?></span></p>
         <p>Payment Method: <span><?php echo $order['method']; ?></span></p>
         <p>Your Orders: <span><?php echo $order['total_products']; ?></span></p>
         <p>Total Price: <span>$<?php echo $order['total_price']; ?>/-</span></p>
         <p>Payment Status: <span class="payment-status-<?php echo $order['payement_status']; ?>"><?php echo $order['payement_status']; ?></span></p>
      </div>
      <?php
            }
         } else {
            echo '<p class="empty">No orders placed yet!</p>';
         }
      ?>
   </div>

</section>


  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
  <script src="js/user_script.js"></script>
</body>
</html>