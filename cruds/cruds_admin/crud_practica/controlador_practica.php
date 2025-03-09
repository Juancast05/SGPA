<?php

include('./modelo_practica.php');

if (isset($_POST['registrarPractica'])) {
    $Fecha_Inicio = $_POST['Fecha_Inicio'];
    $Fecha_Fin = $_POST['Fecha_Fin'];
    $Fecha_Seguimiento = $_POST['Fecha_Seguimiento'];
    $Observaciones = $_POST['Observaciones'];
    $Continuidad = $_POST['Continuidad'];

    $resultado = registrarPractica($Fecha_Inicio, $Fecha_Fin, $Fecha_Seguimiento, $Observaciones, $Continuidad);

    if ($resultado === TRUE) {
        header('location: ./registrar_practica.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['actualizarPractica'])) {
    $ID_Practica = $_POST['ID_Practica'];
    $Fecha_Inicio = $_POST['Fecha_Inicio'];
    $Fecha_Fin = $_POST['Fecha_Fin'];
    $Fecha_Seguimiento = $_POST['Fecha_Seguimiento'];
    $Observaciones = $_POST['Observaciones'];
    $Continuidad = $_POST['Continuidad'];

    $resultado = actualizarPractica($ID_Practica, $Fecha_Inicio, $Fecha_Fin, $Fecha_Seguimiento, $Observaciones, $Continuidad);

    if ($resultado === TRUE) {
        header('location: ./editar_practica.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['eliminarPractica'])) {
    $ID_Practica = $_POST['ID_Practica'];

    $resultado = eliminarPractica($ID_Practica);

    if ($resultado === TRUE) {
        header('location: ./editar_practica.php');
    } else {
        echo $resultado;
    }
}
