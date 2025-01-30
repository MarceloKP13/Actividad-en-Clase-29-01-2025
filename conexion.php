<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante_clase";

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>