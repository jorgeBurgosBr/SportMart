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

    // Obtener categorías, deportes y tallas para los filtros
    fetch('php/get_filtros.php')
        .then(response => response.json())
        .then(data => {
            const categoriaSelect = document.getElementById('categoria');
            const deporteSelect = document.getElementById('deporte');
            const tallaSelect = document.getElementById('talla');

            data.categorias.forEach(categoria => {
                const option = document.createElement('option');
                option.value = categoria;
                option.textContent = categoria;
                categoriaSelect.appendChild(option);
            });

            data.deportes.forEach(deporte => {
                const option = document.createElement('option');
                option.value = deporte;
                option.textContent = deporte;
                deporteSelect.appendChild(option);
            });

            data.tallas.forEach(talla => {
                const option = document.createElement('option');
                option.value = talla;
                option.textContent = talla;
                tallaSelect.appendChild(option);
            });

            // Cargar los filtros iniciales después de que las opciones hayan sido agregadas
            cargarFiltrosIniciales();
        })
        .catch(error => console.error('Error:', error));

    // Cargar los filtros productos iniciales
    const getFiltersSpan = document.getElementById('get_filters');
    const initialFilterParams = getFiltersSpan.textContent.trim();

    function cargarFiltrosIniciales() {
        const params = new URLSearchParams(initialFilterParams);
        let categoria = '';
        let deporte = '';

        if (params.has('categoria')) {
            categoria = params.get('categoria');
            const selectCategoria = document.querySelector('select[name="categoria"]');
            if (selectCategoria) {
                const optionCategoria = selectCategoria.querySelector(`option[value="${categoria}"]`);
                if (optionCategoria) {
                    optionCategoria.selected = true;
                }
            }
        }
        if (params.has('deporte')) {
            deporte = params.get('deporte');
            const selectDeporte = document.querySelector('select[name="deporte"]');
            if (selectDeporte) {
                const optionDeporte = selectDeporte.querySelector(`option[value="${deporte}"]`);
                if (optionDeporte) {
                    optionDeporte.selected = true;
                }
            }
        }

        // Llamar a la función para actualizar el breadcrumb
        updateBreadcrumb(categoria, deporte);
    }

    // Función para actualizar el breadcrumb
    function updateBreadcrumb(categoria, deporte) {
        const breadcrumbDeporte = document.getElementById('breadcrumb-deporte');
        const breadcrumbCategoria = document.getElementById('breadcrumb-categoria');

        if (deporte == "Running") {
            breadcrumbDeporte.innerHTML = ` / <a href="home_running.php">${deporte}</a>`;
        } else if(deporte == "Gym"){
            breadcrumbDeporte.innerHTML = ` / <a href="home_gym.php">${deporte}</a>`;
        } else if(deporte == "Deportes de contacto"){
            breadcrumbDeporte.innerHTML = ` / <a href="home_boxeo.php">${deporte}</a>`;
        } else {
            breadcrumbCategoria.innerHTML = '';
        }

        if (categoria) {
            breadcrumbCategoria.innerHTML = "/ "+categoria;
        }else {
            breadcrumbCategoria.innerHTML = '';
        }
    }

    // Aplicar filtros
    filterForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const precioMin = document.getElementById('precio-min').value;
        const precioMax = document.getElementById('precio-max').value;
        const sexo = document.getElementById('sexo').value;
        const categoria = document.getElementById('categoria').value;
        const deporte = document.getElementById('deporte').value;
        const talla = document.getElementById('talla').value;

        // Construir los parámetros de filtro
        let filterParams = '';

        if (categoria) filterParams += `categoria=${categoria}`;
        if (precioMin) filterParams += `${filterParams ? '&' : ''}precio_min=${precioMin}`;
        if (precioMax) filterParams += `${filterParams ? '&' : ''}precio_max=${precioMax}`;
        if (sexo) filterParams += `${filterParams ? '&' : ''}sexo=${sexo}`;
        if (deporte) filterParams += `${filterParams ? '&' : ''}deporte=${deporte}`;
        if (talla) filterParams += `${filterParams ? '&' : ''}talla=${talla}`;

        loadProducts(filterParams);
        updateBreadcrumb(categoria, deporte); // Actualizar breadcrumb después de aplicar los filtros

        // Cerrar popup de filtros
        filterPopup.classList.remove('active');
    });

    loadProducts(initialFilterParams);
});

function loadProducts(filterParams) {
    fetch(`php/get_productos.php?${filterParams}`)
        .then(response => response.json())
        .then(data => {
            const container = document.getElementsByClassName('shop-content')[0];
            container.innerHTML = ''; // Limpiar productos existentes

            if (data.length === 0) {
                container.innerHTML = '<h2 class="center-title">No hay productos que mostrar</h2>';
            } else {
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

                preparado();
            }
        })
        .catch(error => console.error('Error:', error));
}
