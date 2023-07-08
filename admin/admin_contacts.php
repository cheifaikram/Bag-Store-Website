<?php

include '../config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if(isset($_POST['delete_message'])) {
   $delete_id = $_POST['message_id'];
   $result = mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   // echo '<script> window.location.href = "admin_contacts.php"; </script>';
   if($result) {
      $message = 'Message has been deleted!';
      echo '<script>
               Swal.fire({
                  icon: "success",
                  title: "Success!",
                  text: "'. $message .'",
               }).then((result) => {
                  if (result.isConfirmed) {
                     window.location.href = "admin_contacts.php";
                  }
               });
            </script>';
   } else {
      $message = 'Failed to delete message.';
      echo '<script>
               Swal.fire({
                  icon: "error",
                  title: "Error!",
                  text: "'. $message .'",
               }).then((result) => {
                  if (result.isConfirmed) {
                     window.location.href = "admin_contacts.php";
                  }
               });
            </script>';
   }
}

//delete
// if(isset($_GET['delete'])){
//     $delete_id = $_GET['delete'];
//     $query = "DELETE FROM `message` WHERE id = '$delete_id'";
//     $result = mysqli_query($conn, $query);
 

 

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
      <div class="msg--container">
        <h1 class="title"> Messages </h1>
        <div class="box-container-msg"><?php
        $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
        if(mysqli_num_rows($select_message) > 0){
           while($fetch_message = mysqli_fetch_assoc($select_message)){
              $messageId = $fetch_message['id'];
              $userId = $fetch_message['user_id'];
              $name = $fetch_message['name'];
              $number = $fetch_message['number'];
              $email = $fetch_message['email'];
              $message = $fetch_message['message'];
              ?>
              <div class="box-msg">
                <p> User id : <span><?php echo $userId; ?></span> </p>
                <p> Name : <span><?php echo $name; ?></span> </p>
                <p> Number : <span><?php echo $number; ?></span> </p>
                <p> Email : <span><?php echo $email; ?></span> </p>
                <p> Message : <span><?php echo $message; ?></span> </p>
                <form action="" method="post">
                    <input type="hidden" name="message_id" value="<?php echo $messageId; ?>">
                    <div class="center-btn">
                        <button type="submit" name="delete_message" class="delete-btn">Delete Message</button>
                    </div>
                </form>
             </div>
   <?php
         };
      }else{
         echo '<p class="empty">you have no messages!</p>';
      }
   ?>
</div>



      </div>
   </section>
</body>
</html>