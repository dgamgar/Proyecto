<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
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
                                <tr class="bg-dark">
                                    <th style="color:white; padding:10px;">Modelo</th>
                                    <th style="color:white; padding:10px;">Número de puertas</th>
                                    <th style="color:white; padding:10px;">Tipo de combustible</th>
                                    <th style="color:white; padding:10px;">Potencia(CV)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($fila1 = $resultado1->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[nombre_modelo]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[num_puertas]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[combustible]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[cv]</td>";
                                        ?>
                                        <!-- Guardo el ID del modelo escogido para llevarlo a la otra página-->
                                        <td><a href="eliminar-vehiculo3.php?id=<?php echo $fila1['ID_modelo'];?>" class="btn btn-primary">Ver vehículos</a></td>
                                        <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                </table>
                <p><a href="eliminar-vehiculo.php" class="btn btn-warning">Volver</a></p>
            </div>
            <?php

        } else {
            // No hay modelos
            ?>
            <div class="container">
                <h2 class="bg-danger rounded" style="padding:10px;">ERROR: No hay modelos registrados</h2>
                <p><a href="eliminar-vehiculo.php" class="btn btn-warning">Volver</a></p>
            </div>
            <footer class="card fixed-bottom text-center bg-info">
                <h5>INFO</h5>
                <p>No tenemos modelos asociados a la marca escogida, inténtelo de nuevo con otra marca.</p>
            </footer>
            <?php
        }

    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>