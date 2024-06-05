<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Vehículos</title>
</head>
<body>
    <header>
        <h1>Vehículos disponibles</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
        <?php

        // Establezco conexión con la BD
        require "conexion.php";

        // Compruebo si se ha traído el ID del modelo o no
        if(isset($_GET['id'])){
            // Sí lo ha traído
            // Guardo el ID en una variable y en una sesión
            $id_modelo=$_GET['id'];
            $_SESSION['id_modelo']=$id_modelo;

            // Saco los datos de los vehículos que hay
            $sql="SELECT * FROM vehiculos WHERE ID_modelo='$id_modelo'";
            $resultado=$mysqli->query($sql);

            // Compruebo que haya vehículos
            if($resultado->num_rows>0){
                // Sí los hay
                ?>
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
                                        // Guardo el bastidor y el precio en una sesión
                                        $bastidor=$fila["bastidor"];
                                        $_SESSION['bast']=$bastidor;
                                        $_SESSION['precio']=$fila["precio"];

                                        echo "<tr>";
                                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[bastidor]</td>";
                                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[color]</td>";
                                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[paquete]</td>";
                                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[precio]</td>";
                                        ?>
                                        <td><a href="comprar.html" class="btn btn-primary">Comprar</a></td>
                                        <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                </table>
                <br>
                <p><a href="marca.php" class="btn btn-warning">Volver</a></p>
                <?php
            } else {
                ?>
                <div class="card">
                    <div class="card-body bg-danger">
                        <h5>Lo sentimos, en estos momentos no tenemos vehículos disponibles de ese modelo.</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <p><a href="marca.php" class="btn btn-warning">Volver</a></p>
                    </div>
                </div>
                <?php
            }
        }else{
            echo 'no se ha pasado el id';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>