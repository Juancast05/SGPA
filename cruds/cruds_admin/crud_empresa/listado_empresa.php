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
    <link rel="stylesheet" href="empresa.css">
    <link rel="stylesheet" href="listado_empresa.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Empresas</title>
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
                    <a href="#" class="nav_link">Gestión de empresas</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_empresa.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="editar_empresa.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado_empresa.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>

    <br>
    <h1>Ver Empresas</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Empresas..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>ID Empresa</th>
                <th>NIT</th>
                <th>Nombre de Empresa</th>
                <th>Dirección</th>
                <th>Telefono de Empresa</th>
                <th>Correo de Empresa</th>
                <th>ID Practica</th>
            </tr>

            <?php
            include('./modelo_empresa.php');
            $empresas = obtenerEmpresas();
            foreach ($empresas as $empresa) {
            ?>
                <tr>
                    <td><?= $empresa['ID_Empresa'] ?></td>
                    <td><?= $empresa['NIT'] ?></td>
                    <td><?= $empresa['Nombre_Empresa'] ?></td>
                    <td><?= $empresa['Direccion'] ?></td>
                    <td><?= $empresa['Telefono_Empresa'] ?></td>
                    <td><?= $empresa['Correo_Empresa'] ?></td>
                    <td><?= $empresa['ID_Practica'] ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="empresa.js"></script>
</body>

</html>