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
    <link rel="stylesheet" href="jefe.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Coformador</title>
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
                    <a href="#" class="nav_link">Gestión de jefes</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="#" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="editar_jefe.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="listado_jefe.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>
    <br>
    <h1>Registrar Coformadores</h1>
    <form action="./controlador_jefe.php" method="POST" onsubmit="return confirmarRegistrar();">
        <div class="form-group">
            <div class="form-input">
                <label for="Nombre_Coformador">Nombres del Coformador:</label>
                <input type="text" name="Nombre_Coformador" id="Nombre_Coformador" required>
            </div>
            <div class="form-input">
                <label for="Apellido_Coformador">Apellidos del Coformador:</label>
                <input type="text" name="Apellido_Coformador" id="Apellido_Coformador" required>
            </div>
            <div class="form-input">
                <label for="Correo_coformador">Correo del coformador:</label>
                <input type="text" name="Correo_Coformador" id="Correo_Coformador" required>
            </div>
            <div class="form-input">
                <label for="Telefono">Telefono del coformador:</label>
                <input type="number" name="Telefono" id="Telefono" required>
            </div>
            <div class="form-input">
                <label for="ID_Empresa">Id de la empresa:</label>
                <input type="number" name="ID_Empresa" id="ID_Empresa" required>
            </div>
        </div>
        </div>

        <input type="submit" name="RegistrarCoformador" value="Registrar Coformador">
    </form>

    <script src="jefe.js"></script>
</body>

</html>