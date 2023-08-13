<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include('../config.php');

session_start();

if (isset($_POST['add_to_cart'])) {

   // Assuming you have a valid database connection ($conn)
   
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_price_discount = $_POST['product_price_discount'];
   $product_discount_percent = $_POST['product_discount_percent'];
   $product_image = $_POST['product_image'];
   $product_Link = $_POST['product_Link'];
 
   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' ") or die('Query failed: ' . mysqli_error($conn));
 
   if (mysqli_num_rows($check_cart_numbers) > 0) {
      $message[] = 'Product already added to cart!';
   } else {
      $insert_query = "INSERT INTO `cart` (name, price, price_discount, discount_percent, image, product_Link) VALUES ('$product_name', '$product_price', '$product_price_discount', '$product_discount_percent', '$product_image', '$product_Link')";
      
      $result = mysqli_query($conn, $insert_query);
      
      if ($result) {
          $message[] = 'Product added to cart!';
      } else {
          $message[] = 'Error adding product to cart: ' . mysqli_error($conn);
      }
   } 
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Books</title>
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="../css/product.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php include('../header.php'); ?>

<section class="home">

   <div class="content">
      <h3>NEW ARRIVAL BOOKS</h3>
      <p> </p>
      <a href="about.php" class="white-btn">discover more</a>
   </div>

</section>
    
<!-- show products  -->
<section class="show-products">
   <div class="box-container">
   <?php 
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE categories = '2_mbbs' ") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     
     <form action="" method="post" class="box">
      <img class="image" src="../uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">$<?php echo $fetch_products['price']; ?></div>
       
      <div class="price_discount">$<?php echo $fetch_products['price_discount']; ?>/-</div>
      <div class="discount_percent">-<?php echo $fetch_products['discount_percent']; ?>%</div>
      <!-- <a href="<?php echo $fetch_products['product_Link']; ?>" class="buy-btn">Buy Now</a>
           -->
      <!-- <input type="number" min="1" name="product_quantity" value="1" class="qty"> -->
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_price_discount" value="<?php echo $fetch_products['price_discount']; ?>">
      <input type="hidden" name="product_discount_percent" value="<?php echo $fetch_products['discount_percent']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <input type="hidden" name="product_Link" value="<?php echo $fetch_products['product_Link']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>
</section>

<?php include '../footer.php'; ?>

<!-- custom admin js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
</body>
</html>