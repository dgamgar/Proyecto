<?php
// Establezco conexión con la BD
require "conexion.php";

// Preparo la sentencia SQL
$sql="SELECT * FROM marca";
$resultado=$mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // Array para almacenar las marcas
    $marcas = array();

    // Recorro los resultados y almaceno las marcas en el array
    while ($fila = $resultado->fetch_assoc()) {
        $marcas[] = $fila['nombre_marca'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Añadir vehículo</title>
</head>
<body>
    <header>
        <h1>Nuevo vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
        <!-- Menú desplegable para escoger marca -->
        <form action="añadir-vehiculo2.php" method="post" class="form-ve">
            <p>Escoja la marca a la que pertenecerá el nuevo modelo </p>
            <select name="marca" id="marca" class="marca">
                <?php
                // Recorro todo el array mostrando las marcas que hay almacenadas
                foreach ($marcas as $marca){
                    echo "<option value='$marca'>$marca</option>";
                }
                ?>
            </select>
            <div class="form-btn">
                <input type="submit" value="Siguiente">
            </div>
        </form>
        <p><a href="admin.php" class="btn-ve">Volver</a></p>
    </div>
</body>
</html>