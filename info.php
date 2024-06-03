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
                <tr class="bg-dark">
                    <th style="color:white; padding:10px;">Marca</th>
                    <th style="color:white; padding:10px;">Modelo</th>
                    <th style="color:white; padding:10px;">Número de Bastidor</th>
                    <th style="color:white; padding:10px;">Precio(€)</th>
                    <th style="color:white; padding:10px;">Cliente</th>
                    <th style="color:white; padding:10px;">DNI</th>
                    <th style="color:white; padding:10px;">Fecha de Compra</th>
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
                                echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila2[nombre_marca]</td>";
                            }

                            echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[nombre_modelo]</td>";

                        }

                        // Muestro bastidor y precio
                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[bastidor]</td>";
                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[precio]</td>";

                        // Saco el nombre del cliente y el DNI y los muestro
                        $sql3="SELECT * FROM usuarios WHERE ID_usu='$idcliente'";
                        $resultado3=$mysqli->query($sql3);

                        while($fila3 = $resultado3->fetch_assoc()){
                            echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila3[Nombre]</td>";
                            echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila3[dni]</td>";
                        }

                        // Muestro la fecha de la compra
                        echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[fecha]</td>";
                        echo "</tr>";

                       
                    }
                ?>
            </tbody>
        </table>
        <p><a href="admin.html" class="btn btn-warning" style="margin-top: 10px;">Volver</a></p>
    </div>
    <footer class="card text-center bg-info">
        <h5>INFO</h5>
        <p>Aquí se muestran todas las ventas realizadas.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>