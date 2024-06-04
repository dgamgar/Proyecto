<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Modificar vehiculo</title>
</head>
<body>
    <header>
        <h1>Modificar vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo si se ha traído el ID
    if(isset($_GET['id'])){
        // Guardo el ID en una variable y en una sesión
        $bast=$_GET['id'];
        $_SESSION['basti']=$bast;

        // Saco los datos del vehículo
        $sql="SELECT * FROM vehiculos WHERE bastidor='$bast'";
        $resultado=$mysqli->query($sql);

        // Guardo los datos del vehículo en variables
        while($fila = $resultado->fetch_assoc()){
            $color=$fila["color"];
            $pack=$fila["paquete"];
            $precio=$fila["precio"];
        }

        ?>
        <div class="container">
            <!-- Formulario relleno con los datos a modificar -->
            <form action="modificar-vehiculo3.php" method="post" class="shadow-lg p-3 mb-5 bg-light rounded">
                <input type="text" name="color_mod" id="color_mod" class="form-control" value="<?php echo $color;?>">
                <br>
                <input type="text" name="paquete_mod" id="paquete_mod" class="form-control" value="<?php echo $pack;?>">
                <br>
                <div class="input-group mb-3">
                    <input type="text" name="precio_mod" id="precio_mod" class="form-control" value="<?php echo $precio;?>">
                    <span class="input-group-text">€</span>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Modificar" class="btn btn-success">
                </div>
            </form>
        </div>
        <footer class="card fixed-bottom text-center bg-info">
            <h5>INFO</h5>
            <p>Aquí debe introducir los datos modificados del vehículo escogido.</p>
        </footer>
        <?php
    } else {
        // Guardo los datos del formulario en variables
        $color_mod=$_POST["color_mod"];
        $pack_mod=$_POST["paquete_mod"];
        $precio_mod=$_POST["precio_mod"];
        $bastidor=$_SESSION['basti'];

        // Modifico los datos en la tabla
        $sql1="UPDATE vehiculos SET color='$color_mod', paquete='$pack_mod', precio='$precio_mod' WHERE bastidor='$bastidor'";
        $resultado1=$mysqli->query($sql1);

        ?>
        <div class="container">
            <h2 class="bg-success rounded" style="padding:10px;">Vehículo modificado con éxito</h2>
            <p><a href="admin.html" class="btn btn-warning">Volver</a></p>
        </div>
        <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>