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
  <title>Blog Cards</title>
  <link rel="icon" href="img/fav.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <link rel="stylesheet" href="style/aboutUs.css" />
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








  <!-- HTML -->
  <div class="cont">
    <div class="blog-card">
      <div class="meta">
        <div class="photo" style="background-image: url(img/logoAbout.png)"></div>

        </li>
        </ul>
      </div>
      <div class="description">
        <h1>SportMart</h1>
        <h2>Empresa Deportiva </h2>
        <p> En SportMart, creemos que cada atleta merece lo mejor. Por eso, nos dedicamos a ofrecer ropa deportiva de alta calidad a precios inigualables. Nuestra misión es apoyar tu pasión por el deporte con productos que no solo mejoran tu rendimiento, sino que también te hacen sentir y lucir bien.</p>
        <p class="read-more">

        </p>
      </div>
    </div>
    <div class="blog-card alt">
      <div class="meta">
        <div class="photo" style="background-image: url(img/pablo.jpg)"></div>
        <ul class="details">
          <li class="author"><a href="#">Pablo</a></li>
          <li class="date">Madrid</li>
          <li class="tags">
            <ul>
              <li><a href="#">JS</a></li>
              <li><a href="#">PHP</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="description">
        <h1>Diseñador de la BD</h1>
        <h2>Pablo // Creador y cordinador de la BD</h2>
        <p>Pablo, un experto programador especializado en PHP y JavaScript, ha demostrado ser el mejor en la gestión de bases de datos. Su dominio en estas tecnologías le permite desarrollar soluciones robustas y eficientes para aplicaciones web, garantizando un rendimiento óptimo y una experiencia de usuario fluida.</p>

      </div>
    </div>
    <div class="blog-card">
      <div class="meta">
        <div class="photo" style="background-image: url(img/Jorge.jpg)"></div>
        <ul class="details">
          <li class="author"><a href="#">Jorge</a></li>
          <li class="date">Madrid</li>
          <li class="tags">
            <ul>
              <li><a href="#">JavaScript</a></li>
              <li><a href="#">Apis</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="description">
        <h1>Programador</h1>
        <h2>Jorge // Creador y Programador </h2>
        <p> Jorge, un talentoso programador especializado en JavaScript y APIs, ha desarrollado una web dedicada al deporte. Con su dominio en estas tecnologías, ha creado una plataforma eficiente y dinámica que ofrece una experiencia interactiva y personalizada para los aficionados deportivos.</p>
        <p class="read-more">

        </p>
      </div>
    </div>
    <div class="blog-card alt">
      <div class="meta">
        <div class="photo" style="background-image: url(img/josep.jpg)"></div>
        <ul class="details">
          <li class="author"><a href="#">Josep</a></li>
          <li class="date">Mallorca</li>
          <li class="tags">
            <ul>
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="description">
        <h1>Diseñador grafico</h1>
        <h2>Josep // Creador y Diseñador</h2>
        <p>Josep, un apasionado diseñador gráfico, ha asumido la emocionante tarea de dar vida a una web dedicada al mundo del deporte. Con su dominio de HTML, CSS y JavaScript, ha creado una experiencia visualmente atractiva y funcional para los amantes del deporte.</p>
        <p class="read-more">

        </p>
      </div>
    </div>

  </div>



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