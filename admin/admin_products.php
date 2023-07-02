<?php
include '../config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

//ADD A PRODUCT 

if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;
 
    $select_product_query = "SELECT name FROM products WHERE name = '$name'";
    $result_product = mysqli_query($conn, $select_product_query);
 
    if (mysqli_num_rows($result_product) > 0) {
       echo "<script>
                Swal.fire({
                   icon: 'error',
                   title: 'Product Name Error',
                   text: 'Product name already added',
                });
             </script>";
    } else {
       $insert_product_query = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
       $result_insert = mysqli_query($conn, $insert_product_query);
 
       if ($result_insert) {
          if ($image_size > 2000000) {
             echo "<script>
                      Swal.fire({
                         icon: 'error',
                         title: 'Image Size Error',
                         text: 'Image size is too large',
                      });
                   </script>";
          } else {
             move_uploaded_file($image_tmp_name, $image_folder);
             echo "<script>
                      Swal.fire({
                         icon: 'success',
                         title: 'Product Added',
                         text: 'Product added successfully!',
                      });
                   </script>";
          }
       } else {
          echo "<script>
                   Swal.fire({
                      icon: 'error',
                      title: 'Product Error',
                      text: 'Product could not be added!',
                   });
                </script>";
       }
    }
 }
 
 // DELETE A PRODUCT 
 if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   $image_path = 'uploaded_img/' . $fetch_delete_image['image'];

   if (file_exists($image_path)) {
      unlink($image_path);
   }
   
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   
   header('location:admin_products.php');
}

// UPDATE A PRODUCT
if (isset($_POST['update_product'])) {
   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   // Update name and price in the database
   $update_query = mysqli_prepare($conn, "UPDATE `products` SET name = ?, price = ? WHERE id = ?");
   mysqli_stmt_bind_param($update_query, 'sdi', $update_name, $update_price, $update_p_id);
   mysqli_stmt_execute($update_query);

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if (!empty($update_image)) {
      if ($update_image_size > 2000000) {
         $message = 'Image file size is too large.';
         $alertType = 'error';
      } else {
         // Update image in the database
         $update_image_query = mysqli_prepare($conn, "UPDATE `products` SET image = ? WHERE id = ?");
         mysqli_stmt_bind_param($update_image_query, 'si', $update_image, $update_p_id);
         mysqli_stmt_execute($update_image_query);

         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);

         $message = 'Product updated successfully.';
         $alertType = 'success';
      }
   } else {
      $message = 'Product updated successfully.';
      $alertType = 'success';
   }

   echo '<script>';
   echo 'var message = "' . $message . '";';
   echo 'var alertType = "' . $alertType . '";';

   if ($alertType === 'success') {
      echo 'Swal.fire({
               icon: "success",
               title: "Success",
               text: message
            }).then(function() {
               window.location.href = "admin_products.php";
            });';
   } else {
      echo 'Swal.fire({
               icon: "error",
               title: "Error",
               text: message
            });';
   }

   echo '</script>';
   exit;
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
      <div class="main--container">
         <div class="shop--container">
            <section class="add-products">
               <h1 class="title">Shop Products</h1>
               <form action="" method="post" enctype="multipart/form-data">
                  <h3>Add Product</h3>
                  <div>
                     <label for="name">Product Name:</label>
                     <input type="text" name="name" id="name" class="box" placeholder="Enter product name" required>
                  </div>
                  <div>
                     <label for="price">Product Price:</label>
                     <input type="number" min="0" name="price" id="price" class="box" placeholder="Enter product price" required>
                  </div>
                  <div>
                     <label for="image">Product Image:</label>
                     <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
                  </div>
                  <div>
                     <input type="submit" value="Add Product" name="add_product" class="btn">
                  </div>
               </form>
            </section>

            <section class="show-products">
               <div class="box-container">
                  <?php $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                  if(mysqli_num_rows($select_products) > 0){
                     while($fetch_products = mysqli_fetch_assoc($select_products)){
                        $image_path = "uploaded_img/" . $fetch_products['image'];
                        $product_name = $fetch_products['name'];
                        $product_price = $fetch_products['price'];
                        $product_id = $fetch_products['id']; ?>
                        <div class="box">
                           <img src="<?php echo $image_path; ?>" alt="">
                           <div class="name"><?php echo $product_name; ?></div>
                           <div class="price">$<?php echo $product_price; ?>/-</div>
                           <a href="admin_products.php?update=<?php echo $product_id; ?>" class="option-btn">update</a>
                           <a href="#" class="delete-btn" data-product-id="<?php echo $product_id; ?>">delete</a>
                        </div>

                        <script>
                           document.querySelectorAll('.delete-btn').forEach(function(btn) {
                           btn.addEventListener('click', function(e) {
                              e.preventDefault();
                              var productId = this.getAttribute('data-product-id');
                              confirmDelete(productId);
                           });});

                           function confirmDelete(productId) {
                           Swal.fire({
                              title: 'Delete Product',
                              text: 'Are you sure you want to delete this product?',
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonText: 'Yes, delete it!',
                              cancelButtonText: 'Cancel',
                           }).then(function(result) {
                              if (result.isConfirmed) {
                                 window.location.href = 'admin_products.php?delete=' + productId;
                              }
                           });}
                        </script>
                        <script>
                          document.querySelectorAll('.delete-btn').forEach(function(btn) {
                           btn.addEventListener('click', function(e) {
                              e.preventDefault();
                              var productId = this.getAttribute('data-product-id');
                              confirmDelete(productId);
                           });});
                           function confirmDelete(productId) {
                              Swal.fire({
                                 title: 'Delete Product',
                                 text: 'Are you sure you want to delete this product?',
                                 icon: 'warning',
                                 showCancelButton: true,
                                 confirmButtonText: 'Yes, delete it!',
                                 cancelButtonText: 'Cancel',
                              }).then(function(result) {
                                 if (result.isConfirmed) {
                                    window.location.href = 'admin_products.php?delete=' + productId;
                                 }
                              });
                           }
                        </script>
                        <?php
                        }
                     } else {
                        echo '<p class="empty">no products added yet!</p>';
                     }
                     ?>
               </div>
            </section>
         </div>
      </div>
   </section>
   
   <script src="../js/admin_script.js"></script> 
</body>
</html>