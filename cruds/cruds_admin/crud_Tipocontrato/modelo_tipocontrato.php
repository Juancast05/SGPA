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

function RegistrarContrato($Nombre_Contrato, $Descripcion_Contrato,  $ID_Practica)
{
    global $conexion;
    abrirConexion();
    $query = "INSERT INTO tiposcontratos(Nombre_Contrato, Descripcion_Contrato, ID_Practica) 
    VALUES ('$Nombre_Contrato', '$Descripcion_Contrato', '$ID_Practica')";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error en la insercion: " . $conexion->error;
        return $error;
    }
}

function obtenerContratos()
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM tiposcontratos";
    $resultado = $conexion->query($query);
    $contratos = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $contratos[] = $fila;
        }
    }
    cerrarConexion();
    return $contratos;
}

function obtenerContratosPorId($id_contratos)
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM tiposcontratos WHERE ID_Contrato = '$id_contratos'";
    $result = $conexion->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }

    cerrarConexion();
}

function actualizarContrato($ID_Contrato, $Nombre_Contrato, $Descripcion_Contrato, $ID_Practica)
{
    global $conexion;
    abrirConexion();
    $query = "UPDATE tiposcontratos SET Nombre_Contrato = '$Nombre_Contrato', Descripcion_Contrato = '$Descripcion_Contrato', ID_Practica = '$ID_Practica' WHERE ID_Contrato = $ID_Contrato";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function eliminarContrato($ID_Contrato)
{
    global $conexion;
    abrirConexion();
    $query = "DELETE FROM tiposcontratos WHERE ID_Contrato = $ID_Contrato";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        return $error;
    }
}
