<?php

require 'conexion.php';

if (isset($_POST['btn_2'])) {
    $correo_i = $_POST['correo_i'];
    $contrasena_i = $_POST['contrasena_i'];

    session_start();
    $_SESSION['correo_i'] = $correo_i;

    $sql = "SELECT * FROM instructores WHERE correo_i = '$correo_i' AND contrasena_i = '$contrasena_i'";
    $resultado = mysqli_query($conexion, $sql);
    $filas = mysqli_fetch_array($resultado);

    if ($filas['rol_i'] == 2) {
        header("location:../INICIO/instructor.php?session=success");
    } else {
        header('location: /SGPA/SESION/ingreso.php?error_i=1');
    }
}
