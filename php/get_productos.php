<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   $categoria = $_GET['categoria'];
   $precio_min = isset($_GET['precio_min']) ? $_GET['precio_min'] : null;
   $precio_max = isset($_GET['precio_max']) ? $_GET['precio_max'] : null;
   $sexo = isset($_GET['sexo']) ? $_GET['sexo'] : null;

   $sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.imagen, p.sexo, v.talla
            FROM PRODUCTO p
            JOIN PRODUCTO_CATEGORIA pc ON p.id_producto = pc.id_producto
            JOIN CATEGORIA c ON pc.id_categoria = c.id_categoria
            JOIN VARIANTE v ON p.id_producto = v.id_producto
            WHERE c.categoria = ?";

   // Añadir condiciones de filtro
   if ($precio_min !== null) {
      $sql .= " AND p.precio >= ?";
   }
   if ($precio_max !== null) {
      $sql .= " AND p.precio <= ?";
   }
   if ($sexo !== null) {
      $sql .= " AND p.sexo = ?";
   }

   $stmt = $conn->prepare($sql);

   // Vincular parámetros
   $types = 's';
   $params = [$categoria];

   if ($precio_min !== null) {
      $types .= 'd';
      $params[] = $precio_min;
   }
   if ($precio_max !== null) {
      $types .= 'd';
      $params[] = $precio_max;
   }
   if ($sexo !== null) {
      $types .= 's';
      $params[] = $sexo;
   }

   $stmt->bind_param($types, ...$params);
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
