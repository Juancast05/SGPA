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

function registrarPractica($Fecha_Inicio, $Fecha_Fin, $Fecha_Seguimiento, $Observaciones, $Continuidad,$bitacora)
{
    global $conexion;
    abrirConexion();
    $query = "INSERT INTO practicas (Fecha_Inicio,Fecha_Fin,Fecha_Seguimiento,Observaciones,Continuidad,bitacora)
    VALUES ('$Fecha_Inicio','$Fecha_Fin','$Fecha_Seguimiento','$Observaciones','$Continuidad','$bitacora')";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error en la inserción: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function actualizarPractica($ID_Practica, $Fecha_Inicio, $Fecha_Fin, $Fecha_Seguimiento, $Observaciones, $Continuidad, $bitacora)
{
    global $conexion;
    abrirConexion();
    $query = "UPDATE practicas SET Fecha_Inicio = '$Fecha_Inicio', Fecha_Fin = '$Fecha_Fin', Fecha_Seguimiento = '$Fecha_Seguimiento', Observaciones = '$Observaciones', Continuidad = '$Continuidad', bitacora = '$bitacora' WHERE ID_Practica = '$ID_Practica'";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function obtenerPracticas()
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM practicas";
    $resultado = $conexion->query($query);
    $practicas = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $practicas[] = $fila;
        }
    }
    cerrarConexion();
    return $practicas;
}

function obtenerPracticaPorId($id_practica)
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM practicas WHERE ID_Practica = '$id_practica'";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}


function eliminarPractica($ID_Practica)
{
    global $conexion;
    abrirConexion();
    $query = "DELETE FROM practicas WHERE ID_Practica = $ID_Practica";
    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}
