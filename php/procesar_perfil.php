<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

$response = [
    "success" => false,
    "error" => null,
    "nombre" => null,
    "apellidos" => null,
    "correo" => null,
];

if ($bd->conectar()) {
    $conn = $bd->getConexion();
    $bd->seleccionarContexto('sportmart');

    // Verificamos si el cliente ha iniciado sesión
    if (isset($_SESSION['id_cliente'])) {
        $id_cliente = $_SESSION['id_cliente'];

        // Consulta para obtener la información del cliente que ha iniciado sesión
        $sql = "SELECT nombre, apellidos, correo FROM cliente WHERE id_cliente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificamos si se encontró el cliente
        if ($fila = $result->fetch_assoc()) {
            $response["success"] = true;
            $response["nombre"] = $fila['nombre'];
            $response["apellidos"] = $fila['apellidos'];
            $response["correo"] = $fila['correo'];
        } else {
            $response["error"] = "No se encontró información para el cliente";
        }

        $stmt->close();
    } else {
        $response["error"] = "El cliente no ha iniciado sesión";
    }

} else {
    $response["error"] = "No se pudo conectar a la base de datos";
}

// Enviamos la información del cliente en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
