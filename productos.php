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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS -->
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/style_running.css" />
  <link rel="stylesheet" href="style/lightslider.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <link rel="stylesheet" href="style/footer.css">
  <script src="js/libreria/jquery.js"></script>
  <script src="js/libreria/lightslider.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
  <!-- HEADER -->
  <header>
    <button id="show-help">Ayuda</button>
    <button id="show-login" <?php echo isset($_SESSION['nombre']) ? 'disabled' : ''; ?> class="<?php echo isset($_SESSION['nombre']) ? 'disabled-button' : ''; ?>"><?php echo $textoBotonLogin; ?></button>
    <button id="show-regis" class="bttn-regis"><?php echo $textoBotonRegistrarse; ?></button>
    <button class="bttn-flag">ES <img src="img/espana.png" alt=""></button>
  </header>
  <nav class="navbar">
    <div class="container-nav">
      <div class="logo-nav">
        <img src="img/sportmart.png" alt="" />
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
  <!-- Shop -->
  <section class="shop container">
    <h2 class="section-title">Shop Products</h2>
    <!-- Content -->
    <div class="shop-content">
      <!-- Box 1 -->
      <div class="product-box">
        <img src="img/logo_nike.jpg" alt="" class="product-img" />
        <h2 class="product-title">Aeroready shirt</h2>
        <span class="price">25$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- Box 2 -->
      <div class="product-box">
        <img src="img/logo_salomon.png" alt="" class="product-img" />
        <h2 class="product-title">Wireless earbuds</h2>
        <span class="price">45$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- Box 3 -->
      <div class="product-box">
        <img src="img/logo_nike.png" alt="" class="product-img" />
        <h2 class="product-title">hooded parka</h2>
        <span class="price">95$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- Box 4 -->
      <div class="product-box">
        <img src="img/logo_hoka.png" alt="" class="product-img" />
        <h2 class="product-title">straw metal bottle</h2>
        <span class="price">27$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- Box 5 -->
      <div class="product-box">
        <img src="img/logo_adidas.png" alt="" class="product-img" />
        <h2 class="product-title">Silver metal</h2>
        <span class="price">15$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- Box 6 -->
      <div class="product-box">
        <img src="img/logo_asics.png" alt="" class="product-img" />
        <h2 class="product-title">back hat</h2>
        <span class="price">55$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- Box 7 -->
      <div class="product-box">
        <img src="img/logo_hoka.png" alt="" class="product-img" />
        <h2 class="product-title">Backpack</h2>
        <span class="price">75$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
      <!-- Box 8 -->
      <div class="product-box">
        <img src="img/logo_new_balance.png" alt="" class="product-img" />
        <h2 class="product-title">ultraboost 22</h2>
        <span class="price">205$</span>
        <i class="bx bx-shopping-bag add-cart"></i>
      </div>
    </div>
  </section>
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
  <script src="js/script_running.js"></script>
  <script src="js/script_carrito.js"></script>
</body>

</html>