<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Lógica para manejar solicitudes POST
      $respuesta = [
         'success' => false,
         'error' => null
      ];
      $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
      $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
      $correo = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $contrasena_hash = password_hash($password, PASSWORD_DEFAULT);

      // Generar el ID del cliente
      $ultimo_id_query = mysqli_query($conn, "SELECT MAX(id_cliente) AS max_id FROM cliente");
      $ultimo_id_result = mysqli_fetch_assoc($ultimo_id_query);
      $id_cliente = $ultimo_id_result['max_id'] + 1;

      // Comprobar si el usuario ya existe en la base de datos
      $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE correo = '$correo'");
      if (mysqli_num_rows($sql) > 0) {
         $respuesta['success'] = false;
         $respuesta['error'] = 'El correo ya está registrado';
      } else {
         // Insertar los datos en la BBDD con el nuevo ID generado
         $sql2 = mysqli_query($conn, "INSERT INTO cliente (id_cliente, nombre, apellidos, correo, password) 
                                    VALUES ('$id_cliente', '$nombre', '$apellidos', '$correo', '$contrasena_hash')");

         if ($sql2) {
            // Crear perfil cliente con valores iniciales nulos
            $sql3 = mysqli_query($conn, "INSERT INTO perfil_cliente (id_cliente, fecha_nac_cliente, telefono, provincia, localidad, direccion_envio, codigo_postal) 
                                       VALUES ('$id_cliente', NULL, NULL, NULL, NULL, NULL, NULL)");

            if ($sql3) {
               $respuesta['success'] = true;
               $_SESSION['id_cliente'] = $id_cliente;
               $_SESSION['nombre'] = $nombre;
            }
         }
      }
      header('Content-Type: application/json');
      echo json_encode($respuesta);
   } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
      // Lógica para manejar solicitudes GET
      $respuesta = [
         'logged_in' => isset($_SESSION['nombre'])
      ];
      header('Content-Type: application/json');
      echo json_encode($respuesta);
   }
}
