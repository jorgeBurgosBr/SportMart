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
    var id_producto = shopProducts.getAttribute('data-id-producto');
    var cantidad = 1;
    // Obtener la talla seleccionada
    var selectedTalla = shopProducts.querySelector('.tallas span.selected');
    var talla = selectedTalla ? selectedTalla.textContent : null;

    if (!talla) {
        alert("Por favor, selecciona una talla.");
        return;
    }

    // Verificar si el producto ya está en el carrito
    var cartItems = document.getElementsByClassName('cart-content')[0];
    var cartItemsIds = cartItems.getElementsByClassName('cart-product-title');
    var productExistsInCart = false;

    for (var i = 0; i < cartItemsIds.length; i++) {
        if (cartItemsIds[i].getAttribute('data-id-producto') === id_producto) {
            productExistsInCart = true;

            // Enviar solicitud AJAX para actualizar la cantidad del producto en la base de datos
            var quantityInput = cartItemsIds[i].parentElement.getElementsByClassName('cart-quantity')[0];
            var nuevaCantidad = parseInt(quantityInput.value) + 1; // Aumentar la cantidad
            quantityInput.value = nuevaCantidad; // Actualizar la cantidad en el carrito

            fetch('php/update_cart_quantity.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id_cliente=${id_cliente}&id_producto=${id_producto}&cantidad=${nuevaCantidad}`
            })
            .then(response => response.text())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));

            break;
        }
    }

    // Si el producto no está en el carrito, añadirlo
    if (!productExistsInCart) {
        addProductToCart(title, price, productImg, cantidad, id_producto, talla);
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
}


function addProductToCart(title, price, productImg, cantidad, talla) {
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
            <div class="cart-talla">${talla}</div>
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

            data.forEach(async producto => {
                const productoDiv = document.createElement('div');
                productoDiv.className = 'product-box';
                productoDiv.setAttribute('data-id-producto', producto.id_producto); // Agregar el atributo data-id-producto
                productoDiv.innerHTML = `
                    <img class="product-img" src="${producto.imagen}" alt="${producto.nombre}">
                    <div class="tallas"></div>
                    <h2 class="product-title">${producto.nombre}</h2>
                    <p class="product-description">${producto.descripcion}</p>
                    <span class="price">${producto.precio} €</span>
                    <i class="bx bx-shopping-bag add-cart"></i>
                    <i class="bx bx-heart add-wishlist"></i> <!-- Wishlist icon -->
                `;

                const tallasDiv = productoDiv.querySelector('.tallas');
                producto.variantes.forEach(variant => {
                        const span = document.createElement('span');
                        span.textContent = variant.talla;
                        span.addEventListener('click', () => {
                        // Selección de talla
                        const selected = productoDiv.querySelector('.tallas span.selected');
                        if (selected) {
                            selected.classList.remove('selected');
                        }
                        span.classList.add('selected');
                    });
                    tallasDiv.appendChild(span);
                });

                container.appendChild(productoDiv);
            });


            preparado();            
        })
        // .catch(error => console.error('Error:', error));
});
