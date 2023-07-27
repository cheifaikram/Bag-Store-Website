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

if (isset($_POST['send'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $number = $_POST['number'];
  $msg = mysqli_real_escape_string($conn, $_POST['message']);

  $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

  if (mysqli_num_rows($select_message) > 0) {
    $message[] = 'message sent already!';
    $alertType = 'error';
  } else {
    if (mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')")) {
      
      $message[] = 'message sent successfully!';
      $alertType = 'success';
    } else {
      $message[] = 'Failed to send the message. Please try again later.';
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

  <?php include 'header.php'; ?>
  <section class="about-section">
    <div class="about-container">
      <h1 class="history-title">Contact <span>Us</span> Now</h1>
      <p class="about-desc">"Discover the Epitome of Luxury and Fashion with Our Exquisite Bag 
        Collection. Reach Out to Our Stylists for Expert Guidance and Unrivaled Customer Service. 
        Elevate Your Fashion Game Today and Make a Bold Statement with a Bag that Reflects 
        Your Distinctive Style." </p>
    </div>
  </section>

  <section class="contact">
   <form action="" method="post">
      <h3>Leave Us A Message!</h3>
      <input type="text" name="name" required placeholder="enter your name" class="contact-box">
      <input type="email" name="email" required placeholder="enter your email" class="contact-box">
      <input type="number" name="number" required placeholder="enter your number" class="contact-box">
      <textarea name="message" class="contact-box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
   </form>
  </section>


  <?php if (isset($message) && isset($alertType)) : ?>
    <script>
      Swal.fire({
        icon: '<?php echo $alertType; ?>',
        title: '<?php echo ($alertType === "success") ? "Success" : "Error"; ?>',
        text: '<?php echo $message[0]; ?>',
      });
    </script>
  <?php endif; ?>

  <?php include 'footer.php'; ?>
  <script src="js/user_script.js"></script>
</body>
</html>
