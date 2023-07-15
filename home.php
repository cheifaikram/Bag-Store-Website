<?php
include 'config.php';
session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// }


if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
  
    echo "Welcome, User!";
  } elseif (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
  
    echo "Welcome, Admin!";
  } else {
    echo "Welcome, Anonymous User!";
    
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
<div class="main--container">
    <h1>HOMEEEEE</h1>
</div>
</body>
</html>