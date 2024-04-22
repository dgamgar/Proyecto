<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
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
            <form action="modificar-vehiculo3.php" method="post" class="formulario">
                <div>
                    <label for="color">Color: </label>
                    <input type="text" name="color_mod" id="color_mod" value="<?php echo $color;?>">
                </div>
                <br>
                <div>
                    <label for="pack">Pack de estética: </label>
                    <input type="text" name="paquete_mod" id="paquete_mod" value="<?php echo $pack;?>">
                </div>
                <br>
                <div>
                    <label for="precio">Precio(€): </label>
                    <input type="text" name="precio_mod" id="precio_mod" value="<?php echo $precio;?>">
                </div>
                <br>
                <div class="form-btn">
                    <input type="submit" value="Modificar">
                </div>
            </form>
        </div>
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
        <div class="bien">
            <h2 class="bient">Vehículo modificado con éxito</h2>
            <p class="bienb"><a href="admin.html">Volver</a></p>
        </div>
        <?php
    }
    ?>
</body>
</html>