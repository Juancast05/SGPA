<?php

session_start();
$varsesion = $_SESSION['correo_a'];
if ($varsesion == null || $varsesion = '') {
  header("location: ../SESION/ingreso.php");
  die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet" />
  <link
    rel="icon"
    href="img/icon/icono-removebg-preview.png"
    type="image/x-icon" />
  <title>Administrador</title>
</head>

<body>
  <nav class="container">
    <div class="logo">
      <h1>SGPA</h1>
      <img src="img/icon/th-removebg-preview.png" alt="" />
    </div>
  </nav>
  <div id="notification" class="notification">
    <p>Su sesión se ha iniciado correctamente.</p>
  </div>
  <nav class="ola">
    <ul class="nav-menu">
      <li class="nav-item dropdown">
        <a href="#" data-slide="0">Practicantes</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_practicante/listado_practicante.php">Gestión de practicantes</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#carrusel-item-2" data-slide="1">Fichas</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_fichas/listado_ficha.php">Gestión de Fichas</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#carrusel-item-3" data-slide="2">Departamentos y municipios</a>
        <ul class="dropdown-menu">
          <li>
            <a
              href="../cruds/cruds_admin/crud_departamentomunicipio/listado.php">Gestión de Departamentos y Municipios</a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#carrusel-item-4" data-slide="3">Programa</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_programa/listado_programa.php">Gstión de Programas</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="#carrusel-item-5" data-slide="4">Empresa</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_empresa/listado_empresa.php">Gestión de datos de empresas</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="carrusel-item-6" data-slide="5">Practica</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_practica/listado_practica.php">Gestión de Práctica</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="carrusel-item-7" data-slide="6">Tipo de contrato</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_Tipocontrato/listado_tipocontrato.php">Gestión sobre tipo de contrato</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="carrusel-item-8" data-slide="7">Áreas</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_areas/listado_area.php">Gestión sobre áreas de los aprendices</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="carrusel-item-9" data-slide="8">Cargo</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_cargo/listado_cargo.php">Gestión sobre cargos</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a href="carrusel-item-10" data-slide="9">Coformador</a>
        <ul class="dropdown-menu">
          <li>
            <a href="../cruds/cruds_admin/crud_jefe/listado_jefe.php">Gestión sobre coformador</a>
          </li>
        </ul>
      </li>

      <li class="nav-item logout">
        <a
          href="logout.php"
          onclick="return confirm('¿Estás seguro de que quieres cerrar sesión?');">
          <i class="bx bx-log-out"></i>
        </a>
      </li>
    </ul>
  </nav>

  <div class="carousel">
    <div class="carousel-images">
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Practicantes</h2>
          <p>
            Registra, edita, elimina y busca practicantes de nuestro Servicio
            Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/img1.jpg" alt="Imagen 1" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Fichas</h2>
          <p>
            Registra, edita, elimina y busca fichas de nuestro Servicio
            Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/img2.jpeg" alt="Imagen 2" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Departamentos y Municipios</h2>
          <p>
            Registra, edita, elimina y busca departamentos y municipios de
            nuestro Servicio Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/img3.jpg" alt="Imagen 3" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Programas</h2>
          <p>
            Registra, edita, elimina y busca programas de nuestro Servicio
            Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/SENA7.jpg" alt="Imagen 4" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Empresas</h2>
          <p>
            Registra, edita, elimina y busca empresas vinculadas a nuestro
            Servicio Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/areas.jpg" alt="Imagen 5" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Practicas</h2>
          <p>
            Registra, edita, elimina y busca practicas de nuestro Servicio
            Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/SENA9.jpeg" alt="Imagen 6" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Tipo de contrato</h2>
          <p>
            Registra, edita, elimina y busca tipos de contratos de nuestro
            Servicio Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/sena6.jpg" alt="Imagen 7" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Areas</h2>
          <p>
            Registra, edita, elimina y busca areas de nuestro Servicio
            Nacional de Aprendizaje Sena
          </p>
        </div>
        <img src="img/cargos.jpg" alt="Imagen 8" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Cargos</h2>
          <p>
            Registra, edita, elimina y busca cargos asociados con las
            practicas
          </p>
        </div>
        <img src="img/SENA8.jpg" alt="Imagen 9" />
      </div>
      <div class="carousel-item">
        <div class="carousel-content">
          <h2>Coformador</h2>
          <p>
            Registra, edita, elimina y busca coformadores o encargados de
            nuestros practicantes en etapa practica
          </p>
        </div>
        <img src="img/sena2.jpg" alt="Imagen 10" />
      </div>
    </div>
  </div>

  <script src="inicio.js"></script>
</body>

</html>