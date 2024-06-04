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
    <link rel="stylesheet" href="style/style_carrito.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>SportMart</title>
    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
<style>
/* CSS */
/* PEN STYLES */
* {
  box-sizing: border-box;
}

body {
  overflow-y: auto; /* Permitir desplazamiento vertical cuando el contenido excede el tamaño de la pantalla */

}

.cont {
  background: #f1f1f1;
  display: flex;
  flex-direction: column;
  font-size: 1rem;
  justify-content: center;
  align-items: center;
  min-height: 100vh; /* Cambiado a min-height para ajustarse al tamaño de la pantalla */
}

.blog-card {
  display: flex;
  flex-direction: column;
  margin: 1rem auto;
  box-shadow: 0 3px 7px -1px rgba(0, 0, 0, .1);
  margin-bottom: 1.6%;
  background: #fff;
  line-height: 1.4;
  font-family: sans-serif;
  border-radius: 5px;
  overflow: hidden;
  z-index: 0;
}
.blog-card a {
  color: inherit;
}
.blog-card a:hover {
  color:  #0171e3;
}
.blog-card:hover .photo {
  transform: scale(1.3) rotate(3deg);
}
.blog-card .meta {
  position: relative;
  z-index: 0;
  height: 200px;
}
.blog-card .photo {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-size: cover;
  background-position: center;
  transition: transform .2s;
}
.blog-card .details,
.blog-card .details ul {
  margin: auto;
  padding: 0;
  list-style: none;
}
.blog-card .details {
  position: absolute;
  top: 0;
  bottom: 0;
  left: -100%;
  margin: auto;
  transition: left .2s;
  background: rgba(0, 0, 0, .6);
  color: #fff;
  padding: 10px;
  width: 100%;
  font-size: .9rem;
}
.blog-card .details a {
  text-decoration: dotted underline;
}
.blog-card .details ul li {
  display: inline-block;
}
.blog-card .details .author:before {
  font-family: FontAwesome;
  margin-right: 10px;
  content: "\f007";
}
.blog-card .details .date:before {
  font-family: FontAwesome;
  margin-right: 10px;
  content: "\f133";
}
.blog-card .details .tags ul:before {
  font-family: FontAwesome;
  content: "\f02b";
  margin-right: 10px;
}
.blog-card .details .tags li {
  margin-right: 2px;
}
.blog-card .details .tags li:first-child {
  margin-left: -4px;
}
.blog-card .description {
  padding: 1rem;
  background: #fff;
  position: relative;
  z-index: 1;
}
.blog-card .description h1,
.blog-card .description h2 {
  font-family: Poppins, sans-serif;
}
.blog-card .description h1 {
  line-height: 1;
  margin: 0;
  font-size: 1.7rem;
}
.blog-card .description h2 {
  font-size: 1rem;
  font-weight: 300;
  text-transform: uppercase;
  color: #a2a2a2;
  margin-top: 5px;
}
.blog-card .description .read-more {
  text-align: right;
}
.blog-card .description .read-more a {
  color:  #0171e3;
  display: inline-block;
  position: relative;
}
.blog-card .description .read-more a:after {
  content: "\f061";
  font-family: FontAwesome;
  margin-left: -10px;
  opacity: 0;
  vertical-align: middle;
  transition: margin .3s, opacity .3s;
}
.blog-card .description .read-more a:hover:after {
  margin-left: 5px;
  opacity: 1;
}
.blog-card p {
  position: relative;
  margin: 1rem 0 0;
}
.blog-card p:first-of-type {
  margin-top: 1.25rem;
}
.blog-card p:first-of-type:before {
  content: "";
  position: absolute;
  height: 5px;
  background:  #0171e3;
  width: 35px;
  top: -0.75rem;
  border-radius: 3px;
}
.blog-card:hover .details {
  left: 0%;
}

@media (min-width: 440px) {
  .blog-card {
    flex-direction: row;
    max-width: 700px;
  }
  .blog-card .meta {
    flex-basis: 40%;
    height: auto;
  }
  .blog-card .description {
    flex-basis: 60%;
  }
  .blog-card .description:before {
    transform: skewX(-3deg);
    content: "";
    background: #fff;
    width: 30px;
    position: absolute;
    left: -10px;
    top: 0;
    bottom: 0;
    z-index: -1;
  }
  .blog-card.alt {
    flex-direction: row-reverse;
  }
  .blog-card.alt .description:before {
    left: inherit;
    right: -10px;
    transform: skew(3deg);
  }
  .blog-card.alt .details {
    padding-left: 25px;
  }
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

*{
  margin:0;
  padding:0;
  box-sizing: border-box;
}
.container{
  max-width: 1170px;
  margin:auto;
}
.row{
  display: flex;
  flex-wrap: wrap;
}
ul{
  list-style: none;
}
.footer{
  background-color: #000000;
    padding: 70px 0;
    
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
  font-size: 18px;
  color: #ffffff;
  text-transform: capitalize;
  margin-bottom: 35px;
  font-weight: 500;
  position: relative;
}
.footer-col h4::before{
  content: '';
  position: absolute;
  left:0;
  bottom: -10px;
  background-color: #0171e3;
  height: 2px;
  box-sizing: border-box;
  width: 50px;
}
.footer-col ul li:not(:last-child){
  margin-bottom: 10px;
}
.footer-col ul li a{
  font-size: 16px;
  text-transform: capitalize;
  color: #ffffff;
  text-decoration: none;
  font-weight: 300;
  color: #bbbbbb;
  display: block;
  transition: all 0.3s ease;
}
.footer-col ul li a:hover{
  color: #ffffff;
  padding-left: 8px;
}
.footer-col .social-links a{
  display: inline-block;
  height: 40px;
  width: 40px;
  background-color: rgba(255,255,255,0.2);
  margin:0 10px 10px 0;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  color: #ffffff;
  transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
  color: #24262b;
  background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
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
      <h2>Empresan Deportiva </h2>
      <p>  En SportMart, creemos que cada atleta merece lo mejor. Por eso, nos dedicamos a ofrecer ropa deportiva de alta calidad a precios inigualables. Nuestra misión es apoyar tu pasión por el deporte con productos que no solo mejoran tu rendimiento, sino que también te hacen sentir y lucir bien.</p>
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
  <script src="js/script_running.js"></script>
</body>
</html>
