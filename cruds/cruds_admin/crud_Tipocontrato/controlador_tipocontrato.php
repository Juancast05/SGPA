<?php

include('./modelo_tipocontrato.php');

if (isset($_POST['RegistrarContrato'])) {
    $Nombre_Contrato = $_POST['Nombre_contrato'];
    $Descripcion_Contrato = $_POST['Descripcion_contrato'];
    $ID_Practica = $_POST['ID_Practica'];

    $resultado = RegistrarContrato($Nombre_Contrato, $Descripcion_Contrato, $ID_Practica);

    if ($resultado == TRUE) {
        header('location: ./registrar_tipocontrato.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['actualizarContrato'])) {
    $ID_Contrato = $_POST['ID_Contrato'];
    $Nombre_Contrato = $_POST['Nombre_contrato'];
    $Descripcion_Contrato = $_POST['Descripcion_contrato'];
    $ID_Practica = $_POST['ID_Practica'];

    $resultado = actualizarContrato($ID_Contrato, $Nombre_Contrato, $Descripcion_Contrato, $ID_Practica);


    if ($resultado === TRUE) {
        header('location: ./editar_tipocontrato.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['eliminarContrato'])) {
    $ID_Contrato = $_POST['ID_Contrato'];

    $resultado = eliminarContrato($ID_Contrato);

    if ($resultado === TRUE) {
        header('location: ./editar_tipocontrato.php');
    } else {
        echo $resultado;
    }
}
