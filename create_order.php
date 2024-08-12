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

// Insertar datos del formulario en la tabla 'orden'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_INSUMO = $_POST["ID_INSUMO"];
    $CANTIDAD = $_POST["CANTIDAD"];
    $UNIDAD = $_POST["UNIDAD"];

    // Ahora no necesitas incluir ID_ORDEN en la consulta
    $sql = "INSERT INTO orden (ID_INSUMO, CANTIDAD, UNIDAD) VALUES ('$ID_INSUMO', '$CANTIDAD', '$UNIDAD')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Orden guardada correctamente. ID de Orden: " . $conn->insert_id . "');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al guardar la orden: " . $conn->error . "');
                window.history.back();
              </script>";
    }
}

// Cerrar conexión
$conn->close();
?>
