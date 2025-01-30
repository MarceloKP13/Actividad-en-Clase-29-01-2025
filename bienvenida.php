<?php
include 'conexion.php';
// Consultar el menú desde la base de datos
$sql = "SELECT * FROM platos"; // Asumiendo que tienes una tabla 'platos'
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - Restaurante</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Menú del Restaurante</h2>
        
        <?php
        if ($result->num_rows > 0) {
            // Mostrar los platos del menú
            while($row = $result->fetch_assoc()) {
                echo '<div class="menu-item">';
                echo '<img src="image/' . $row['imagen'] . '" alt="' . $row['nombre'] . '" class="menu-img">';
                echo '<div class="menu-info">';
                echo '<h3>' . $row['nombre'] . '</h3>';
                echo '<p class="menu-description">' . $row['descripcion'] . '</p>';
                echo '<p class="menu-price">Precio: $' . number_format($row['precio'], 2) . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No hay platos en el menú en este momento.</p>";
        }
        ?>

    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>