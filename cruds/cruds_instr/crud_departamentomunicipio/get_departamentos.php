

<?php
// Suponiendo que tienes una conexión con la base de datos
include 'modelo_DepartamentoMunicpio.php';

// Consultar los departamentos
$query = "SELECT ID_Departamentos, Nombre_Departamento, Descripcion_Departamento FROM departamentos";
$result = mysqli_query($conn, $query);

$departamentos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $departamentos[] = $row;
}


echo json_encode($departamentos);
?>