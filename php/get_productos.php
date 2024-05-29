<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   $categoria = $_GET['categoria'];
   $sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.imagen, p.sexo, v.talla
      FROM PRODUCTO p
      JOIN PRODUCTO_CATEGORIA pc ON p.id_producto = pc.id_producto
      JOIN CATEGORIA c ON pc.id_categoria = c.id_categoria
      JOIN VARIANTE v ON p.id_producto = v.id_producto
      WHERE c.categoria = ?
";

   // Cambiar $conexion a $conn
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("s", $categoria);
   $stmt->execute();
   $result = $stmt->get_result();

   $productos = array();
   while ($row = $result->fetch_assoc()) {
      $productos[$row['id_producto']]['id_producto'] = $row['id_producto'];
      $productos[$row['id_producto']]['nombre'] = $row['nombre'];
      $productos[$row['id_producto']]['descripcion'] = $row['descripcion'];
      $productos[$row['id_producto']]['precio'] = $row['precio'];
      $productos[$row['id_producto']]['imagen'] = $row['imagen'];
      $productos[$row['id_producto']]['sexo'] = $row['sexo'];
      $productos[$row['id_producto']]['variantes'][] = [
         'talla' => $row['talla']
      ];
   }
   echo json_encode(array_values($productos));

   $stmt->close();
   $bd->cerrar();
}
