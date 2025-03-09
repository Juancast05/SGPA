<?php

include('./modelo_jefe.php');

if (isset($_POST['RegistrarCoformador'])) {
    $Nombre_Coformador = $_POST['Nombre_Coformador'];
    $Apellido_Coformador = $_POST['Apellido_Coformador'];
    $Correo_Coformador = $_POST['Correo_Coformador'];
    $Telefono = $_POST['Telefono'];
    $ID_Empresa = $_POST['ID_Empresa'];

    $resultado = RegistrarCoformador($Nombre_Coformador, $Apellido_Coformador, $Correo_Coformador, $Telefono, $ID_Empresa);

    if ($resultado == TRUE) {
        header('location: ./registrar_jefe.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['actualizarCoformador'])) {
    $ID_Coformador = $_POST['ID_Coformador'];
    $Nombre_Coformador = $_POST['Nombre_Coformador'];
    $Apellido_Coformador = $_POST['Apellido_Coformador'];
    $Correo_Coformador = $_POST['Correo_Coformador'];
    $Telefono = $_POST['Telefono'];
    $ID_Empresa = $_POST['ID_Empresa'];

    $resultado = actualizarCoformador($ID_Coformador, $Nombre_Coformador, $Apellido_Coformador, $Correo_Coformador, $Telefono, $ID_Empresa);
    if ($resultado == TRUE) {
        header('location: ./editar_jefe.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['eliminarCoformador'])) {
    $ID_Coformador = $_POST['ID_Coformador'];

    $resultado = eliminarCoformador($ID_Coformador);

    if ($resultado === TRUE) {
        header('location: ./editar_jefe.php');
    } else {
        echo $resultado;
    }
}
