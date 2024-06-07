<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : null;

   if ($id_producto) {
      // Consulta para obtener solo el producto específico
      $query = "SELECT * FROM producto p JOIN variante v ON p.id_producto = v.id_producto WHERE p.id_producto = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("i", $id_producto);
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
         $productos[$row['id_producto']]['variantes'][] = array('talla' => $row['talla']);
      }
      echo json_encode(array_values($productos));
   } else {
      $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;
      $precio_min = isset($_GET['precio_min']) ? $_GET['precio_min'] : null;
      $precio_max = isset($_GET['precio_max']) ? $_GET['precio_max'] : null;
      $sexo = isset($_GET['sexo']) ? $_GET['sexo'] : null;
      $deporte = isset($_GET['deporte']) ? $_GET['deporte'] : null;
      $talla = isset($_GET['talla']) ? $_GET['talla'] : null;

      $sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.imagen, p.sexo, v.talla
            FROM PRODUCTO p
            JOIN PRODUCTO_CATEGORIA pc ON p.id_producto = pc.id_producto
            JOIN CATEGORIA c ON pc.id_categoria = c.id_categoria
            JOIN VARIANTE v ON p.id_producto = v.id_producto
            JOIN PRODUCTO_DEPORTE pd ON p.id_producto = pd.id_producto
            JOIN DEPORTE d ON pd.id_deporte = d.id_deporte
            WHERE 1=1";

      if ($categoria !== null) {
         $sql .= " AND c.categoria = ?";
      }
      if ($id_producto !== null) {
         $sql .= " AND p.id_producto = ?";
      }
      if ($precio_min !== null) {
         $sql .= " AND p.precio >= ?";
      }
      if ($precio_max !== null) {
         $sql .= " AND p.precio <= ?";
      }
      if ($sexo !== null) {
         $sql .= " AND p.sexo = ?";
      }
      if ($deporte !== null) {
         $sql .= " AND d.deporte = ?";
      }
      if ($talla !== null) {
         $sql .= " AND v.talla = ?";
      }

      $stmt = $conn->prepare($sql);

      $types = '';
      $params = [];

      if ($categoria !== null) {
         $types .= 's';
         $params[] = $categoria;
      }
      if ($id_producto !== null) {
         $types .= 's';
         $params[] = $id_producto;
      }
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
      if ($deporte !== null) {
         $types .= 's';
         $params[] = $deporte;
      }
      if ($talla !== null) {
         $types .= 's';
         $params[] = $talla;
      }

      if (!empty($params)) {
         $stmt->bind_param($types, ...$params);
      }

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
         $productos[$row['id_producto']]['variantes'][] = array('talla' => $row['talla']);
      }

      echo json_encode(array_values($productos));

      $bd->cerrar();
   }
}
