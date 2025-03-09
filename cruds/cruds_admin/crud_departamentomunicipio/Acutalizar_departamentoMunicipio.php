<?php

session_start();
$varsesion = $_SESSION['correo_a'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../../../SESION/ingreso.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="departamento_municipio.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Actualizar</title>

</head>

<body>
    <div class="carousel">
        <div class="carousel-images">
            <img src="./assets/img/img1.jpg" alt="Imagen 1">
            <img src="./assets/img/oriente-antioqueno.jpg" alt="Imagen 2">
            <img src="./assets/img/sena1.jpg" alt="Imagen 3">
        </div>
    </div>

    <button class="toggle-btn" id="toggleMenu">☰</button>

    <nav class="nav">
        <ul class="list">
            <li class="list_item">
                <div class="list_button">
                    <img src="./assets/dashboard.svg" alt="" class="list_img">
                    <a href="../../../INICIO/admin.php" class="nav_link">Inicio</a>
                </div>
            </li>
            <li class="list_item list_item--click">
                <div class="list_button list_button--click">
                    <img src="./assets/gestion.svg" alt="" class="list_img">
                    <a href="#" class="nav_link">Gestión de departamentos y municipios</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>
                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_departamentomunicipio.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>
                    <li class="list_inside">
                        <a href="./editar_DepartamentoMunicipio.php" class="nav_link nav_link--inside">Editar</a>
                    </li>
                    <li class="list_inside">
                        <a href="./listado.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <br>

    <h1>Actualizar Departamento y Municipio</h1>

    <?php
    include('./modelo_DepartamentoMunicipio.php');
    if (isset($_POST['ID_Departamento']) && isset($_POST['ID_Municipio'])) {
        $ID_Departamento = $_POST['ID_Departamento'];
        $ID_Municipio = $_POST['ID_Municipio'];

        $departamento = obtenerDepartamentoPorID($ID_Departamento);
        $municipio = obtenerMunicipioPorID($ID_Municipio);
    } else {
        echo "Faltan datos para actualizar.";
        exit;
    }
    ?>


    <form action="./controlador.php" method="POST">
        <input type="hidden" name="ID_Departamento" value="<?= $departamento['ID_Departamentos'] ?>">
        <input type="hidden" name="ID_Municipio" value="<?= $municipio['ID_Municipio'] ?>">

        <div>
            <label for="departamento">Departamento:</label>
            <input type="text" name="Descripcion_Departamento" value="<?= $departamento['Descripcion_Departamento'] ?>" required>

            <label for="municipio">Municipio:</label>
            <input type="text" name="Descripcion_Municipio" value="<?= $municipio['Descripcion_Municipio'] ?>" required>
        </div>

        <input type="submit" name="ActualizarDepartamentoMunicipio" value="Actualizar">
    </form>


    <script src="departamento_municipio.js"></script>

</body>

</html>