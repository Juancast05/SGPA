<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Documentos | Sistema</title>
    
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>

<body>
  
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-file-alt me-2"></i>Gestor Documentos
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user me-1"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-cog me-1"></i> Configuración</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt me-1"></i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   
    <div class="container py-4">
        <div class="row mb-4">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="index.php">Documentos</a></li>
                    </ol>
                </nav>
                <h1 class="page-title"><i class="fas fa-file-alt me-2"></i>Gestión de Documentos</h1>
            </div>
        </div>

        <div class="main-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">
                        <i class="fas fa-plus-circle me-2"></i>Agregar Documento
                    </button>
                </div>
                <div class="d-flex">
                    <div class="input-group me-2" style="width: 250px;">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Buscar documento..." id="searchInput">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Archivo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../includes/db.php");
                        $result = mysqli_query($conexion, "SELECT * FROM documento");
                        while ($fila = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['descripcion']; ?></td>
                                <td>
                                    <span class="badge bg-info">
                                        <i class="fas fa-file me-1"></i> <?php echo $fila['archivo']; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="../includes/download.php?id=<?php echo $fila['id']; ?>" class="btn btn-primary btn-sm action-btn" title="Descargar">
                                        <i class="fas fa-download"></i>
                                    </a>

                                    <button type="button" class="btn btn-warning btn-sm action-btn" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id']; ?>" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm action-btn" data-bs-toggle="modal" data-bs-target="#delete<?php echo $fila['id']; ?>" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php include "../includes/editar.php"; ?>
                            <?php include "../includes/eliminar.php"; ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> Sistema de Gestión de Documentos. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                responsive: true,
                dom: '<"top"f>rt<"bottom"lip><"clear">',
                initComplete: function() {
                    $('.dataTables_filter input').attr('placeholder', 'Buscar...');
                }
            });
            
            $('#searchInput').keyup(function(){
                $('#dataTable').DataTable().search($(this).val()).draw();
            });
        });
    </script>
    
    <?php include "agregar.php"; ?>
</body>

</html>
