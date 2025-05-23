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
    <title>Editar</title>
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

    <br><br>
    <h1>Editar Practicante</h1>

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
                <th>Acciones</th>
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
                        <td>

                            <div class="botones-acciones">
                                <form action="./controlador.php" method="POST" onsubmit="return confirmarEliminar();">
                                    <input type="hidden" name="ID_Departamento" value="<?= $departamento['ID_Departamentos'] ?>">
                                    <input type="hidden" name="ID_Municipio" value="<?= $municipio['ID_Municipio'] ?>">
                                    <input type="submit" name="eliminarDM" value="Eliminar">
                                </form>

                                <form action="./Acutalizar_departamentoMunicipio.php" method="POST" onsubmit="return confirmarActualizar();">
                                    <input type="hidden" name="ID_Departamento" value="<?= $departamento['ID_Departamentos'] ?>">
                                    <input type="hidden" name="ID_Municipio" value="<?= $municipio['ID_Municipio'] ?>">
                                    <input type="submit" value="Actualizar">
                                </form>
                            </div>
                        </td>
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