<?php
include 'config.php';
session_start();
$message = array(); // Initialize the message array

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  echo "Welcome, User!";
} else {
  echo "Welcome, Anonymous User!";
}

if (isset($_POST['order_btn'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $number = $_POST['number'];
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $method = mysqli_real_escape_string($conn, $_POST['method']);
  $adress = mysqli_real_escape_string($conn, 'flat no. ' . $_POST['flat'] . ', ' . $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code']);
  $placed_on = date('d-M-Y');

  $cart_total = 0;
  $cart_products = array();

  $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
  if (mysqli_num_rows($cart_query) > 0) {
    while ($cart_item = mysqli_fetch_assoc($cart_query)) {
      $cart_products[] = $cart_item['name'] . ' (' . $cart_item['qte'] . ') ';
      $sub_total = ($cart_item['price'] * $cart_item['qte']);
      $cart_total += $sub_total;
    }
  }

  $total_products = implode(', ', $cart_products);

  $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND adress = '$adress' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

  if ($cart_total == 0) {
    $message[] = 'Your cart is empty';
  } else {
    if (mysqli_num_rows($order_query) > 0) {
      $message[] = 'Order already placed!';
    } else {
      mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, adress, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$adress', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
      $message[] = 'Order placed successfully!';
      mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    }
  }

  // Store messages in the session
  $_SESSION['messages'] = $message;

  // Redirect to the same page to prevent form resubmission on refresh
  header('Location: ' . $_SERVER['REQUEST_URI']);
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header.php'; ?>

<section class="display-order">
 <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['qte']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '$'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['qte']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Your Cart Is Empty</p>';
   }
   ?>
   <div class="grand-total"> Grand Total : <span>$<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">
  <form action="" method="post">
  <h3>Place Your Order</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Your Name :</span>
            <input type="text" name="name" required placeholder="Enter your name">
         </div>
         <div class="inputBox">
            <span>Your Number :</span>
            <input type="number" name="number" required placeholder="Enter your number">
         </div>
         <div class="inputBox">
            <span>Your Email :</span>
            <input type="email" name="email" required placeholder="Enter your email">
         </div>
         <div class="inputBox">
            <span>Payment Method :</span>
            <select name="method">
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
               <option value="paytm">paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line 01 :</span>
            <input type="number" min="0" name="flat" required placeholder="e.g. Flat no.">
         </div>
         <div class="inputBox">
            <span>Address Line 01 :</span>
            <input type="text" name="street" required placeholder="e.g. Street Name">
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" required placeholder="e.g. Kolea">
         </div>
         <div class="inputBox">
            <span>State :</span>
            <input type="text" name="state" required placeholder="e.g.Tipaza">
         </div>
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" required placeholder="e.g. Algeria">
         </div>
         <div class="inputBox">
            <span>Pin Code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
         </div>
      </div>
      <input type="submit" value="order now" class="btn" name="order_btn">
  </form>
</section>

<?php
// Display messages using SweetAlert2
if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) {
  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>';
  echo '<script>';
  foreach ($_SESSION['messages'] as $msg) {
    echo "Swal.fire({
            icon: 'info',
            title: 'Message',
            text: '$msg',
            showConfirmButton: false,
            timer: 3000
          });";
  }
  echo '</script>';
  // Clear the messages from the session to avoid displaying them again on refresh
  unset($_SESSION['messages']);
}
?>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<script src="js/user_script.js"></script>
</body>
</html>
