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
            <form action="añadir-vehiculo3.php" method="post" class="shadow-lg p-3 mb-5 bg-light rounded">
                <input type="text" name="bastidor" id="bastidor" placeholder="Nº de Bastidor..." class="form-control">
                <br>
                <input type="text" name="color" id="color" placeholder="Color..." class="form-control">
                <br>
                <input type="text" name="paquete" id="paquete" placeholder="Pack de Estética..." class="form-control">
                <br>
                <div class="input-group mb-3">
                    <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio...">
                    <span class="input-group-text">€</span>
                </div>
                <br>
                <input type="hidden" name="id_modelo" value="<?php echo $idmodelo;?>">
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Añadir" class="btn btn-success">
                </div>
            </form>
            <p><a href="añadir.html" class="btn btn-warning">Volver</a></p>
        </div>
        <?php
    } else {
        // Guardo el ID del modelo, ID de la marca y todos los datos en variables
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
            <div class="container">
                <h2 class="bg-danger rounded" style="padding:10px;">ERROR: Vehículo existente</h2>
                <p><a href='añadir-vehiculo.php' class="btn btn-warning">Volver</a></p>
            </div>
            <footer class="card fixed-bottom text-center bg-info">
                <h5>INFO</h5>
                <p>Los datos del vehículo introducido ya están registrados, inténtelo de nuevo con otro vehículo.</p>
            </footer>
            <?php
        } else {
            // No existe el vehículo
            // Insert con todos los datos necesarios
            $sql1="INSERT INTO vehiculos (bastidor, ID_marca, ID_modelo, color, paquete, precio) VALUES ('$bastidor','$id_marca','$id_modelo','$color','$paquete','$precio')";
            $resultado1=$mysqli->query($sql1);
            ?>
            <div class="container">
                <h2 class="bg-success rounded" style="padding:10px;">Vehículo añadido con éxito</h2>
                <p><a href="admin.html" class="btn btn-primary" style="margin:10px;">Inicio</a><a href="añadir-vehiculo.php" class="btn btn-warning">Volver</a></p>
            </div>
            <?php
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>