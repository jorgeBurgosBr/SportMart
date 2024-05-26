<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

if ($bd->conectar()) {
    $conn = $bd->getConexion();
    $bd->seleccionarContexto('sportmart');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $respuesta = [
            'products' => []
        ];

        // Consulta para obtener productos de boxeo
        $sql = "SELECT nombre, descripcion, precio, imagen FROM PRODUCTO WHERE nombre LIKE '%Guantes%' OR nombre LIKE '%Protector bucal%' OR nombre LIKE '%Nike Hyperko%'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $respuesta['products'][] = $row;
                }
            }
        } else {
            // Si la consulta falla
            echo json_encode(['error' => 'Error en la consulta a la base de datos']);
            exit;
        }

        header('Content-Type: application/json');
        echo json_encode($respuesta);
    }
} else {
    // Si la conexión falla
    echo json_encode(['error' => 'Failed to connect to database']);
}
?>
