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
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Modificar marca</title>
</head>
<body>
    <header>
        <h1>Modificar marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
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
                        <td><a href="modificar-marca2.php?id=<?php echo $marca;?>">Modificar</a></td>
                        <?php
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
        <p><a href="admin.html">Inicio</a></p>
    </div>
</body>
</html>