const forms = {
   "form-login": document.getElementById("form-login"),
   "form-signup": document.getElementById("form-signup"),
};
forms["form-signup"].addEventListener("submit", function (event) {
   event.preventDefault();
   clearErroresSignup();
   if (validacionSignup()) {
      procesarFormRegistro(forms["form-signup"]);
   } else {
      return;
   }
   // Mostrar pop-up de éxito después de procesar el formulario
   mostrarPopupExito();
});

forms["form-login"].addEventListener("submit", function (event) {
   // Previene que se envíe directamente
   event.preventDefault();
   clearErroresLogin();
   // Valida el formulario
   if (validacionLogin()) {
      procesarFormLogin(forms["form-login"]);
   } else {
      return;
   }
});

document.getElementById("show-regis").addEventListener("click", function() {
   if (this.textContent === "Cerrar sesión") {
      // Realizar el logout
      fetch('./php/procesar_logout.php')
         .then(response => response.json())
         .then(data => {
            if (data.success) {
               // Recargar la página después de cerrar sesión
               window.location.href = 'index.php';
            }
         })
         .catch(error => console.error('Fetch error: ', error));
   } else {
      // Si el usuario no ha iniciado sesión, mostrar el formulario de registro
      document.querySelector(".popup-regis").classList.add("active2");
      document.querySelector(".popup").classList.remove("activa");
      document.querySelector(".menu-ppal").classList.remove("active")
   }
});

function validacionSignup() {
   let flag = true;
   // Recojo los campos validados
   let nombreValid = validarNombre(document.getElementById("nombre-signup"));
   let apellidosValid = validarNombre(document.getElementById("apellidos-signup"));
   let correoValid = validarCorreo(document.getElementById("email-signup"));
   let contrasenaValid = validarContrasena(document.getElementById("password-signup"));

   // Recojo los span de error
   const errorNombreSignup = document.getElementById("error-nombre-signup");
   const errorApellidosSignup = document.getElementById("error-apellidos-signup");
   const errorCorreoSignup = document.getElementById("error-email-signup");
   const errorTelefonoSignup = document.getElementById("error-telefono-signup")
   const errorContrasenaSignup = document.getElementById("error-password-signup");

   if (!nombreValid) {
      errorNombreSignup.textContent = "❌ No se pueden introducir números";
      errorNombreSignup.style.display = "block";
      errorNombreSignup.style.fontSize = "14px"
      errorNombreSignup.style.marginTop = "-40px";
      errorNombreSignup.style.marginBottom = "20px"
      errorNombreSignup.style.color = "red";
      document.getElementById("nombre-signup").style.borderBottom = "2px solid red";
      flag = false;
   }
   if (!apellidosValid) {
      errorApellidosSignup.textContent = "❌ No se pueden introducir números";
      errorApellidosSignup.style.display = "block";
      errorApellidosSignup.style.fontSize = "14px"
      errorApellidosSignup.style.marginTop = "-40px";
      errorApellidosSignup.style.marginBottom = "20px";
      errorApellidosSignup.style.color = "red";
      document.getElementById("apellidos-signup").style.borderBottom = "2px solid red";
      flag = false;
   }

   if (!correoValid) {
      errorCorreoSignup.textContent = "❌ Introduce un correo válido";
      errorCorreoSignup.style.display = "block";
      errorCorreoSignup.style.fontSize = "14px"
      errorCorreoSignup.style.color = "red";
      errorCorreoSignup.style.marginTop = "-40px";
      errorCorreoSignup.style.marginBottom = "20px";
      document.getElementById("email-signup").style.borderBottom = "2px solid red";
      flag = false;
   }

   if (!contrasenaValid) {
      // Añadimos <li></li> con los mensajes de error
      errorContrasenaSignup.innerHTML = `
         <li id="tituloError">❌ Debe contener al menos:</li>
         <li>- una letra mayúscula</li>
         <li>- una letra minúscula</li>
         <li>- un dígito</li>
         <li>- ocho caracteres de longitud</li>
      `;

      // Cambiamos el estilo del input "password-signup"
      errorContrasenaSignup.style.fontSize = "14px"
      document.getElementById("password-signup").style.borderBottom = "2px solid red";
      flag = false;
   }
   return flag;
}

