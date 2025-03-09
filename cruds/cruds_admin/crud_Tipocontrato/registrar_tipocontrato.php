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
    <link rel="stylesheet" href="tipocontrato.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Registrar Fichas</title>
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
                    <a href="#" class="nav_link">Gestión de Tipo de contrato </a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="registrar_tipocontrato.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="editar_tipocontrato.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="listado_tipocontrato.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>
            </li>
        </ul>
    </nav>
    <br>
    <h1>Registrar Contrato</h1>
    <form action="./controlador_tipocontrato.php" method="POST" method="POST" onsubmit="return confirmarRegistrar();">
        <div class="form-group">
            <div class="form-input">
                <label for="Nombre_contrato">Nombre del contrato:</label>
                <input type="text" name="Nombre_contrato" id="Nombre_contrato" required>
            </div>
            <div class="form-input">
                <label for="Descripcion_contrato">Descripción de Contrato:</label>
                <input type="text" name="Descripcion_contrato" id="Descripcion_contrato" required>
            </div>
            <div class="form-input">
                <label for="ID_Practica">ID de la práctica relacionada:</label>
                <input type="number" name="ID_Practica" id="ID_Practica" required>
            </div>
        </div>
        </div>

        <input type="submit" name="RegistrarContrato" value="Registrar Contrato">
    </form>

    <script src="tipocontrato.js"></script>
</body>

</html>