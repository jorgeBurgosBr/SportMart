<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();
$id_cliente = $_SESSION['id_cliente'];

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   // Comenzar una transacción
   $conn->begin_transaction();

   try {
      // Obtener productos del carrito
      $stmt = $conn->prepare('SELECT p.id_producto, p.precio, c.talla, c.cantidad
                                FROM PRODUCTO p
                                JOIN CARRITO c ON p.id_producto = c.id_producto
                                WHERE c.id_cliente = ?');
      $stmt->bind_param('i', $id_cliente);
      $stmt->execute();
      $result = $stmt->get_result();
      $productos = $result->fetch_all(MYSQLI_ASSOC);
      $stmt->close();

      // Calcular el total del pedido
      $total = 0;
      foreach ($productos as $producto) {
         $total += $producto['precio'] * $producto['cantidad'];
      }

      // Obtener la dirección del cliente
      $stmt = $conn->prepare('SELECT direccion_envio FROM PERFIL_CLIENTE WHERE id_cliente = ?');
      $stmt->bind_param('i', $id_cliente);
      $stmt->execute();
      $result = $stmt->get_result();
      $perfil = $result->fetch_assoc();
      $stmt->close();

      if (!$perfil) {
         echo json_encode([
            'status' => 'error', 'message' => 'No se encontró la dirección del cliente'
         ]);
         $bd->cerrar();
         exit;
      }

      $direccion = $perfil['direccion_envio'];

      // Insertar en la tabla PEDIDO
      $stmt = $conn->prepare('INSERT INTO PEDIDO (id_cliente, direccion, total) VALUES (?, ?, ?)');
      $stmt->bind_param('isd', $id_cliente, $direccion, $total);
      $stmt->execute();
      $id_pedido = $stmt->insert_id;
      $stmt->close();

      // Insertar en la tabla DETALLES_PEDIDO
      $stmt = $conn->prepare('INSERT INTO DETALLES_PEDIDO (id_pedido, id_producto, cantidad, precio, talla) VALUES (?, ?, ?, ?, ?)');
      foreach ($productos as $producto) {
         $stmt->bind_param('iiids', $id_pedido, $producto['id_producto'], $producto['cantidad'], $producto['precio'], $producto['talla']);
         $stmt->execute();
      }
      $stmt->close();

      // Vaciar el carrito del cliente
      $stmt = $conn->prepare('DELETE FROM CARRITO WHERE id_cliente = ?');
      $stmt->bind_param('i', $id_cliente);
      $stmt->execute();
      $stmt->close();

      // Confirmar la transacción
      $conn->commit();

      echo json_encode(['status' => 'success', 'message' => 'Pedido creado con éxito.']);
   } catch (Exception $e) {
      // Revertir la transacción en caso de error
      $conn->rollback();
      echo json_encode(['status' => 'error', 'message' => 'Error al crear el pedido: ' . $e->getMessage()]);
   } finally {
      $bd->cerrar();
   }
} else {
   echo json_encode(['status' => 'error', 'message' => 'No se pudo conectar a la base de datos.']);
}
