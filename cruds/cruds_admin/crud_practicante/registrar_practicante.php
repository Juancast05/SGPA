<?php

session_start();
$varsesion = $_SESSION['correo_a'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../../../SESION/ingreso.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="practicante.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
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
                        <a href="#" class="nav_link nav_link--inside">Registrar</a>
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

    <div class="content">

        <?php

        if (isset($_GET['success'])) {
            echo '<div class="registro-exitoso">Practicante registrado exitosamente.</div>';
        }
        
        if (isset($_GET['error'])) {
            echo '<div class="error-registro">' . htmlspecialchars($_GET['error']) . '</div>';
        }
        ?>

        <h1>Registrar Practicante</h1>
        <form action="./controlador_practicante.php" method="POST" onsubmit="return confirmarRegistrar();">
            <div class="form-group">
                <div class="form-input">
                    <label for="Nombre_Practicante">Nombres del Practicante:</label>
                    <input type="text" name="Nombre_Practicante" id="Nombre_Practicante" required>
                </div>
                <div class="form-input">
                    <label for="Apellido_Practicante">Apellidos del Practicante:</label>
                    <input type="text" name="Apellido_Practicante" id="Apellido_Practicante" required>
                </div>
                <div class="form-input">
                    <label for="Tipo_Identificacion">Tipo de identificación:</label>
                    <select class="selects" name="Tipo_Identificacion" id="Tipo_Identificacion" required>
                        <option value="">Seleccione un tipo</option>
                        <option value="CC">Cédula de Ciudadanía (CC)</option>
                        <option value="TI">Tarjeta de Identidad (TI)</option>
                        <option value="CE">Cédula de Extranjería (CE)</option>
                        <option value="PAS">Pasaporte</option>
                        <option value="PEP">Permiso Especial de Permanencia (PEP)</option>
                        <option value="PPT">Permiso por Protección Temporal (PPT)</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="Identificacion">Identificación:</label>
                    <input type="text" name="Identificacion" id="Identificacion" required>
                </div>
                <div class="form-input">
                    <label for="Fecha_Nacimiento">Fecha de nacimiento:</label>
                    <input type="date" name="Fecha_Nacimiento" id="Fecha_Nacimiento" required>
                </div>
                <div class="form-input">
                    <label for="Pais_Nacimiento">País de nacimiento:</label>
                    <select class="selects" name="Pais_Nacimiento" id="Pais_Nacimiento" required>
                        <option value="">Seleccione un país</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Perú">Perú</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Panamá">Panamá</option>
                        <option value="México">México</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Chile">Chile</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="España">España</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="Departamento_Nacimiento">Departamento de nacimiento:</label>
                    <select class="selects" name="Departamento_Nacimiento" id="Departamento_Nacimiento" required>
                        <option value="">Seleccione primero un país</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="Ciudad_Nacimiento">Ciudad de nacimiento:</label>
                    <select class="selects" name="Ciudad_Nacimiento" id="Ciudad_Nacimiento" required>
                        <option value="">Seleccione primero un departamento</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="Correo_Personal">Correo:</label>
                    <input type="email" name="Correo_Personal" id="Correo_Personal" required>
                </div>
                <div class="form-input">
                    <label for="Correo_Sena">Correo Sena:</label>
                    <input type="email" name="Correo_Sena" id="Correo_Sena" required>
                </div>
                <div class="form-input">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" name="Telefono" id="Telefono" required>
                </div>
                <div class="form-input">
                    <label for="ID_Practica">ID de la práctica relacionada:</label>
                    <input type="number" name="ID_Practica" id="ID_Practica" required>
                </div>
                <div class="form-input">
                    <label for="ID_Programa">ID del programa relacionado:</label>
                    <input type="number" name="ID_Programa" id="ID_Programa" required>
                </div>
            </div>
            <input type="submit" name="RegistrarPracticante" value="Registrar Practicante">
        </form>
    </div>

    <script src="practicante.js"></script>
</body>

</html>