<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Usuario</h2>
        <form action="procesar_registro.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required><br>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" required><br>

            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" required><br>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
