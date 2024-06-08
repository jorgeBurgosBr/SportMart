<?php
session_start();
require_once 'conecta.php';

$id_cliente = $_SESSION['id_cliente'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_carrito = $_POST['id_carrito'];
   $id_cliente = $_POST['id_cliente'];
   $id_producto = $_POST['id_producto'];
   $cantidad = $_POST['cantidad'];
   $talla = $_POST['talla'];

   agregarProductoAlCarrito($id_carrito, $id_cliente, $id_producto, $cantidad, $talla);
}



function agregarProductoAlCarrito($id_carrito, $id_cliente, $id_producto, $cantidad, $talla)
{
   $bd = new BaseDeDatos();

   try {
      if ($bd->conectar()) {
         $conn = $bd->getConexion();
         $bd->seleccionarContexto('sportmart');
         // Preparar la consulta SQL
         $sql = "INSERT INTO CARRITO (id_carrito, id_cliente, id_producto, cantidad, talla) 
                    VALUES (?, ?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE cantidad = cantidad + VALUES(cantidad)";

         // Preparar la sentencia
         $stmt = $conn->prepare($sql);
         if ($stmt === false) {
            throw new Exception("Error preparando la consulta: " . $conn->error);
         }

      // Generar el ID del carrito
      $ultimo_id_query = mysqli_query($conn, "SELECT MAX(id_carrito) AS max_id FROM carrito");
      $ultimo_id_result = mysqli_fetch_assoc($ultimo_id_query);
      $id_carrito = $ultimo_id_result['max_id'] + 1;

         // Bind de los parámetros
         $stmt->bind_param("iiiis", $id_carrito, $id_cliente, $id_producto, $cantidad, $talla);

         // Ejecutar la sentencia
         if ($stmt->execute()) {
            echo "Producto agregado/actualizado en el carrito correctamente.";
         } else {
            throw new Exception("Error ejecutando la consulta: " . $stmt->error);
         }
         // Cerrar la sentencia
         $stmt->close();
         $bd->cerrar();
      }
   } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
   }
}
