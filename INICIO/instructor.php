<?php

session_start();
$varsesion = $_SESSION['correo_i'];
if ($varsesion == null || $varsesion = '') {
    header("location: ../SESION/ingreso.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="instructor.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/icon/icono-removebg-preview.png" type="image/x-icon">

    <title>Instructor</title>
</head>
<body>

    <nav class="container">
        <div class="logo">
            <h1>SGPA</h1>   
            <img src="img/logoSenaNaranja.png" alt="">
        </div>
    </nav>

    <nav class="ola ">
        <ul class="nav-menu">
    
            <li class="nav-item dropdown">
                <a href="#carrusel-item-1" data-slide="1">Fichas</a>
                <ul class="dropdown-menu">
                    <li><a href="../cruds/cruds_instr/crud_fichas/listado_ficha.php" >Buscar Fichas</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#carrusel-item-2" data-slide="2">Departamentos y municipios</a>
                <ul class="dropdown-menu">
                    <li><a href="../cruds/cruds_instr/crud_departamentomunicipio/listado.php" >Buscar Departamentos y Municipios</a></li>
                </ul>
            </li>
          
            <li class="nav-item dropdown">
                <a href="#carrusel-item-3" data-slide="3">Programa</a>
                <ul class="dropdown-menu">
                    <li><a href="../cruds/cruds_instr/crud_programa/listado_programa.php" >Buscar Programas</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#carrusel-item-3" data-slide="3">Bitácoras</a>
                <ul class="dropdown-menu">
                    <li><a href="../CARGAS/views/index.php" >Ver Bitácoras</a></li>
                </ul>
            </li>
            
            <li class="nav-item logout">
                <a href="logout.php" onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
                    <i class="bx bx-log-out"></i>
                </a>
            </li>
        </ul>
    </nav>

    <div class="carousel">
        <div class="carousel-images">
            <div class="carousel-item">
                <div class="carousel-content">
                 
                </div>
                <img src="img/imagenverde.jpeg" alt="Imagen 5" />
              </div>
          <div class="carousel-item">
            <div class="carousel-content">
              <h2>Fichas</h2>
              <p>Registra, edita, elimina y busca fichas de nuestro Servicio Nacional de Aprendizaje Sena</p>
            </div>
            <img src="img/img2.jpeg" alt="Imagen 2" />
          </div>
          <div class="carousel-item">
            <div class="carousel-content">
              <h2>Departamentos y Municipios</h2>
              <p>Registra, edita, elimina y busca departamentos y municipios de nuestro Servicio Nacional de Aprendizaje Sena</p>
            </div>
            <img src="img/img3.jpg" alt="Imagen 3" />
          </div>
          <div class="carousel-item">
            <div class="carousel-content">
              <h2>Programas</h2>
              <p>Registra, edita, elimina y busca programas de nuestro Servicio Nacional de Aprendizaje Sena</p>
            </div>
            <img src="img/SENA7.jpg" alt="Imagen 4" />
          </div>
        </div>
    

    <script src="inicio.js"></script>
    
</body>
</html>
