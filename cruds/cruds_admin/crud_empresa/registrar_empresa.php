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
    <title>Registrar Empresa</title>
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
                        <a href="#" class="nav_link nav_link--inside">Registrar</a>
                    </li>

                    <li class="list_inside">
                        <a href="editar_empresa.php" class="nav_link nav_link--inside">Editar</a>
                    </li>

                    <li class="list_inside">
                        <a href="listado_empresa.php" class="nav_link nav_link--inside">Ver listado</a>
                    </li>

                </ul>

            </li>
        </ul>
    </nav>
    <br>
    <h1>Registrar Empresa</h1>
    <form action="./controlador_empresa.php" method="POST" onsubmit="return confirmarRegistrar();">
        <div class="form-group">
            <div class="form-input">
                <div>
                    <label for="">Nombre de la empresa:</label><br>
                    <input type="text" name="Nombre_empresa" id="Nombre_empresa" required><br>
                </div>
                <div>
                    <label for="">NIT de la empresa:</label><br>
                    <input type="text" name="NIT" id="NIT" required><br>
                </div>
                <div>
                    <label for="">Correo de la empresa:</label><br>
                    <input type="email" name="Correo_empresa" id="Correo_empresa" required><br>
                </div>
                <div><label for="">Teléfono de la empresa:</label><br>
                    <input type="text" name="Telefono_empresa" id="Telefono_empresa" required><br>
                </div>
                <div>
                    <label for="">Dirección de la empresa:</label><br>
                    <input type="text" name="Direccion_empresa" id="Direccion_empresa" required><br>
                </div>
                <div>
                    <label for="">ID de la práctica relacionada</label><br>
                    <input type="number" name="ID_Practica" id="ID_Practica" required><br>
                </div>
            </div>
        </div>
        <input type="submit" name="RegistrarEmpresa" value="Registrar Empresa">
    </form>

    <script src="empresa.js"></script>
</body>

</html>