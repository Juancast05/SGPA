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

    <?php
    include('./modelo_area.php');


    if (isset($_POST['ID_Area'])) {
        $id_area = $_POST['ID_Area'];

        $area = obtenerAreaPorId($id_area);

        if ($area) {
    ?>
            <br>
            <h1>Actualizar Áreas</h1>

            <form action="./controlador_area.php" method="POST">
                <div class="form-group">
                    <div class="form-input">
                        <input type="hidden" name="ID_Area" value="<?= $area['ID_Area'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Nombres del Área:</label>
                        <input type="text" name="Nombre_area" value="<?= $area['Nombre_Area'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Descripción del Área:</label>
                        <input type="text" name="Descripcion_area" value="<?= $area['Descripcion_Area'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">ID de la empresa relacionada:</label>
                        <input type="number" name="ID_Empresa" value="<?= $area['ID_Empresa'] ?>"><br>
                    </div>
                </div>
                <input type="submit" name="actualizarArea" value="Actualizar Area">

        <?php
        } else {
            echo "<p>area no encontrada.</p>";
        }
    } else {
        echo "<p>No se ha seleccionado un ID de area.</p>";
    }
        ?>
            </form>


            <script src="area.js"></script>
</body>

</html>