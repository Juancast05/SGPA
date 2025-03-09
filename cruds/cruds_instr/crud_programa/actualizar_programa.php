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

            <li class="list_item list_item--click">
                <div class="list_button list_button--click">
                    <img src="./assets/gestion.svg" alt="" class="list_img">
                    <a href="#" class="nav_link">Gestión de programas</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_programa.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./editar_programa.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado_programa.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>

    <?php
    include('./modelo_programa.php');

    if (isset($_POST['ID_Programa'])) {
        $ID_Programa = $_POST['ID_Programa'];

        $programa = obtenerProgramaPorId($ID_Programa);

        if ($programa) {
    ?>

            <br><br>
            <h1>Actualizar Programas</h1>
            <form action="./controlador_programa.php" method="POST">
                <div class="form-group">
                    <div class="form-input">
                        <input type="hidden" name="ID_Programa" value="<?= $programa['ID_Programa'] ?>">
                    </div>

                    <div class="form-input">
                        <label for="">Nombre del Programa:</label><br>
                        <input type="text" name="Nombre_Programa" value="<?= $programa['Nombre_Programa'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Descripcion del Programa:</label><br>
                        <input type="text" name="Descripcion_Programa" value="<?= $programa['Descripcion_Programa'] ?>"><br>
                    </div>
                </div>
                <input type="submit" name="actualizarPrograma" value="Actualizar Practica">
            </form>

    <?php
        } else {
            echo "<p>Practicante no encontrado.</p>";
        }
    } else {
        echo "<p>No se ha seleccionado un ID de practicante.</p>";
    }
    ?>

    <script src="programa.js"></script>
</body>

</html>