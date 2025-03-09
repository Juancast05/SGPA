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
    <link rel="stylesheet" href="practicante.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Actualizar</title>
</head>

<body>

    <div class="carousel">
        <div class="carousel-images">
            <img src="./assets/img/img1.jpg" alt="Imagen 1">
            <img src="./assets/img/oriente-antioqueno.jpg" alt="Imagen 2">
            <img src="./assets/img/sena1.jpg" alt="Imagen 3">
        </div>
    </div>

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
                    <a href="#" class="nav_link">Gestión del practicante</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_practicante.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./editar_practicante.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado_practicante.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <br>

    <div class="content">
        <h1>Actualizar Practicante</h1>

        <?php
        include('./modelo_practicante.php');


        if (isset($_POST['ID_Practicante'])) {
            $id_practicante = $_POST['ID_Practicante'];

            $practicante = obtenerPracticantePorId($id_practicante);

            if ($practicante) {
        ?>

                <form action="./controlador_practicante.php" method="POST">
                    <div class="form-group">


                        <input type="hidden" name="ID_Practicante" value="<?= $practicante['ID_Practicante'] ?>">

                        <div class="form-input">
                            <label for="Nombre_Practicante">Nombres:</label><br>
                            <input type="text" name="Nombre_Practicante" value="<?= $practicante['Nombre_Practicante'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Apellido_Practicante">Apellidos:</label><br>
                            <input type="text" name="Apellido_Practicante" value="<?= $practicante['Apellido_Practicante'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Tipo_Identificacion">Tipo de Identificación:</label><br>
                            <input type="text" name="Tipo_Identificacion" value="<?= $practicante['Tipo_Identificacion'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Identificacion">Identificación:</label><br>
                            <input type="text" name="Identificacion" value="<?= $practicante['Identificacion'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Fecha_Nacimiento">Fecha de Nacimiento:</label><br>
                            <input type="date" name="Fecha_Nacimiento" value="<?= $practicante['Fecha_Nacimiento'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Pais_Nacimiento">País de Nacimiento:</label><br>
                            <input type="text" name="Pais_Nacimiento" value="<?= $practicante['Pais_Nacimiento'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Departamento_Nacimiento">Departamento de Nacimiento:</label><br>
                            <input type="text" name="Departamento_Nacimiento" value="<?= $practicante['Departamento_Nacimiento'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Ciudad_Nacimiento">Ciudad de Nacimiento:</label><br>
                            <input type="text" name="Ciudad_Nacimiento" value="<?= $practicante['Ciudad_Nacimiento'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Correo_Personal">Correo Personal:</label><br>
                            <input type="email" name="Correo_Personal" value="<?= $practicante['Correo_Personal'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Correo_Sena">Correo Sena:</label><br>
                            <input type="email" name="Correo_Sena" value="<?= $practicante['Correo_Sena'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="Telefono">Teléfono:</label><br>
                            <input type="text" name="Telefono" value="<?= $practicante['Telefono'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="ID_Practica">ID de la practica relacionada:</label><br>
                            <input type="number" name="ID_Practica" value="<?= $practicante['ID_Practica'] ?>"><br>
                        </div>

                        <div class="form-input">
                            <label for="ID_Programa">ID del programa relacionado:</label><br>
                            <input type="number" name="ID_Programa" value="<?= $practicante['ID_Programa'] ?>"><br>
                        </div>

                        <input type="submit" name="actualizarPracticante" value="Actualizar Practicante">
                    </div>
                </form>
        <?php
            } else {
                echo "<p>Practicante no encontrado.</p>";
            }
        } else {
            echo "<p>No se ha seleccionado un ID de practicante.</p>";
        }
        ?>
    </div>

    <script src="practicante.js"></script>
</body>

</html>