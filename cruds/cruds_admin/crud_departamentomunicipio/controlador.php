<?php
require_once('modelo_DepartamentoMunicipio.php');


if (isset($_POST['RegistrarDepartamentoMunicipio'])) {
    $Nombre_Departamento = $_POST['departamento'];
    $Descripcion_Departamento = $_POST['Descripcion_Departamento'];
    $Nombre_Municipio = $_POST['municipio'];
    $Descripcion_Municipio = $_POST['Descripcion_Municipio'];
    $ID_Practicante = $_POST['ID_Practicante'];
    $ID_Empresa = $_POST['ID_Empresa'];


    $resultadoDepartamento = CrearDepartamento($Nombre_Departamento, $Descripcion_Departamento, $ID_Practicante, $ID_Empresa);

    if ($resultadoDepartamento === TRUE) {
        $ID_Departamento = obtenerUltimoDepartamentoID();

        $resultadoMunicipio = CrearMunicipio($Nombre_Municipio, $Descripcion_Municipio, $ID_Departamento);

        if ($resultadoMunicipio === TRUE) {
            header('Location: ./departamento_municipio.php');
        } else {
            echo "Error al registrar municipio: " . $resultadoMunicipio;
        }
    } else {
        echo "Error al registrar departamento: " . $resultadoDepartamento;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ActualizarDepartamentoMunicipio'])) {
    if (isset($_POST['ID_Departamento']) && isset($_POST['Descripcion_Departamento']) && isset($_POST['ID_Municipio']) && isset($_POST['Descripcion_Municipio'])) {
        $ID_Departamentos = $_POST['ID_Departamento'];
        $Descripcion_Departamento = $_POST['Descripcion_Departamento'];
        $ID_Municipio = $_POST['ID_Municipio'];
        $Descripcion_Municipio = $_POST['Descripcion_Municipio'];


        $resultadoDepartamento = actualizarDepartamento($ID_Departamentos, $Descripcion_Departamento);

        if ($resultadoDepartamento === TRUE) {

            $resultadoMunicipio = actualizarMunicipio($ID_Municipio, $Descripcion_Municipio, $ID_Departamentos);

            if ($resultadoMunicipio === TRUE) {
                header('Location: ./editar_municipio.php');
                exit;
            } else {
                echo "Error al actualizar municipio: " . $resultadoMunicipio;
            }
        } else {
            echo "Error al actualizar departamento: " . $resultadoDepartamento;
        }
    } else {
        echo "Faltan datos importantes en el formulario.";
    }
}


if (isset($_POST['eliminarDM'])) {
    $ID_Departamento = $_POST['ID_Departamento'];
    $ID_Municipio = $_POST['ID_Municipio'];


    $resultadoMunicipio = eliminarMunicipio($ID_Municipio);

    $resultadoDepartamento = eliminarDepartamento($ID_Departamento);

    if ($resultadoMunicipio === TRUE && $resultadoDepartamento === TRUE) {
        header('Location: ./editar_DepartamentoMunicipio.php');
    } else {
        echo "Error al eliminar: " . $resultadoMunicipio . ' ' . $resultadoDepartamento;
    }
}

CerrarConexion();
