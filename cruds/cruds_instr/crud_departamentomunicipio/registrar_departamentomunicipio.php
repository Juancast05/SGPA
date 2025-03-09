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
    <link rel="stylesheet" href="departamento_municipio.css">
    <title>Registrar</title>
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
                    <a href="#" class="nav_link">Gestión de departamentos y municipios</a>
                    <img src="./assets/arrow.svg" alt="" class="list_arrow">
                </div>

                <ul class="list_show">
                    <li class="list_inside">
                        <a href="./registrar_departamentomunicipio.php" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./editar_DepartamentoMunicipio.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="./listado.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <br>

    <h1>Registrar Departamento y Municipio</h1>


    <form action="./controlador.php" method="POST">
        <div class="form-group">
            <div class="form-input">
                <label for="departamento">Selecciona un Departamento donde se realizaran practicas:</label>
                <select name="departamento" id="departamento" required>
                    <option value="antioquia">Antioquia</option>
                    <option value="bogotá">Bogotá D.C.</option>
                </select>
            </div>

            <div class="form-input">
                <label for="municipio">Selecciona un Municipio donde se realizaran practicas:</label>
                <select name="municipio" id="municipio" required>

                </select>
            </div>


            <div class="form-input">
                <label for="Descripcion_departamento">Descripción del Departamento:</label>
                <input type="text" name="Descripcion_Departamento" id="Descripcion_Departamento" required>
            </div>
            <div class="form-input">
                <label for="Descripcion_municipio">Descripción del Municipio:</label>
                <input type="text" name="Descripcion_Municipio" id="Descripcion_Municipio" required>
            </div>
        </div>

        <input type="submit" name="RegistrarDepartamentoMunicipio" value="Registrar">
    </form>

    <script src="departamento_municipio.js"></script>
</body>

</html>