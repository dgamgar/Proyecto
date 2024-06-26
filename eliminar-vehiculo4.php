<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
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
        <div class="container">
            <h2 class="bg-success rounded" style="padding:10px;">Vehículo eliminado con exito</h2>
            <p><a href="admin.html" class="btn btn-primary" style="margin:10px;">Inicio</a><a href="eliminar-vehiculo.php" class="btn btn-warning">Volver</a></p>
        </div>
        <?php
    } else {
        echo "No se lo ha traído";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>