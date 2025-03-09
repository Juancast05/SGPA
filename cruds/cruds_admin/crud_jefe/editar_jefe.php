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

    <br>
    <h1>Editar Coformadores</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar Coformador..." onkeyup="buscarNombre()">
    </div>

    <div class="table-container">
        <table id="DepTable" border="1">
            <tr>
                <th>ID Coformador</th>
                <th>Nombre Coformador</th>
                <th>Apellidos Coformador</th>
                <th>Correo Coformador</th>
                <th>Telefono</th>
                <th>ID Empresa</th>
                <th>Acciones</th>
            </tr>

            <?php
            include('./modelo_jefe.php');
            $coformadores = obtenerCoformadores();
            foreach ($coformadores as $coformador) {
            ?>
                <tr>
                    <td><?= $coformador['ID_Coformador'] ?></td>
                    <td><?= $coformador['Nombre_Coformador'] ?></td>
                    <td><?= $coformador['Apellido_Coformador'] ?></td>
                    <td><?= $coformador['Correo_Coformador'] ?></td>
                    <td><?= $coformador['Telefono'] ?></td>
                    <td><?= $coformador['ID_Empresa'] ?></td>
                    <td>
                        <div class="botones-acciones">
                            <form action="./controlador_jefe.php" method="POST" onsubmit="return confirmarEliminar();">
                                <input type="hidden" name="ID_Coformador" value="<?= $coformador['ID_Coformador'] ?>">
                                <input type="submit" name="eliminarCoformador" value="Eliminar">
                            </form>
                            <form action="./actualizar_jefe.php" method="POST" onsubmit="return confirmarActualizar();">
                                <input type="hidden" name="ID_Coformador" value="<?= $coformador['ID_Coformador'] ?>">
                                <a href="./actualizar_jefe.php"><input type="submit" value="Actualizar"></a>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script src="jefe.js"></script>
</body>

</html>