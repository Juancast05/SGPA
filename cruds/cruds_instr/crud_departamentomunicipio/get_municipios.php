<?php
// Incluir la conexión a la base de datos
include 'modelo_DepartamentoMunicipio.php'; // Asegúrate de que la conexión esté configurada correctamente

// Obtener el ID del departamento desde la URL (o un formulario)
$departamentoId = isset($_GET['departamento_id']) ? (int)$_GET['departamento_id'] : 0;

// Comprobar si se recibió un ID válido
if ($departamentoId > 0) {
    // Preparar la consulta SQL para obtener los municipios del departamento
    $query = "SELECT ID_Municipio, Nombre_Municipio, Descripcion_Municipio 
              FROM municipios 
              WHERE ID_Departamento = ?";

    // Preparar la consulta con el método prepare para prevenir inyecciones SQL
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $departamentoId); // Vincular el ID del departamento al parámetro
    $stmt->execute(); // Ejecutar la consulta
    $result = $stmt->get_result(); // Obtener los resultados de la consulta

    // Inicializar un arreglo para almacenar los municipios
    $municipios = [];

    // Recorrer los resultados y agregar cada municipio al arreglo
    while ($row = $result->fetch_assoc()) {
        $municipios[] = $row;
    }

    // Devolver la respuesta en formato JSON para su uso en un frontend (si es necesario)
    echo json_encode($municipios);
} else {
    // Si el ID del departamento no es válido, devolver un error en formato JSON
    echo json_encode(['error' => 'Departamento no válido']);
}
