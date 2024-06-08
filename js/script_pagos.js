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
        })
        // .catch(error => console.error('Error:', error));

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
                <div class="cart-quantity">${cantidad} </div>
                <div class="cart-talla">${talla}</div>
            </div>
            
        </div>
        <!-- Remove Cart -->
        <i class="bx bxs-trash-alt cart-remove"></i>
    `;
    cartShopBox.innerHTML = cartBoxContent;
   cartItems.append(cartShopBox);
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
        var quantity = quantityElement.innerText;
        total = total + price * quantity;
   }
    // If price contains some cents value
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('total-price')[0].innerText = total + " €";
}

document.addEventListener('DOMContentLoaded', function() {
    ready();
});

        document.getElementById('card-number').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/[^\d]/g, '').substring(0, 16);
        });

        document.getElementById('card-expiry').addEventListener('input', function(e) {
            var value = e.target.value.replace(/[^\d]/g, '');
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2);
            }
            e.target.value = value.substring(0, 5);
        });

        document.getElementById('card-cvv').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/[^\d]/g, '').substring(0, 3);
        });

document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();

    var cardNumber = document.getElementById('card-number').value;
    var cardExpiry = document.getElementById('card-expiry').value;
    var cardCvv = document.getElementById('card-cvv').value;

    var isValid = true;

    if (cardNumber.length !== 16) {
        document.getElementById('card-number-error').innerText = 'El número de tarjeta debe tener 16 dígitos.';
        isValid = false;
    } else {
        document.getElementById('card-number-error').innerText = '';
    }

    if (!/^\d{2}\/\d{2}$/.test(cardExpiry)) {
        document.getElementById('card-expiry-error').innerText = 'La fecha de vencimiento debe estar en el formato MM/AA.';
        isValid = false;
    } else {
        document.getElementById('card-expiry-error').innerText = '';
    }

    if (cardCvv.length !== 3) {
        document.getElementById('card-cvv-error').innerText = 'El CVV debe tener 3 dígitos.';
        isValid = false;
    } else {
        document.getElementById('card-cvv-error').innerText = '';
    }

    if (isValid) {
        crearPedido();
    }
});

function crearPedido() {
    fetch('php/crearPedido.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            document.getElementById('payment-success-modal').style.display = 'block';
        } else {
            alert(data.message);
        }
    })
   //  .catch(error => console.error('Error:', error));
}

document.getElementById('close-modal').addEventListener('click', function() {
    window.location.href = 'index.php';
});


        // Agregar el event listener al botón de "Salir"
    document.getElementById('close-modal').addEventListener('click', function() {
        window.location.href = 'index.php';
    });

                document.querySelectorAll('.panel-title a').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                var panelCollapse = this.getAttribute('href');
                var panel = document.querySelector(panelCollapse);

                if (panel.classList.contains('show')) {
                    panel.classList.remove('show');
                } else {
                    document.querySelectorAll('.panel-collapse').forEach(function(panel) {
                        panel.classList.remove('show');
                    });
                    panel.classList.add('show');
                }
            });
        });