<?php

include('./modelo_practicante.php');

if (isset($_POST['RegistrarPracticante'])) {
    $Tipo_Identificacion = $_POST['Tipo_Identificacion'];
    $Identificacion = $_POST['Identificacion'];
    $Nombre_Practicante = $_POST['Nombre_Practicante'];
    $Apellido_Practicante = $_POST['Apellido_Practicante'];
    $Fecha_Nacimiento = $_POST['Fecha_Nacimiento'];
    $Pais_Nacimiento = $_POST['Pais_Nacimiento'];
    $Departamento_Nacimiento = $_POST['Departamento_Nacimiento'];
    $Ciudad_Nacimiento = $_POST['Ciudad_Nacimiento'];
    $Correo_Personal = $_POST['Correo_Personal'];
    $Correo_Sena = $_POST['Correo_Sena'];
    $Telefono = $_POST['Telefono'];
    $ID_Practica = $_POST['ID_Practica'];
    $ID_Programa = $_POST['ID_Programa'];

    $resultado = RegistrarPracticante(
        $Tipo_Identificacion,
        $Identificacion,
        $Nombre_Practicante,
        $Apellido_Practicante,
        $Fecha_Nacimiento,
        $Pais_Nacimiento,
        $Departamento_Nacimiento,
        $Ciudad_Nacimiento,
        $Correo_Personal,
        $Correo_Sena,
        $Telefono,
        $ID_Practica,
        $ID_Programa
    );

    if ($resultado === "Registro Exitoso") {
        header('location: ./registrar_practicante.php?success=1');
    } else {
        header('location: ./registrar_practicante.php?error=' . urlencode($resultado));
    }
    exit;
}

if (isset($_POST['actualizarPracticante'])) {
    if (isset($_POST['ID_Practicante']) && !empty($_POST['ID_Practicante'])) {
        $id = $_POST['ID_Practicante'];
        $nombre = $_POST['Nombre_Practicante'];
        $apellido = $_POST['Apellido_Practicante'];
        $tipo_identificacion = $_POST['Tipo_Identificacion'];
        $identificacion = $_POST['Identificacion'];
        $Fecha_Nacimiento = $_POST['Fecha_Nacimiento'];
        $Pais_Nacimiento = $_POST['Pais_Nacimiento'];
        $Departamento_Nacimiento = $_POST['Departamento_Nacimiento'];
        $Ciudad_Nacimiento = $_POST['Ciudad_Nacimiento'];
        $Correo_Personal = $_POST['Correo_Personal'];
        $Correo_Sena = $_POST['Correo_Sena'];
        $Telefono = $_POST['Telefono'];
        $id_practica = $_POST['ID_Practica'];
        $id_programa = $_POST['ID_Programa'];

        $resultado = actualizarPracticante(
            $id,
            $tipo_identificacion,
            $identificacion,
            $nombre,
            $apellido,
            $Fecha_Nacimiento,
            $Pais_Nacimiento,
            $Departamento_Nacimiento,
            $Ciudad_Nacimiento,
            $Correo_Personal,
            $Correo_Sena,
            $Telefono,
            $id_practica,
            $id_programa
        );

        if ($resultado === TRUE) {
            header('Location: ./editar_practicante.php');
            exit;
        } else {
            echo $resultado;
        }
    } else {
        echo "ID_Practicante no válido";
    }
}


//-------------------------------------------------------------------------//

if (isset($_POST['eliminarPracticante'])) {
    $ID_Practicante = $_POST['ID_Practicante'];

    $resultado = eliminarPracticante($ID_Practicante);

    if ($resultado === TRUE) {
        header('location: ./editar_practicante.php');
    } else {
        echo $resultado;
    }
}
