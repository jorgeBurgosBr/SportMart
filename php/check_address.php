<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();
$id_cliente = $_SESSION['id_cliente'];

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   $query = "SELECT direccion_envio FROM perfil_cliente WHERE id_cliente = ?";
   $stmt = $conn->prepare($query);

   if ($stmt) {
      $stmt->bind_param("i", $id_cliente);
      $stmt->execute();
      $stmt->bind_result($direccion_envio);
      $stmt->fetch();

      // Verifica si la dirección no es nula ni vacía
      if (!is_null($direccion_envio) && !empty($direccion_envio)) {
         $response = array('address_filled' => true);
      } else {
         $response = array('address_filled' => false);
      }

      echo json_encode($response);

      $stmt->close();
   } else {
      // Si hay un error en la preparación de la declaración
      echo json_encode(array('address_filled' => false, 'error' => 'Failed to prepare statement.'));
   }

   $bd->cerrar();
} else {
   // Si hay un error al conectar con la base de datos
   echo json_encode(array('address_filled' => false, 'error' => 'Failed to connect to the database.'));
}
