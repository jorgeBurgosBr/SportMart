<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');


   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_cliente = $_POST['id_cliente'];
      $id_producto = $_POST['id_producto'];

      // Asegúrate de validar y sanitizar los datos
      $id_cliente = intval($id_cliente);
      $id_producto = intval($id_producto);

      // Consulta para eliminar el producto del carrito
      $query = "DELETE FROM carrito WHERE id_cliente = ? AND id_producto = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ii", $id_cliente, $id_producto);

      if ($stmt->execute()) {
         echo 'success';
      } else {
         echo 'error';
      }

      $stmt->close();
      $conn->close();
   }
}
