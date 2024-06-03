<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

$response = [
    "success" => false,
    "error" => null,
    "fecha_nac_cliente" => null,
    "telefono" => null,
    "provincia" => null,
    "localidad" => null,
    "direccion_envio" => null,
    "codigo_postal" => null,
];

if ($bd->conectar()) {
    $conn = $bd->getConexion();
    $bd->seleccionarContexto('sportmart');

    // Verificamos si el cliente ha iniciado sesión
    if (isset($_SESSION['id_cliente'])) {
        $id_cliente = $_SESSION['id_cliente'];

        // Consulta para obtener la información del perfil del cliente que ha iniciado sesión
        $sql = "SELECT fecha_nac_cliente, telefono, provincia, localidad, direccion_envio, codigo_postal FROM perfil_cliente WHERE id_cliente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_cliente);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificamos si se encontró el perfil del cliente
        if ($fila = $result->fetch_assoc()) {
            $response["success"] = true;
            $response["fecha_nac_cliente"] = $fila['fecha_nac_cliente'];
            $response["telefono"] = $fila['telefono'];
            $response["provincia"] = $fila['provincia'];
            $response["localidad"] = $fila['localidad'];
            $response["direccion_envio"] = $fila['direccion_envio'];
            $response["codigo_postal"] = $fila['codigo_postal'];
        } else {
            $response["error"] = "No se encontró información para el perfil del cliente";
        }

        $stmt->close();
    } else {
        $response["error"] = "El cliente no ha iniciado sesión";
    }

} else {
    $response["error"] = "No se pudo conectar a la base de datos";
}

// Enviamos la información del perfil del cliente en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
