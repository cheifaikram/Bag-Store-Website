<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>produits</h1>
<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
 
    $select_product_query = "SELECT name FROM products WHERE name = '$name'";
    $result_product = mysqli_query($conn, $select_product_query);
 
    if (mysqli_num_rows($result_product) > 0) {
       $message[] = 'Product name already added';
    } else {
       $insert_product_query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
       $result_insert = mysqli_query($conn, $insert_product_query);
 
       if ($result_insert) {
          if ($image_size > 2000000) {
             $message[] = 'Image size is too large';
          } else {
             move_uploaded_file($image_tmp_name, $image_folder);
             $message[] = 'Product added successfully!';
          }
       } else {
          $message[] = 'Product could not be added!';
       }
    }
 }

 
?>
</body>
</html>