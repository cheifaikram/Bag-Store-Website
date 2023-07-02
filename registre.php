<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Your PHP File</title>
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<?php
include 'Config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $message = 'User already exists!';
      $alertType = 'error';
   } else {
      if ($pass != $cpass) {
         $message = 'Wrong password. Please try again.';
         $alertType = 'error';
      } else {
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message = 'Got it nicely.';
         $alertType = 'success';
      }
   }

   echo '<script>';
   echo 'var message = "' . $message . '";';
   echo 'var alertType = "' . $alertType . '";';

   if ($alertType === 'success') {
      echo 'Swal.fire({
               icon: "success",
               title: "Success",
               text: message,
               customClass: {
               confirmButton: "custom-success-button"
               }
            }).then(function() {
               window.location.href = "index.html#log";
            });';
   } else {
      echo 'Swal.fire({
               icon: "error",
               title: "Error",
               text: message
            }).then(function() {
               setTimeout(function() {
                  window.location.href = "index.html";
               }, 1000);
            });';
   }

   echo '</script>';
   exit;
}
?>

</body>
</html>
