<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/info.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Ventas</title>
</head>
<body>
    <header>
        <h1>Ventas</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexió ncon la BD
    require "conexion.php";

    // Saco los datos de las ventas
    $sql="SELECT * FROM transacciones";
    $resultado=$mysqli->query($sql);
    ?>
    <div class="container">
        <!-- Tabla con ventas -->
        <table id="tabla" class="display" >
            <thead>
                <tr>
                    <th class="th">Marca</th>
                    <th class="th">Modelo</th>
                    <th class="th">Número de Bastidor</th>
                    <th class="th">Precio(€)</th>
                    <th class="th">Cliente</th>
                    <th class="th">DNI</th>
                    <th class="th">Fecha de Compra</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado->fetch_assoc()){
                        $idcliente=$fila["id_comprador"];
                        $idmodelo=$fila["id_modelo"];
                        echo "<tr>";
                        $sql1="SELECT * FROM modelo WHERE ID_modelo='$idmodelo'";
                        $resultado1=$mysqli->query($sql1);

                        // Saco el nombre de la marca y el modelo y los muestro
                        while($fila1 = $resultado1->fetch_assoc()){
                            $idmarca=$fila1["ID_marca"];

                            $sql2="SELECT * FROM marca WHERE ID_marca='$idmarca'";
                            $resultado2=$mysqli->query($sql2);

                            while($fila2 = $resultado2->fetch_assoc()){
                                echo "<td class='td'>$fila2[nombre_marca]</td>";
                            }

                            echo "<td class='td'>$fila1[nombre_modelo]</td>";

                        }

                        // Muestro bastidor y precio
                        echo "<td class='td'>$fila[bastidor]</td>";
                        echo "<td class='td'>$fila[precio]</td>";

                        // Saco el nombre del cliente y el DNI y los muestro
                        $sql3="SELECT * FROM usuarios WHERE ID_usu='$idcliente'";
                        $resultado3=$mysqli->query($sql3);

                        while($fila3 = $resultado3->fetch_assoc()){
                            echo "<td class='td'>$fila3[Nombre]</td>";
                            echo "<td class='td'>$fila3[dni]</td>";
                        }

                        // Muestro la fecha de la compra
                        echo "<td class='td'>$fila[fecha]</td>";
                        echo "</tr>";

                       
                    }
                ?>
            </tbody>
        </table>
        <p><a href="admin.html">Volver</a></p>
    </div>
</body>
</html>