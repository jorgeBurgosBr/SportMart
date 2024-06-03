<?php
require_once 'php/bbdd.php';
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
   <link rel="stylesheet" href="style/style_perfil.css">
   <link rel="stylesheet" href="style/style_carrito.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css">
   <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
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
   <title>SportMart</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
            <img src="img/sportmart.png" alt="" />
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
   <section class="content-ppal">
      <div class="profile-container">
         <div class="profile-photo-container">
            <div class="profile-info">
               <div class="info-user">
                  <span id="user-name"></span>
                  <span id="user-mail"></span>
                  <span id="miembro">Miembro desde: </span>
               </div>
            </div>
         </div>

         <div class="form-container">
            <form method="post" id="user-form-info">
               <h1>INFORMACIÓN</h1>
               <hr>
               <div class="first-column-form">
                  <div class="column-container">
                     <label id="lbl-birthdate" for="birthdate">Fecha de nacimiento:</label>
                     <input type="date" name="fecha_nac_cliente" id="birthdate" pattern="\d{2}/\d{2}/\d{4}" required>
                  </div>

                  <div class="second-column-form">
                     <div class="column-container-2">
                        <label for="telefono">Teléfono:</label>
                        <input id="user-telefono" name="telefono" placeholder="Introduce tu teléfono" pattern="\d{9}" maxlength="9" required></input>
                     </div>

                     <div class="column-container-2">
                        <label for="provincia">Provincia:</label>
                        <select id="provincia" name="provincia" placeholder="Introduce tu provincia" required>
                           <option value="">Selecciona tu provincia</option>
                           <?php foreach ($provincias_espana as $provincia) { ?>
                              <option value="<?php echo $provincia; ?>"><?php echo $provincia; ?></option>
                           <?php } ?>
                        </select>
                     </div>


                     <div class="column-container-2">
                        <label for="localidad">Localidad:</label>
                        <input id="localidad" name="localidad" placeholder="Introduce tu localidad" required></input>
                     </div>

                     <div class="column-container-2">
                        <label for="envio">Dirección de envío:</label>
                        <input id="envio" name="direccion_envio" placeholder="Introduce tu dirección de envío" required></input>
                     </div>

                     <div class="column-container-2">
                        <label for="codigo_postal">Código postal:</label>
                        <input id="codigo_postal" name="codigo_postal" pattern="\d{5}" maxlength="5" placeholder="Introduce tu código postal" required></input>
                     </div>
                  </div>

                  <div class="button-container">
                     <button type="button" class="bttn-titulo" onclick="actualizarInformacion()">Actualizar</button>
                  </div>
            </form>
         </div>
      </div>
   </section>

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
                  <li><a href="home_boxeo.php">Menu Fighting</a></li>
                  <li><a href="home_running.php">Menu Runinng</a></li>
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
   <script src="js/script_home.js"></script>
   <script src="js/script_carrito.js"></script>
   <script src="js/script_perfil.js"></script>
</body>

</html>