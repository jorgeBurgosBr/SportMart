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
  <link rel="icon" href="img/fav.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/PagosYDevoluciones.css" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>SportMart</title>
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
              <a class="nav-button" href="">Zapatillas</a>
              <a class="nav-button" href="">Camisetas</a>
              <a class="nav-button" href="">Accesorios</a>
            </div>
            <div class="column">
              <h3>Gimnasio</h3>
              <a class="nav-button" href="">Zapatillas</a>
              <a class="nav-button" href="">Camisetas</a>
              <a class="nav-button" href="">Accesorios</a>
            </div>
            <div class="column">
              <h3>Boxeo y MMA</h3>
              <a class="nav-button" href="">Zapatillas</a>
              <a class="nav-button" href="">Camisetas</a>
              <a class="nav-button" href="">Accesorios</a>
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

  <div class="contenedor">
    <div class="titulo">Política de Privacidad de SportMart</div>
    <div class="texto">
      <p>En SportMart, valoramos tu privacidad y estamos comprometidos a proteger la información personal que compartes con nosotros. Esta Política de Privacidad describe cómo recopilamos, usamos, compartimos y protegemos tu información cuando visitas nuestro sitio web, utilizas nuestros servicios o te comunicas con nosotros. Al acceder y utilizar nuestros servicios, aceptas las prácticas descritas en esta Política de Privacidad.</p>

      <h4>1. Información que Recopilamos</h4>
      <p><strong>1.1 Información Proporcionada por el Usuario</strong><br>
        Recopilamos información que nos proporcionas directamente cuando utilizas nuestros servicios, como cuando te registras para una cuenta, realizas una compra, te suscribes a nuestro boletín, participas en encuestas, o te comunicas con nuestro equipo de atención al cliente. Esta información puede incluir:</p>
      <ul>
        <li>Nombre</li>
        <li>Dirección de correo electrónico</li>
        <li>Dirección postal</li>
        <li>Número de teléfono</li>
        <li>Información de pago (tarjeta de crédito, débito u otros métodos de pago)</li>
        <li>Detalles de la cuenta (nombre de usuario, contraseña)</li>
      </ul>

      <p><strong>1.2 Información Recopilada Automáticamente</strong><br>
        Cuando accedes a nuestro sitio web, podemos recopilar automáticamente cierta información sobre tu dispositivo y el uso de nuestro sitio. Esta información puede incluir:</p>
      <ul>
        <li>Dirección IP</li>
        <li>Tipo de navegador</li>
        <li>Sistema operativo</li>
        <li>Páginas visitadas en nuestro sitio web</li>
        <li>Fecha y hora de acceso</li>
        <li>Información sobre tu interacción con nuestro sitio web (como los clics y las acciones realizadas)</li>
      </ul>

      <p><strong>1.3 Información Recibida de Terceros</strong><br>
        Podemos recibir información sobre ti de otras fuentes, incluyendo socios comerciales, proveedores de servicios, y plataformas de redes sociales, y combinarla con la información que recopilamos directamente.</p>

      <h4>2. Uso de la Información</h4>
      <p>Utilizamos la información recopilada para diversos fines, incluyendo:</p>
      <ul>
        <li>Proveer, operar y mantener nuestros servicios</li>
        <li>Procesar y completar transacciones, y enviar información relacionada con dichas transacciones</li>
        <li>Enviar comunicaciones, incluyendo confirmaciones de pedidos, actualizaciones, alertas de seguridad, y mensajes de soporte y administrativos</li>
        <li>Responder a tus comentarios, preguntas y proporcionar servicio al cliente</li>
        <li>Analizar y comprender cómo nuestros usuarios interactúan con nuestro sitio web y servicios para mejorar y optimizar la experiencia del usuario</li>
        <li>Desarrollar nuevos productos, servicios, características y funcionalidades</li>
        <li>Enviar boletines, promociones y ofertas especiales sobre nuestros productos y servicios (puedes optar por no recibir estas comunicaciones en cualquier momento)</li>
        <li>Cumplir con nuestras obligaciones legales y resolver cualquier disputa que podamos tener</li>
      </ul>

      <h4>3. Compartir Información</h4>
      <p>SportMart no vende ni alquila tu información personal a terceros. Podemos compartir tu información en las siguientes circunstancias:</p>
      <p><strong>3.1 Con Proveedores de Servicios</strong><br>
        Compartimos información con proveedores de servicios que realizan funciones en nuestro nombre, como procesamiento de pagos, análisis de datos, envío de correos electrónicos, servicios de alojamiento y atención al cliente. Estos proveedores de servicios solo tienen acceso a la información necesaria para realizar sus funciones y están obligados a mantener la confidencialidad de tu información.</p>

      <p><strong>3.2 Con Socios Comerciales</strong><br>
        Podemos compartir información con socios comerciales para ofrecer productos o servicios que pueden interesarte. Estos socios están obligados a utilizar la información solo para los fines específicos para los cuales se les proporciona.</p>

      <p><strong>3.3 Por Requisitos Legales</strong><br>
        Podemos divulgar tu información si estamos obligados a hacerlo por ley o en respuesta a una solicitud válida de una autoridad pública (como una orden judicial, citación u otro proceso legal).</p>

      <p><strong>3.4 Para Proteger Nuestros Derechos</strong><br>
        Podemos divulgar tu información cuando creemos que es necesario para investigar, prevenir o tomar medidas con respecto a actividades ilegales, sospecha de fraude, situaciones que impliquen amenazas potenciales a la seguridad de cualquier persona, violaciones de nuestros términos de uso, o como prueba en litigios en los que estamos involucrados.</p>

      <h4>4. Seguridad de la Información</h4>
      <p>SportMart implementa medidas de seguridad razonables para proteger tu información personal contra pérdida, uso indebido, acceso no autorizado, divulgación, alteración y destrucción. Utilizamos tecnologías estándar de la industria, como el cifrado SSL, para proteger tus datos durante la transmisión. Sin embargo, ninguna transmisión de datos por Internet o sistema de almacenamiento es completamente seguro, y no podemos garantizar la seguridad absoluta de tu información.</p>

      <h4>5. Tus Derechos y Opciones</h4>
      <p>Tienes ciertos derechos con respecto a tu información personal, que incluyen:</p>
      <ul>
        <li>Acceder, corregir o eliminar tu información personal</li>
        <li>Oponerte al procesamiento de tu información personal</li>
        <li>Solicitar la restricción del procesamiento de tu información personal</li>
        <li>Solicitar la portabilidad de tu información personal</li>
        <li>Optar por no recibir comunicaciones promocionales</li>
      </ul>
      <p>Para ejercer estos derechos, por favor contáctanos utilizando la información de contacto proporcionada en la sección "Contacto" a continuación.</p>

      <h4>6. Cambios a Esta Política de Privacidad</h4>
      <p>SportMart puede actualizar esta Política de Privacidad de vez en cuando. Publicaremos cualquier cambio en esta página y actualizaremos la fecha de "Última actualización" en la parte superior de esta política. Te recomendamos que revises esta Política de Privacidad periódicamente para estar informado sobre cómo protegemos tu información.</p>

      <h4>7. Contacto</h4>
      <p>Si tienes alguna pregunta o inquietud sobre esta Política de Privacidad o nuestras prácticas de privacidad, por favor contáctanos a través de:</p>
      <ul>
        <li>Email: privacidad@sportmart.com</li>
        <li>Teléfono: +34 123 456 789</li>
        <li>Dirección: Calle Falsa 123, Ciudad, País</li>
      </ul>
    </div>
  </div>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>Company</h4>
          <ul>
            <li><a href="aboutus.php">Sobre Nosotros</a></li>
            <li><a href="privacidad.php">Politicas</a></li>
            <li><a href="tallas.php">Tallas</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Get Help</h4>
          <ul>
            <li><a href="faqs.php">Preguntas Frequentes</a></li>
            <li><a href="PagosInfo.php">Métodos de Pago</a></li>
            <li><a href="PagosYDevoluciones.php">Devoluciones</a></li>
            <li><a href="contacto.php">Contacto</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Online Shop</h4>
          <ul>
            <li><a href="home_gym.php">Menu Gimnasio</a></li>
            <li><a href="home_boxeo.php">Menu Boxeo</a></li>
            <li><a href="home_running.php">Menu Correr</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Follow Us</h4>
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
    <p>¿No tienes cuenta? <a href="" id="registrate" class="a2">¡Regístrate!</a></p>
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
    <p>¿Tienes cuenta? <a href="" id="acceder-login" class="a2">¡Accede!</a></p>
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
</body>

</html>