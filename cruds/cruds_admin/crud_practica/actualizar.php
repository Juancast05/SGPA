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
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Actualizar Datos</title>
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

    <?php
    include('./modelo_practica.php');


    if (isset($_POST['ID_Practica'])) {
        $id_practica = $_POST['ID_Practica'];

        $practica = obtenerPracticaPorId($id_practica);

        if ($practica) {
    ?>

            <h1>Actualizar Practicas</h1>
            <form action="./controlador_practica.php" method="POST">
                <div class="form-group">
                    <div class="form-input">
                        <input type="hidden" name="ID_Practica" value="<?= $practica['ID_Practica'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Fecha_Inicio:</label><br>
                        <input type="date" name="Fecha_Inicio" value="<?= $practica['Fecha_Inicio'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Fecha_Fin:</label><br>
                        <input type="date" name="Fecha_Fin" value="<?= $practica['Fecha_Fin'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Fecha Seguimiento:</label><br>
                        <input type="date" name="Fecha_Seguimiento" value="<?= $practica['Fecha_Seguimiento'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Observaciones:</label><br>
                        <input type="text" name="Observaciones" value="<?= $practica['Observaciones'] ?>"> <br>
                    </div>

                    <div class="form-input">
                        <label for="">Continuidad:</label><br>
                        <input type="text" name="Continuidad" value="<?= $practica['Continuidad'] ?>"> <br>
                    </div>
                </div>
                <input type="submit" name="actualizarPractica" value="Actualizar Practica">
        <?php
        } else {
            echo "<p>Practica no encontrada.</p>";
        }
    } else {
        echo "<p>No se ha seleccionado un ID de practica.</p>";
    }
        ?>
            </form>

            <script src="practica.js"></script>
</body>

</html>