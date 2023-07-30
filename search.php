<?php
include 'config.php';
session_start();

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  echo "Welcome, User!";
} else {
  echo "Welcome, Anonymous User!";
}

if (isset($_POST['add_to_cart'])) {
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

  if (mysqli_num_rows($check_cart_numbers) > 0) {
    // Product already added to cart
    $message = 'Product is already added to cart!';
    $alertType = 'error';
  } else {
    // Add product to cart
    if (mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, qte, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')")) {
      $message = 'Product added to cart!';
      $alertType = 'success';
    } else {
      $message = 'Failed due to some technical reason. Please try again later.';
      $alertType = 'error';
    }
  }
}
?>


