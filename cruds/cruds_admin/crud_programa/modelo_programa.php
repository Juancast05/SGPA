<?php

$conexion;

function abrirConexion()
{
    global $conexion;
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "sgpa";

    try {
        $conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
        if ($conexion->connect_error) {
            die("Error en la conexion: " . $conexion->connect_error);
        }
    } catch (\Throwable $th) {
        throw $th->getMessage();
    }
}

function cerrarConexion()
{
    global $conexion;
    $conexion->close();
}

function RegistrarPrograma($Nombre_Programa, $Descripcion_Programa)
{
    global $conexion;
    abrirConexion();
    $query = "INSERT INTO programas(Nombre_Programa,Descripcion_Programa) VALUES ('$Nombre_Programa', '$Descripcion_Programa')";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error en la insercion: " . $conexion->error;
        return $error;
    }
}

function obtenerProgramas()
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM programas";
    $resultado = $conexion->query($query);
    $programas = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $programas[] = $fila;
        }
    }
    cerrarConexion();
    return $programas;
}

function obtenerProgramaPorId($ID_Programa)
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM programas WHERE ID_Programa = '$ID_Programa'";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function actualizarPrograma($ID_Programa, $Nombre_Programa, $Descripcion_Programa)
{
    global $conexion;
    abrirConexion();
    $query = "UPDATE programas SET Nombre_Programa = '$Nombre_Programa', Descripcion_Programa = '$Descripcion_Programa' WHERE ID_Programa = $ID_Programa";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function eliminarPrograma($ID_Programa)
{
    global $conexion;
    abrirConexion();
    $query = "DELETE FROM programas WHERE ID_Programa = $ID_Programa";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        return $error;
    }
}
