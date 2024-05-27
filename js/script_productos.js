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
            console.error('No elements with class "content" found');
            return;
         }
         const container = containers[0];

         data.forEach(producto => {
            const productoDiv = document.createElement('div');
            productoDiv.className = 'product-box';
            productoDiv.innerHTML = `
               <img class="product-img" src="${producto.imagen}" alt="${producto.nombre}">
               <h2 class="product-title">${producto.nombre}</h2>
               <p class="product-description">${producto.descripcion}</p>
               <span class="price">${producto.precio} €</span>
               <i class="bx bx-shopping-bag add-cart"></i>
            `;

            container.appendChild(productoDiv);
         });
      })
      .catch(error => console.error('Error:', error));
});
