// Cart
let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart');
let closeCart = document.querySelector('#close-cart');

// Open Cart
cartIcon.onclick = () => {
    cart.classList.add('active');
};

// Close Cart
closeCart.onclick = () => {
    cart.classList.remove('active');
};
// Function to add event listeners
function ready() {
    // Remove Items From Cart
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
   }
   //Import bbdd products of the cart
   fetch(`php/get_cart.php`)
      .then(response => {
         if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
         }
         return response.json();
      })
      .then(data => {
         data.forEach(producto => {
            addProductToCart(producto.nombre, producto.precio, producto.imagen, producto.cantidad)
         })
      })
   .catch(error => console.error('Error:', error));

    // Quantity Changes
    var quantityInputs = document.getElementsByClassName('cart-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }
    // Add to Cart
    var addCart = document.getElementsByClassName('add-cart');
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener('click', addToCartClicked);
    }
    // Add to Wishlist
    var addWishlist = document.getElementsByClassName('add-wishlist');
    for (var i = 0; i < addWishlist.length; i++) {
        var button = addWishlist[i];
        button.addEventListener('click', addToWishlistClicked);
    }
    // Buy Button Work
    var buyButton = document.getElementsByClassName('btn-buy');
    if (buyButton.length > 0) {
        buyButton[0].addEventListener('click', buyButtonClicked);
    }
}

// Buy Button
function buyButtonClicked() {
    alert("Your Order is placed");
    var cartContent = document.getElementsByClassName('cart-content')[0];
    while (cartContent.hasChildNodes()) {
        cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
}

// Remove Items From Cart
function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateTotal();
}

// Quantity Changes
function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateTotal();
}

function addProductToCart(title, price, productImg, cantidad) {
    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add('cart-box');
    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");
   for (var i = 0; i < cartItemsNames.length; i++) {
                   console.log(cartItemsNames[i].innerText);

        if (cartItemsNames[i].innerText == title) {
            alert("You have already added this item to the cart");
            return;
        }
    }
    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img" />
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="${cantidad || 1}" class="cart-quantity" />
        </div>
        <!-- Remove Cart -->
        <i class="bx bxs-trash-alt cart-remove"></i>
    `;
    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click', removeCartItem);
    cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change', quantityChanged);
    updateTotal();
}

// Update Total
function updateTotal() {
    var cartContent = document.getElementsByClassName('cart-content')[0];
    var cartBoxes = cartContent.getElementsByClassName('cart-box');
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        var price = parseFloat(priceElement.innerText.replace("€", ""));
        var quantity = quantityElement.value;
        total = total + price * quantity;
    }
    // If price contains some cents value
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('total-price')[0].innerText = total + " €";
}

// Add to Wishlist
function addToWishlistClicked(event) {
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
    var price = shopProducts.getElementsByClassName('price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
   //  console.log('Wishlist:', title, price, productImg);
    addProductToWishlist(title, price, productImg);
}

function addProductToWishlist(title, price, productImg) {
    var wishlistBox = document.createElement("div");
    wishlistBox.classList.add('wishlist-box');
    var wishlistItems = document.getElementsByClassName("wishlist-content")[0];
    var wishlistItemsNames = wishlistItems.getElementsByClassName("wishlist-product-title");
    for (var i = 0; i < wishlistItemsNames.length; i++) {
        if (wishlistItemsNames[i].innerText == title) {
            alert("You have already added this item to the wishlist");
            return;
        }
    }
    var wishlistBoxContent = `
        <img src="${productImg}" alt="" class="wishlist-img" />
        <div class="detail-box">
            <div class="wishlist-product-title">${title}</div>
            <div class="wishlist-price">${price}</div>
        </div>
        <!-- Remove Wishlist -->
        <i class="bx bxs-trash-alt wishlist-remove"></i>
    `;
    wishlistBox.innerHTML = wishlistBoxContent;
    wishlistItems.append(wishlistBox);
    wishlistBox.getElementsByClassName('wishlist-remove')[0].addEventListener('click', removeWishlistItem);
}

// Remove Items From Wishlist
function removeWishlistItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
}

document.addEventListener('DOMContentLoaded', function() {
   ready();
});
