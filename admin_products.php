<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $price_discount = $_POST['price_discount'];
   $discount_percent = $_POST['discount_percent'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   // Get the selected product category from $_POST['category']
   $category = $_POST['category'];

   // Use the selected category to fetch the corresponding details from $_POST
   $details = '';
   if ($category === 'electronics') {
      $details = mysqli_real_escape_string($conn, $_POST['electronics_details']);
   } elseif ($category === 'clothing') {
      $details = mysqli_real_escape_string($conn, $_POST['clothing_details']);
   } elseif ($category === 'beauty') {
      $details = mysqli_real_escape_string($conn, $_POST['beauty_details']);
   } elseif ($category === 'home') {
      $details = mysqli_real_escape_string($conn, $_POST['home_details']);
   }

   $product_Link = mysqli_real_escape_string($conn, $_POST['product_Link']);
    
 


   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products` (name, price, price_discount, discount_percent, image, categories, product_Link, details) 
      VALUES ('$name', '$price', '$price_discount', '$discount_percent', '$image', '$category', '$product_Link', '$details')") 
or die(mysqli_error($conn)); // Display the error message if the query fails

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }else{
         $message[] = 'product could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];
   

   mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

   <style>
 /* Additional styles for the product link field */
label[for="productLink"] {
  display: block;
  margin-bottom: 5px;
}

input[type="url"] {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}








   </style>

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title">shop products</h1>

   <form action="" method="post" enctype="multipart/form-data">
  <h3>New Arrival</h3>
  <input type="text" name="name" class="box" placeholder="enter product name" required>
  <input type="number" step="0.01" min="0" name="price" id="price" class="box" placeholder="enter product price without discount" required oninput="calculateDiscountPercent()">
   <input type="number" step="0.01" min="0" name="price_discount" id="price_discount" class="box" placeholder="enter product price with discount" required oninput="calculateDiscountPercent()">

<input type="text" min="0" name="discount_percent" id="discount_percent" class="box" placeholder="enter product discount percent" required readonly>
  <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>

  <div class="dropdown-container">
   <label for="categories">Select product categories:</label>
   <select name="category" id="categories" class="box" required>
      <option value="">Select a category</option>
      <option value="deals">Deals 2023</option>
      <option value="cambridge">Cambridge Books</option>
      <option value="medical">Medical Books</option>
      <option value="science">Science Books</option>
      <option value="anatomy">Anatomy Book</option>
      <option value="behaviour_science">behavior Science Books</option>
      <option value="cell_biology">Cell_Biology Books</option>
      <option value="embryology">Embryology Books</option>
      <option value="mcat">MCAT Books</option>
      <option value="medical_jurisprudence">Medical Jurisprudence Books</option>
      <option value="microbiology">Microbiology Books</option>
      <option value="pathology">Pathology Books</option>
      <option value="physiology">Physiology Books</option>

      <option value="Nursing">Nursing Books</option>

      <option value="mbbs">MBBS Book</option>
      <option value="1_mbbs">Part-1 MBBS Books</option>
      <option value="2_mbbs">Part-2 MBBS Books</option>
      <option value="3_mbbs">Part-3 MBBS Books</option>
      <option value="final_year_mbbs">Final Year Books</option>

      <option value="urdu">Urdu Books</option>
      <option value="urdu_adab">Urdu ADAB Books</option>
      <option value="urdu_asanay">Urdu Asanay Books</option>
      <option value="urdu_history">Urdu History Books</option>
      <option value="urdu_novel">Urdu Novel Books</option>
      
      <option value="accn">ACCN Books</option>
      <option value="novel">Novel Books</option>
      <option value="it">IT Books</option>
      <option value="kids">Kids Books</option>
      <option value="box">Box Books</option>
      
      
      
      <option value="anesthesiology">Anesthesiology Books</option>
      <option value="cardiology">Cardiology  Books</option>
      <option value="family_medicine">Family_Medicine Books</option>
      <option value="medical_book_collection">Medical Book Collection </option>
      <option value="kids_home_learning_books">Kids Home Learning Books</option>
      <option value="popup_children_books">Popup Children Books</option>
      <option value="3-6 year">3-6 Year Toddler kids Books</option>
      <option value="6-9_year">6-9 Pre-school kids Books</option>
      <option value="9-12_years">9-12 Years Children Books</option>
      <option value="educational_children">Educational Children Books</option>
       
   </select>
</div>

<!-- <div class="category-inputs">
   <div class="deals-category category">
      <input type="text" name="deals_details" class="box" placeholder="Enter Deals 2023 details">
   </div>
   <div class="cambridge-category category">
      <input type="text" name="cambridge_details" class="box" placeholder="Enter Cambridge books details">
   </div>
   <div class="medical-category category">
      <input type="text" name="medical_details" class="box" placeholder="Enter  medical books details">
   </div>
   <div class="science-category category">
      <input type="text" name="science_details" class="box" placeholder="Enter science details">
   </div>

   <div class="nursing-category category">
      <input type="text" name="deals_details" class="box" placeholder="Enter Deals 2023 details">
   </div>
   <div class="mbbs-category category">
      <input type="text" name="cambridge_details" class="box" placeholder="Enter Cambridge books details">
   </div>
   <div class="urdu-category category">
      <input type="text" name="medical_details" class="box" placeholder="Enter  medical books details">
   </div>
   <div class="accn-category category">
      <input type="text" name="science_details" class="box" placeholder="Enter science details">
   </div>
</div> -->


  <label for="productLink">Product link:</label>
  <input type="url" name="product_Link" id="productLink" class="box" placeholder="Enter product link">


  <input type="submit" value="add product" name="add_product" class="btn">
</form>



</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
         <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>

<script>
   function calculateDiscountPercent() {
  var price = parseFloat(document.getElementById("price").value);
  var priceDiscount = parseFloat(document.getElementById("price_discount").value);

  if (!isNaN(price) && !isNaN(priceDiscount)) {
    var discountPercent = ((price - priceDiscount) / price) * 100;
    document.getElementById("discount_percent").value = discountPercent.toFixed(2) ;
  }
}
   </script>





<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>