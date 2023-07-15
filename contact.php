<?php
include 'config.php';
session_start();

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
<html>
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
   <link rel="stylesheet" href="css/style.css">

   <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="body">
<?php include 'header.php'; ?>
   <h1>contact</h1>

</body>
</html>