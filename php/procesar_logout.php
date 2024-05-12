<?php
session_start();

// Inicializar la respuesta
$response = [
    "success" => false,
    "message" => "No se pudo cerrar la sesión"
];

// Verificar si hay una sesión activa
if (isset($_SESSION['nombre'])) {
    // Destruir la sesión
    session_unset();
    session_destroy();

    // Establecer la respuesta de éxito
    $response["success"] = true;
    $response["message"] = "Sesión cerrada correctamente";
}

// Devolver la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
