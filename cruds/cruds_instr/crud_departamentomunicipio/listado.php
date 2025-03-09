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
    <link rel="stylesheet" href="listado.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <title>Listado</title>
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

            </li>
        </ul>
    </nav>

    <br><br>
    <h1>Listado de departamentos y municipios</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Departamento..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>Departamento</th>
                <th>Descripción del Departamento</th>
                <th>Municipio</th>
                <th>Descripción del Municipio</th>
            </tr>

            <?php
            include('./modelo_DepartamentoMunicipio.php');
            $departamentos = obtenerDepartamentos();
            foreach ($departamentos as $departamento) {
                $municipios = obtenerMunicipiosPorDepartamento($departamento['ID_Departamentos']);
                foreach ($municipios as $municipio) {
            ?>
                    <tr>
                        <td><?= $departamento['Nombre_Departamento'] ?></td>
                        <td><?= $departamento['Descripcion_Departamento'] ?></td>
                        <td><?= $municipio['Nombre_Municipio'] ?></td>
                        <td><?= $municipio['Descripcion_Municipio'] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>




    <script src="departamento_municipio.js"></script>
</body>

</html>