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
    <link rel="stylesheet" href="css/estilos.css">
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
                    <tr class="bg-dark">
                        <th style="color:white; padding:10px;">Marca</th>
                        <th style="color:white; padding:10px;">Modelo</th>
                        <th style="color:white; padding:10px;">Bastidor</th>
                        <th style="color:white; padding:10px;">Precio(€)</th>
                        <th style="color:white; padding:10px;">Fecha de compra</th>
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
                                echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila2[nombre_marca]</td>";
                            }
                    
                            echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[nombre_modelo]</td>";
                        }
                    
                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[bastidor]</td>";
                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[precio]</td>";
                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[fecha]</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
            <br>
            <p><a href="clientes.html" class="btn btn-warning">Volver</a></p>
            <?php

        } else {
            ?>
            <div class="card rounded shadow-lg">
                <div class="card-body bg-danger">
                    <h5>Todavía no ha realizado ninguna compra</h5>
                </div>
                <div class="card-footer">
                    <p class="d-flex justify-content-evenly"><a href="clientes.html" class="btn btn-warning">Volver</a><a href="marca.php" class="btn btn-primary">Ir a comprar</a></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>