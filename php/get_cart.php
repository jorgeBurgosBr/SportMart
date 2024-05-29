<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();
$id_cliente = $_SESSION['id_cliente'];

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   // Prepare the SQL query with a placeholder
   $stmt = $conn->prepare('SELECT p.id_producto, p.nombre, p.precio, p.imagen, c.talla, c.cantidad
                              FROM PRODUCTO p
                              JOIN CARRITO c ON p.id_producto = c.id_producto
                              JOIN VARIANTE v ON p.id_producto = v.id_producto AND c.talla = v.talla
                              WHERE c.id_cliente = ?;');

   // Bind the session variable to the placeholder
   $stmt->bind_param('i', $id_cliente);

   // Execute the query
   $stmt->execute();

   // Get the result set
   $result = $stmt->get_result();

   // Fetch all results
   $results = $result->fetch_all(MYSQLI_ASSOC);

   echo json_encode(array_values($results));

   // Close the statement
   $stmt->close();
   $bd->cerrar();
}
