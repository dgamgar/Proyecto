<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Añadir vehículo</title>
</head>
<body>
    <header>
        <h1>Nuevo vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo si se ha traido el ID del modelo
    if(isset($_GET['id'])){
        // Sí lo ha traído
        $idmodelo=$_GET['id'];
        ?>
        <div class="container">
            <!-- Formulario pidiendo datos necesarios -->
            <form action="añadir-vehiculo3.php" method="post" class="formulario">
                <div>
                    <label for="bastidor">Número de bastidor: </label>
                    <input type="text" name="bastidor" id="bastidor">
                </div>
                <br>
                <input type="hidden" name="id_modelo" value="<?php echo $idmodelo;?>">
                <div>
                    <label for="color">Color: </label>
                    <input type="text" name="color" id="color">
                </div>
                <br>
                <div>
                    <label for="paquete">Pack de estética: </label>
                    <input type="text" name="paquete" id="paquete">
                </div>
                <br>
                <div>
                    <label for="precio">Precio(€): </label>
                    <input type="text" name="precio" id="precio">
                </div>
                <br>
                <div class="form-btn">
                    <input type="submit" value="Añadir">
                </div>
            </form>
            <p><a href="añadir.html">Volver</a></p>
        </div>
        <?php
    } else {
        // Guardo el ID del modelo, ID de la marca y todos los datos en variables
        // $id_modelo=$_SESSION['modelo'];
        $id_modelo=$_POST["id_modelo"];
        $id_marca=$_SESSION['mrc'];
        $bastidor=$_POST["bastidor"];
        $color=$_POST["color"];
        $precio=$_POST["precio"];
        $paquete=$_POST["paquete"];

        // Compruebo que la marca no exista ya
        $sql="SELECT * FROM vehiculos WHERE bastidor='$bastidor'";
        $resultado=$mysqli->query($sql);  

        if($resultado->num_rows>0){
            // Ya existe el vehículo introducido
            ?>
            <div class="mal">
                <h2 class="malt">El vehículo introducido ya existe, inténtelo de nuevo</h2>
                <p class="malb"><a href='añadir-vehiculo.php'>Volver</a></p>
            </div>
            <?php
        } else {
            // No existe el vehículo
            // Insert con todos los datos necesarios
            $sql1="INSERT INTO vehiculos (bastidor, ID_marca, ID_modelo, color, paquete, precio) VALUES ('$bastidor','$id_marca','$id_modelo','$color','$paquete','$precio')";
            $resultado1=$mysqli->query($sql1);
            ?>
            <div class="bien">
                <h2 class="bient">Vehículo añadido con éxito</h2>
                <p class="bienb"><a href="admin.html">Inicio</a><a href="añadir-vehiculo.php">Volver</a></p>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>