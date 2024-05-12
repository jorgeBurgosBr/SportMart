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
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/style_boxeo.css">
  <link rel="stylesheet" href="style/lightslider.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="js/libreria/jquery.js"></script>
  <script src="js/libreria/lightslider.js"></script>
  <title>SportMart</title>
</head>

<body>
  <header>
    <button id="show-help">Ayuda</button>
    <button id="show-login" <?php echo isset($_SESSION['nombre']) ? 'disabled' : ''; ?> class="<?php echo isset($_SESSION['nombre']) ? 'disabled-button' : ''; ?>"><?php echo $textoBotonLogin; ?></button>
    <button id="show-regis" class="bttn-regis"><?php echo $textoBotonRegistrarse; ?></button>
    <button class="bttn-flag">ES <img src="img/espana.png" alt=""></button>
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
          <a class="nav-button" href="">Gimnasio</a>
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

  <!-- CONTENIDO -->
  <section class="banner-ppal"><img src="img/boxeo.jpeg" alt="" /></section>
  <h1 class="tutulo-centrado">Las mejores marcas a tu disposición</h1>
  <div class="scroll imgBox" style="--time: 40s">
      <div class="content_scrolling">
        <img src="img/logo_everlas.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_venum.png" class="event_start" alt="" />

        <img src="img/logo_cleto.png" class="event_start" alt="" />

        <img src="img/logo_badboy.png" class="event_start" alt="" />

        <img src="img/logo_ufc.png" class="event_start" alt="" />

        <img src="img/logo_everlas.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />
        
        <img src="img/logo_venum.png" class="event_start" alt="" />

        <img src="img/logo_cleto.png" class="event_start" alt="" />

        <img src="img/logo_badboy.png" class="event_start" alt="" />

        <img src="img/logo_ufc.png" class="event_start" alt="" />

        <img src="img/logo_everlas.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_venum.png" class="event_start" alt="" />

        <img src="img/logo_cleto.png" class="event_start" alt="" />

        <img src="img/logo_badboy.png" class="event_start" alt="" />

        <img src="img/logo_ufc.png" class="event_start" alt="" />
      </div>
      <div class="content_scrolling">
      <img src="img/logo_everlas.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_venum.png" class="event_start" alt="" />

        <img src="img/logo_cleto.png" class="event_start" alt="" />

        <img src="img/logo_badboy.png" class="event_start" alt="" />

        <img src="img/logo_ufc.png" class="event_start" alt="" />

        <img src="img/logo_everlas.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_venum.png" class="event_start" alt="" />

        <img src="img/logo_cleto.png" class="event_start" alt="" />

        <img src="img/logo_badboy.png" class="event_start" alt="" />

        <img src="img/logo_ufc.png" class="event_start" alt="" />

        <img src="img/logo_everlas.png" class="event_start" alt="" />

        <img src="img/logo_adidas.png" class="event_start" alt="" />

        <img src="img/logo_venum.png" class="event_start" alt="" />

        <img src="img/logo_cleto.png" class="event_start" alt="" />

        <img src="img/logo_badboy.png" class="event_start" alt="" />

        <img src="img/logo_ufc.png" class="event_start" alt="" />
      </div>
    </div>
    </div>
  <h2 class="h2">¿Qué te interesa?</h2>
  <div class="clothes-shoes-accessories">
  <div class="clothes">
    <a href="#">
      <img src="img/guantes.jpg" alt="Guantes boxeo" />
      <div class="sub-contenedor">
        <h4 class="sub-titulo">Guantes</h4>
      </div>
    </a>
  </div>
  <div class="shoes">
    <a href="#">
      <img src="img/ropa-mma.jpg" alt="Ropa MMA" />
      <div class="sub-contenedor">
        <h4 class="sub-titulo">Ropa deportiva</h4>
      </div>
    </a>
  </div>
  <div class="accessories">
    <a href="#">
      <img src="img/accesorios-mma.jpg" alt="Accesorios MMA" />
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
              <img src="img/track.png" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn">Buy Now</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Chaqueta negra</a>
                <span>New arrival</span>
              </div>
              <a href="#" class="price">23$</a>
            </div>
          </div>
        </li>
        <li class="item-b">
          <div class="box">
            <div class="slide-img">
              <img src="img/running_shoes.png" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn">Buy Now</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Chaqueta negra</a>
                <span>New arrival</span>
              </div>
              <a href="#" class="price">23$</a>
            </div>
          </div>
        </li>
        <li class="item-c">
          <div class="box">
            <div class="slide-img">
              <img src="img/running_shoes.png" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn">Buy Now</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Chaqueta negra</a>
                <span>New arrival</span>
              </div>
              <a href="#" class="price">23$</a>
            </div>
          </div>
        </li>
        <li class="item-d">
          <div class="box">
            <div class="slide-img">
              <img src="img/running_shoes.png" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn">Buy Now</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Chaqueta negra</a>
                <span>New arrival</span>
              </div>
              <a href="#" class="price">23$</a>
            </div>
          </div>
        </li>
        <li class="item-e">
          <div class="box">
            <div class="slide-img">
              <img src="img/running_shoes.png" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn">Buy Now</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Chaqueta negra</a>
                <span>New arrival</span>
              </div>
              <a href="#" class="price">23$</a>
            </div>
          </div>
        </li>
        <li class="item-f">
          <div class="box">
            <div class="slide-img">
              <img src="img/running_shoes.png" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn">Buy Now</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Chaqueta negra</a>
                <span>New arrival</span>
              </div>
              <a href="#" class="price">23$</a>
            </div>
          </div>
        </li>
        <li class="item-g">
          <div class="box">
            <div class="slide-img">
              <img src="img/running_shoes.png" alt="" />
              <div class="overlay">
                <a href="#" class="buy-btn">Buy Now</a>
              </div>
            </div>
            <div class="detail-box">
              <div class="type">
                <a href="#">Chaqueta negra</a>
                <span>New arrival</span>
              </div>
              <a href="#" class="price">23$</a>
            </div>
          </div>
        </li>
      </ul>
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
  <script src="js/script_home.js"></script>
  <script src="js/script_carrito.js"></script>
</body>

</html>