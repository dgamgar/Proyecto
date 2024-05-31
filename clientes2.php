<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/buyacar_89124.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/clientes.css">
    <title>Compras</title>
</head>
<body>
    <header>
        <h1>Compras realizadas</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
        <?php
        // Establezco conexión con la BD
        require "conexion.php";

        // Guardo el id del cliente en una variable
        $idcliente=$_SESSION['id'];

        // Saco los datos de la tabla transacciones
        $sql="SELECT * FROM transacciones WHERE id_comprador='$idcliente'";
        $resultado=$mysqli->query($sql);

        if($resultado->num_rows>0){
            ?>
            <!-- Tabla mostrando compras -->
            <table>
                <thead>
                    <tr>
                        <th class="th">Marca</th>
                        <th class="th">Modelo</th>
                        <th class="th">Bastidor</th>
                        <th class="th">Precio(€)</th>
                        <th class="th">Fecha de compra</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                    <?php
                    while($fila = $resultado->fetch_assoc()){
                        $idmodelo=$fila["id_modelo"];
                        echo "<tr>";

                        // Saco el nombre de la marca y el modelo y los muestro
                        $sql1="SELECT * FROM modelo WHERE ID_modelo='$idmodelo'";
                        $resultado1=$mysqli->query($sql1);

                        while($fila1 = $resultado1->fetch_assoc()){
                            $idmarca=$fila1["ID_marca"];
                    
                            $sql2="SELECT * FROM marca WHERE ID_marca='$idmarca'";
                            $resultado2=$mysqli->query($sql2);
                    
                            while($fila2 = $resultado2->fetch_assoc()){
                                echo "<td class='td'>$fila2[nombre_marca]</td>";
                            }
                    
                            echo "<td class='td'>$fila1[nombre_modelo]</td>";
                        }
                    
                        echo "<td class='td'>$fila[bastidor]</td>";
                        echo "<td class='td'>$fila[precio]</td>";
                        echo "<td class='td'>$fila[fecha]</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
            <p><a href="clientes.html">Volver</a></p>
            <?php

        } else {
            ?>
            <h2>Todavía no ha realizado ninguna compra</h2>
            <p><a href="clientes.html">Volver</a><a href="marca.php">Ir a comprar</a></p>
            <?php
        }
        ?>
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
</body>
</html>