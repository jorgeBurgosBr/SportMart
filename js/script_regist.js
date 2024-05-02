document.querySelector("#show-regis").addEventListener("click", function () {
   document.querySelector(".popup-regis").classList.add("active2");
});

document.querySelector(".popup-regis .close-btn").addEventListener("click", function () {
   document.querySelector(".popup-regis").classList.remove("active2");
});

const forms = {
   "form-login": document.getElementById("form-login"),
   "form-signup": document.getElementById("form-signup"),
};

forms["form-signup"].addEventListener("submit", function (event) {
   event.preventDefault()
      procesarFormRegistro(forms["form-signup"]);
});

function procesarFormRegistro(formulario) {
   const formData = new FormData(formulario);
   fetch('./php/procesar_registro.php', {
      method: 'POST',
      body: formData,
   })
      .then(response => response.json())
      .then(data => {
         // Añadimos o quitamos error en función de data.success
         mostrarErrorRegistro(data.success);
         // Si se produjo el registro redirigimos al login
         if (data.success) {
            document.querySelector(".popup-login").classList.add("active");
            document.querySelector(".popup-signup").classList.remove("active");
            // mostramos pop-up de éxito
            document.querySelector(".popup-message").style.display = "block";
            document.querySelector("#popup-text").textContent = "¡Registro exitoso!";
         }
      })
      .catch(error => console.error('Fetch error: ', error));
}


// POP-UP MESSAGE
document.addEventListener('DOMContentLoaded', function () {
   var popupMessage = document.querySelector('.popup-message');
   var closeButton = document.querySelector('.popup-message .close-popup-message');

   closeButton.addEventListener('click', function () {
      popupMessage.style.display = 'none';
   });

   var scrollLinks = document.querySelectorAll(".scroll-link");

   // Agrega un evento de clic a cada enlace
   scrollLinks.forEach(function(link) {
     link.addEventListener("click", function(e) {
       e.preventDefault();

       // Obtén el ID del objetivo desde el atributo 'data-target'
       var targetId = this.getAttribute("data-target");

       // Encuentra el elemento con el ID correspondiente
       var targetElement = document.getElementById(targetId);

       targetElement.scrollIntoView({
         behavior: "smooth"
       });
     });
   });
});