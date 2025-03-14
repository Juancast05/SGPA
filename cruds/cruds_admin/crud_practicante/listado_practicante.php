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
    <link rel="stylesheet" href="listado_practicante.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">

    <title>Listado practicantes</title>
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

    <h1>Ver practicantes</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar practicante..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="practicanteTable" border="1">
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Tipo de Identificacion</th>
                <th>Identificacion</th>
                <th>Fecha de Nacimiento</th>
                <th>Pais de Nacimiento</th>
                <th>Departamento de Nacimiento</th>
                <th>Ciudad de Nacimiento</th>
                <th>Correo Personal</th>
                <th>Correo Sena</th>
                <th>Telefono</th>
                <th>ID_Practica</th>
                <th>ID_Programa</th>
            </tr>

            <?php
            include('./modelo_practicante.php');
            $practicantes = obtenerPracticantes();
            foreach ($practicantes as $practicante) {
                $nombre_programa = obtenerNombrePrograma($practicante['ID_Programa']);
            ?>
                <tr>
                    <td><?= $practicante['Nombre_Practicante'] ?></td>
                    <td><?= $practicante['Apellido_Practicante'] ?></td>
                    <td><?= $practicante['Tipo_Identificacion'] ?></td>
                    <td><?= $practicante['Identificacion'] ?></td>
                    <td><?= $practicante['Fecha_Nacimiento'] ?></td>
                    <td><?= $practicante['Pais_Nacimiento'] ?></td>
                    <td><?= $practicante['Departamento_Nacimiento'] ?></td>
                    <td><?= $practicante['Ciudad_Nacimiento'] ?></td>
                    <td><?= $practicante['Correo_Personal'] ?></td>
                    <td><?= $practicante['Correo_Sena'] ?></td>
                    <td><?= $practicante['Telefono'] ?></td>
                    <td><?= $practicante['ID_Practica'] ?></td>
                    <td><?= $nombre_programa ?></td>

                </tr>
            <?php } ?>
        </table>
    </div>


    <script src="practicante.js"></script>
</body>

</html>