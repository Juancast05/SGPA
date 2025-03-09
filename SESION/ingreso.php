<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (isset($_SESSION['usuario'])) {
    header("Location: ../INICIO/admin.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="icon" href="/SGPA/INICIO/img/icon/icono-removebg-preview.png" type="image/x-icon">
    <style>
        .error {
            color: red;
            display: <?php echo isset($_GET['error']) ? 'block' : 'none'; ?>;
        }

        .error_i {
            color: red;
            display: <?php echo isset($_GET['error_i']) ? 'block' : 'none'; ?>;
        }
    </style>
</head>

<body>

    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>Ingresa como administrador</h3>
                    <p>Inicia sesión </p>
                    <button id="btn__iniciar-sesión">Ingresar</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>Ingresa como Instructor</h3>
                    <p>Inicia sesión </p>
                    <button id="btn__registrarse">Ingresar</button>
                </div>
            </div>

            <div class="contenedor__login-register">
                <form action="./login_a.php" method="POST" class="formulario__login">
                    <h2>Admin</h2>
                    <input type="email" placeholder="Correo Electrónico" name="correo_a" required>
                    <input type="password" placeholder="Contraseña" name="contrasena_a" required>
                    <br>
                    <button type="submit" name="btn">Ingresar</button>
                    <br><br>
                    <div class="error">Los datos ingresados son incorrectos</div>
                </form>

                <form action="./login_i.php" method="POST" class="formulario__register" style="display: none;">
                    <h2>Instructor</h2>
                    <input type="email" placeholder="Correo Electrónico" name="correo_i" required>
                    <input type="password" placeholder="Contraseña" name="contrasena_i" required>
                    <br>
                    <button type="submit" name="btn_2">Ingresar</button>
                    <br><br>
                    <div class="error_i">Los datos ingresados son incorrectos</div>
                </form>
            </div>
        </div>
    </main>
    <script src="./js/script.js"></script>

</body>

</html>