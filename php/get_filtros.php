<?php
session_start();
require_once 'conecta.php';

$bd = new BaseDeDatos();
$id_cliente = $_SESSION['id_cliente'];

if ($bd->conectar()) {
   $conn = $bd->getConexion();
   $bd->seleccionarContexto('sportmart');

   // Obtener categorías
   $categoriasQuery = "SELECT DISTINCT categoria FROM CATEGORIA";
   $categoriasResult = $conn->query($categoriasQuery);

   $categorias = array();
   while ($row = $categoriasResult->fetch_assoc()) {
      $categorias[] = $row['categoria'];
   }

   // Obtener deportes 
   $deportesQuery = "SELECT DISTINCT deporte FROM DEPORTE";
   $deportesResult = $conn->query($deportesQuery);

   $deportes = array();
   while ($row = $deportesResult->fetch_assoc()) {
      $deportes[] = $row['deporte'];
   }

   // Obtener tallas
   $tallasQuery = "SELECT DISTINCT talla FROM VARIANTE";
   $tallasResult = $conn->query($tallasQuery);

   $tallas = array();
   while ($row = $tallasResult->fetch_assoc()) {
      $tallas[] = $row['talla'];
   }

   echo json_encode([
      'categorias' => $categorias,
      'deportes' => $deportes,
      'tallas' => $tallas
   ]);

   $bd->cerrar();
}
