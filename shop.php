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
    $message = 'Product already added to cart!';
    $alertType = 'error';
  } else {
    // Add product to cart
    mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, qte, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
    $message = 'Product added to cart!';
    $alertType = 'success';
  }

  // Output the SweetAlert2 script
  echo '<script>';
  echo 'Swal.fire({
           icon: "' . $alertType . '",
           title: "' . ucfirst($alertType) . '",
           text: "' . $message . '"
         }).then(function() {';

  // Redirect based on the alert type
  if ($alertType === 'success') {
    echo 'window.location.href = "index.html#log";';
  } else {
    echo 'setTimeout(function() {
            window.location.href = "index.html";
          }, 1000);';
  }

  echo '});';
  echo '</script>';
  exit;
}
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
   <h1>SHOP HERE</h1> 

   <section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>
</body>
</html>