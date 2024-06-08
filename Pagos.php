<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['nombre'])) {
    $textoBotonLogin = "Hola, " . $_SESSION['nombre'];
    $textoBotonRegistrarse = "Cerrar sesión";
?><div id="customer-info" data-id-cliente="<?php echo $_SESSION['id_cliente']; ?>"></div>
<?php
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
    <title>SportMart</title>
    <link rel="stylesheet" href="style/Pagos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <style>
        .popup.active {
            top: 20%;
        }

        @media screen and (max-width: 480px) {
            .popup-regis.active2 {
                top: 16%;
            }
        }
    </style>
</head>

<body class="main-login">
    <div class="grid-login">
        <div class="grid-p1">
            <!-- Cart -->
            <div class="cart">
                <h2 class="cart-title">Resumen pedido</h2>
                <!-- Content -->
                <div class="cart-content"></div>
                <!-- Total -->
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">$0</div>
                </div>
            </div>
        </div>

        <div class="grid-p2">
            <div class="contenedor-p2">
                <h3>Métodos de pago</h3>
                <p>Elige un método de pago para continuar</p>

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapseOne" class="collapsed">
                                    <span class="bar"></span>
                                    Pago con Tarjeta de Crédito
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <form id="payment-form">
                                    <div class="payment-form">
                                        <label for="card-number">Número de Tarjeta</label>
                                        <input type="text" id="card-number" placeholder="1234 5678 9123 4567" required>
                                        <div class="error-message" id="card-number-error"></div>
                                        <div class="card-details">
                                            <div>
                                                <label for="card-expiry">Fecha de Vencimiento</label>
                                                <input type="text" id="card-expiry" placeholder="MM/AA" required>
                                                <div class="error-message" id="card-expiry-error"></div>
                                            </div>
                                            <div>
                                                <label for="card-cvv">CVV</label>
                                                <input type="text" id="card-cvv" placeholder="123" required>
                                                <div class="error-message" id="card-cvv-error"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: center;">
                                        <button id="create-order" type="submit" class="button">Pagar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapseTwo" class="collapsed">
                                    <span class="bar"></span>
                                    Pago con PayPal
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div id="paypal-button-container"></div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br><br><br>
                <a href="index.php" class="exit">Salir</a>
            </div>
        </div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'pay',
                    commit: true
                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            "description": "SportMart",
                            "amount": {
                                "currency_code": "USD",
                                "value": 15
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        actions.redirect('URL de tu página de gracias');
                    });
                },
                onError: function(err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>
    <div id="payment-success-modal" class="modal">
        <div class="modal-content">
            <h2>Pago realizado</h2>
            <p>El pago se ha realizado correctamente.</p>
            <button id="close-modal" class="button"><a href="index.php" style="text-decoration: none; color: white;">Salir</a></button>
        </div>
    </div>

</body>

</html>