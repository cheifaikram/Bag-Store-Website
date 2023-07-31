<?php
include 'config.php';
session_start();
$message = array(); 

$logged_in = isset($_SESSION['user_id']);
$user_id = $logged_in ? $_SESSION['user_id'] : null;

if (isset($_POST['update_cart'])) {
  $cart_id = $_POST['cart_id'];
  $cart_quantity = $_POST['cart_quantity'];
  mysqli_query($conn, "UPDATE `cart` SET qte = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
  $message[] = 'Cart quantity updated!';
}

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
  $message[] = 'Item deleted from cart!';
}

if (isset($_GET['delete_all'])) {
  mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
  $message[] = 'All items deleted from cart!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

   <?php if (!empty($message)) { ?>
   <script>
      <?php foreach ($message as $msg) { ?>
         Swal.fire({
            icon: "success",
            title: "Success",
            text: "<?php echo $msg; ?>"
         });
      <?php } ?>
   </script>
   <?php } ?>

</head>
<body>
   
<?php include 'header.php'; ?>
<section class="about-section">
  <?php $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($select_cart) > 0){ ?>
      <div class="about-container"> 
        <h1 class="history-title">Your <span>Cart</span></h1>
      </div>
      <?php 
    } else{?>
        <div class="about-container"> 
          <h1 class="history-title">Your <span>Cart</span> Is Empty</h1>
        </div> <?php 
      } ?>
</section>

<section class="cart-section">
   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
          while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
        <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times delete-cart-item" data-cart-id="<?php echo $fetch_cart['id']; ?>"></a>
        <img class="image" src="admin/uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
        <div class="name"><?php echo $fetch_cart['name']; ?></div>
        <div class="price">$<?php echo $fetch_cart['price']; ?>/-</div>

        <form action="" method="post" class="input-container">
          <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
          <input class="qte" type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['qte']; ?>">
          <input type="submit" name="update_cart" value="Update" class="option-btn">
        </form>

        <div class="sub-total"> Total Product Price : <span>$<?php echo $sub_total = ($fetch_cart['qte'] * $fetch_cart['price']); ?>/-</span> </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{ 
        echo '';
       }
      ?>
   </div>
</section>

<div class="cart-delete-all">
  <a href="cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" id="deleteAllLink">Delete All</a>
</div>

<div class="cart-total">
  <p>Grand Total : <span>$<?php echo $grand_total; ?>/-</span></p>
  <div class="flex">
    <a href="shop.php" class="option-btn">Continue Shopping</a>
    <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed To Checkout</a>
  </div>
</div>

<?php include 'footer.php'; ?>
<script src="js/user_script.js"></script>
<script>

 const deleteButtons = document.querySelectorAll('.delete-cart-item');
 deleteButtons.forEach((button) => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    const cartId = button.getAttribute('data-cart-id');

    const confirmationShown = sessionStorage.getItem(`confirmation_${cartId}`);
    if (confirmationShown === null) {
      Swal.fire({
        title: 'Delete Item from Cart',
        text: 'Are you sure you want to delete this item from your cart?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `cart.php?delete=${cartId}`;
        }
      });
      sessionStorage.setItem(`confirmation_${cartId}`, true);
    } else {
      window.location.href = `cart.php?delete=${cartId}`;
    }
  });
 });
  const deleteAllLink = document.getElementById('deleteAllLink');

  deleteAllLink.addEventListener('click', (event) => {
    event.preventDefault();

    if (!deleteAllLink.classList.contains('disabled')) {
      Swal.fire({
        title: 'Delete All Items from Cart',
        text: 'Are you sure you want to delete all items from your cart?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete all!',
        cancelButtonText: 'Cancel',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'cart.php?delete_all';
        }
      });
    }
  });
</script>
</body>
</html>
