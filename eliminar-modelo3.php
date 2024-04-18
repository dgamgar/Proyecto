<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Eliminar modelo</title>
</head>
<body>
    <header>
        <h1>Eliminar modelo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo si se ha traído del ID del modelo
    if(isset($_GET["id"])){
        // Guardo el ID de modelo en una variable
        $idmodelo=$_GET["id"];

        // Compruebo si hay vehículos de este modelo
        $sql="SELECT * FROM vehiculos WHERE ID_modelo='$idmodelo'";
        $resultado=$mysqli->query($sql);

        if($resultado->num_rows>0){
            // Sí hay vehículos
            ?>
            <div class="mal">
                <h2 class="malt">Hay vehículos registrados para este modelo, por favor, elimínelos para poder eliminar este modelo.</h2>
                <p class="malb"><a href="eliminar-vehiculo3.php?id=<?php echo $idmodelo;?>">Eliminar vehículos de este modelo</a></p>
                <p class="malb"><a href="eliminar-modelo.php">Volver</a></p>
            </div>
            <?php
        } else {
            // No hay vehículos
            // Sentencia DELETE para eliminar el modelo
            $sql1="DELETE FROM modelo WHERE ID_modelo='$idmodelo'";
            $resultado1=$mysqli->query($sql1);
            ?>
            <div class="bien">
                <h2 class="bient">Modelo eliminado con éxito</h2>
                <p class="bienb"><a href="admin.html">Inicio</a><a href="eliminar-modelo.php">Volver</a></p>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>