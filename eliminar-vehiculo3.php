<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Eliminar vehículo</title>
</head>
<body>
    <header>
        <h1>Eliminar vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
<?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo que se haya traído el ID del modelo
    if(isset($_GET['id'])){
        // Guardo el ID en una variable
        $id_modelo=$_GET['id'];

        // Saco los datos de los vehículos que hay
        $sql="SELECT * FROM vehiculos WHERE ID_modelo='$id_modelo'";
        $resultado=$mysqli->query($sql);

        // Compruebo si hay vehículos
        if($resultado->num_rows>0){
            // Sí hay
            ?>
            <div class="container">
                <!-- Tabla mostrando los datos de todos los vehículos del modelo escogido -->
                <table id="tabla" class="display" >
                            <thead>
                                <tr>
                                    <th class="th">Número de bastidor</th>
                                    <th class="th">Color</th>
                                    <th class="th">Pack Estética</th>
                                    <th class="th">Precio(€)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($fila = $resultado->fetch_assoc()){                                
                                        echo "<tr>";
                                        echo "<td class='td'>$fila[bastidor]</td>";
                                        echo "<td class='td'>$fila[color]</td>";
                                        echo "<td class='td'>$fila[paquete]</td>";
                                        echo "<td class='td'>$fila[precio]</td>";
                                        ?>
                                        <td><a href="eliminar-vehiculo4.php?id=<?php echo $fila["bastidor"];?>">Eliminar</a></td>
                                        <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                </table>
                <p><a href="eliminar-vehiculo.php">Volver</a></p>
            </div>
            <?php
        } else {
            // No hay
            ?>
            <div class="mal">
                <h2 class="malt">No existen vehículos del modelo seleccionado, inténtelo de nuevo</h2>
                <p class="malb"><a href="admin.html">Inicio</a><a href="eliminar-vehiculo.php">Volver</a></p>
            </div>
            <?php
        }
    } else {
        echo "No se lo ha traído";
    }
    ?>
</body>
</html>