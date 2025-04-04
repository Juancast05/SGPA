<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sgpa";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $respuesta = $_POST["respuesta"];
    $nueva_contrasena = $_POST["nueva_contrasena"];

    // Verificar las preguntas de seguridad
    $sql = "SELECT * FROM administradores WHERE nombres_a = ? AND respuesta = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $respuesta);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Actualizar contraseña
        $sql_update = "UPDATE administradores SET contrasena_a = ? WHERE nombres_a = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ss", $nueva_contrasena, $nombre);
        if ($stmt_update->execute()) {
            echo "La contraseña ha sido actualizada correctamente.";
        } else {
            echo "Error al actualizar la contraseña.";
        }
    } else {
        echo "Usuario o respuesta de seguridad incorrectos.";
    }
}
$conn->close();
?>