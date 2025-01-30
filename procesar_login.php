<?php
include 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = mysqli_query($conexion, $query);
    
    if ($resultado) {
        $usuario = mysqli_fetch_assoc($resultado);
        if (password_verify($contraseña, $usuario['contraseña'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nombre'] = $usuario['nombre'];
            header('Location: bienvenida.php');
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    } else {
        echo "Error en la consulta.";
    }
}
?>