<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();
// $id_cliente = $_SESSION['id_cliente'];

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id_cliente = $_POST['id_cliente'];
      $id_producto = $_POST['id_producto'];
      $cantidad = $_POST['cantidad'];

      // Sanitize and validate input
      $id_cliente = filter_var($id_cliente, FILTER_SANITIZE_NUMBER_INT);
      $id_producto = filter_var($id_producto, FILTER_SANITIZE_NUMBER_INT);
      $cantidad = filter_var($cantidad, FILTER_SANITIZE_NUMBER_INT);

      if ($id_cliente && $id_producto && $cantidad) {

         $stmt = $conn->prepare("UPDATE carrito SET cantidad = ? WHERE id_cliente = ? AND id_producto = ?");
         $stmt->bind_param("iii", $cantidad, $id_cliente, $id_producto);

         if ($stmt->execute()) {
            echo "Quantity updated successfully";
         } else {
            echo "Error updating quantity: " . $stmt->error;
         }

         $stmt->close();
         $conn->close();
      } else {
         echo "Invalid input";
      }
   } else {
      http_response_code(405);
      echo "Method Not Allowed";
   }
}
