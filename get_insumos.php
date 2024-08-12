<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beersap";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar los datos de la tabla 'insumo'
$sql = "SELECT ID_INSUMO, NOMBRE FROM insumo";
$result = $conn->query($sql);

$insumos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $insumos[] = $row; // Agregar cada insumo al arreglo
    }
}

// Devolver los insumos en formato JSON
header('Content-Type: application/json');
echo json_encode($insumos);

$conn->close();
?>
