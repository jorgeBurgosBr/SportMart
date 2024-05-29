// Function to add event listeners
function preparado() {
    // Add to Cart
    var addCart = document.getElementsByClassName('add-cart');
    for (var i = 0; i < addCart.length; i++) {
        var button = addCart[i];
        button.addEventListener('click', addToCartClickedd);
    }
}
function addToCartClickedd(event) {
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
    var price = shopProducts.getElementsByClassName('price')[0].innerText.replace("€", "").trim();
    var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
    var customerInfoElement = document.getElementById('customer-info');
    var id_cliente = customerInfoElement.getAttribute('data-id-cliente');
    var id_producto = shopProducts.getAttribute('data-id-producto'); // Supongamos que cada producto tiene este atributo
    var cantidad = 1;
    var talla = 'M'; // Reemplaza con la talla seleccionada, si corresponde

    addProductToCart(title, price, productImg, cantidad);
    updateTotal();

    // Enviar solicitud AJAX para agregar el producto al carrito en la base de datos
    fetch('php/insert_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id_cliente=${id_cliente}&id_producto=${id_producto}&cantidad=${cantidad}&talla=${talla}`
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}

function addProductToCart(title, price, productImg, cantidad) {
    var cartShopBox = document.createElement("div");
    cartShopBox.classList.add('cart-box');

    var cartItems = document.getElementsByClassName("cart-content")[0];
    var cartItemsNames = cartItems.getElementsByClassName("cart-product-title");
    for (var i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText.trim() === title) {
            alert("You have already added this item to the cart");
            return;
        }
    }
    var cartBoxContent = `
        <img src="${productImg}" alt="" class="cart-img" />
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price} €</div>
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

// Fetch and display products dynamically
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const categoria = urlParams.get('categoria');

    fetch(`php/get_productos.php?categoria=${categoria}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }  
            return response.json();
        })
        .then(data => {
            const containers = document.getElementsByClassName('shop-content');
            if (containers.length === 0) {
                console.error('No elements with class "shop-content" found');
                return;
            }
            const container = containers[0];

            data.forEach(producto => {
                const productoDiv = document.createElement('div');
                productoDiv.className = 'product-box';
                productoDiv.setAttribute('data-id-producto', producto.id_producto); // Agregar el atributo data-id-producto
                productoDiv.innerHTML = `
                    <img class="product-img" src="${producto.imagen}" alt="${producto.nombre}">
                    <h2 class="product-title">${producto.nombre}</h2>
                    <p class="product-description">${producto.descripcion}</p>
                    <span class="price">${producto.precio} €</span>
                    <i class="bx bx-shopping-bag add-cart"></i>
                    <i class="bx bx-heart add-wishlist"></i> <!-- Wishlist icon -->
                `;

                container.appendChild(productoDiv);
            });

            preparado();            
        })
        .catch(error => console.error('Error:', error));
});
