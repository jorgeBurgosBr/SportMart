<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

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

      // Generar el ID del cliente
      $ultimo_id_query = mysqli_query($conn, "SELECT MAX(id_cliente) AS max_id FROM cliente");
      $ultimo_id_result = mysqli_fetch_assoc($ultimo_id_query);
      $nuevo_id = $ultimo_id_result['max_id'] + 1;

      // Comprobar si el usuario ya existe en la base de datos
      $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE correo = '$correo'");
      if (mysqli_num_rows($sql) > 0) {
         $respuesta['success'] = false;
         $respuesta['error'] = 'El correo ya está registrado';
      } else {
         // Insertar los datos en la BBDD con el nuevo ID generado
         $sql2 = mysqli_query($conn, "INSERT INTO cliente (id_cliente, nombre, apellidos, correo, telefono, password) 
                                    VALUES ('$nuevo_id', '$nombre', '$apellidos', '$correo', '$telefono', '$contrasena_hash')");

                                    
         // // Recojo el id del cliente
         // $row = mysqli_fetch_assoc($sql3);
         // $id_original = $row['id_cliente'];

         if ($sql2) { 
            $respuesta['success'] = true;
            // $_SESSION['id_cliente'] = $nuevo_id;
         }
      }
      header('Content-Type: application/json');
      echo json_encode($respuesta);
   }
}
?>
