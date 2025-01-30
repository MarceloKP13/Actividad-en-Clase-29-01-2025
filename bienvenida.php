<?php
include "conexion.php";

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4" style="color: #9b1c1c;">Menú del Restaurante</h1>
        
        <div class="row justify-content-center">
            <?php
            if ($result->num_rows > 0) {
                // Mostrar los platos del menú
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg" style="border-radius: 15px; overflow: hidden;">
                            <img src="image/<?= $row['imagen'] ?>" class="card-img-top" alt="<?= $row['nombre'] ?>" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-center" style="color: #9b1c1c;"><?= $row['nombre'] ?></h5>
                                <p class="card-text"><?= $row['descripcion'] ?></p>
                                <p class="text-center" style="font-size: 1.2rem; font-weight: bold;"><?= number_format($row['precio'], 2) ?> USD</p>
                            </div>
                        </div>
                    </div>
            <?php  
                }
            } else {
                echo "<p class='text-center col-12'>No hay platos en el menú en este momento.</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php
$conexion->close();
?>
