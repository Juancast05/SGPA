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

    <?php
    include('./modelo_tipocontrato.php');


    if (isset($_POST['ID_Contrato'])) {
        $id_contrato = $_POST['ID_Contrato'];

        $contrato = obtenerContratosPorId($id_contrato);

        if ($contrato) {
    ?>

            <br>
            <h1>Actualizar El tipo de Contrato</h1>

            <div class="table-container">
                <form action="./controlador_tipocontrato.php" method="POST">
                    <div class="form-group">
                        <div class="form-input">
                            <input type="hidden" name="ID_Contrato" value="<?= $contrato['ID_Contrato'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">Tipo de contrato:</label>
                            <input type="text" name="Nombre_contrato" value="<?= $contrato['Nombre_Contrato'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">Descripción del contrato:</label>
                            <input type="text" name="Descripcion_contrato" value="<?= $contrato['Descripcion_Contrato'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">ID de la practica:</label>
                            <input type="number" name="ID_Practica" value="<?= $contrato['ID_Practica'] ?>"><br>
                        </div>

                    </div>
                    <input type="submit" name="actualizarContrato" value="Actualizar Contrato">
            <?php
        } else {
            echo "<p>Jefe no encontrado.</p>";
        }
    } else {
        echo "<p>No se ha seleccionado un ID del jefe.</p>";
    }
            ?>
                </form>
            </div>


            <script src="tipocontrato.js"></script>
</body>

</html>