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
  <h1>SHOP HERE</h1> 

  <section class="products">
    <div class="box-container">
      <?php  
        $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
        if(mysqli_num_rows($select_products) > 0){
          while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="post" class="box">
        <img class="image" src="/admin/uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
        <div class="name"><?php echo $fetch_products['name']; ?></div>
        <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
        <div class="input-container">
          <input type="number" min="1" name="product_quantity" value="1" class="qty">
          <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
          <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
        </div>
        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
    
      <?php
          }
        } else {
          echo '<p class="empty">no products added yet!</p>';
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
</body>
</html>

