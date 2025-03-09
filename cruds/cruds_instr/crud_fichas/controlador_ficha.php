<?php

include('./modelo_ficha.php');

if (isset($_POST['RegistrarFicha'])) {
    $Numero_Ficha = $_POST['Numero_Ficha'];
    $Descripcion_Ficha = $_POST['Descripcion_Ficha'];

    $resultado = registrarFicha($Numero_Ficha, $Descripcion_Ficha);

    if ($resultado === TRUE) {
        header('location: ./registrar_ficha.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['actualizarFicha'])) {
    $ID_Ficha = $_POST['ID_Ficha'];
    $Numero_Ficha = $_POST['Numero_Ficha'];
    $Descripcion_Ficha = $_POST['Descripcion_Ficha'];

    $resultado = actualizarFicha($ID_Ficha, $Numero_Ficha, $Descripcion_Ficha);

    if ($resultado === TRUE) {
        header('location: ./registrar_ficha.php');
    }
}

if (isset($_POST['eliminarFicha'])) {
    $ID_Ficha = $_POST['ID_Ficha'];

    $resultado = eliminarFicha($ID_Ficha);

    if ($resultado === TRUE) {
        header('location: ./registrar_ficha.php');
    }
}
