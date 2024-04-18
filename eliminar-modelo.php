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
    <title>Eliminar modelo</title>
</head>
<body>
    <header>
        <h1>Eliminar modelo</h1>
    </header>
    <div class="container">
        <h2>Seleccione la marca a la que pertenece el modelo</h2>
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
                        <td><a href="eliminar-modelo2.php?id=<?php echo $marca;?>">Ver modelos</a></td>
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