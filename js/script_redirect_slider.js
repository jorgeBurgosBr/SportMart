document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los botones de compra en el slider
    const buyButtons = document.querySelectorAll('.buy-btn');

    buyButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const productId = this.getAttribute('data-id');
            // Redirige a productos.php con el ID del producto en la URL
            window.location.href = `productos.php?id_producto=${productId}`;
        });
    });
});
