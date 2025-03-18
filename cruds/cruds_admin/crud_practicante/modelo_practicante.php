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


function obtenerNombrePrograma($id_programa) {
    
    global $conexion;
    abrirConexion();
   
    $query = "SELECT Nombre_Programa FROM programas WHERE ID_Programa = ?";
    $stmt = $conexion->prepare($query);
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("i", $id_programa);
    $stmt->execute();
    $stmt->bind_result($nombre_programa);
    $stmt->fetch();

    $stmt->close();
    $conexion->close();

    return $nombre_programa;
}

function RegistrarPracticante($Tipo_Identificacion, $Identificacion, $Nombre_Practicante, $Apellido_Practicante, $Fecha_Nacimiento, $Pais_Nacimiento, $Departamento_Nacimiento, $Ciudad_Nacimiento, $Correo_Personal, $Correo_Sena, $Telefono, $ID_Practica, $ID_Programa)
{
    global $conexion;
    abrirConexion();

    $checkQuery = "SELECT Identificacion FROM practicantes WHERE Identificacion = '$Identificacion'";
    $resultado = $conexion->query($checkQuery);

    if ($resultado->num_rows > 0) {
        cerrarConexion();
        return "El practicante ya se encuentra registrado.";
    }

    $query = "INSERT INTO practicantes (Tipo_Identificacion, Identificacion, Nombre_Practicante, Apellido_Practicante, Fecha_Nacimiento, Pais_Nacimiento, Departamento_Nacimiento, Ciudad_Nacimiento, Correo_Personal, Correo_Sena, Telefono, ID_Practica, ID_Programa)
    VALUES ('$Tipo_Identificacion', '$Identificacion', '$Nombre_Practicante', '$Apellido_Practicante', '$Fecha_Nacimiento', '$Pais_Nacimiento', '$Departamento_Nacimiento', '$Ciudad_Nacimiento', '$Correo_Personal', '$Correo_Sena', '$Telefono', '$ID_Practica', '$ID_Programa')";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return "Registro Exitoso";
    } else {
        $error = "Hubo un error en la inserción: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}

function obtenerPracticantes()
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM practicantes";
    $resultado = $conexion->query($query);
    $practicantes = [];

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $practicantes[] = $fila;
        }
    }
    cerrarConexion();
    return $practicantes;
}

function obtenerPracticantePorId($id_practicante)
{
    global $conexion;
    abrirConexion();
    $query = "SELECT * FROM practicantes WHERE ID_Practicante = '$id_practicante'";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function actualizarPracticante($ID_Practicante, $Tipo_Identificacion, $Identificacion, $Nombre_Practicante, $Apellido_Practicante, $Fecha_Nacimiento, $Pais_Nacimiento, $Departamento_Nacimiento, $Ciudad_Nacimiento, $Correo_Personal, $Correo_Sena, $Telefono, $ID_Practica, $ID_Programa)
{
    global $conexion;
    abrirConexion();


    $query = "UPDATE practicantes 
              SET Tipo_Identificacion = '$Tipo_Identificacion', 
                  Identificacion = '$Identificacion', 
                  Nombre_Practicante = '$Nombre_Practicante', 
                  Apellido_Practicante = '$Apellido_Practicante', 
                  Fecha_Nacimiento = '$Fecha_Nacimiento', 
                  Pais_Nacimiento = '$Pais_Nacimiento', 
                  Departamento_Nacimiento = '$Departamento_Nacimiento', 
                  Ciudad_Nacimiento = '$Ciudad_Nacimiento', 
                  Correo_Personal = '$Correo_Personal',
                  Correo_Sena = '$Correo_Sena', 
                  Telefono = '$Telefono',
                  ID_Practica = '$ID_Practica',
                  ID_Programa = '$ID_Programa' 
              WHERE ID_Practicante = '$ID_Practicante'";

    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al actualizar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}
function eliminarPracticante($ID_Practicante)
{
    global $conexion;
    abrirConexion();
    $query = "DELETE FROM practicantes WHERE ID_Practicante = $ID_Practicante";
    if ($conexion->query($query) === TRUE) {
        cerrarConexion();
        return TRUE;
    } else {
        $error = "Hubo un error al eliminar: " . $conexion->error;
        cerrarConexion();
        return $error;
    }
}
