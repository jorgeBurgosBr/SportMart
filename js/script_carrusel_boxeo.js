document.addEventListener('DOMContentLoaded', function () {
      fetch('./php/procesar_carrusel_boxeo.php')
       .then(response => response.json())
       .then(data => {
           let productList = document.querySelector('.product-list');
           if (productList) {
               if (data.error) {
                   console.error('Error from server:', data.error);
               } else {
                   data.products.forEach(product => {
                       let li = document.createElement('li');
                       li.className = 'item';
                       li.innerHTML = `
                           <div class="box">
                               <div class="slide-img">
                                   <img src="${product.imagen}" alt="${product.nombre}" />
                                   <div class="overlay">
                                       <a href="#" class="buy-btn">Comprar</a>
                                   </div>
                               </div>
                               <div class="detail-box">
                                   <div class="type">
                                       <a href="#">${product.nombre}</a>
                                       <span>${product.descripcion}</span>
                                   </div>
                                   <a href="#" class="price">${product.precio}$</a>
                               </div>
                           </div>
                       `;
                       productList.appendChild(li);
                   });
               }
           } else {
               console.error('Element with class "product-list" not found');
           }
       })
       .catch(error => console.error('Error fetching products:', error));
});
