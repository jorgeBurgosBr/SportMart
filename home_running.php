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
  <link rel="icon" href="img/fav.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/style_running.css" />
  <link rel="stylesheet" href="style/lightslider.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
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
  <script src="js/libreria/jquery.js"></script>
  <script src="js/libreria/lightslider.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>SportMart</title>
  <style>
    .popup-regis.active2,
    .popup.activa {
      top: 14%;
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }

    @media screen and (max-width: 480px) {
      .popup-regis.active2 {
        top: 12%;
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


  <!-- CONTENIDO -->
  <section class="banner-ppal"><img src="img/banner_newbalance.jpg" alt="" /></section>
  <h1 class="tutulo-centrado">Tenemos todo lo que necesitas</h2>
    <div class="scroll imgBox" style="--time: 40s">
      <div class="content_scrolling">
        <img src="img/logo_nike.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_new_balance.png" class="event_start" alt="" />

        <img src="img/logo_hoka.png" class="event_start" alt="" />

        <img src="img/logo_salomon.png" class="event_start" alt="" />

        <img src="img/logo_asics.png" class="event_start" alt="" />

        <img src="img/logo_nike.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_new_balance.png" class="event_start" alt="" />

        <img src="img/logo_hoka.png" class="event_start" alt="" />

        <img src="img/logo_salomon.png" class="event_start" alt="" />

        <img src="img/logo_asics.png" class="event_start" alt="" />
        <img src="img/logo_nike.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_new_balance.png" class="event_start" alt="" />

        <img src="img/logo_hoka.png" class="event_start" alt="" />

        <img src="img/logo_salomon.png" class="event_start" alt="" />

        <img src="img/logo_asics.png" class="event_start" alt="" />
      </div>
      <div class="content_scrolling">
        <img src="img/logo_nike.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_new_balance.png" class="event_start" alt="" />

        <img src="img/logo_hoka.png" class="event_start" alt="" />

        <img src="img/logo_salomon.png" class="event_start" alt="" />

        <img src="img/logo_asics.png" class="event_start" alt="" />

        <img src="img/logo_nike.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_new_balance.png" class="event_start" alt="" />

        <img src="img/logo_hoka.png" class="event_start" alt="" />

        <img src="img/logo_salomon.png" class="event_start" alt="" />

        <img src="img/logo_asics.png" class="event_start" alt="" />
        <img src="img/logo_nike.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_new_balance.png" class="event_start" alt="" />

        <img src="img/logo_hoka.png" class="event_start" alt="" />

        <img src="img/logo_salomon.png" class="event_start" alt="" />

        <img src="img/logo_asics.png" class="event_start" alt="" />
      </div>
    </div>
    <h2 class="h2">¿Qué te interesa?</h2>
    <div class="clothes-shoes-accessories">
      <a href="productos.php?categoria=Ropa&deporte=Running">
        <div class="clothes">
          <img src="img/clothes.png" alt="Running clothes" />
          <div class="sub-contenedor">
            <h4 class="sub-titulo">Ropa</h4>
          </div>
      </a>
    </div>
    <div class="shoes">
      <a href="productos.php?categoria=Calzado&deporte=Running">
        <img src="img/running_shoes.png" alt="Running shoes" />
        <div class="sub-contenedor">
          <h4 class="sub-titulo">Zapatillas</h4>
        </div>
      </a>
    </div>
    <div class="accessories">
      <a href="productos.php?categoria=Accesorios&deporte=Running">
        <img src="img/accessories.png" alt="Running accessories" />
        <div class="sub-contenedor">
          <h4 class="sub-titulo">Accesorios</h4>
        </div>
      </a>
    </div>
    </div>
    <h2 class="h2">Lo más vendido</h2>
    <div class="slider">
      <ul id="autoWidth" class="cs-hidden">
        <li class="item-a">
          <div class="box">
            <div class="slide-img">
              <img src="img/ropa/camiseta_adidas.webp" alt="Camiseta Adidas" />
              <div class="overlay">
                <a href="#" class="buy-btn" data-id="10">Comprar</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Camiseta Adidas</a>
                <span>Camiseta ligera y transpirable para correr</span>
              </div>
              <a href="#" class="price">29.99€</a>
            </div>
          </div>
        </li>
        <li class="item-b">
          <div class="box">
            <div class="slide-img">
              <img src="img/accesorios/reloj_garmin.webp" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn" data-id="13">Comprar</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Garmin Forerunner 955</a>
                <span>Reloj inteligente premium para carrera</span>
              </div>
              <a href="#" class="price">499.99€</a>
            </div>
          </div>
        </li>
        <li class="item-c">
          <div class="box">
            <div class="slide-img">
              <img src="img/calzado/zapatillas_asics.webp" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn" data-id="14">Comprar</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Asics Gel-Cumulus 26</a>
                <span>Comodidad y rendimiento en cada paso</span>
              </div>
              <a href="#" class="price">128.99€</a>
            </div>
          </div>
        </li>
        <li class="item-d">
          <div class="box">
            <div class="slide-img">
              <img src="img/accesorios/gafas_oakley.webp" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn" data-id="15">Comprar</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Gafas Oakley Radar</a>
                <span>Gafas polarizadas especiales para running</span>
              </div>
              <a href="#" class="price">205.99€</a>
            </div>
          </div>
        </li>
        <li class="item-e">
          <div class="box">
            <div class="slide-img">
              <img src="img/ropa/leggins_nike.webp" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn" data-id="16">Comprar</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Leggins Nike</a>
                <span>Leggings ajustados para entrenamiento</span>
              </div>
              <a href="#" class="price">39.99€</a>
            </div>
          </div>
        </li>
        <li class="item-f">
          <div class="box">
            <div class="slide-img">
              <img src="img/ropa/camiseta_hoka.webp" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn" data-id="17">Comprar</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Camiseta Hoka</a>
                <span>Camiseta 100% algodón</span>
              </div>
              <a href="#" class="price">32.99€</a>
            </div>
          </div>
        </li>
        <li class="item-g">
          <div class="box">
            <div class="slide-img">
              <img src="img/calzado/zapatillas_newbalance.webp" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn" data-id="18">Comprar</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">New Balance Fresh Foam X</a>
                <span>Nueva tecnología incorporada</span>
              </div>
              <a href="#" class="price">119.95$</a>
            </div>
          </div>
        </li>
      </ul>
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
    <script src="js/script_running.js"></script>
    <script src="js/script_carrito.js"></script>
    <script src="js/script_redirect_slider.js"></script>

</body>

</html>