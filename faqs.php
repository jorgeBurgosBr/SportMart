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

  
<link rel="stylesheet" href="style/faqs.css" />
<link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/style_carrito.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>SportMart</title>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: 'es',
                includedLanguages: 'en,es,pt',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            },
            'google_translate_element');
    }
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
    <button id="show-login" <?php echo isset($_SESSION['nombre']) ? 'disabled' : ''; ?> class="<?php echo isset($_SESSION['nombre']) ? 'disabled-button' : ''; ?>"><?php echo $textoBotonLogin; ?></button>
    <button id="show-regis" class="bttn-regis"><?php echo $textoBotonRegistrarse; ?></button>
<div id="google_translate_element"></div>
  </header>
  <nav class="navbar">
    <div class="container-nav">
      <div class="logo-nav">
        <a href="#">
        <img src="img/sportmart.png" alt="" />
        </a>
      </div>
      <div class="menu-toggle">
        <i class="ri-menu-line"></i>
      </div>
      <div class="drop-menu">
        <div class="menu-ppal">
          <a class="nav-button" href="index.php">Novedades</a>
          <a class="nav-button" href="home_running.php">Running</a>
          <a class="nav-button" href="home_gym.php">Gimnasio</a>
          <a class="nav-button" href="home_boxeo.php">Boxeo/MMA</a>
        </div>
        <div class="drop-content">
          <div class="row">
            <div class="column">
              <h3>Últimas novedades</h3>
              <a class="nav-button" href="">Zapatillas</a>
              <a class="nav-button" href="">Camisetas</a>
              <a class="nav-button" href="">Accesorios</a>
            </div>
            <div class="column">
              <h3>Suplementación</h3>
              <a class="nav-button" href="">Pre-entreno</a>
              <a class="nav-button" href="">Post-entreno</a>
              <a class="nav-button" href="">Barritas energéticas</a>
            </div>
            <div class="column">
              <h3>Artes marciales</h3>
              <a class="nav-button" href="">Guantes</a>
              <a class="nav-button" href="">Bucales</a>
              <a class="nav-button" href="">Accesorios</a>
            </div>
          </div>
        </div>
      </div>
      <div class="search-nav">
        <input type="search" name="search" id="" placeholder="Buscar" autocomplete="off" />
        <i class="ri-search-line"></i>
        <button class="btn-nav"><i class="ri-heart-line"></i></button>
        <button class="btn-nav" id="cart-icon"><i class="ri-shopping-cart-line"></i></button>
        <!-- Cart Icon -->
        <!-- Cart -->
        <div class="cart">
          <h2 class="cart-title">Your Cart</h2>
          <!-- Content -->
          <div class="cart-content"></div>
          <!-- Total -->
          <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">$0</div>
          </div>
          <!-- Buy Bottom -->
          <button type="button" class="btn-buy">Buy Now</button>
          <!-- Cart close -->
          <i class="bx bx-x" id="close-cart"></i>
        </div>
      </div>
    </div>
  </nav>
  <style>
    #enlace{
      text-decoration: none;
      color:blue;
    }
    </style>
<div class="faq-header">FAQS</div>

<div class="faq-content">
  <div class="faq-question">
    <input id="q1" type="checkbox" class="panel">
    <div class="plus">+</div>
    <label for="q1" class="panel-title">¿Cuál es la política de devolución de productos en la tienda?</label>
    <div class="panel-content">Nuestra política de devolución permite devoluciones dentro de los 30 días posteriores a la compra, siempre y cuando los productos estén en su estado original y con el comprobante de compra.  </div> 
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
        <input required name="telefono" id="telefono-signup" type="text" maxlength="9">
        <label>Teléfono</label>
        <span id="error-telefono-signup"></span>
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
        <h4>Company</h4>
        <ul>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="privacidad.php">Privacy Policy</a></li>
          <li><a href="tallas.php">Tallas</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Get Help</h4>
        <ul>
          <li><a href="faqs.php">FAQ</a></li>
          <li><a href="PagosInfo.php">Métodos de Pago</a></li>
          <li><a href="PagosYDevoluciones.php">Devoluciones</a></li>
          <li><a href="contacto.php">Contacto</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Online Shop</h4>
        <ul>
          <li><a href="home_gym.php">Menu Gym</a></li>
          <li><a href="home_boxeo.php">Menu Running</a></li>
          <li><a href="home_running.php">Menu Fighting</a></li>
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
<script src="js/script_home.js"></script>
</body>

</html>