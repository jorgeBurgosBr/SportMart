<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();
$id_cliente = $_SESSION['id_cliente'];

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');
   // Obtener tallas únicas
   $sqlTallas = "SELECT DISTINCT talla FROM VARIANTE ORDER BY talla ASC";
   $resultTallas = mysqli_query($conexion, $sqlTallas);
   $tallas = [];
   while ($row = mysqli_fetch_assoc($resultTallas)) {
      $tallas[] = $row['talla'];
   }
   $response['tallas'] = $tallas;

   // Obtener categorías
   $sqlCategorias = "SELECT * FROM CATEGORIA ORDER BY categoria ASC";
   $resultCategorias = mysqli_query($conexion, $sqlCategorias);
   $categorias = [];
   while ($row = mysqli_fetch_assoc($resultCategorias)) {
      $categorias[] = ['id' => $row['id_categoria'], 'nombre' => $row['categoria']];
   }
   $response['categorias'] = $categorias;

   $bd->cerrar();
}

echo json_encode($response);
