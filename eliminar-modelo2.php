<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Eliminar modelo</title>
</head>
<body>
    <header>
        <h1>Eliminar modelo</h1>
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo si se ha traído el nombre de la marca
    if(isset($_GET["id"])){
        // Guardo el nombre de la marca
        $nmarca=$_GET["id"];

        // Saco el ID de la marca
        $sql="SELECT * FROM marca WHERE nombre_marca='$nmarca'";
        $resultado=$mysqli->query($sql);

        while($fila = $resultado->fetch_assoc()){
            // Guardo el Id de la marca
            $idmarca=$fila["ID_marca"];
        }

        // Busco los modelos de la marca escogida
        $sql1="SELECT * FROM modelo WHERE ID_marca='$idmarca'";
        $resultado1=$mysqli->query($sql1);

        // Compruebo si hay modelos o no
        if($resultado1->num_rows>0){
            // Sí hay modelos
            ?>
            <div class="container">
                <!-- Tabla con los modelos -->
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
                                        <td><a href="eliminar-modelo3.php?id=<?php echo $fila1['ID_modelo'];?>">Eliminar</a></td>
                                        <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                </table>
                <p><a href="eliminar-modelo.php">Volver</a><a href="admin.html">Inicio</a></p>
            </div>
            <?php

        } else {
            // No hay modelos
            ?>
            <div class="mal">
                <h2 class="malt">No tenemos modelos registrados de la marca seleccionada, inténtelo de nuevo</h2>
                <p class="malb"><a href="eliminar-modelo.php">Volver</a></p>
            </div>
            <?php
        }

    }
    ?>
</body>
</html>