function validacionLogin() {

   // Recojo campos validados
   let correoValid = validarCorreo(document.getElementById("email_login"));

   // Recojo span de error
   const errorCorreoLogin = document.getElementById("error-login");

   if (!correoValid) {
      errorCorreoLogin.textContent = "❌ Introduce un correo electrónico válido";
      errorCorreoLogin.style.marginTop = "-18px";
      errorCorreoLogin.style.marginBottom = "5px";
      errorCorreoLogin.style.display = "block";
      errorCorreoLogin.style.color = "red";
      document.getElementById("email_login").style.borderBottom = "2px solid red";
      return false;
   }
   return true;
}

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
            // Muestra el pop-up de éxito
            mostrarPopupExito();
         }
      })
      .catch(error => console.error('Fetch error: ', error));
}

function mostrarErrorRegistro(flag) {
   const errorCorreoSignup = document.querySelector("#error-email-signup");
   if (!flag) {
      errorCorreoSignup.textContent = "❌ El correo introducido ya existe";
      errorCorreoSignup.style.display = "block";
      errorCorreoSignup.style.color = "red";
      errorCorreoSignup.style.marginTop = "-25px";
      document.getElementById("email-signup").style.borderBottom = "2px solid red";
   } else {
      errorCorreoSignup.textContent = "";
      document.getElementById("email-signup").style.borderBottom = "1px solid #fff";
   }
}

function procesarFormLogin(formulario) {
   const formData = new FormData(formulario);
   fetch('./php/procesar_login.php', {
      method: 'POST',
      body: formData,
   })
      .then(response => {
         return response.json()
      })
      .then(data => {
         console.log(data); // Verifica si la respuesta del servidor es correcta
         if (!data.success) {
            mostrarErrorLogin(true, data.error);
         } else {
            // Redirige o realiza cualquier otra acción necesaria
            window.location.href = "./index.php";
         }
      }).catch(error => console.error('Fetch error: ', error));
}

function mostrarErrorLogin(flag, error) {
   const errorLogin = document.querySelector("#error-login");

   if (flag) {
      if (error === "correo" || error === "contrasena") {
         errorLogin.textContent = "❌ Correo o contraseña incorrectos.";
         errorLogin.style.marginTop = "-25px";
         errorLogin.style.marginBottom = "5px";
         errorLogin.style.display = "block";
         errorLogin.style.fontSize = "14px"
         errorLogin.style.color = "red";
      }
   }
}

// VALIDACION DE FORMULARIO
function validarNombre(nombre) {
   return /\d/.test(nombre.value) ? false : true;
}
function validarCorreo(correo) {
   return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo.value);
}
function validarContrasena(contrasena) {
   return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/.test(contrasena.value);
}

function clearErroresSignup() {
   // Recojo los span de error
   const errorNombreSignup = document.getElementById("error-nombre-signup");
   const errorApellidosSignup = document.getElementById("error-apellidos-signup");
   const errorCorreoSignup = document.getElementById("error-email-signup");
   // Recojo el <ul></ul> de error de la contraseña
   const errorContrasenaSignup = document.getElementById("error-password-signup");

   // Limpiamos erroes nombre y apellidos
   errorNombreSignup.textContent = "";
   document.getElementById("nombre-signup").style.borderBottom = "1px solid #fff";
   errorApellidosSignup.textContent = "";
   document.getElementById("apellidos-signup").style.borderBottom = "1px solid #fff";

   // Limpiamos errores correo
   errorCorreoSignup.textContent = "";
   document.getElementById("email-signup").style.borderBottom = "1px solid #fff";

   // Limpiamos errores contraseña
   errorContrasenaSignup.innerHTML = "";
   document.getElementById("password-signup").style.borderBottom = "1px solid #fff";
}

