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
    <link rel="stylesheet" href="empresa.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Empresas</title>
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
                    <a href="#" class="nav_link">Gestión de empresas</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_empresa.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="editar_empresa.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado_empresa.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>

    <br>

    <?php
    include('./modelo_empresa.php');


    if (isset($_POST['ID_Empresa'])) {
        $id_empresa = $_POST['ID_Empresa'];

        $empresa = obtenerEmpresaPorId($id_empresa);

        if ($empresa) {
    ?>

            <h1>Actualizar Empresa</h1>
            <form action="./controlador_empresa.php" method="POST">
                <div class="form-group">
                    <div class="form-input">
                        <input type="hidden" name="ID_Empresa" value="<?= $empresa['ID_Empresa'] ?>">
                    </div>

                    <div class="form-input">
                        <label for="">NIT:</label>
                        <input type="text" name="NIT" value="<?= $empresa['NIT'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Nombre de Empresa:</label>
                        <input type="text" name="Nombre_Empresa" value="<?= $empresa['Nombre_Empresa'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Direccion:</label>
                        <input type="text" name="Direccion" value="<?= $empresa['Direccion'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Telefono de Empresa:</label>
                        <input type="text" name="Telefono_Empresa" value="<?= $empresa['Telefono_Empresa'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">Correo de Empresa:</label>
                        <input type="text" name="Correo_Empresa" value="<?= $empresa['Correo_Empresa'] ?>"><br>
                    </div>

                    <div class="form-input">
                        <label for="">ID de la practica relacionada:</label>
                        <input type="number" name="ID_Practica" value="<?= $empresa['ID_Practica'] ?>"><br>
                    </div>
                </div>
                <input type="submit" name="actualizarEmpresa" value="Actualizar Practica">

        <?php
        } else {
            echo "<p>Empresa no encontrada.</p>";
        }
    } else {
        echo "<p>No se ha seleccionado un ID de la empresa.</p>";
    }
        ?>
            </form>


            <script src="empresa.js"></script>
</body>

</html>