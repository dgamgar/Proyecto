<?php
// Establezco conexión con la BD
require "conexion.php";

// Preparo la sentencia SQL
$sql="SELECT * FROM marca";
$resultado=$mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // Array para almacenar las marcas
    $marcas = array();

    // Recorro los resultados y almaceno las marcas en el array
    while ($fila = $resultado->fetch_assoc()) {
        $marcas[] = $fila['nombre_marca'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Eliminar marca</title>
</head>
<body>
    <header>
        <h1>Eliminar marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    if(!isset($_GET["id"])){
    ?>
    <div class="container">
        <table id="tabla">
            <thead>
                <tr>
                    <th class="th">Marcas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    // Recorro todo el array mostrando las marcas que hay almacenadas
                    foreach ($marcas as $marca){
                        echo "<tr>";
                        echo "<td class='td'>$marca</td>";
                        ?>
                        <td><a href="eliminar-marca.php?id=<?php echo $marca;?>">Eliminar</a></td>
                        <?php
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
        <p><a href="admin.html">Inicio</a></p>
    </div>
    <?php
    } else {
        $nmarca=$_GET["id"];

        //  Sentencia para sacar el ID de la marca
        $sql="SELECT * FROM marca WHERE nombre_marca='$nmarca'";
        $resultado=$mysqli->query($sql);
        
        // Guardo el ID en una variable
        while($fila = $resultado->fetch_assoc()){
            $idmarca=$fila["ID_marca"];
        }

        // Compruebo si hay modelos de esta marca
        $sql1="SELECT * FROM modelo WHERE ID_marca='$idmarca'";
        $resultado1=$mysqli->query($sql1);

        if($resultado1->num_rows>0){
            // Sí hay modelos
            ?>
            <div class="mal">
                <h2 class="malt">Hay registrados modelos de esta marca, primero elimine los modelos.</h2>
                <p class="malb"><a href="eliminar-modelo2.php?id=<?php echo $nmarca;?>">Eliminar modelos de esta marca</a></p>
                <p class="malb"><a href="eliminar-marca.php">Volver</a></p>
            </div>
            <?php
        } else {
            // No hay modelos
            // Sentencia DELETE para eliminar la marca escogida
            $sql2="DELETE FROM marca WHERE ID_marca='$idmarca'";
            $resultado2=$mysqli->query($sql2);
            header("Location:eliminar-marca.php");
        }
    }
    ?>
</body>
</html>