function clearErroresLogin() {
   // Recojo span de error
   const errorLogin = document.querySelector("#error-login");

   errorLogin.textContent = "";
   errorLogin.style.marginTop = "initial";
   errorLogin.style.marginBottom = "initial";
   errorLogin.style.display = "initial";
   document.getElementById("email_login").style.borderBottom = "1px solid #fff";
}


// POP-UP MESSAGE
document.addEventListener('DOMContentLoaded', function () {
   // Código para el menú hamburguesa
   var menuToggle = document.querySelector('.menu-toggle');
   var menuPpal = document.querySelector('.menu-ppal');
   var navbar = document.querySelector('.navbar');
 
   menuToggle.addEventListener('click', function () {
      menuPpal.classList.toggle('active');
      navbar.classList.toggle('overflow-visible');
   });
 
   // Código para cerrar el popup
   var popupMessage = document.querySelector('.popup-message');
   var closeButton = document.querySelector('.popup-message .close-popup-message');
 
   closeButton.addEventListener('click', function () {
     popupMessage.style.display = 'none';
   });
 
   // Código para el desplazamiento suave
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
 

// ------------------ LOGIN
document.addEventListener("DOMContentLoaded", function () {
   var loginButton = document.querySelector("#show-login");

   // Verificar si el botón existe
   if (loginButton) {
       loginButton.addEventListener("click", function () {
           // Obtenemos el texto del botón y lo limpiamos de espacios adicionales
           var buttonText = loginButton.textContent.trim();

           // Verificamos si el texto del botón contiene "Hola" (sin importar mayúsculas/minúsculas)
           if (buttonText.toLowerCase().includes("hola".toLowerCase())) {
               // Redirigir a la página de perfil del usuario
               window.location.href = "perfil_usuario.php";
           } else {
               document.querySelector(".popup").classList.add("activa");
               document.querySelector(".popup-regis").classList.remove("active2");
               document.querySelector(".menu-ppal").classList.remove("active");
           }
       });
   } else {
       console.error("El botón con id #show-login no se encontró en el DOM.");
   }
});

document.querySelector(".popup .close-btn").addEventListener("click", function () {
   document.querySelector(".popup").classList.remove("activa");
});

document.querySelector("#registrate").addEventListener("click", function (event) {
   event.preventDefault();
   document.querySelector(".popup-regis").classList.add("active2");
   document.querySelector(".popup").classList.remove("activa");
});

// ------------------ REGISTRO
document.querySelector("#show-regis").addEventListener("click", function () {
   document.querySelector(".popup-regis").classList.add("active2");
   document.querySelector(".popup").classList.remove("activa");
   document.querySelector(".menu-ppal").classList.remove("active")
});

document.querySelector(".popup-regis .close-btn").addEventListener("click", function () {
   document.querySelector(".popup-regis").classList.remove("active2");
});
document.querySelector("#acceder-login").addEventListener("click", function (event) {
   event.preventDefault();
   document.querySelector(".popup").classList.add("activa");
   document.querySelector(".popup-regis").classList.remove("active2");
});


function mostrarPopupExito() {   
   document.querySelector(".popup").classList.add("activa");
   document.querySelector(".popup-regis").classList.remove("active2");
   // Mostramos pop-up de éxito
   document.querySelector(".popup-message").style.display = "block";
   document.querySelector("#popup-text").textContent = "¡Te has registrado correctamente!";
}
// Obtener referencia al botón del carrito
const btnCarrito = document.getElementById('cart-icon');

// Manejar el evento de clic en el botón del carrito
btnCarrito.addEventListener('click', function() {
    // Hacer la solicitud Fetch a procesar_registro.php
    fetch('./php/procesar_registro.php')
        .then(response => response.json())
        .then(data => {
            // Verificar la respuesta del servidor
            if (data.logged_in) {
               document.querySelector('.cart').classList.add('active')
            } else {
                // Si el usuario no ha iniciado sesión, agregar una clase activa al popup
                document.querySelector(".popup").classList.add("activa");
            }
        })
        .catch(error => {
            console.error('Error al procesar la solicitud:', error);
        });
});
