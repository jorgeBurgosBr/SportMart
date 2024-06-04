document.addEventListener('DOMContentLoaded', function() {
    // Botón de filtros
    const filterButton = document.getElementById('filter-button');
    const filterPopup = document.getElementById('filter-popup');
    const closeFilterPopup = document.getElementById('close-filter-popup');
    const filterForm = document.getElementById('filter-form');

    // Abrir popup de filtros
    filterButton.addEventListener('click', () => {
        filterPopup.classList.add('active');
    });

    // Cerrar popup de filtros
    closeFilterPopup.addEventListener('click', () => {
        filterPopup.classList.remove('active');
    });

    // Aplicar filtros
    filterForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const precioMin = document.getElementById('precio-min').value;
        const precioMax = document.getElementById('precio-max').value;
        const sexo = document.getElementById('sexo').value;

        // Construir los parámetros de filtro
        const urlParams = new URLSearchParams(window.location.search);
        const categoria = urlParams.get('categoria');
        let filterParams = `categoria=${categoria}`;

        if (precioMin) filterParams += `&precio_min=${precioMin}`;
        if (precioMax) filterParams += `&precio_max=${precioMax}`;
        if (sexo) filterParams += `&sexo=${sexo}`;

        fetch(`php/get_productos.php?${filterParams}`)
            .then(response => response.json())
            .then(data => {
                const container = document.getElementsByClassName('shop-content')[0];
                container.innerHTML = ''; // Limpiar productos existentes

                data.forEach(producto => {
                    const productoDiv = document.createElement('div');
                    productoDiv.className = 'product-box';
                    productoDiv.setAttribute('data-id-producto', producto.id_producto);
                    productoDiv.innerHTML = `
                        <img class="product-img" src="${producto.imagen}" alt="${producto.nombre}">
                        <div class="tallas"></div>
                        <h2 class="product-title">${producto.nombre}</h2>
                        <p class="product-description">${producto.descripcion}</p>
                        <span class="price">${producto.precio} €</span>
                        <i class="bx bx-shopping-bag add-cart"></i>
                        <i class="bx bx-heart add-wishlist"></i>
                    `;

                    const tallasDiv = productoDiv.querySelector('.tallas');
                    producto.variantes.forEach(variant => {
                        const span = document.createElement('span');
                        span.textContent = variant.talla;
                        span.addEventListener('click', () => {
                            const selected = productoDiv.querySelector('.tallas span.selected');
                            if (selected) selected.classList.remove('selected');
                            span.classList.add('selected');
                        });
                        tallasDiv.appendChild(span);
                    });

                    container.appendChild(productoDiv);
                });

                // Actualizar eventos
                preparado();
            })
            .catch(error => console.error('Error:', error));

        // Cerrar popup de filtros
        filterPopup.classList.remove('active');
    });
});
