<?php

include '../config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

//DELETE
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
    echo '<script> window.location.href = "admin_users.php"; </script>';
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
      <div class="user--container">
        <h1 class="title"> User Accounts </h1>
        <div class="box-container-user">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box-user">
        <p> User ID: <span><?php echo $fetch_users['id']; ?></span> </p>
        <p> Username: <span><?php echo $fetch_users['name']; ?></span> </p>
        <p> Email: <span><?php echo $fetch_users['email']; ?></span> </p>
        <p> User Type: <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'red'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
        <button onclick="confirmDeleteUser(<?php echo $fetch_users['id']; ?>)" class="delete-btn">delete user</button>
      </div>

      <?php
         };
      ?>
    </div>
   </div>
 </section>

</body>
</html>