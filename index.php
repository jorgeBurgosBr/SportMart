<?php
require_once 'php/bbdd.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style/style.css" class="css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
   <title>SportMart</title>
</head>
<body>
   <header>
         <button>Ayuda</button>
         <button id="show-login">Inicia sesión</button>
         <button id="show-regis" class="bttn-regis">Regístrate</button>
         <button class="bttn-flag">ES <img src="img/espana.png" alt=""></button>
   </header>
   <nav class="navbar">
      <div class="container-nav">
        <div class="logo-nav">
          <img src="img/logo.png" alt="" />
        </div>
        <div class="drop-menu">
         <div class="menu-ppal">
            <a href="index.html">Novedades</a>
            <a href="home_running.html">Running</a>
            <a href="">Gimnasio</a>
            <a href="">Boxeo/MMA</a>
         </div>
          <div class="drop-content">
            <div class="row">
              <div class="column">
                <h3>Últimas novedades</h3>
                <a href="">Zapatillas</a>
                <a href="">Camisetas</a>
                <a href="">Accesorios</a>
              </div>
              <div class="column">
                <h3>Suplementación</h3>
                <a href="">Pre-entreno</a>
                <a href="">Post-entreno</a>
                <a href="">Barritas energéticas</a>
              </div>
              <div class="column">
                <h3>Artes marciales</h3>
                <a href="">Guantes</a>
                <a href="">Bucales</a>
                <a href="">Accesorios</a>
              </div>
            </div>
          </div>
        </div>
        <div class="search-nav">
          <input type="search" name="search" id="" placeholder="Buscar" />
          <i class="ri-search-line"></i>
          <i class="ri-heart-line"></i>
          <i class="ri-shopping-cart-line"></i>
        </div>
      </div>
    </nav>

    <!-- CONTENIDO -->
    <section><img src="img/banner_newbalance.jpg" alt="" /></section>

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

   <script src="js/script.js"></script>
   <script src="js/script_home.js"></script>
</body>
</html>
