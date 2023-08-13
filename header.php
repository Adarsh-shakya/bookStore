<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <div class="header-2">
      <div class="flex">
      <div class="dropdown1" id="myDropdown">
  <button class="dropbtn1" onclick="toggleDropdown()">
    <i class="fa fa-bars"></i> <!-- Icon for the menu -->
  </button>
  <div class="dropdown-content1">
      <a href="new_arrival.php">
         <div class="btn1">
            <button class="dropbtn">NEW ARRIVAL
         </button> 
         </div>
      </a>
      <div class="btn2">
            <button class="dropbtn">SCIENCE
               <i class="fa fa-caret-down"></i>
            </button>
         <div class="dropdown-content">
            <!-- Your menu items -->
            <a href='Science/anatomy.php'>Anatomy</a>
            <a href="Science/behavior_science.php">Behaviour Science</a>
            <a href="Science/cell_biology.php">Cell Biology & Histology</a>
            <a href="Science/embryology.php">Embryology</a>
            <a href="Science/medical_jurisprudence.php">Medical Jurisprudence<br>Toxicology & Forensic Medicine</a>
            <a href="Science/microbiology.php">Microbiology & Immunology</a>
            <a href="Science/pathology.php">Pathology</a>
            <a href="Science/physiology.php">Physiology</a>
            <a href="Science/mcat.php">MCAT</a>
         </div>
      </div>

      <div class="btn3">
            <button class="dropbtn">CLINICAL SCIENCE
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="Clinical_Science/anesthesiology.php">Anesthesiology</a>
               <a href="Clinical_Science/cardiology.php">Cardiology</a>
               <a href="Clinical_Science/family_medicine.php">Family Medicine</a>
               <a href="Clinical_Science/medical_book_collection.php">Medical Book Collection</a>
            </div>
      </div>
      <a href="novel.php">
            <div class="btn4">
            <button class="dropbtn">NOVEL
            </button>
             </div>
         </a>

         <div class="btn5">
            <button class="dropbtn">CHILDREN BOOKs
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="Children/kids_home_learning_books.php">Kids Home Learning Books</a>
               <a href="Children/popup_children_books.php">Popup Children Books</a>
               <a href="Children/3-6_Years.php">3-6 Years Toddlers KIds Books</a>
               <a href="Children/6-9_pre-school.php">6-9 Pre-School Kids Books</a>
               <a href="Children/9-12_years.php">9-6 Years Children Books</a>
               <a href="Children/educational_children_books.php">Educational Children Books</a>
            </div>
         </div>
            
         <div class="btn6">
            <button class="dropbtn">URDU COLLECTION 
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="Urdu/urdu_novel.php">Urdu Novel</a>
               <a href="Urdu/urdu_afsanay.php">Urdu Afsanay</a>
               <a href="Urdu/urdu_adab.php">Urdu Adab</a>
               <a href="Urdu/urdu_history.php">Urdu History</a>
            </div>
         </div>

         <div class="btn7">
            <a href="cambridge.php"> 
               <div class="btn1">
               <button class="dropbtn">CAMBRIDGE
           </button>
         </a>
         </div>
         </div>

         <div class="btn8">
            <a href="it.php">
               <div class="btn1"> 
               <button class="dropbtn">IT PROGRAMMING
           </button>
         </a>
         </div>
         </div>

         <div class="btn9">
            <button class="dropbtn">MBBS
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="MBBS/1_mbbs.php">PART-1-M.B.B.S</a>
               <a href="MBBS/2_mbbs.php">PART-2-M.B.B.S</a>
               <a href="MBBS/3_mmbs.php">PART-3-M.B.B.S</a>
               <a href="MBBS/final_year_mmbs.php">FINAL YEAR</a>
            </div>
         </div>
  </div>
</div>
   
         <div class=logo>
         <a href="home.php" class="logo">Bookly.</a>
         </div>
         

         <!-- <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="orders.php">orders</a>
         </nav> -->

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <!-- <div id="user-btn" class="fas fa-user"></div> -->
            
         </div>

         <!-- <div class="user-box">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div> -->
      </div>
   </div>

   <div class="header-1">
      <!-- <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> new <a href="login.php">login</a> | <a href="register.php">register</a> </p>
      </div>  -->

      <div class="flex">
         <a href="new_arrival.php">
         <div class="btn1">
            <button class="dropbtn">NEW ARRIVAL
               <!-- <i class="fa fa-caret-down"></i> -->
               
            </button>
            
         </div>
         </a>

         <div class="btn2">
            <button class="dropbtn">SCIENCE
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href='Science/anatomy.php'>Anatomy</a>
               <a href=" Science/behavior_science.php">Behaviour Science</a>
               <a href="Science/cell_biology.php">Cell Biology & Histology</a>
               <a href="Science/embryology.php">Embryology</a>
               <a href="Science/medical_jurisprudence.php">Medical Jurisprudence<br>Toxicology & Forensic Medicine</a>
               <a href="Science/microbiology.php">Microbiology & Immunology</a>
               <a href="Science/pathology.php">Pathology</a>
               <a href="Science/physiology.php">Physiology</a>
               <a href="Science/mcat.php">MCAT</a>
            </div>
         </div>

         <div class="btn3">
            <button class="dropbtn">CLINICAL SCIENCE
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="Clinical_Science/anesthesiology.php">Anesthesiology</a>
               <a href="Clinical_Science/cardiology.php">Cardiology</a>
               <a href="Clinical_Science/family_medicine.php">Family Medicine</a>
               <a href="Clinical_Science/medical_book_collection.php">Medical Book Collection</a>
            </div>
         </div>
            
         <a href="novel.php">
            <div class="btn1">
            <button class="dropbtn">NOVEL
            </button>
             </div>
         </a>

         <div class="btn5">
            <button class="dropbtn">CHILDREN BOOKs
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="Children/kids_home_learning_books.php">Kids Home Learning Books</a>
               <a href="Children/popup_children_books.php">Popup Children Books</a>
               <a href="Children/3-6_Years.php">3-6 Years Toddlers KIds Books</a>
               <a href="Children/6-9_pre-school.php">6-9 Pre-School Kids Books</a>
               <a href="Children/9-12_years.php">9-6 Years Children Books</a>
               <a href="Children/educational_children_books.php">Educational Children Books</a>
            </div>
         </div>
            
         <div class="btn6">
            <button class="dropbtn">URDU COLLECTION 
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="Urdu/urdu_novel.php">Urdu Novel</a>
               <a href="Urdu/urdu_afsanay.php">Urdu Afsanay</a>
               <a href="Urdu/urdu_adab.php">Urdu Adab</a>
               <a href="Urdu/urdu_history.php">Urdu History</a>
            </div>
         </div>

         <div class="btn6">
            <a href="cambridge.php"> 
               <div class="btn1">
               <button class="dropbtn">CAMBRIDGE
           </button>
         </a>
         </div>
         </div>

         <div class="btn6">
            <a href="it.php">
               <div class="btn1"> 
               <button class="dropbtn">IT PROGRAMMING
           </button>
         </a>
         </div>
         </div>

         <div class="btn6">
            <button class="dropbtn">MBBS
               <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
               <a href="MBBS/1_mbbs.php">PART-1-M.B.B.S</a>
               <a href="MBBS/2_mbbs.php">PART-2-M.B.B.S</a>
               <a href="MBBS/3_mmbs.php">PART-3-M.B.B.S</a>
               <a href="MBBS/final_year_mmbs.php">FINAL YEAR</a>
            </div>
         </div>
        
          
      </div>
   </div>


</header>