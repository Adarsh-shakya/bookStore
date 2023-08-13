let navbar = document.querySelector('.header .navbar');
let accountBox = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   accountBox.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   accountBox.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   accountBox.classList.remove('active');
}

document.querySelector('#close-update').onclick = () =>{
   document.querySelector('.edit-product-form').style.display = 'none';
   window.location.href = 'admin_products.php';
}



 
  const categoryDropdown = document.getElementById('categories');
  const categoryInputs = document.querySelector('.category-inputs');

  categoryDropdown.addEventListener('change', function() {
    const selectedCategory = this.value;
    const allInputs = document.querySelectorAll('.category-inputs input');

    // Hide all input fields
    allInputs.forEach(input => {
      input.style.display = 'none';
    });

    // Show the input field corresponding to the selected category
    if (selectedCategory) {
      const inputToShow = document.querySelector(`[name="${selectedCategory}-input"]`);
      if (inputToShow) {
        inputToShow.style.display = 'block';
      }
    }

    // Show/hide the category input container based on the selected option
    if (selectedCategory) {
      categoryInputs.style.display = 'block';
    } else {
      categoryInputs.style.display = 'none';
    }
  });
 


  function calculateDiscountPercent() {
    var price = parseFloat(document.getElementById("price").value);
    var priceDiscount = parseFloat(document.getElementById("price_discount").value);
  
    if (!isNaN(price) && !isNaN(priceDiscount)) {
      var discountPercent = ((price - priceDiscount) / price) * 100;
      document.getElementById("discount_percent").value = discountPercent.toFixed(2) + "%";
    }
  }