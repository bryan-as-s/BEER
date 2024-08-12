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
$sql = "SELECT ID_INSUMO, nombre_insumo FROM insumo"; // Asegúrate de que el nombre de la columna sea correcto
$result = $conn->query($sql);

$insumos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $insumos[] = $row; // Agregar cada insumo al arreglo
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Orden de SAP</title>
    <link rel="stylesheet" href="index.css" />
</head>
<body>
    <div class="container">
        <h1>Crear Orden de SAP</h1>
        
        <form action="create_order.php" method="POST">
    <div class="form-group">
        <label for="ID_INSUMO">ID Insumo:</label>
        <select id="ID_INSUMO" name="ID_INSUMO" required>
            <option value="">Seleccione un insumo</option>
            <?php foreach ($insumos as $insumo): ?>
                <option value="<?php echo $insumo['ID_INSUMO']; ?>">
                    <?php echo $insumo['nombre_insumo']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="CANTIDAD">Cantidad:</label>
        <input type="number" id="CANTIDAD" name="CANTIDAD" required>
    </div>

    <div class="form-group">
        <label for="UNIDAD">Unidad:</label>
        <input type="text" id="UNIDAD" name="UNIDAD" required>
    </div>

    <button type="submit">Crear Orden</button>
</form>

        <h2>Opciones</h2>
        <a href="view_orders.php" class="btn">Ver Órdenes</a>
    </div>
</body>
</html>
