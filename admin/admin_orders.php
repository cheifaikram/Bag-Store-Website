<?php

include '../config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

// UPDATE 
if(isset($_POST['update_order'])) {
   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   
   $query = "UPDATE `orders` SET payement_status = '$update_payment' WHERE id = '$order_update_id'";
   $result = mysqli_query($conn, $query);

   if($result) {
      $message = 'Payment status has been updated!';
      echo '<script>
               Swal.fire({
                  icon: "success",
                  title: "Success!",
                  text: "'. $message .'",
               });
            </script>';
   } else {
      $message = 'Failed to update payment status.';
      echo '<script>
               Swal.fire({
                  icon: "error",
                  title: "Error!",
                  text: "'. $message .'",
               });
            </script>';
   }
}

//DELETE
if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
 
    $query = "DELETE FROM `orders` WHERE id = '$delete_id'";
    $result = mysqli_query($conn, $query);
    echo '<script> window.location.href = "admin_orders.php"; </script>';
 }

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

   <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="body">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
   <?php include 'admin_head.php'; ?>
   <section class="main">
      <?php include 'admin_header.php'; ?>
      <div class="order--container">
        <h1 class="title">Placed Orders</h1>
        <div class="box-containerr">
        <?php
$select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');

if(mysqli_num_rows($select_orders) > 0) {
   while($fetch_orders = mysqli_fetch_assoc($select_orders)) {
      $orderId = $fetch_orders['id'];
      $userId = $fetch_orders['user_id'];
      $placedOn = $fetch_orders['placed_on'];
      $name = $fetch_orders['name'];
      $number = $fetch_orders['number'];
      $email = $fetch_orders['email'];
      $address = $fetch_orders['adress'];
      $totalProducts = $fetch_orders['total_products'];
      $totalPrice = $fetch_orders['total_price'];
      $paymentStatus = $fetch_orders['payement_status'];

      // Display the order information
      ?>
      <div class="boxx">
         <p> user id: <span><?php echo $userId; ?></span> </p>
         <p> placed on: <span><?php echo $placedOn; ?></span> </p>
         <p> name: <span><?php echo $name; ?></span> </p>
         <p> number: <span><?php echo $number; ?></span> </p>
         <p> email: <span><?php echo $email; ?></span> </p>
         <p> address: <span><?php echo $address; ?></span> </p>
         <p> total products: <span><?php echo $totalProducts; ?></span> </p>
         <p> total price: <span>$<?php echo $totalPrice; ?>/-</span> </p>
         <p> payment method: <span><?php echo $paymentStatus; ?></span> </p>

         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $orderId; ?>">
            <select name="update_payment">
                <option value="" selected disabled><?php echo $paymentStatus; ?></option>
                <option value="pending">pending</option>
                <option value="completed">completed</option>
            </select>
            <button type="submit" name="update_order" class="option-btn">Update</button>
            <a href="admin_orders.php?delete=<?php echo $orderId; ?>" onclick="confirmDelete(event)" class="delete-btn">Delete</a>
         </form>

<script>
   function confirmDelete(event) {
      event.preventDefault();

      Swal.fire({
         title: 'Delete Order',
         text: 'Are you sure you want to delete this order?',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Delete',
         cancelButtonText: 'Cancel',
         reverseButtons: false
      }).then((result) => {
         if (result.isConfirmed) {
            window.location.href = event.target.href;
         }
      });
   }
</script>

      </div>
      <?php
   }
} else {
   echo '<p class="empty">no orders placed yet!</p>';
}
?>

        </div>
      </div>
   </section>
</body>
</html>