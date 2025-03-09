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
    <link rel="stylesheet" href="./listado_tipodontrato.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Tipo Contrato</title>
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
                    <a href="#" class="nav_link">Gestión de Tipo de contrato</a>
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
    <h1>Listado Tipo de contrato</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Tipo de..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>ID Tipo contrato</th>
                <th>Tipo de contrato</th>
                <th>Descripcion del Tipo contrato</th>
                <th>ID Práctica</th>
            </tr>

            <?php
            include('./modelo_tipocontrato.php');
            $contratos = obtenerContratos();
            foreach ($contratos as $contrato) {
            ?>
                <tr>
                    <td><?= $contrato['ID_Contrato'] ?></td>
                    <td><?= $contrato['Nombre_Contrato'] ?></td>
                    <td><?= $contrato['Descripcion_Contrato'] ?></td>
                    <td><?= $contrato['ID_Practica'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>


    <script src="tipocontrato.js"></script>
</body>

</html>