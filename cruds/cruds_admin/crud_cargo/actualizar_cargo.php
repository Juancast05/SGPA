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

    <?php
    include('./modelo_cargo.php');


    if (isset($_POST['ID_Cargo'])) {
        $id_cargo = $_POST['ID_Cargo'];

        $cargo = obtenerCargoPorId($id_cargo);

        if ($cargo) {
    ?>

            <br>
            <h1>Actualizar Cargos</h1>
            <form action="./controlador_cargo.php" method="POST">
                <div class="form-group">
                    <div class="form-input">
                        <input type="hidden" name="ID_Cargo" value="<?= $cargo['ID_Cargo'] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">Nombre del Cargo:</label><br>
                        <input type="text" name="Nombre_cargo" value="<?= $cargo['Nombre_Cargo'] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">Descripción del Cargo:</label><br>
                        <input type="text" name="Descripcion_cargo" value="<?= $cargo['Descripcion_Cargo'] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">ID del coformador relacionado:</label><br>
                        <input type="number" name="ID_Coformador" value="<?= $cargo['ID_Coformador'] ?>">
                    </div>
                </div>
                <input type="submit" name="actualizarCargo" value="Actualizar Cargo">

        <?php
        } else {
            echo "<p>Practica no encontrada.</p>";
        }
    } else {
        echo "<p>No se ha seleccionado un ID de practica.</p>";
    }
        ?>
            </form>


            <script src="cargo.js"></script>
</body>

</html>