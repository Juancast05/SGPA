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
            die("Error en la conexión: " . $conexion->connect_error);
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

function registrarArea($Nombre_Area, $Descripcion_Area, $ID_Empresa)
{
    global $conexion;
    abrirConexion();
    $query = "INSERT INTO areas (Nombre_Area, Descripcion_Area, ID_Empresa)
    VALUES ('$Nombre_Area', '$Descripcion_Area', '$ID_Empresa')";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error en la inserción: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function obtenerArea()
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM areas";
    $resultado = $conexion->query($query);
    $areas = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $areas[] = $fila;
        }
    }
    cerrarConexion();
    return $areas;
}

function obtenerAreaPorId($id_area)
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM areas WHERE ID_Area = '$id_area'";
    $result = $conexion->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }

    cerrarConexion();
}


function actualizarArea($ID_Area, $Nombre_Area, $Descripcion_Area, $ID_Empresa)
{
    global $conexion;
    abrirConexion();
    $query = "UPDATE areas SET Nombre_Area = '$Nombre_Area', Descripcion_Area = '$Descripcion_Area', ID_Empresa = '$ID_Empresa' WHERE ID_Area = $ID_Area";
    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function eliminarArea($ID_Area)
{
    global $conexion;
    abrirConexion();
    $query = "DELETE FROM areas WHERE ID_Area = $ID_Area";
    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}
