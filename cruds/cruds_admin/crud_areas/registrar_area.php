<?php

session_start();
$varsesion = $_SESSION['correo_a'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../../../SESION/ingreso.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="area.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Registrar</title>
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
                    <a href="#" class="nav_link">Gestión de areas</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>
                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_area.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>
                    <li class="list_inside">
                        <a href="./editar_area.php" class="nav_link nav_link--inside">Editar</a>
                    </li>
                    <li class="list_inside">
                        <a href="./listado_area.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="content">
        <h1>Registrar Area</h1>
        <form action="./controlador_area.php" method="POST" onsubmit="return confirmarRegistrar();">
            <div class="form-group">
                <div class="form-input">
                    <label for="Nombre_area">Nombres del Área:</label>
                    <input type="text" name="Nombre_area" id="Nombre_area" required>
                </div>
                <div class="form-input">
                    <label for="Descripcion_area">Descripción del Área:</label>
                    <input type="text" name="Descripcion_area" id="Descripcion_area" required>
                </div>
                <div class="form-input">
                    <label for="ID_Empresa">Id de la empresa:</label>
                    <input type="number" name="ID_Empresa" id="ID_Empresa" required>
                </div>

            </div>
            <input type="submit" name="RegistrarArea" value="Registrar Área">
        </form>
    </div>

    <script src="area.js"></script>
</body>

</html>