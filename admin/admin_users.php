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
      <div class="user--container">
        <h1 class="title"> user accounts </h1>
      </div>
    

   </section>



</body>
</html>