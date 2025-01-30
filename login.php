<?php
include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conexion, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
        
        if (password_verify($contraseña, $usuario['contraseña'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header('Location: bienvenida.php');
            exit();
        } else {
            echo "<div class='error'>Contraseña incorrecta.</div>";
        }
    } else {
        echo "<div class='error'>El correo no está registrado.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" name="correo" required><br>

            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" required><br>

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>