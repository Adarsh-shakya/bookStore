<?php

include 'config.php';

session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:login.php');
// }


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
  
  // Handle the $message array as needed, e.g., display messages to the user
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="css/product.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
   .image-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 20px;
  margin-top: 50px;
}

.image-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
}

img {
  width: 100%;
  height: 350px;
  border: 2px solid #333;
}
.img1 {
  width: 100%;
  height: 250px;
   
}

h3 {
   margin-top: -1cm;
   height:1cm;
   width: 100%;
   display: flex;
  justify-content: center;
  align-items: center;
  bottom: 0;
  left: 50%;
  font-size: 24px;
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.image-item:hover h3 {
  background-color: #17B169;
}

@media (max-width: 768px) {
 
  /* .header-1 {
    display: none;
  }

  .header-1-menu {
    display: none;
  }

  .show-header-1-menu {
    display: flex;
  } */

  .image-container {
    flex-wrap: wrap;

  }

  .image-item {
    width: 48%; /* Show two images per row on smaller screens */
    justify-content: space-between;
  }
  img {
  width: 260px;
  height: 350px;
  border: 2px solid #333;
  }
  .products .box-container .box {
    width: calc(33.3% - 1.5rem);

}

.top_product .box-container1 {
  
  grid-auto-columns: calc(33.3% - 1rem);
   
}

.header .header-1{
  display:none;
}
.img1 img {
    width: 100%;
}
}

@media screen and (max-width: 480px) {
  .image-container {
  flex-wrap: wrap;
  width: calc(50% - -22.5rem);
  gap: 2px;
  align-items: center;
}


img {
  width: 168px;
  height: 250px;
  border: 2px solid #333;
}
.img1 img {
    width: 100%;
}

element {

}
.products .box-container .box {
    width: calc(50% - 1.5rem);

}
.top_product .box-container1 {
  
  grid-auto-columns: calc(50% - 1rem);
   
}
.about .flex .image img {
  display:none;
}
.about .flex .content{
  display:none;
}

.header .header-1{
  display:none;
}

}
@media screen and (max-width: 360px){
  img {
  width: 165px;
  height: 225px;
  border: 2px solid #333;
}

.img1 img {
    width: 100%;
}
}
@media screen and (max-width: 545px){
  .image-container {
  flex-wrap: wrap;
  width: calc(50% - -22.5rem);
  gap: 2px;
  align-items: center;
}
}


</style>

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">

   <div class="content">
      <h3>Hand Picked Book to your door.</h3>
       
       
   </div>

</section>

<section>
<h1 class="title">FEATURED CATEGORIES</h1>

<div class="image-container">
    <div class="image-item" onclick="navigateToPage('deal.php')">
      <img src="img/new.jpg" alt="Image 1">
      <h3>Deals 2023</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('cambridge.php')">
      <img src="img/cambridge.jpg" alt="Image 2">
      <h3>Cambridge</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('medical.php')">
      <img src="img/medical.jpg" alt="Image 3">
      <h3><div class="img">Medical</div></h3>
    </div>
    <div class="image-item" onclick="navigateToPage('science.php')">
      <img src="img/science.jpg" alt="Image 4">
      <h3>Science</h3>
    </div>
  </div>

   <!-- New row of images -->
   <div class="image-container">
    <div class="image-item" onclick="navigateToPage('nursing.php')">
      <img src="img/nursing.jpg" alt="Image 5">
      <h3>Nursing</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('mbbs.php')">
      <img src="img/mbbs.jpg" alt="Image 6">
      <h3>MBBS</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('urdu.php')">
      <img src="img/urdu.jpg" alt="Image 7">
      <h3>Urdu</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('accn.php')">
      <img src="img/ACCN.jpg" alt="Image 8">
      <h3>ACCN</h3>
    </div>
  </div>

   <!-- New row of images -->
   <div class="image-container">
    <div class="image-item" onclick="navigateToPage('novel.php')">
      <img src="img/novel.jpg" alt="Image 5">
      <h3>Novel</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('it.php')">
      <img src="img/IT.jpg" alt="Image 6">
      <h3>IT Books</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('kids.php')">
      <img src="img/kids.jpg" alt="Image 7">
      <h3>Kids Book</h3>
    </div>
    <div class="image-item" onclick="navigateToPage('box.php')">
      <img src="img/box.jpg" alt="Image 8">
      <h3>Boc Pack</h3>
    </div>
  </div>


</section>

<section class="products">

   <h1 class="title">New Arrival</h1>

   <div class="box-container">
    <?php 
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 10") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
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

   <div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="shop.php" class="option-btn">View more</a>
   </div>
 
</section>

<section class=img1>
     
      <img src="img/top_sell.png" alt="Image 1">

    </div>
</section>

<section class="top_product">
<h1 class="title1">TOP SELLING</h1>

<div class="box-container1">
    <?php 
         $select_products = mysqli_query($conn, "SELECT * FROM `products`  ") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     
     <form action="" method="post" class="box">
      <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
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

    
    
</div>

</section>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
      <a href="contact.php" class="white-btn">contact us</a>
   </div>

</section>
 
<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script  >
   function navigateToPage(pageUrl) {
  window.location.href = pageUrl;
}

  
// JavaScript to toggle the header one menu bar
const menuBtn = document.getElementById("menu-btn");
const header1Menu = document.querySelector(".header-1-menu");

// Function to toggle the menu
function toggleMenu() {
  header1Menu.classList.toggle("show-header-1-menu");
}

// Event listener for clicks on the menuBtn
menuBtn.addEventListener("click", toggleMenu);

let barsEl = document.querySelector('.bars');
let iconBarsEl = document.querySelector('.icon-bars');

barsEl.addEventListener('click', () => {
   iconBarsEl.classList.toggle('show');
});


// document.addEventListener('DOMContentLoaded', function() {
//    const dropbtn1 = document.querySelector('.dropbtn1');
//    const dropdownContent1 = document.querySelector('.dropdown-content1');
   
//    dropbtn1.addEventListener('click', function() {
//       dropdownContent1.classList.toggle('show');
//    });
// });




</script>

<!-- Add this line in the <head> section of your HTML -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script src="js/script.js"></script>

</body>
</html>