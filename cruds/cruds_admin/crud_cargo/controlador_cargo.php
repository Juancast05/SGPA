<?php

include('./modelo_cargo.php');

if (isset($_POST['RegistrarCargo'])) {
    $Nombre_Cargo = $_POST['Nombre_cargo'];
    $Descripcion_Cargo = $_POST['Descripcion_cargo'];
    $ID_Coformador = $_POST['ID_Coformador'];

    $resultado = registrarCargo($Nombre_Cargo, $Descripcion_Cargo, $ID_Coformador);

    if ($resultado == TRUE) {
        header('location: ./registrar_cargo.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['actualizarCargo'])) {
    $ID_Cargo = $_POST['ID_Cargo'];
    $Nombre_Cargo = $_POST['Nombre_cargo'];
    $Descripcion_Cargo = $_POST['Descripcion_cargo'];
    $ID_Coformador = $_POST['ID_Coformador'];

    $resultado = actualizarCargo($ID_Cargo, $Nombre_Cargo, $Descripcion_Cargo, $ID_Coformador);

    if ($resultado === TRUE) {
        header('location: ./editar_cargo.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['eliminarCargo'])) {
    $ID_Cargo = $_POST['ID_Cargo'];

    $resultado = eliminarCargo($ID_Cargo);

    if ($resultado === TRUE) {
        header('location: ./editar_cargo.php');
    } else {
        echo $resultado;
    }
}
