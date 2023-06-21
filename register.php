<?php
include 'Config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
        $message = 'Wrong password. Please try again.';
        $alertType = 'error';
    }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message = 'got it nicely.';
         $alertType = 'success';
      }
   }     

   echo '<script>';
    echo 'var message = "' . $message . '";';
    echo 'var alertType = "' . $alertType . '";';
    echo 'alert(message);';
    echo 'console.log(alertType);';
    if ($alertType === 'success') {
      echo 'window.location.href = "reg-log.html#log";';
  } else {
   echo 'setTimeout(function() { window.location.href = "reg-log.html"; }, 100);';
  }
   echo '</script>';
   exit; 

   
}


?>