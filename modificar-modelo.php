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
    <title>Modificar modelo</title>
</head>
<body>
    <header>
        <h1>Modificar modelo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
        <!-- Tabla mostrando marcas -->
        <h2>Seleccione la marca a la que pertenece el modelo a modificar</h2>
        <table id="tabla">
            <thead>
                <tr>
                    <th class="th">Marcas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    // Recorro todo el array mostrando las marcas que hay almacenadas
                    foreach ($marcas as $marca){
                        echo "<tr>";
                        echo "<td class='td'>$marca</td>";
                        ?>
                        <td><a href="modificar-modelo2.php?id=<?php echo $marca;?>">Modificar</a></td>
                        <?php
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
        <p><a href="admin.php">Inicio</a></p>
    </div>
</body>
</html>