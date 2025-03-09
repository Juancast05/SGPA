<?php

include('./modelo_area.php');

if (isset($_POST['RegistrarArea'])) {
    $Nombre_Area = $_POST['Nombre_area'];
    $Descripcion_Area = $_POST['Descripcion_area'];
    $ID_Empresa = $_POST['ID_Empresa'];

    $resultado = registrarArea($Nombre_Area, $Descripcion_Area, $ID_Empresa);

    if ($resultado == TRUE) {
        header('location: ./registrar_area.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['actualizarArea'])) {
    $ID_Area = $_POST['ID_Area'];
    $Nombre_Area = $_POST['Nombre_area'];
    $Descripcion_Area = $_POST['Descripcion_area'];
    $ID_Empresa = $_POST['ID_Empresa'];

    $resultado = actualizarArea($ID_Area, $Nombre_Area, $Descripcion_Area, $ID_Empresa);

    if ($resultado === TRUE) {
        header('location: ./editar_area.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['eliminarArea'])) {
    $ID_Area = $_POST['ID_Area'];

    $resultado = eliminarArea($ID_Area);

    if ($resultado === TRUE) {
        header('location: ./editar_area.php');
    } else {
        echo $resultado;
    }
}
