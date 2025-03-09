<?php

session_start();
$varsesion = $_SESSION['correo_i'];
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
    <link rel="stylesheet" href="programa.css">
    <link rel="stylesheet" href="listado_programa.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Programa</title>
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
                    <a href="../../../INICIO/instructor.php" class="nav_link">Inicio</a>
                </div>
            </li>

            </li>
        </ul>
    </nav>

    <br>
    <h1>listado programas</h1>


    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Programas..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>ID Programa</th>
                <th>Nombre del Programa</th>
                <th>Descripcion del Programa</th>

            </tr>

            <?php
            include('./modelo_programa.php');
            $programas = obtenerProgramas();
            foreach ($programas as $programa) {
            ?>
                <tr>
                    <td><?= $programa['ID_Programa'] ?></td>
                    <td><?= $programa['Nombre_Programa'] ?></td>
                    <td><?= $programa['Descripcion_Programa'] ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>


    <script src="programa.js"></script>
</body>

</html>