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
      <div class="form">
         <h2>Inicia sesión</h2>
         <div class="form-element">
            <label for="email">Email</label>
            <input type="text" id="email" placeholder="Introduce el email">
         </div>
         <div class="form-element">
            <label for="password">Contraseña</label>
            <input placeholder="Introduce contraseña" id="password" name="password" type="password">
         </div>
         <div class="form-element">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Recuérdame</label>
         </div>
         <div class="form-element">
            <button>Sign In</button>
         </div>
         <div class="form-element">
            <a href="#">Olvidaste tu contraseña?</a>
         </div>
      </div>
   </div>

    <!-- ------------------------ REGISTRO ------------------------ -->
   <div class="popup-regis">
      <div class="close-btn"><i class="ri-close-circle-fill"></i></div>
      <form class="form" id="form-signup" action="" method="">
         <h2>Regístrate</h2>
         <div class="form-element">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre" required>
         </div>
         <div class="form-element">
            <label for="nombre">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Introduce tus apellidos" required>
         </div>
         <div class="form-element">
            <label for="nombre">Teléfono</label>
            <input type="text" name="telefono" id="telefono" placeholder="Introduce tu teléfono" required>
         </div>
         <div class="form-element">
            <label for="email-registro">Email</label>
            <input type="text" name="email" id="email-registro" placeholder="Introduce el email" required>
         </div>
         <div class="form-element">
            <label for="password-registro">Contraseña</label>
            <input placeholder="Introduce contraseña" id="password-registro" name="password" type="password" required>
         </div>
         <div class="form-element">
            <button type="submit" id="signup-submit">Sign Up</button>
         </div>
         <div class="form-element">
            <a href="#">Ya tienes cuenta?</a>
         </div>
      </form>
      </div>
   </div>

   <div class="popup-message">
  <div class="popup-content">
    <span class="close-popup-message">&times;</span>
    <p id="popup-text">This is a pop-up message!</p>
  </div>
</div>

   <script src="js/script.js"></script>
   <script src="js/script_regist.js"></script>
   <script src="js/script_login.js"></script>
</body>
</html>