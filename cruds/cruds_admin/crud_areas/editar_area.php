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
    <link rel="stylesheet" href="area.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Areas</title>
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

    <br>
    <h1>Editar Áreas</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Área..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>ID Áreas</th>
                <th>Nombres</th>
                <th>Descripciones</th>
                <th>ID de empresa</th>
                <th>acciones</th>
            </tr>

            <?php
            include('./modelo_area.php');
            $areas = obtenerArea();
            foreach ($areas as $area) {
            ?>
                <tr>
                    <td><?= $area['ID_Area'] ?></td>
                    <td><?= $area['Nombre_Area'] ?></td>
                    <td><?= $area['Descripcion_Area'] ?></td>
                    <td><?= $area['ID_Empresa'] ?></td>
                    <td>

                        <div class="botones-acciones">
                            <form action="./controlador_area.php" method="POST" onsubmit="return confirmarEliminar();">
                                <input type="hidden" name="ID_Area" value="<?= $area['ID_Area'] ?>">
                                <input type="submit" name="eliminarArea" value="Eliminar">
                            </form>
                            <form action="./actualizar_area.php" method="POST" onsubmit="return confirmarActualizar();">
                                <input type="hidden" name="ID_Area" value="<?= $area['ID_Area'] ?>">
                                <a href="./actualizar_area.php"><input type="submit" value="Actualizar"></a>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>


    <script src="area.js"></script>
</body>

</html>