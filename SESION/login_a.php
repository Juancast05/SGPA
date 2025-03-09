<?php

require 'conexion.php';

if (isset($_POST['btn'])) {
    $correo_a = $_POST['correo_a'];
    $contrasena_a = $_POST['contrasena_a'];

    session_start();
    $_SESSION['correo_a'] = $correo_a;

    $sql = "SELECT * FROM administradores WHERE correo_a = '$correo_a' AND contrasena_a = '$contrasena_a'";
    $resultado = mysqli_query($conexion, $sql);
    $filas = mysqli_fetch_array($resultado);

    if ($filas['rol_a'] == 1) {
        header('location: ../INICIO/admin.php?session=success');
    } else {
        header('location: /SGPA/SESION/ingreso.php?error=1');
    }
}

if (isset($_SESSION['message'])) {
    echo "<script>alert('" . $_SESSION['message'] . "');</script>";
    unset($_SESSION['message']);
}
