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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarjeta de Producto</title>
  <link rel="icon" href="img/fav.ico" type="image/x-icon">

  <link rel="stylesheet" href="style/faqs.css" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>SportMart</title>
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
  <style>
    #enlace {
      text-decoration: none;
      color: blue;
    }
  </style>
  <div class="faq-header">FAQS</div>

  <div class="faq-content">
    <div class="faq-question">
      <input id="q1" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q1" class="panel-title">¿Cuál es la política de devolución de productos en la tienda?</label>
      <div class="panel-content">Nuestra política de devolución permite devoluciones dentro de los 30 días posteriores a la compra, siempre y cuando los productos estén en su estado original y con el comprobante de compra. </div>
    </div>

    <div class="faq-question">
      <input id="q2" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q2" class="panel-title">¿Ofrecen envíos internacionales?</label>
      <div class="panel-content">Sí, ofrecemos envíos internacionales a la mayoría de los países. Puedes verificar la disponibilidad al momento de realizar la compra.</div>
    </div>

    <div class="faq-question">
      <input id="q3" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q3" class="panel-title">¿Cómo puedo encontrar el tamaño adecuado para mis prendas?</label>
      <div class="panel-content">Consulta nuestra guía de tallas en línea para ayudarte a encontrar el tamaño adecuado. También puedes visitar una de nuestras tiendas físicas para probarte diferentes modelos</div>
    </div>

    <div class="faq-question">
      <input id="q4" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q4" class="panel-title">¿Qué tipo de garantía ofrecen en sus productos?</label>
      <div class="panel-content">Garantizamos la calidad de nuestros productos. Si experimentas algún problema de fabricación, contáctanos y estaremos encantados de ayudarte.</div>
    </div>

    <div class="faq-question">
      <input id="q5" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q5" class="panel-title">¿Cuál es la política de privacidad de la tienda en línea?</label>
      <div class="panel-content">Nuestra política de privacidad detalla cómo recopilamos, utilizamos y protegemos tu información personal. Puedes encontrar más detalles en nuestro sitio web.</div>
    </div>

    <div class="faq-question">
      <input id="q6" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q6" class="panel-title">¿Ofrecen descuentos para estudiantes o miembros del ejército?</label>
      <div class="panel-content">Sí, ofrecemos descuentos especiales para estudiantes y miembros del ejército. Verifica tu elegibilidad durante el proceso de compra.</div>
    </div>

    <div class="faq-question">
      <input id="q7" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q7" class="panel-title">¿Qué medidas toman para garantizar la seguridad de mis datos de pago en línea?</label>
      <div class="panel-content">Utilizamos tecnologías de encriptación y cumplimos con los estándares de seguridad de la industria para proteger tus datos de pago</div>
    </div>

    <div class="faq-question">
      <input id="q8" type="checkbox" class="panel">
      <div class="plus">+</div>
      <label for="q8" class="panel-title">¿Puedo realizar cambios en mi pedido después de haberlo realizado?</label>
      <div class="panel-content">Si tu pedido aún no ha sido procesado, es posible que podamos realizar cambios. Por favor, contáctanos lo antes posible para solicitar modificaciones.</div>
    </div>
  </div>

  <br><br>


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
          <a href="https://www.facebook.com/profile.php?id=100077577033519&sk=about"><i class="fab fa-facebook-f"></i></a>
            <a href="https://x.com/sportmart_"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com/sportmart_1/"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCX9w8xxngL792wvKzj9WxTw"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div id="address-popup" class="popup">
    <div class="popup-content">
      <p>Tienes que rellenar la dirección de tu perfil</p>
      <div class="contenedor">
        <button id="popup-cancel">Cancelar</button>
        <button id="popup-accept">Aceptar</button>
      </div>
    </div>
  </div>
  <div id="customer-info" data-id-cliente="<?php echo isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : ''; ?>"></div>
  <script src="js/script_home.js"></script>
</body>

</html>