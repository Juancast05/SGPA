<?php

global $conexion;
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "sgpa";

try {
    $conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }
} catch (\Throwable $th) {
    throw $th->getMessage();
}

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
