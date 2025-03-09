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

function registrarEmpresa($NIT, $Nombre_Empresa, $Direccion, $Telefono_Empresa, $Correo_Empresa, $ID_Practica)
{
    global $conexion;
    abrirConexion();
    $query = "INSERT INTO empresas (NIT,Nombre_Empresa,Direccion,Telefono_Empresa,Correo_Empresa,ID_Practica)
    VALUES ('$NIT','$Nombre_Empresa','$Direccion','$Telefono_Empresa','$Correo_Empresa',  '$ID_Practica')";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error en la inserción: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function actualizarEmpresa($ID_Empresa, $NIT, $Nombre_Empresa, $Direccion, $Telefono_Empresa, $Correo_Empresa, $ID_Practica)
{
    global $conexion;
    abrirConexion();
    $query = "UPDATE empresas SET NIT = '$NIT', Nombre_Empresa = '$Nombre_Empresa', Direccion = '$Direccion', Telefono_Empresa = '$Telefono_Empresa', Correo_Empresa = '$Correo_Empresa', ID_Practica = '$ID_Practica' WHERE ID_Empresa = $ID_Empresa";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function obtenerEmpresas()
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM empresas";
    $resultado = $conexion->query($query);
    $empresas = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $empresas[] = $fila;
        }
    }
    cerrarConexion();
    return $empresas;
}

function obtenerEmpresaPorId($id_empresa)
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM empresas WHERE ID_Empresa = '$id_empresa'";
    $result = $conexion->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }

    cerrarConexion();
}


function eliminarEmpresa($ID_Empresa)
{
    global $conexion;
    abrirConexion();
    $query = "DELETE FROM empresas WHERE ID_Empresa = $ID_Empresa";
    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}
