<?php

include('./modelo_programa.php');

if (isset($_POST['RegistrarPrograma'])) {
    $Nombre_Programa = $_POST['Nombre_Programa'];
    $Descripcion_Programa = $_POST['Descripcion_Programa'];
    $ID_Practicante = $_POST['ID_Practicante'];

    $resultado = RegistrarPrograma($Nombre_Programa, $Descripcion_Programa, $ID_Practicante);

    if ($resultado == TRUE) {
        header('location: ./registrar_programa.php');
    } else {
        echo $resultado;
    }
}

if (isset($_POST['actualizarPrograma'])) {
    if (isset($_POST['ID_Programa']) && !empty($_POST['ID_Programa'])) {
        $ID_Programa = $_POST['ID_Programa'];
        $Nombre_Programa = $_POST['Nombre_Programa'];
        $Descripcion_Programa = $_POST['Descripcion_Programa'];

        $resultado = actualizarPrograma($ID_Programa, $Nombre_Programa, $Descripcion_Programa);


        if ($resultado === TRUE) {
            header('location: ./editar_programa.php');
        } else {
            echo $resultado;
        }
    } else {
        echo "ID_Programa no válido";
    }
}

if (isset($_POST['eliminarPrograma'])) {
    $ID_Programa = $_POST['ID_Programa'];

    $resultado = eliminarPrograma($ID_Programa);

    if ($resultado === TRUE) {
        header('location: ./editar_programa.php');
    } else {
        echo $resultado;
    }
}
