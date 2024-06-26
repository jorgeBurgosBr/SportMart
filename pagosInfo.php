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
  <link rel="stylesheet" href="style/PagosYDevoluciones.css" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>SportMart</title>
  <link rel="icon" href="img/fav.ico" type="image/x-icon">
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
        .popup.activa, .popup-regis.active2 {
      top: 22%;
    }
    @media screen and (max-width: 480px) {
      .popup.activa, .popup-regis.active2 {
      top: 15%;
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

  <div class="contenedor">
    <div class="titulo">Pagos Seguros y Confiables</div>
    <div class="texto">
      ¡Bienvenido a nuestra tienda online! En SportMart, nos enorgullecemos de ofrecerte la mejor experiencia de compra posible, y eso incluye garantizar la seguridad de tus pagos en línea.
      <br><br>
      Queremos que compres con total tranquilidad, por lo que hemos implementado las últimas tecnologías de seguridad para proteger tus transacciones. Utilizamos un avanzado sistema de encriptación SSL (Secure Sockets Layer) para asegurar que tus datos personales y financieros estén protegidos en todo momento. Puedes estar seguro de que tus información está segura con nosotros.
      <br><br>
      Además, para brindarte aún más opciones y comodidad al pagar, hemos incorporado varias opciones de pago seguras y confiables. Entre ellas se incluyen:
      <br><br>
      <strong>PayPal:</strong> PayPal es una de las plataformas de pago más reconocidas y seguras del mundo. Con PayPal, puedes realizar tus compras con solo unos pocos clics, sin tener que ingresar tus detalles financieros en nuestro sitio web. PayPal protege tus datos y procesa tus pagos de manera segura, para que puedas comprar con total confianza.
      <br><br>
      <strong>Pago por tarjeta:</strong> Además de PayPal, también puedes optar por pagar directamente con tarjeta de crédito o débito. Utilizamos el mismo método de tarjeta de crédito utilizado por PayPal, que está protegido por las más estrictas medidas de seguridad, garantizando que tus datos estén siempre seguros y protegidos.
      <br><br>
      En SportMart, tu seguridad es nuestra prioridad número uno. Puedes confiar en nosotros para brindarte una experiencia de compra en línea segura y sin preocupaciones. ¡Explora nuestra amplia selección de productos y realiza tu compra hoy mismo con total confianza!
    </div>


    <div class="imagenes">
      <div class="imagen">
        <img src="https://images.pexels.com/photos/50987/money-card-business-credit-card-50987.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen 1">
      </div>
      <div class="imagen">
        <img src="https://images.pexels.com/photos/5437587/pexels-photo-5437587.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen 2">
      </div>
      <div class="imagen">
        <img src="https://images.pexels.com/photos/6347707/pexels-photo-6347707.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Imagen 3">
      </div>
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
  <script src="js/script_carrito.js"></script>
  <script src="js/script_running.js"></script>
</body>

</html>