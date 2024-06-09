// Cart
let cartIcon = document.querySelector('#cart-icon');
let cart = document.querySelector('.cart');
let closeCart = document.querySelector('#close-cart');

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
   
    // Import bbdd products of the cart
    fetch(`php/get_cart.php`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            data.forEach(producto => {
                addProductToCart(producto.nombre, producto.precio, producto.imagen, producto.cantidad, producto.id_producto, producto.talla)
            });
            // Attach change event listeners after products are added to the cart
            attachQuantityChangeListeners();
        })
        .catch(error => console.error('Error:', error));

    // Add to Cart
    var addCart = document.getElementsByClassName('add-cart');
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener('click', addToCartClicked);
    }

    // Buy Button Work
    var buyButton = document.getElementsByClassName('btn-buy');
    if (buyButton.length > 0) {
        buyButton[0].addEventListener('click', buyButtonClicked);
    }
}

// Attach change event listeners to quantity inputs
function attachQuantityChangeListeners() {
    var quantityInputs = document.getElementsByClassName('cart-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }
}

// Buy Button
function buyButtonClicked() {
    var cartContent = document.getElementsByClassName('cart-content')[0];
    if (cartContent.children.length === 0) {
        alert('El carrito está vacío. Por favor, añada productos al carrito antes de proceder al pago.');
        return;
    }

    fetch('php/check_address.php')
    .then(response => response.json())
        .then(data => {
        if (data.address_filled == true) {
            window.location.href = 'pagos.php';
        } else {
            // Show popup
            var popup = document.getElementById('address-popup');
            popup.style.display = 'block';

            document.getElementById('popup-cancel').onclick = function() {
                popup.style.display = 'none';
            };

            document.getElementById('popup-accept').onclick = function() {
                window.location.href = 'perfil_usuario.php';
            };
        }
    })
        .catch(error => console.error('Error:', error));
}

// Remove Items From Cart
function removeCartItem(event) {
    var buttonClicked = event.target;
    var cartBox = buttonClicked.parentElement;
    var id_producto = cartBox.querySelector('.cart-product-title').getAttribute('data-id-producto');
    var id_cliente = document.getElementById('customer-info').getAttribute('data-id-cliente');

    // Send AJAX request to delete the item from the database
    fetch('php/delete_cart_item.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_cliente=${id_cliente}&id_producto=${id_producto}`
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'success') { // Assuming your backend returns 'success' on successful deletion
            cartBox.remove(); // Remove item from the cart UI
            updateTotal(); // Update the total price
        } else {
            alert('Error removing item from cart');
        }
    })
    .catch(error => console.error('Error:', error));
}

// Quantity Changes
function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateTotal();

    // Get the product ID and customer ID
    var cartBox = input.parentElement.parentElement;
    var id_producto = cartBox.querySelector('.cart-product-title').getAttribute('data-id-producto');
    var id_cliente = document.getElementById('customer-info').getAttribute('data-id-cliente');
    var cantidad = input.value;

    // Send AJAX request to update the quantity in the database
    fetch('php/update_cart_quantity.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `id_cliente=${id_cliente}&id_producto=${id_producto}&cantidad=${cantidad}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}

function addProductToCart(title, price, productImg, cantidad, id_producto, talla) {
    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add('cart-box');
    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");

    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText == title) {
            alert("You have already added this item to the cart");
            return;
        }
    }

    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img" />
        <div class="detail-box">
            <div class="cart-product-title" data-id-producto="${id_producto}">${title}</div>
            <div class="cart-price">${price} €</div>
            <div class="cart-data">
                <input type="number" value="${cantidad || 1}" class="cart-quantity" />
                <div class="cart-talla">${talla}</div>
            </div>
            
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

document.addEventListener('DOMContentLoaded', function () {
    var customerInfo = document.getElementById('customer-info');
    var clienteId = customerInfo.getAttribute('data-id-cliente');

    if (clienteId) {
        ready();
    }
    
});
