<?php
include 'config.php';
session_start();

$logged_in = isset($_SESSION['user_id']);
$user_id = $logged_in ? $_SESSION['user_id'] : null;


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


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include 'header.php'; ?>

  <section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="Search products..." class="search-box">
      <input type="submit" name="submit" value="Search" class="search-btn">
   </form>
</section>

<section class="search-products">
   <div class="box-container">
   <?php
   if (isset($_POST['submit'])) {
      $search_item = $_POST['search'];
      $search_term = $search_item . '%';

      $stmt = mysqli_prepare($conn, "SELECT * FROM `products` WHERE name LIKE ?");
      mysqli_stmt_bind_param($stmt, "s", $search_term);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) > 0) {
         while ($fetch_product = mysqli_fetch_assoc($result)) {
   ?>
            <form action="" method="post" class="product-box">
               <img src="/admin/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="image">
               <div class="product-name"><?php echo $fetch_product['name']; ?></div>
               <div class="product-price">$<?php echo $fetch_product['price']; ?>/-</div>
               <input type="number" class="quantity" name="product_quantity" min="1" value="1">
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <?php if ($logged_in) : ?>
                  <input type="submit" class="add-to-cart-btn" value="Add to Cart" name="add_to_cart">
               <?php else : ?>
                  <button type="button" disabled class="add-to-cart-btn">Add to Cart (Login Required)</button>
               <?php endif; ?>
            </form>
   <?php
         }
      } else {
         echo '<p class="empty">No result found!</p>';
      }
   } else {
      echo '<p class="empty">Search something!</p>';
   }
   ?>
   </div>
</section>



   <?php if (isset($message) && isset($alertType)) : ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script>

      Swal.fire({
        icon: '<?php echo $alertType; ?>',
        title: '<?php echo ($alertType === "success") ? "Success" : "Error"; ?>',
        text: '<?php echo $message; ?>',
      });

    </script>
  <?php endif; ?>


  <?php include 'footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
  <script src="js/user_script.js"></script>
</body>
</html>