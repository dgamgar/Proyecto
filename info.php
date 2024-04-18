<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/info.css">
    <title>Clientes</title>
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
                    <th class="th">Número de Bastidor</th>
                    <th class="th">Fecha de Compra</th>
                    <th class="th">Cliente<th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado->fetch_assoc()){
                        $idcliente=$fila["id_comprador"];
    
                        echo "<tr>";
                        echo "<td class='td'>$fila[bastidor]</td>";
                        echo "<td class='td'>$fila[fecha]</td>";
                        
                        // Saco el DNI del comprador y lo muestro
                        $sql1="SELECT * FROM usuarios WHERE ID_usu='$idcliente'";
                        $resultado1=$mysqli->query($sql1);
    
                        while($fila1 = $resultado1->fetch_assoc()){
                            echo "<td class='td'>$fila1[dni]</td>";
                        }
    
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <p><a href="admin.html">Volver</a></p>
    </div>
</body>
</html>