<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');
   // echo "se ha conectado perfectamente";

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $respuesta = [
         'success' => false,
         'error' => null
      ];
      $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
      $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
      $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
      $correo = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $contrasena_hash = password_hash($password, PASSWORD_DEFAULT);

      // Comprobar si el usuario ya existe en la base de datos
      $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE correo = '$correo'");
      if (mysqli_num_rows($sql) > 0) {
         $respuesta['success'] = false;
         $respuesta['error'] = 'El correo ya está registrado';
      } else {
         //Insertamos los datos en la BBDD
         $sql2 = mysqli_query($conn, "INSERT INTO cliente (nombre, apellidos, correo, telefono, password) 
                                    VALUES ('$nombre', '$apellidos', '$correo', '$telefono', '$contrasena_hash')");

         // // Recojo el id del cliente
         // $row = mysqli_fetch_assoc($sql3);
         // $id_original = $row['id_cliente'];


         if ($sql2) { 
            $respuesta['success'] = true;
            // $_SESSION['id_cliente'] = $id_original;
         }
      }
      header('Content-Type: application/json');
      echo json_encode($respuesta);
   }
}
