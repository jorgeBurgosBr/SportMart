<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();
$id_cliente = $_SESSION['id_cliente'];

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   try {
      if ($bd->conectar()) {
         $conexion = $bd->getConexion();

         // Preparar la consulta SQL
         $sql = "INSERT INTO CARRITO (id_cliente, id_producto, cantidad, talla) 
                    VALUES (?, ?, ?, ?)
                    ON DUPLICATE KEY UPDATE cantidad = cantidad + VALUES(cantidad)";

         // Preparar la sentencia
         $stmt = $conexion->prepare($sql);
         if ($stmt === false) {
            throw new Exception("Error preparando la consulta: " . $conexion->error);
         }

         // Bind de los parámetros
         $stmt->bind_param("iiis", $id_cliente, $id_producto, $cantidad, $talla);

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_cliente = $_POST['id_cliente'];
   $id_producto = $_POST['id_producto'];
   $cantidad = $_POST['cantidad'];
   $talla = $_POST['talla'];

   agregarProductoAlCarrito($id_cliente, $id_producto, $cantidad, $talla);
}
