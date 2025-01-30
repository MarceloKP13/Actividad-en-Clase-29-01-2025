<?php
include 'conexion.php'; // Incluir la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Query para insertar los datos en la base de datos
    $query = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";
    
    if (mysqli_query($conexion, $query)) {
        echo "<div class='success'>Usuario registrado correctamente.</div>";
        echo "<a href='login.php'><button class='btn-login'>Ir al Login</button></a>"; // Botón para redirigir
    } else {
        echo "<div class='error'>Error: " . mysqli_error($conexion) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>¡Bienvenido!</h1>
        <p>El registro ha sido exitoso. Ahora puedes iniciar sesión.</p>
    </div>
</body>
</html>