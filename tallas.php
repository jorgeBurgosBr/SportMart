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
  <link rel="icon" href="img/fav.ico" type="image/x-icon">
</head>

<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    .container {
      max-width: 1170px;
      margin: auto;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
    }

    ul {
      list-style: none;
    }

    .footer {
      background-color: #000000;
      padding: 70px 0;

    }

    .footer-col {
      width: 25%;
      padding: 0 15px;
    }

    .footer-col h4 {
      font-size: 18px;
      color: #ffffff;
      text-transform: capitalize;
      margin-bottom: 35px;
      font-weight: 500;
      position: relative;
    }

    .footer-col h4::before {
      content: '';
      position: absolute;
      left: 0;
      bottom: -10px;
      background-color: #0171e3;
      height: 2px;
      box-sizing: border-box;
      width: 50px;
    }

    .footer-col ul li:not(:last-child) {
      margin-bottom: 10px;
    }

    .footer-col ul li a {
      font-size: 16px;
      text-transform: capitalize;
      color: #ffffff;
      text-decoration: none;
      font-weight: 300;
      color: #bbbbbb;
      display: block;
      transition: all 0.3s ease;
    }

    .footer-col ul li a:hover {
      color: #ffffff;
      padding-left: 8px;
    }

    .footer-col .social-links a {
      display: inline-block;
      height: 40px;
      width: 40px;
      background-color: rgba(255, 255, 255, 0.2);
      margin: 0 10px 10px 0;
      text-align: center;
      line-height: 40px;
      border-radius: 50%;
      color: #ffffff;
      transition: all 0.5s ease;
    }

    .footer-col .social-links a:hover {
      color: #24262b;
      background-color: #ffffff;
    }

    /*responsive*/
    @media(max-width: 767px) {
      .footer-col {
        width: 50%;
        margin-bottom: 30px;
      }
    }

    @media(max-width: 574px) {
      .footer-col {
        width: 100%;
      }
    }
  </style>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/lightslider.css" />
  <link rel="stylesheet" href="style/style_carrito.css" />
  <script src="js/libreria/jquery.js"></script>
  <script src="js/libreria/lightslider.js"></script>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.css" />

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <style>
    @media screen and (max-width: 480px) {
      .popup-regis.active2 {
        top: 16%;
      }
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>SportMart</title>
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
    <br>
    <div class="content-asset"><!-- dwMarker="content" dwContentID="ceLQ6iaage2AoaaadbcB3B118R" -->
      <style>
        #cService {
          width: 1000px;
        }

        #cService li {
          list-style: circle !important;
        }

        #cService .cS-div1 {
          float: left;
          border: 2px solid #ccc;
          width: 160px;
          padding: 0 10px 10px 10px;
          background: #f3f3f3;
          margin-bottom: 30px;
        }

        #cService .cS-div2 {
          float: left;
          margin: 0 0 20px 50px;
          width: 750px;
        }

        .style1 {
          color: #FFFFFF
        }

        td {
          text-align: center !important;
        }

        td {
          font-size: 12px;
          font-family: montserrat, montserrat, montserrat, montserrat;
        }
      </style>


      <h1 style="font-family: montserrat; color:#000000; text-align:center;">Tallas</h1>

      <p style="font-family: montserrat; font-size: 15px; text-align:center; margin:10px;">Las medidas mostradas en esta tabla son aproximadas y <u>Pueden variar dependiendo de cada marca.</u></p>
      <br>
      <!--Talllas americanas-->

      <table width="100%" border="1" cellpadding="5" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="5" bgcolor="#000000" height="25"><span class="xl24 style1">ABRIGO, ABRIGO TRES CUARTOS, CHAQUETA</span></td>
          </tr>
          <tr class="xl49" height="21">
          <td height="21" bgcolor="#eaeaea" colspan="2"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl24"><strong>Pecho (Cm | Pulgadas)</strong></td>
            <td bgcolor="#eaeaea" class="xl25"><strong>Hombros (cm | pulgadas)</strong></td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea"><strong>S</strong></td>

            <td class="xl29"></td>
            <td class="xl30">54 cm | 21 in</td>
            <td class="xl31">43.5 cm | 17 in</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea"><strong>M</strong></td>
            <td class="xl34"></td>
            <td class="xl35">57 cm | 22.5 in</td>
            <td class="xl36">45.3 cm | 18 in</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea"><strong>L</strong></td>

            <td class="xl34"></td>
            <td class="xl35">60 cm | 23.5 in</td>
            <td class="xl36">47 cm | 18.5 in</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea"><strong>XL</strong></td>

            <td class="xl34"></td>
            <td class="xl35">63 cm | 25 in</td>
            <td class="xl36">48.5 cm | 19 in</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea" class="xl37"><strong>2XL</strong></td>

            <td class="xl39"></td>
            <td class="xl40">66 cm | 26 in</td>
            <td class="xl41">50 cm | 19.7 in</td>
          </tr>
        </tbody>
      </table>
      <br>

      <!--Talllas europeas-->

      <!-- clothing by letters-->

      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="16" bgcolor="#000000" height="25"><span class="xl66 style1">TRAJE & AMERICANA</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="2"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>Pecho</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>Hombros</strong></td>

          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td class="xl33" bgcolor="#eaeaea">USA </td>
            <td class="xl43" bgcolor="#eaeaea">EU</td>

          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>XS</strong></td>
            <td class="xl43">34 (21in)</td>
            <td class="xl33">44 (54cm)</td>
            <td class="xl35">34 (17in)</td>
            <td class="xl35">44 (43.5cm)</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>S</strong></td>
            <td class="xl43">36 (22.5in)</td>
            <td class="xl33">46 (57cm)</td>
            <td class="xl35">36 (17.5in)</td>
            <td class="xl35">46 (45.3cm)</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>M</strong></td>
            <td class="xl43">38 (23in)</td>
            <td class="xl33">48 (57.5cm)</td>
            <td class="xl35">38 (18in)</td>
            <td class="xl35">48 (46cm)</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>L</strong></td>
            <td class="xl43">40 (23.5in)</td>
            <td class="xl33">50 (60cm)</td>
            <td class="xl35">40 (18.5in)</td>
            <td class="xl35">50 (47cm)</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>XL</strong></td>
            <td class="xl43">42 (25in)</td>
            <td class="xl33">52 (63cm)</td>
            <td class="xl35">42 (19in)</td>
            <td class="xl35">52 (48.5cm)</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>XXL</strong></td>
            <td class="xl43">44 (26in)</td>
            <td class="xl33">54 (66cm)</td>
            <td class="xl35">44 (19.7in)</td>
            <td class="xl35">54 (50cm)</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>XXXL</strong></td>
            <td class="xl43">46 (28in)</td>
            <td class="xl33">56 (68cm)</td>
            <td class="xl35">46 (20in)</td>
            <td class="xl35">56 (52cm)</td>
          </tr>

        </tbody>
      </table>
      <!--trajes y blazer fin-->


      <br>

      <!-- clothing by letters-->

      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="22" bgcolor="#000000" height="25"><span class="xl66 style1">JEANS | DENIM</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="3"><strong>Sizes</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="3"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="3"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl48" colspan="3"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl42" colspan="3"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="3"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="3"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="3">
              <strong>XL</strong>
            </td>
          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>

          </tr>
          <tr height="25">
            <td>34</td>
            <td>44</td>
            <td class="xl33">36</td>
            <td class="xl43">46</td>
            <td class="xl35">38</td>
            <td class="xl35">48</td>
            <td class="xl35">40</td>
            <td class="xl35">50</td>
            <td class="xl35">42</td>
            <td class="xl35">52</td>
            <td class="xl35">44</td>
            <td class="xl35">54</td>
            <td class="xl35">46</td>
            <td class="xl35">56</td>
            <td class="xl35">50</td>
            <td class="xl35">42</td>
            <td class="xl35">52</td>
            <td class="xl35">44</td>
            <td class="xl35">54</td>
            <td class="xl35">46</td>
            <td class="xl35">56</td>
        </tbody>
      </table>
      <!--fit regular-->
      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="22" bgcolor="#a9a9a9" height="25"><span class="xl66 style1">AJUSTE REGULAR</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="2"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl48" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl42" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2">
              <strong>XL</strong>
            </td>
          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cadera</strong></td>
            <td class="xl43">48</td>
            <td class="xl33">18.9</td>
            <td class="xl35">50</td>
            <td class="xl35">19.7</td>
            <td class="xl35">52</td>
            <td class="xl35">20.5</td>
            <td class="xl35">54</td>
            <td class="xl35">21.3</td>
            <td class="xl35">56</td>
            <td class="xl35">22</td>
            <td class="xl35">58</td>
            <td class="xl35">22.8</td>
            <td class="xl35">60</td>
            <td class="xl35">23.6</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cintura</strong></td>
            <td class="xl43">38</td>
            <td class="xl33">15</td>
            <td class="xl35">40</td>
            <td class="xl35">15.7</td>
            <td class="xl35">42</td>
            <td class="xl35">16.5</td>
            <td class="xl35">44</td>
            <td class="xl35">17.3</td>
            <td class="xl35">46</td>
            <td class="xl35">18.1</td>
            <td class="xl35">48</td>
            <td class="xl35">18.9</td>
            <td class="xl35">50</td>
            <td class="xl35">19.7</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Longitud exterior</strong></td>
            <td class="xl43">108</td>
            <td class="xl33">42</td>
            <td class="xl35">109</td>
            <td class="xl35">43</td>
            <td class="xl35">109.5</td>
            <td class="xl35">43</td>
            <td class="xl35">110</td>
            <td class="xl35">48.3</td>
            <td class="xl35">110.5</td>
            <td class="xl35">43.5</td>
            <td class="xl35">111</td>
            <td class="xl35">43.7</td>
            <td class="xl35">111.5</td>
            <td class="xl35">44</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Longitud interior</strong></td>
            <td class="xl43">85</td>
            <td class="xl33">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
          </tr>
          </tr>
        </tbody>
      </table>
      <!--fit regular-->
      <!--fit Slim-->
      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="22" bgcolor="#a9a9a9" height="25"><span class="xl66 style1">AJUSTADO</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="2"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl48" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl42" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2">
              <strong>XL</strong>
            </td>
          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cadera</strong></td>
            <td class="xl43">48</td>
            <td class="xl33">18.9</td>
            <td class="xl35">50</td>
            <td class="xl35">19.7</td>
            <td class="xl35">52</td>
            <td class="xl35">20.5</td>
            <td class="xl35">54</td>
            <td class="xl35">21.3</td>
            <td class="xl35">56</td>
            <td class="xl35">22</td>
            <td class="xl35">58</td>
            <td class="xl35">22.8</td>
            <td class="xl35">60</td>
            <td class="xl35">23.6</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cintura</strong></td>
            <td class="xl43">38</td>
            <td class="xl33">15</td>
            <td class="xl35">40</td>
            <td class="xl35">15.7</td>
            <td class="xl35">42</td>
            <td class="xl35">16.5</td>
            <td class="xl35">44</td>
            <td class="xl35">17.3</td>
            <td class="xl35">46</td>
            <td class="xl35">18.1</td>
            <td class="xl35">48</td>
            <td class="xl35">18.9</td>
            <td class="xl35">50</td>
            <td class="xl35">19.7</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Longitud exterior</strong></td>
            <td class="xl43">108</td>
            <td class="xl33">42</td>
            <td class="xl35">109</td>
            <td class="xl35">43</td>
            <td class="xl35">109.5</td>
            <td class="xl35">43</td>
            <td class="xl35">110</td>
            <td class="xl35">48.3</td>
            <td class="xl35">110.5</td>
            <td class="xl35">43.5</td>
            <td class="xl35">111</td>
            <td class="xl35">43.7</td>
            <td class="xl35">111.5</td>
            <td class="xl35">44</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Longitud interior</strong></td>
            <td class="xl43">85</td>
            <td class="xl33">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
          </tr>
          </tr>
        </tbody>
      </table>
      <!--Slim fit-->
      <!--fit skinny-->
      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="22" bgcolor="#a9a9a9" height="25"><span class="xl66 style1">Ceñido</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="2"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl48" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl42" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2">
              <strong>XL</strong>
            </td>
          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cadera</strong></td>
            <td class="xl43">44.5</td>
            <td class="xl33">17.4</td>
            <td class="xl35">46.5</td>
            <td class="xl35">18.1</td>
            <td class="xl35">48.5</td>
            <td class="xl35">18.9</td>
            <td class="xl35">50.5</td>
            <td class="xl35">19.7</td>
            <td class="xl35">52.5</td>
            <td class="xl35">20.5</td>
            <td class="xl35">54.5</td>
            <td class="xl35">21.3</td>
            <td class="xl35">56.5</td>
            <td class="xl35">22</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cintura</strong></td>
            <td class="xl43">35.5</td>
            <td class="xl33">13.8</td>
            <td class="xl35">37.5</td>
            <td class="xl35">14.6</td>
            <td class="xl35">39.5</td>
            <td class="xl35">15.4</td>
            <td class="xl35">41.5</td>
            <td class="xl35">16.2</td>
            <td class="xl35">43.5</td>
            <td class="xl35">17</td>
            <td class="xl35">45.5</td>
            <td class="xl35">17.7</td>
            <td class="xl35">47.5</td>
            <td class="xl35">18.5</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Longitud exterior</strong></td>
            <td class="xl43">108</td>
            <td class="xl33">42</td>
            <td class="xl35">109</td>
            <td class="xl35">43</td>
            <td class="xl35">109.5</td>
            <td class="xl35">43</td>
            <td class="xl35">110</td>
            <td class="xl35">48.3</td>
            <td class="xl35">110.5</td>
            <td class="xl35">43.5</td>
            <td class="xl35">111</td>
            <td class="xl35">43.7</td>
            <td class="xl35">111.5</td>
            <td class="xl35">44</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Longitud Interna</strong></td>
            <td class="xl43">85</td>
            <td class="xl33">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
            <td class="xl35">85</td>
            <td class="xl35">33.5</td>
          </tr>
          </tr>
        </tbody>
      </table>
      <!--Skinny fit-->
      <br>
      <!-- clothing by letters-->

      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="22" bgcolor="#000000" height="25"><span class="xl66 style1">PANTALONES, TRAJE, CHÁNDAL, PANTALONES CORTOS, ROPA INTERIOR</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="3"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="3"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="3"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl48" colspan="3"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl42" colspan="3"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="3"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="3"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="3">
              <strong>XL</strong>
            </td>
          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td bgcolor="#eaeaea">IT</td>

          </tr>
          <tr height="25">
            <td>29</td>
            <td>36</td>
            <td class="xl33">42</td>
            <td class="xl43">30</td>
            <td class="xl35">38</td>
            <td class="xl35">44</td>
            <td class="xl35">31</td>
            <td class="xl35">40</td>
            <td class="xl35">46</td>
            <td class="xl35">32</td>
            <td class="xl35">42</td>
            <td class="xl35">48</td>
            <td class="xl35">34</td>
            <td class="xl35">44</td>
            <td class="xl35">50</td>
            <td class="xl35">36</td>
            <td class="xl35">46</td>
            <td class="xl35">52</td>
            <td class="xl35">38</td>
            <td class="xl35">48</td>
            <td class="xl35">54</td>
        </tbody>
      </table>
      <!--pantalon regular-->
      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody><!--tr>
      <td colspan="22" bgcolor="#000000" height="25"><span class="xl66 style1">Fit Regular</span></td>
    </tr-->
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="2"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl48" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl42" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2">
              <strong>XL</strong>
            </td>
          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
            <td bgcolor="#eaeaea">Cm</td>
            <td bgcolor="#eaeaea">In</td>
          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong><Colgroup></Colgroup>intura</strong></td>
            <td class="xl43">39.5</td>
            <td class="xl33">15.4</td>
            <td class="xl35">41.5</td>
            <td class="xl35">16.2</td>
            <td class="xl35">43.5</td>
            <td class="xl35">17</td>
            <td class="xl35">45.5</td>
            <td class="xl35">17.7</td>
            <td class="xl35">47.5</td>
            <td class="xl35">18.5</td>
            <td class="xl35">49.5</td>
            <td class="xl35">19.3</td>
            <td class="xl35">51.5</td>
            <td class="xl35">20.1</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cadera</strong></td>
            <td class="xl43">49.5</td>
            <td class="xl33">19.3</td>
            <td class="xl35">51.5</td>
            <td class="xl35">20.1</td>
            <td class="xl35">53.5</td>
            <td class="xl35">20.9</td>
            <td class="xl35">55.5</td>
            <td class="xl35">21.6</td>
            <td class="xl35">57.5</td>
            <td class="xl35">22.4</td>
            <td class="xl35">59.5</td>
            <td class="xl35">23.2</td>
            <td class="xl35">61.5</td>
            <td class="xl35">24</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Outer Length</strong></td>
            <td class="xl43">101</td>
            <td class="xl33">39</td>
            <td class="xl35">103</td>
            <td class="xl35">40</td>
            <td class="xl35">104</td>
            <td class="xl35">41</td>
            <td class="xl35">105</td>
            <td class="xl35">41</td>
            <td class="xl35">105.5</td>
            <td class="xl35">41.5</td>
            <td class="xl35">106</td>
            <td class="xl35">42</td>
            <td class="xl35">106.5</td>
            <td class="xl35">42</td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Longitud exterior</strong></td>
            <td class="xl43">25</td>
            <td class="xl33">9.5</td>
            <td class="xl35">26.5</td>
            <td class="xl35">10</td>
            <td class="xl35">27.5</td>
            <td class="xl35">11</td>
            <td class="xl35">28.5</td>
            <td class="xl35">11.5</td>
            <td class="xl35">29</td>
            <td class="xl35">11.5</td>
            <td class="xl35">30</td>
            <td class="xl35">12</td>
            <td class="xl35">31</td>
            <td class="xl35">12.5</td>
          </tr>
          </tr>
        </tbody>
      </table>
      <!--pantalon regular-->
      <br>
      <!-- clothing by letters-->

      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="16" bgcolor="#000000" height="25"><span class="xl66 style1">Camisetas</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" class="xl47" rowspan="3"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea" class="xl47" colspan="2"><strong>S</strong></td>
            <td bgcolor="#eaeaea" class="xl48" colspan="2"><strong>M</strong></td>
            <td bgcolor="#eaeaea" class="xl42" colspan="2"><strong>L</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>XL</strong></td>
            <td bgcolor="#eaeaea" class="xl25" colspan="2"><strong>XXL</strong></td>
          </tr>
          <tr height="21">
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td class="xl33" bgcolor="#eaeaea">USA </td>
            <td class="xl43" bgcolor="#eaeaea">EU</td>
            <td class="xl35" bgcolor="#eaeaea">USA</td>
            <td class="xl35" bgcolor="#eaeaea">EU</td>
            <td class="xl35" bgcolor="#eaeaea">USA</td>
            <td class="xl35" bgcolor="#eaeaea">EU</td>
            <td class="xl35" bgcolor="#eaeaea">USA</td>
            <td class="xl35" bgcolor="#eaeaea">EU</td>

          </tr>
          <tr height="25">
            <td>14</td>
            <td>38</td>
            <td class="xl33">15</td>
            <td class="xl43">40</td>
            <td class="xl35">16</td>
            <td class="xl35">42</td>
            <td class="xl35">17</td>
            <td class="xl35">44</td>
            <td class="xl35">18</td>
            <td class="xl35">46</td>

          </tr>
          <tr>
            <td colspan="16" bgcolor="#a9a9a9" height="25"><span class="xl66 style1">CAMISA CASUAL</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Pecho</strong></td>
            <td class="xl43">18.5in</td>
            <td class="xl33">48cm</td>
            <td class="xl35">20in</td>
            <td class="xl35">51cm</td>
            <td class="xl35">21in</td>
            <td class="xl35">54cm</td>
            <td class="xl35">22in</td>
            <td class="xl35">57cm</td>
            <td class="xl35"> - </td>
            <td class="xl35"> - </td>

          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Hombros</strong></td>
            <td class="xl43">16in</td>
            <td class="xl33">41cm</td>
            <td class="xl35">17in</td>
            <td class="xl35">43cm</td>
            <td class="xl35">17.6in</td>
            <td class="xl35">45cm</td>
            <td class="xl35">18.5in</td>
            <td class="xl35">47cm</td>
            <td class="xl35">-</td>
            <td class="xl35">-</td>

          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Largo</strong></td>
            <td class="xl43">28in</td>
            <td class="xl33">72cm</td>
            <td class="xl35">29in</td>
            <td class="xl35">74cm</td>
            <td class="xl35">30in</td>
            <td class="xl35">76cm</td>
            <td class="xl35">30.6in</td>
            <td class="xl35">78cm</td>
            <td class="xl35">-</td>
            <td class="xl35">-</td>

          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Manga</strong></td>
            <td class="xl43">26.5in</td>
            <td class="xl33">67cm</td>
            <td class="xl35">26.8in</td>
            <td class="xl35">67.5cm</td>
            <td class="xl35">27in</td>
            <td class="xl35">68cm</td>
            <td class="xl35">27.2in</td>
            <td class="xl35">68.5cm</td>
            <td class="xl35">-</td>
            <td class="xl35">-</td>

          </tr>

          <tr>
            <td colspan="16" bgcolor="#a9a9a9" height="25"><span class="xl66 style1">A Medida</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Pecho</strong></td>
            <td class="xl43">20in</td>
            <td class="xl33">52cm</td>
            <td class="xl35">21.5in</td>
            <td class="xl35">55cm</td>
            <td class="xl35">22.6in</td>
            <td class="xl35">58cm</td>
            <td class="xl35">24in</td>
            <td class="xl35">62cm</td>
            <td class="xl35">25.5in</td>
            <td class="xl35">65cm</td>

          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Hombros</strong></td>
            <td class="xl43">17.6in</td>
            <td class="xl33">44.6cm</td>
            <td class="xl35">18.3in</td>
            <td class="xl35">46.6cm</td>
            <td class="xl35">19in</td>
            <td class="xl35">48.6cm</td>
            <td class="xl35">20in</td>
            <td class="xl35">50.6cm</td>
            <td class="xl35">21in</td>
            <td class="xl35">52.6cm</td>

          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Largo</strong></td>
            <td class="xl43">30in</td>
            <td class="xl33">77cm</td>
            <td class="xl35">31in</td>
            <td class="xl35">79cm</td>
            <td class="xl35">32in</td>
            <td class="xl35">82cm</td>
            <td class="xl35">32.6in</td>
            <td class="xl35">83cm</td>
            <td class="xl35">33in</td>
            <td class="xl35">84cm</td>

          </tr>

          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Manga</strong></td>
            <td class="xl43">25in</td>
            <td class="xl33">64cm</td>
            <td class="xl35">25.5in</td>
            <td class="xl35">65cm</td>
            <td class="xl35">26in</td>
            <td class="xl35">66.5cm</td>
            <td class="xl35">26.5in</td>
            <td class="xl35">66.8cm</td>
            <td class="xl35">27in</td>
            <td class="xl35">67cm</td>

          </tr>
        </tbody>
      </table>
      <!--trajes y blazer fin-->
      <br>
      <!--Talllas americanas-->

      <table width="100%" border="1" cellpadding="5" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="5" bgcolor="#000000" height="25"><span class="xl24 style1">CAMISETAS, SUDADERAS, POLO Y SUÉTERES</span></td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea" colspan="2"><strong>Pecho</strong></td>
            <td bgcolor="#eaeaea" class="xl24"><strong>Cm</strong></td>
            <td bgcolor="#eaeaea" class="xl25"><strong>Pulgadas</strong></td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea" colspan="2"><strong>S</strong></td>

            <td class="xl30">48</td>
            <td class="xl31">18.5</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea" colspan="2"><strong>M</strong></td>

            <td class="xl35">51</td>
            <td class="xl36">20</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea" colspan="2"><strong>L</strong></td>


            <td class="xl35">54</td>
            <td class="xl36">21</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea" colspan="2"><strong>XL</strong></td>


            <td class="xl35">57</td>
            <td class="xl36">22</td>
          </tr>
          <tr class="xl49" height="21">
            <td height="21" bgcolor="#eaeaea" class="xl37" colspan="2"><strong>XXL</strong></td>


            <td class="xl40">61</td>
            <td class="xl41">23.5</td>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
      <!-- clothing by letters-->

      <table width="100%" border="1" cellpadding="" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="14" bgcolor="#000000" height="25"><span class="xl66 style1">Cinturones</span></td>
          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea" rowspan="2"><strong>Tallas</strong></td>
            <td bgcolor="#eaeaea">USA</td>
            <td bgcolor="#eaeaea">EU</td>
            <td class="xl33" bgcolor="#eaeaea">USA </td>
            <td class="xl43" bgcolor="#eaeaea">EU</td>
            <td class="xl35" bgcolor="#eaeaea">USA</td>
            <td class="xl35" bgcolor="#eaeaea">EU</td>
            <td class="xl35" bgcolor="#eaeaea">USA</td>
            <td class="xl35" bgcolor="#eaeaea">EU</td>
            <td class="xl35" bgcolor="#eaeaea">USA</td>
            <td class="xl35" bgcolor="#eaeaea">EU</td>

          </tr>
          <tr height="21">
            <td>32</td>
            <td>80</td>
            <td class="xl33">34</td>
            <td class="xl43">85</td>
            <td class="xl35">36</td>
            <td class="xl35">90</td>
            <td class="xl35">38</td>
            <td class="xl35">95</td>
            <td class="xl35">40</td>
            <td class="xl35">100</td>

          </tr>
          <tr height="21">
            <td height="21" bgcolor="#eaeaea"><strong>Cintura</strong></td>
            <td>29.6pul</td>
            <td>73-78cm</td>
            <td class="xl33">32.4in</td>
            <td class="xl43">79-86cm</td>
            <td class="xl35">35-36in</td>
            <td class="xl35">87-91cm</td>
            <td class="xl35">37-40in</td>
            <td class="xl35">92-100cm</td>
            <td class="xl35">40-41in</td>
            <td class="xl35">101-105cm</td>

          </tr>

        </tbody>
      </table>

      <br>
      <!--clothing by letters-->
      <br>
      <!--shoes-->
      <table width="100%" border="1" cellpadding="5" bordercolor="#ffffff">
        <tbody>
          <tr>
            <td colspan="4" bgcolor="#000000" height="25"><span class="xl66 style1">Guías de tallas de zapatos </span></td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea"><strong>Americano</strong></td>
            <td align="left" valign="top" bgcolor="#eaeaea"><strong>Europeo</strong></td>
            <td align="left" valign="top" bgcolor="#eaeaea"><strong>UK</strong></td>
            <td align="left" valign="top" bgcolor="#eaeaea"><strong>Colombiano</strong></td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top">6 (9.8in)</td>
            <td align="left" valign="top">39 (24.9cm)</td>
            <td align="left" valign="top">5</td>
            <td align="left" valign="top">-</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea">7 (10.6in)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">40 (25.5cm)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">6</td>
            <td align="left" valign="top" bgcolor="#eaeaea">38</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top">7.5</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">39</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea">8 (10.31in)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">41 (26.2cm)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">7</td>
            <td align="left" valign="top" bgcolor="#eaeaea">39.5</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top">8.5</td>
            <td align="left" valign="top"> - </td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">40</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea">9 (10.56in)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">42 (26.8cm)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">8</td>
            <td align="left" valign="top" bgcolor="#eaeaea">41</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top">9.5</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">41.5</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea">10 (10.81in)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">43 (27.5cm)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">9</td>
            <td align="left" valign="top" bgcolor="#eaeaea">42</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top">10.5</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">43</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea">11 (11.6in)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">44 (28.1cm)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">10</td>
            <td align="left" valign="top" bgcolor="#eaeaea">43.5</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top">11.5</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">-</td>
            <td align="left" valign="top">44</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea">12 (11.31in)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">45 (28.7cm)</td>
            <td align="left" valign="top" bgcolor="#eaeaea">11</td>
            <td align="left" valign="top" bgcolor="#eaeaea">44.5</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#ffffff">13 (11.57in)</td>
            <td align="left" valign="top" bgcolor="#ffffff">46 (29.4cm)</td>
            <td align="left" valign="top" bgcolor="#ffffff">12</td>
            <td align="left" valign="top" bgcolor="#ffffff">45</td>
          </tr>
          <tr height="13">
            <td height="13" align="left" valign="top" bgcolor="#eaeaea">14</td>
            <td align="left" valign="top" bgcolor="#eaeaea">-</td>
            <td align="left" valign="top" bgcolor="#eaeaea">-</td>
            <td align="left" valign="top" bgcolor="#eaeaea">45.5</td>
          </tr>
        </tbody>
      </table>
      <br>
    </div>
    </tbody>
    </table>
    <br>
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
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
    <div id="customer-info" data-id-cliente="<?php echo $_SESSION['id_cliente']; ?>"></div>

  </body>