<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['nombre'])) {
  $textoBotonLogin = "Hola, " . $_SESSION['nombre'];
  $textoBotonRegistrarse = "Cerrar sesión";
} else {
  $textoBotonLogin = "Inicia sesión";
  $textoBotonRegistrarse = "Regístrate";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Contacto</title>
  <link rel="stylesheet" href="style/contacto.css" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>SportMart</title>
  <link rel="icon" href="img/fav.ico" type="image/x-icon">
  <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script>
    function loadGoogleTranslate() {
      var script = document.createElement('script');
      script.type = 'text/javascript';
      script.async = true;
      script.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
      document.head.appendChild(script);
    }

    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'es',
        includedLanguages: 'en,es,pt,it,fr,de',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
      }, 'google_translate_element');
    }

    document.addEventListener("DOMContentLoaded", function() {
      loadGoogleTranslate();
    });
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    @media screen and (max-width: 480px) {
      .popup-regis.active2 {
        top: 16%;
      }
    }
  </style>

</head>


<body>
  <header>
    <button id="show-help">Ayuda</button>
    <button id="show-login" <?php echo isset($_SESSION['nombre']) ? '' : ''; ?> class="<?php echo isset($_SESSION['nombre']) ? 'disabled-button' : ''; ?>"><?php echo $textoBotonLogin; ?></button>
    <button id="show-regis" class="bttn-regis"><?php echo $textoBotonRegistrarse; ?></button>
    <div id="google_translate_element"></div>
  </header>
  <nav class="navbar">
    <div class="container-nav">
      <div class="logo-nav">
        <a href="index.php">
        <img src="img/sportmart.png" alt="" />
        </a>
      </div>
      <div class="menu-toggle">
        <i class="ri-menu-line"></i>
      </div>
      <div class="drop-menu">
        <div class="menu-ppal">
          <a class="nav-button" href="home_running.php">Running</a>
          <a class="nav-button" href="home_gym.php">Gimnasio</a>
          <a class="nav-button" href="home_boxeo.php">Boxeo/MMA</a>
        </div>
        <div class="drop-content">
          <div class="row">
            <div class="column">
              <h3>Running</h3>
              <a class="nav-button" href="productos.php?categoria=Calzado&deporte=Running">Zapatillas</a>
              <a class="nav-button" href="productos.php?categoria=Ropa&deporte=Running">Ropa</a>
              <a class="nav-button" href="productos.php?categoria=Accesorios&deporte=Running">Accesorios</a>
            </div>
            <div class="column">
              <h3>Gimnasio</h3>
              <a class="nav-button" href="productos.php?categoria=Calzado&deporte=Gym">Zapatillas</a>
              <a class="nav-button" href="productos.php?categoria=Ropa&deporte=Gym">Ropa</a>
              <a class="nav-button" href="productos.php?categoria=Accesorios&deporte=Gym">Accesorios</a>
            </div>
            <div class="column">
              <h3>Boxeo y MMA</h3>
              <a class="nav-button" href="productos.php?categoria=Calzado&deporte=Deportes de contacto">Zapatillas</a>
              <a class="nav-button" href="productos.php?categoria=Ropa&deporte=Deportes de contacto">Ropa</a>
              <a class="nav-button" href="productos.php?categoria=Accesorios&deporte=Deportes de contacto">Accesorios</a>
            </div>
          </div>
        </div>
      </div>
      <div class="search-nav">
        <button class="btn-nav" id="cart-icon"><i class="ri-shopping-cart-line"></i></button>
        <!-- Cart Icon -->
        <!-- Cart -->
        <div class="cart">
          <h2 class="cart-title">Carrito</h2>
          <!-- Content -->
          <div class="cart-content"></div>
          <!-- Total -->
          <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">$0</div>
          </div>
          <!-- Buy Bottom -->
          <button type="button" class="btn-buy">Comprar ahora</button>
          <!-- Cart close -->
          <i class="bx bx-x" id="close-cart"></i>
        </div>
      </div>
    </div>
  </nav>
  <div class="fondo">
    <br><br><br>
    <div class="centrado">
      <div class="containerr">
        <div class="texto">
          <h3>Pregunta y nosotros te ayudamos</h3>
          <p>Si tienes alguna duda o necesitas asistencia, estamos aquí para ayudarte. Nuestro equipo está disponible para responder a todas tus preguntas y proporcionarte el soporte que necesites. No dudes en ponerte en contacto con nosotros a través del formulario de contacto, y te responderemos lo antes posible. Tu satisfacción es nuestra prioridad.</p>
          <br>
          <h3>FAQs</h3>
          <p>Para resolver los problemas más comunes de manera rápida y eficiente, hemos preparado una sección de Preguntas Frecuentes (FAQs). Aquí encontrarás respuestas a las preguntas más frecuentes sobre nuestros productos, servicios, envíos, devoluciones y mucho más. Te invitamos a consultar nuestras FAQs antes de contactarnos, ya que es posible que encuentres la solución que buscas de inmediato.</p>
          <br>
          <h3>Contacta con nosotros: SportMart@gmail.com</h3><br>
        </div>

        <div class="formulario">
          <form class="contacto-formulario" action="#" method="post">
            <div class="contenedor-email">
              <label for="emailInput">Email:</label>
              <input type="email" id="emailInput" class="esp" name="email" required>
            </div>
            <div class="contenedor-name">
              <label for="nameInput">Nombre:</label>
              <input type="text" id="nameInput" class="esp" name="nombre" required>
            </div>
            <div class="contenedor-textarea">
              <label for="motivoInput">Motivo:</label>
              <textarea id="motivoInput" class="esp" name="motivo" required></textarea>
            </div>
            <button type="submit">Enviar</button>
          </form>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const formulario = document.querySelector('.contacto-formulario');
        const emailInput = document.querySelector('#emailInput');
        const nombreInput = document.querySelector('#nameInput');
        const motivoInput = document.querySelector('#motivoInput');
        const errorEmail = document.querySelector('.contenedor-email');
        const errorName = document.querySelector('.contenedor-name');
        const errorTextarea = document.querySelector('.contenedor-textarea');

        emailInput.addEventListener('blur', function() {
          validarMail();
        });

        nombreInput.addEventListener('blur', function() {
          validarName();
        });

        motivoInput.addEventListener('blur', function() {
          validarMotivo();
        });

        formulario.addEventListener('submit', function(event) {
          const errorEmail = validarMail();
          const errorNombre = validarName();
          const errorMotivo = validarMotivo();

          if (errorEmail || errorNombre || errorMotivo) {
            event.preventDefault();
          }
        });

        function validarMail() {
          const errores = document.querySelectorAll('.error.mail');
          errores.forEach(error => {
            error.remove();
          });

          const email = emailInput.value.trim();

          if (email == '') {
            const error = document.createElement('p');
            error.classList.add('error');
            error.classList.add('mail');
            error.textContent = "El email es obligatorio, no puede estar vacío.";
            error.style.color = 'red';
            errorEmail.appendChild(error);
            return true;
          }

          if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/.test(email)) {
            const error = document.createElement('p');
            error.classList.add('error');
            error.classList.add('mail');
            error.textContent = "El email es inválido o contiene caracteres no permitidos.";
            error.style.color = 'red';
            errorEmail.appendChild(error);
            return true;
          }

          return false;
        }

        function validarName() {
          const errores = document.querySelectorAll('.error.name');
          errores.forEach(error => {
            error.remove();
          });

          const name = nombreInput.value.trim();

          if (name == '') {
            const error = document.createElement('p');
            error.classList.add('error');
            error.classList.add('name');
            error.textContent = "El nombre es obligatorio.";
            error.style.color = 'red';
            errorName.appendChild(error);
            return true;
          }

          if (/\d/.test(name)) {
            const error = document.createElement('p');
            error.classList.add('error');
            error.classList.add('name');
            error.textContent = "El nombre no puede tener números.";
            error.style.color = 'red';
            errorName.appendChild(error);
            return true;
          }

          return false;
        }

        function validarMotivo() {
          const errores = document.querySelectorAll('.error.motivo');
          errores.forEach(error => {
            error.remove();
          });

          const motivo = motivoInput.value.trim();

          if (motivo == '') {
            const error = document.createElement('p');
            error.classList.add('error');
            error.classList.add('motivo');
            error.textContent = "Por favor, indica el motivo de contacto.";
            error.style.color = 'red';
            errorTextarea.appendChild(error);
            return true;
          }

          if (motivo.length > 256) {
            const error = document.createElement('p');
            error.classList.add('error');
            error.classList.add('motivo');
            error.textContent = "Has superado el límite de caracteres permitidos.";
            error.style.color = 'red';
            errorTextarea.appendChild(error);
            return true;
          }

          return false;
        }
      });
    </script>
    <!-- ------------------------ LOGIN ------------------------ -->
    <div class="popup">
      <div class="close-btn"><i class="ri-close-circle-fill"></i></div>
      <p>Inicia sesión</p>
      <form id="form-login">
        <div class="form-element">
          <input required name="email-login" id="email_login" type="text">
          <label>Email</label>
        </div>
        <div class="form-element">
          <input required name="password-login" id="password_login" type="password">
          <label>Contraseña</label>
        </div>
        <span id="error-login"></span>
        <button class="btn-submit">Enviar</button>
      </form>
      <p>¿No tienes cuenta? <a href="" id="registrate" class="a2">Regístrate!</a></p>
    </div>

    <!-- ------------------------ REGISTRO ------------------------ -->
    <div class="popup-regis">
      <div class="close-btn"><i class="ri-close-circle-fill"></i></div>
      <p>Regístrate</p>
      <form id="form-signup">
        <div class="form-element">
          <input required name="nombre" id="nombre-signup" type="text">
          <label>Nombre</label>
          <span id="error-nombre-signup"></span>
        </div>
        <div class="form-element">
          <input required name="apellidos" id="apellidos-signup" type="text">
          <label>Apellidos</label>
          <span id="error-apellidos-signup"></span>
        </div>
        <div class="form-element">
          <input required name="email" id="email-signup" type="text">
          <label>Correo</label>
          <span id="error-email-signup"></span>
        </div>
        <div class="form-element">
          <input required name="password" id="password-signup" type="password">
          <label>Contraseña</label>
          <ul id="error-password-signup"></ul>
        </div>
        <button type="submit" class="btn-submit">Enviar</button>
      </form>
      <p>¿Tienes cuenta? <a href="" id="acceder-login" class="a2">Accede!</a></p>
    </div>

    <div class="popup-message">
      <div class="popup-content">
        <span class="close-popup-message">&times;</span>
        <p id="popup-text"></p>
      </div>
    </div>
    <script src="js/script_home.js"></script>
    <script src="js/script_carrito.js"></script>
    <script src="js/script_running.js"></script>
    <br><br><br>
    <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>Empresa</h4>
          <ul>
            <li><a href="aboutus.php">Sobre Nosotros</a></li>
            <li><a href="privacidad.php">Políticas</a></li>
            <li><a href="tallas.php">Tallas</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Ayuda</h4>
          <ul>
            <li><a href="faqs.php">Preguntas Frequentes</a></li>
            <li><a href="PagosInfo.php">Métodos de Pago</a></li>
            <li><a href="PagosYDevoluciones.php">Devoluciones</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Tienda online</h4>
          <ul>
            <li><a href="home_gym.php">Menú Gimnasio</a></li>
            <li><a href="home_boxeo.php">Menú Boxeo</a></li>
            <li><a href="home_running.php">Menú Running</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Redes sociales</h4>
          <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  </div>
  <div id="customer-info" data-id-cliente="<?php echo $_SESSION['id_cliente']; ?>"></div>

  <script src="js/script_running.js"></script>
  <script src="js/script_home.js"></script>

</body>

</html>