<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');
   if ($_SERVER["REQUEST_METHOD"] == 'POST') {

      $respuesta = [
         "success" => false,
         "error" => null,
         "tipo" => null
      ];

      $correo = mysqli_real_escape_string($conn, $_POST['email-login']);
      $password = mysqli_real_escape_string($conn, $_POST['password-login']);

      // Comprobamos si el correo es correcto
      $sql = mysqli_query($conn, "SELECT password, id_cliente FROM cliente WHERE correo = '$correo'");
      if ($fila = mysqli_fetch_assoc($sql)) {
         // La función password_verify compara la contraseña ingresada con el hash almacenado
         if (password_verify($password, $fila['password'])) {
            // La contraseña es correcta
            $respuesta["success"] = true;

            // Alamacenamos el id en una sesión
            $_SESSION['id_cliente'] = $fila['id_cliente'];
         } else {
            // La contraseña es incorrecta
            $respuesta["error"] = "contrasena";
         }
      } else {
         // El correo no existe
         $respuesta["error"] = "correo";
      }

      // Enviamos respuesta
      header('Content-Type: application/json');
      echo json_encode($respuesta);
   }
}
