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
    <title>Modificar vehículo</title>
</head>
<body>
    <header>
        <h1>Modificar vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    if(!isset($_GET['id'])){
        ?>
        <div class="container">
            <h2>Seleccione la marca a la que pertenece el vehículo</h2>
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
                            <td><a href="modificar-vehiculo.php?id=<?php echo $marca;?>">Modelos</a></td>
                            <?php
                            echo "</tr>";
                        }
                        ?>
                </tbody>
            </table>
            <p><a href="admin.html">Inicio</a></p>
        </div>
        <?php
    } else {
        // Guardo el nombre de la marca en una variable
        $nmarca=$_GET['id'];

        // Establezco conexión con la BD
        require "conexion.php";

        // Saco el ID de la marca para mostrar los modelos de esta
        $sql="SELECT ID_marca FROM marca WHERE nombre_marca='$nmarca'";
        $resultado=$mysqli->query($sql);

        while($fila=$resultado->fetch_assoc()){
            $id=$fila['ID_marca'];
        }

        // Saco los datos de los modelos de la marca escogida
        $sql1="SELECT * FROM modelo WHERE ID_marca='$id'";
        $resultado1=$mysqli->query($sql1);
        ?>
        <!-- Tabla con los modelos -->
        <div class="container">
            <table id="tabla" class="display" >
                        <thead>
                            <tr>
                                <th class="th">Modelo</th>
                                <th class="th">Número de puertas</th>
                                <th class="th">Tipo de combustible</th>
                                <th class="th">Potencia(CV)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($fila1 = $resultado1->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td class='td'>$fila1[nombre_modelo]</td>";
                                    echo "<td class='td'>$fila1[num_puertas]</td>";
                                    echo "<td class='td'>$fila1[combustible]</td>";
                                    echo "<td class='td'>$fila1[cv]</td>";
                                    ?>
                                    <!-- Guardo el ID del modelo escogido para llevarlo a la otra página-->
                                    <td><a href="modificar-vehiculo2.php?id=<?php echo $fila1['ID_modelo'];?>">Vehículos</a></td>
                                    <?php
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
            </table>
            <p><a href="modificar-vehiculo.php">Volver</a></p>
        </div>
        <?php
        
    }
    ?>
</body>
</html>