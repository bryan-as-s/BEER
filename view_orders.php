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

// Consultar los datos de la tabla 'orden'
$sql = "SELECT * FROM orden";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ver Órdenes de SAP</title>
    <link rel="stylesheet" href="view_orders.css" /> <!-- Nueva hoja de estilos -->
</head>
<body>
    <div class="container">
        <h1>Órdenes Registradas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Orden</th>
                    <th>ID Insumo</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID_ORDEN"] . "</td>";
                        echo "<td>" . $row["ID_INSUMO"] . "</td>";
                        echo "<td>" . $row["CANTIDAD"] . "</td>";
                        echo "<td>" . $row["UNIDAD"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay órdenes registradas</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="index.php" class="btn">Regresar a Inicio</a>
    </div>
</body>
</html>
