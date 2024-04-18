<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Eliminar vehículo</title>
</head>
<body>
    <header>
        <h1>Eliminar vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo si se ha traído el bastidor
    if(isset($_GET["id"])){
        // Guardo el bastidor en una variable
        $bastidor=$_GET["id"];

        // Sentencia DELETE del vehículo con ese bastidor
        $sql="DELETE FROM vehiculos WHERE bastidor='$bastidor'";
        $resultado=$mysqli->query($sql);
        ?>
        <div class="bien">
            <h2 class="bient">Vehículo eliminado con exito</h2>
            <p class="bienb"><a href="admin.html">Inicio</a><a href="eliminar-vehiculo.php">Volver</a></p>
        </div>
        <?php
    } else {
        echo "No se lo ha traído";
    }
    ?>
</body>
</html>