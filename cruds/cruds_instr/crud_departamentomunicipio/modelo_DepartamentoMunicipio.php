<?php
$conexion;

function AbrirConexion()
{
    global $conexion;
    $db_direccion = "localhost";
    $db_nombre = "sgpa";
    $db_usuario = "root";
    $db_contrasena = "";

    try {
        if (!$conexion) {
            $conexion = new mysqli($db_direccion, $db_usuario, $db_contrasena, $db_nombre);
        }
    } catch (\Throwable $th) {
        throw new Exception("Error de conexión: " . $th->getMessage());
    }
}

function CerrarConexion()
{
    global $conexion;
    if ($conexion) {
        $conexion->close();
    }
}


function CrearDepartamento($Nombre_Departamento, $Descripcion_Departamento)
{
    AbrirConexion();
    global $conexion;

    $query = "INSERT INTO departamentos (Nombre_Departamento, Descripcion_Departamento)
              VALUES ('$Nombre_Departamento', '$Descripcion_Departamento')";

    if ($conexion->query($query) === TRUE) {
        return TRUE;
    } else {
        return "Hubo un error al registrar el departamento: " . $conexion->error;
    }
}


function CrearMunicipio($Nombre_Municipio, $Descripcion_Municipio, $ID_Departamento)
{
    AbrirConexion();
    global $conexion;

    $query = "INSERT INTO municipios (Nombre_Municipio, Descripcion_Municipio, ID_Departamento)
              VALUES ('$Nombre_Municipio', '$Descripcion_Municipio', '$ID_Departamento')";

    if ($conexion->query($query) === TRUE) {
        return TRUE;
    } else {
        return "Hubo un error al registrar el municipio: " . $conexion->error;
    }
}

//------------------------------------------------------------------------------//

function obtenerUltimoDepartamentoID()
{
    global $conexion;
    AbrirConexion();

    $query = "SELECT MAX(ID_Departamentos) AS ID_Departamentos FROM departamentos";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        return $row['ID_Departamentos'];
    } else {
        return null;
    }
}

function obtenerDepartamentos()
{
    global $conexion;
    AbrirConexion();
    $query = "SELECT * FROM departamentos";
    $resultado = $conexion->query($query);
    $departamentos = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $departamentos[] = $fila;
        }
    }
    return $departamentos;
}

function obtenerMunicipiosPorDepartamento($ID_Departamento)
{
    global $conexion;
    AbrirConexion();
    $query = "SELECT * FROM municipios WHERE ID_Departamento = $ID_Departamento";
    $resultado = $conexion->query($query);
    $municipios = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $municipios[] = $fila;
        }
    }
    return $municipios;
}

function obtenerDepartamentoPorID($ID_Departamento)
{
    global $conexion;
    AbrirConexion();
    $query = "SELECT * FROM departamentos WHERE ID_Departamentos = $ID_Departamento";
    $resultado = $conexion->query($query);
    return $resultado->fetch_assoc();
}

function obtenerMunicipioPorID($ID_Municipio)
{
    global $conexion;
    AbrirConexion();
    $query = "SELECT * FROM municipios WHERE ID_Municipio = $ID_Municipio";
    $resultado = $conexion->query($query);
    return $resultado->fetch_assoc();
}


//------------------------------------------------------------------------------//


function actualizarDepartamento($ID_Departamento, $Descripcion_Departamento)
{
    global $conexion;
    AbrirConexion();

    $query = "UPDATE departamentos 
              SET Descripcion_Departamento = '$Descripcion_Departamento'
              WHERE ID_Departamentos   = '$ID_Departamento'";

    if ($conexion->query($query) === TRUE) {
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar el departamento: " . $conexion->error;
        return $error;
    }
}

function actualizarMunicipio($ID_Municipio, $Descripcion_Municipio, $ID_Departamento)
{
    global $conexion;
    AbrirConexion();

    $query = "UPDATE municipios
              SET Descripcion_Municipio = '$Descripcion_Municipio', 
                  ID_Departamento = '$ID_Departamento'
              WHERE ID_Municipio = '$ID_Municipio'";

    if ($conexion->query($query) === TRUE) {
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar el municipio: " . $conexion->error;
        return $error;
    }
}


//------------------------------------------------------------------------------//

function eliminarDepartamento($ID_Departamentos)
{
    global $conexion;
    abrirConexion();


    $query = "DELETE FROM departamentos WHERE ID_Departamentos = $ID_Departamentos";
    if ($conexion->query($query) === TRUE) {
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}


function eliminarMunicipio($ID_Municipio)
{
    global $conexion;
    abrirConexion();


    $query = "DELETE FROM municipios WHERE ID_Municipio = $ID_Municipio";
    if ($conexion->query($query) === TRUE) {
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}
