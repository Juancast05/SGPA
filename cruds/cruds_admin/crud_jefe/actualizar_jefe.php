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
    <link rel="stylesheet" href="jefe.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Coformador</title>
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
                    <a href="#" class="nav_link">Gestión del Coformador</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_jefe.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./editar_jefe.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado_jefe.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>

    <?php
    include('./modelo_jefe.php');


    if (isset($_POST['ID_Coformador'])) {
        $id_coformador = $_POST['ID_Coformador'];

        $coformador = obtenerCoformadoresPorId($id_coformador);

        if ($coformador) {
    ?>

            <br>
            <h1>Actualizar Coformador</h1>

            <div class="table-container">
                <form action="./controlador_jefe.php" method="POST">
                    <div class="form-group">
                        <div class="form-input">
                            <input type="hidden" name="ID_Coformador" value="<?= $coformador['ID_Coformador'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">Nombre del Coformador:</label>
                            <input type="text" name="Nombre_Coformador" value="<?= $coformador['Nombre_Coformador'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">Apellidos del Coformador:</label>
                            <input type="text" name="Apellido_Coformador" value="<?= $coformador['Apellido_Coformador'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">Correo del Coformador:</label>
                            <input type="text" name="Correo_Coformador" value="<?= $coformador['Correo_Coformador'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">Telefono:</label>
                            <input type="text" name="Telefono" value="<?= $coformador['Telefono'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="">ID de la empresa relacionada:</label>
                            <input type="number" name="ID_Empresa" value="<?= $coformador['ID_Empresa'] ?>"><br>
                        </div>

                    </div>
                    <input type="submit" name="actualizarCoformador" value="Actualizar Coformador">

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



            <script src="jefe.js"></script>
</body>

</html>