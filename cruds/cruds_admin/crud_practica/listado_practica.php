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
    <link rel="stylesheet" href="practica.css">
    <link rel="stylesheet" href="listado.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Practicas</title>
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
                    <a href="#" class="nav_link">Gestión de prácticas</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_practica.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="editar_practica.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado_practica.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>

    <br>

    <h1>Ver Practicas</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Fichas..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>ID Práctica</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Fecha Seguimiento</th>
                <th>Observaciones</th>
                <th>Continuidad</th>
            </tr>

            <?php
            include('./modelo_practica.php');
            $practicas = obtenerPracticas();
            foreach ($practicas as $practica) {
            ?>
                <tr>
                    <td><?= $practica['ID_Practica'] ?></td>
                    <td><?= $practica['Fecha_Inicio'] ?></td>
                    <td><?= $practica['Fecha_Fin'] ?></td>
                    <td><?= $practica['Fecha_Seguimiento'] ?></td>
                    <td><?= $practica['Observaciones'] ?></td>
                    <td><?= $practica['Continuidad'] ?></td>


                </tr>
            <?php } ?>
        </table>
    </div>


    <script src="practica.js"></script>
</body>

</html>