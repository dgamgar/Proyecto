<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vehiculo.css">
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
                                        // Guardo el bastidor y el precio en una sesión
                                        $bastidor=$fila["bastidor"];
                                        $_SESSION['bast']=$bastidor;
                                        $_SESSION['precio']=$fila["precio"];

                                        echo "<tr>";
                                        echo "<td class='td'>$fila[bastidor]</td>";
                                        echo "<td class='td'>$fila[color]</td>";
                                        echo "<td class='td'>$fila[paquete]</td>";
                                        echo "<td class='td'>$fila[precio]</td>";
                                        ?>
                                        <td><a href="comprar.html">Comprar</a></td>
                                        <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                </table>
    </div>
                <p><a href="marca.php">Volver</a></p>
                <footer>
                    <div class="rrss">
                        <div class="rrss-item">
                            <img src="img/telefono.png" class="ico"><p>645868195</p>
                        </div>
                        <div class="rrss-item">
                            <img src="img/gmail.png" class="ico"><p>dancarautos@gmail.com</p>
                        </div>
                        <div class="rrss-item">
                            <img src="img/instagram.png" class="ico"><p>@dancar_autos</p>
                        </div>
                    </div>
                    <div class="copy">
                        <div class="copy-item">
                            <img src="img/copy.png" class="icopy">
                        </div>
                        <div class="copy-item">
                            <p> 2024 DanCar Autos SL. ALL RIGHTS RESERVED.</p>
                        </div>
                    </div>
                </footer>
                <?php
            } else {
                ?>
                <div class="nohay">
                    <h2>Lo sentimos, en estos momentos no tenemos vehículos disponibles de ese modelo.</h2>
                    <p><a href="marca.php">Volver</a></p>
                </div>
                <footer>
                    <div class="rrss">
                        <div class="rrss-item">
                            <img src="img/telefono.png" class="ico"><p>645868195</p>
                        </div>
                        <div class="rrss-item">
                            <img src="img/gmail.png" class="ico"><p>dancarautos@gmail.com</p>
                        </div>
                        <div class="rrss-item">
                            <img src="img/instagram.png" class="ico"><p>@dancar_autos</p>
                        </div>
                    </div>
                    <div class="copy">
                        <div class="copy-item">
                            <img src="img/copy.png" class="icopy">
                        </div>
                        <div class="copy-item">
                            <p> 2024 DanCar Autos SL. ALL RIGHTS RESERVED.</p>
                        </div>
                    </div>
                </footer>
                <?php
            }
        }else{
            echo 'no se ha pasado el id';
        }
        ?>
</body>
</html>