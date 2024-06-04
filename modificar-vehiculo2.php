<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Modificar vehículo</title>
</head>
<body>
    <header>
        <h1>Modificar vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Estbalezco conexión con la BD
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
                                <tr class="bg-dark">
                                    <th style="color:white; padding:10px;">Número de bastidor</th>
                                    <th style="color:white; padding:10px;">Color</th>
                                    <th style="color:white; padding:10px;">Pack Estética</th>
                                    <th style="color:white; padding:10px;">Precio(€)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($fila = $resultado->fetch_assoc()){                                
                                        echo "<tr>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila[bastidor]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila[color]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila[paquete]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila[precio]</td>";
                                        ?>
                                        <td><a href="modificar-vehiculo3.php?id=<?php echo $fila["bastidor"];?>" class="btn btn-primary">Modificar</a></td>
                                        <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                </table>
                <br>
                <p><a href="modificar-vehiculo.php" class="btn btn-warning">Volver</a></p>
            </div>
            <?php
        } else {
            // No hay
            ?>
            <div class="container">
                <h2 class="bg-danger rounded" style="padding:10px;">ERROR: No hay vehículos</h2>
                <p><a href="admin.html" class="btn btn-warning">Volver</a></p>
            </div>
            <footer class="card fixed-bottom text-center bg-info">
                <h5>INFO</h5>
                <p>No tenemos vehículos asociados al modelo seleccionado, inténtelo de nuevo con otro modelo.</p>
            </footer>
            <?php
        }
    } else {
        ?>
        <div class="container">
            <h1><strong>500</strong></h1>
            <h2>Internal Server Error</h2>
        </div>
        <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>