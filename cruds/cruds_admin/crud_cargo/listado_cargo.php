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
    <link rel="stylesheet" href="cargo.css">
    <link rel="stylesheet" href="listado_cargo.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Cargo</title>
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
                    <a href="#" class="nav_link">Gestión de cargos</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_cargo.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./editar_cargo.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado_cargo.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>

    <br>
    <h1>Listado Cargos</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Cargo..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container"></div>
    <table id="DepTable" border="1">
        <tr>
            <th>ID Cargos</th>
            <th>Nombres</th>
            <th>Descripciones</th>
            <th>ID Coformador</th>
        </tr>

        <?php
        include('./modelo_cargo.php');
        $cargos = obtenerCargo();
        foreach ($cargos as $cargo) {
        ?>
            <tr>
                <td><?= $cargo['ID_Cargo'] ?></td>
                <td><?= $cargo['Nombre_Cargo'] ?></td>
                <td><?= $cargo['Descripcion_Cargo'] ?></td>
                <td><?= $cargo['ID_Coformador'] ?></td>
            </tr>
        <?php } ?>
    </table>
    </div>


    <script src="cargo.js"></script>
</body>

</html>