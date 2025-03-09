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
    <link rel="stylesheet" href="ficha.css">
    <link rel="stylesheet" href="listado.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Fichas</title>
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

    <br><br>
    <h1>Listado Fichas</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Fichas..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>ID Ficha</th>
                <th>Número de Ficha</th>
                <th>Descripcón de Ficha</th>
                <th>ID Programa</th>
            </tr>

            <?php
            include('./modelo_ficha.php');
            $fichas = obtenerFichas();
            foreach ($fichas as $ficha) {
            ?>
                <tr>
                    <td><?= $ficha['ID_Ficha'] ?></td>
                    <td><?= $ficha['Numero_Ficha'] ?></td>
                    <td><?= $ficha['Descripcion_Ficha'] ?></td>
                    <td><?= $ficha['ID_Programa'] ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="ficha.js"></script>
</body>

</html>