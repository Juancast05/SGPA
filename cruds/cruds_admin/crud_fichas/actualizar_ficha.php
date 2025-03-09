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
    <link rel="stylesheet" href="ficha.css">
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
                    <a href="../../../INICIO/admin.php" class="nav_link">Inicio</a>
                </div>
            </li>

            <li class="list_item list_item--click">
                <div class="list_button list_button--click">
                    <img src="./assets/gestion.svg" alt="" class="list_img">
                    <a href="#" class="nav_link">Gestión de fichas</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="registrar_ficha.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="editar_ficha.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="listado_ficha.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>
    <br>
    <?php
    include('./modelo_ficha.php');


    if (isset($_POST['ID_Ficha'])) {
        $id_ficha = $_POST['ID_Ficha'];

        $ficha = obtenerFichaPorId($id_ficha);

        if ($ficha) {
    ?>

            <h1>Actualizar Fichas</h1>
            <form action="./controlador_ficha.php" method="POST">
                <div class="form-group">
                    <div class="form-input">
                        <input type="hidden" name="ID_Ficha" value="<?= $ficha['ID_Ficha'] ?>">
                    </div>

                    <div class="form-input">
                        <label for="">Número de Ficha:</label>
                        <input type="text" name="Numero_Ficha" value="<?= $ficha['Numero_Ficha'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Descripcion de Ficha:</label>
                        <input type="text" name="Descripcion_Ficha" value="<?= $ficha['Descripcion_Ficha'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">ID del programa relacionado:</label>
                        <input type="number" name="ID_Programa" value="<?= $ficha['ID_Programa'] ?>"><br>
                    </div>
                </div>
                <input type="submit" name="actualizarFicha" value="Actualizar Practica">

        <?php
        } else {
            echo "<p>Ficha no encontrada.</p>";
        }
    } else {
        echo "<p>No se ha seleccionado un ID de la ficha.</p>";
    }
        ?>
            </form>

            <script src="ficha.js"></script>
</body>

</html>