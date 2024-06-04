<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
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
            <div class="container">
                <h2 class="bg-danger rounded" style="padding:10px;">ERROR: No se ha podido eliminar el modelo escogido.</h2>
                <p><a href="eliminar-vehiculo3.php?id=<?php echo $idmodelo;?>" class="btn btn-warning">Eliminar vehículos</a>
                <a href="eliminar-modelo.php" class="btn btn-light">Volver</a></p>
            </div>
            <footer class="card text-center fixed-bottom bg-info">
                <h5>INFO</h5>
                <p>Para poder eliminar un modelo, primero debe eliminar los vehículos asociados a este.</p>
            </footer>
            <?php
        } else {
            // No hay vehículos
            // Sentencia DELETE para eliminar el modelo
            $sql1="DELETE FROM modelo WHERE ID_modelo='$idmodelo'";
            $resultado1=$mysqli->query($sql1);
            ?>
            <div class="container">
                <h2 class="bg-success rounded" style="padding:10px;">Modelo eliminado con éxito</h2>
                <p><a href="admin.html" class="btn btn-primary" style="margin:10px;">Inicio</a><a href="eliminar-modelo.php" class="btn btn-warning">Volver</a></p>
            </div>
            <?php
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>