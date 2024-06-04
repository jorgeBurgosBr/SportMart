<?php
session_start();
require_once 'conecta.php';
$bd = new BaseDeDatos();

// Conectar a la base de datos
if ($bd->conectar()) {
    $conn = $bd->getConexion();
    $bd->seleccionarContexto('sportmart');

    // Verificar el método de la solicitud
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Respuesta predeterminada
        $respuesta = [
            'success' => false,
            'error' => null,
        ];

        // Obtener el ID del cliente de la sesión
        $id_cliente = $_SESSION['id_cliente'];

        // Realizar la consulta para obtener los datos del perfil del cliente utilizando una sentencia preparada
        $sql = "SELECT * FROM perfil_cliente WHERE id_cliente = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_cliente);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Actualizar la respuesta con los datos del perfil del cliente
            $respuesta['success'] = true;
            $respuesta['fecha_nac_cliente'] = $row['fecha_nac_cliente'];
            $respuesta['telefono'] = $row['telefono'];
            $respuesta['provincia'] = $row['provincia'];
            $respuesta['localidad'] = $row['localidad'];
            $respuesta['direccion_envio'] = $row['direccion_envio'];
            $respuesta['codigo_postal'] = $row['codigo_postal'];
            $respuesta['miembro_desde'] = $row['miembro_desde'];

            // Verificar si la función de actualización está presente en el formulario
            $funcion = isset($_POST['funcion']) ? $_POST['funcion'] : '';

            if ($funcion === 'updateForm') {
                // Verificar si al menos un campo necesario para la actualización está presente
                if (
                    isset($_POST['fecha_nac_cliente']) ||
                    isset($_POST['telefono']) ||
                    isset($_POST['provincia']) ||
                    isset($_POST['localidad']) ||
                    isset($_POST['direccion_envio']) ||
                    isset($_POST['codigo_postal'])
                ) {
                    // Escapar y obtener los nuevos datos para la actualización
                    $newFechaNac = mysqli_real_escape_string($conn, $_POST['fecha_nac_cliente']);
                    $newTelefono = mysqli_real_escape_string($conn, $_POST['telefono']);
                    $newProvincia = mysqli_real_escape_string($conn, $_POST['provincia']);
                    $newLocalidad = mysqli_real_escape_string($conn, $_POST['localidad']);
                    $newDireccionEnvio = mysqli_real_escape_string($conn, $_POST['direccion_envio']);
                    $newCodigoPostal = mysqli_real_escape_string($conn, $_POST['codigo_postal']);

                    // Actualización de la tabla utilizando una sentencia preparada
                    $sqlUpdate = "UPDATE perfil_cliente SET
                                    fecha_nac_cliente = ?,
                                    telefono = ?,
                                    provincia = ?,
                                    localidad = ?,
                                    direccion_envio = ?,
                                    codigo_postal = ?
                                    WHERE id_cliente = ?";

                    $stmtUpdate = mysqli_prepare($conn, $sqlUpdate);

                    mysqli_stmt_bind_param($stmtUpdate, "ssssssi", $newFechaNac, $newTelefono, $newProvincia, $newLocalidad, $newDireccionEnvio, $newCodigoPostal, $id_cliente);

                    $resultUpdate = mysqli_stmt_execute($stmtUpdate);

                    if ($resultUpdate) {
                        $respuesta['success'] = true;
                        $respuesta['message'] = 'Datos actualizados con éxito';
                    } else {
                        $respuesta['error'] = 'Error en la actualización SQL: ' . mysqli_error($conn);
                    }

                    mysqli_stmt_close($stmtUpdate);
                } else {
                    $respuesta['error'] = 'Datos insuficientes para la actualización';
                }
            }
        } else {
            // Cliente no encontrado
            $respuesta['error'] = 'Cliente no encontrado';
        }
    } else {
        // Error en la consulta SQL
        $respuesta['error'] = 'Error en la consulta SQL: ' . mysqli_error($conn);
    }

    // Enviar la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($respuesta);
}
?>
