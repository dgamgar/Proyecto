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
    <title>Modificar marca</title>
</head>
<body>
    <header>
        <h1>Modificar marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo si se ha traído el nombre de la marca
    if(isset($_GET['id'])){
        // Sí lo ha traído
        // Guardo el nombre de la marca en una variable
        $nmarca=$_GET['id'];
        
        // Busco el ID de la marca para poder modificarla
        $sql="SELECT * FROM marca WHERE nombre_marca='$nmarca'";
        $resultado=$mysqli->query($sql);

        while($fila = $resultado->fetch_assoc()){
            // Guardo el ID de la marca en una sesión
            $_SESSION['marca_mod']=$fila['ID_marca'];
        }

        ?>
        <div class="container">
            <!-- Formulario para pidiendo la modificación de la marca -->
            <form action="modificar-marca2.php" method="post" class="shadow-lg p-3 mb-5 bg-light rounded">
                <div>
                    <label for="marca1">Nuevo nombre: </label>
                    <input type="text" name="marca1" id="marca1">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Modificar" class="btn btn-success">
                </div>
            </form>
            <p><a href="modificar-marca.php" class="btn btn-warning">Volver</a></p>
        </div>
        <footer class="card fixed-bottom text-center bg-info">
            <h5>INFO</h5>
            <p>Aquí debe introducir el nombre modificado para la marca escogida.</p>
        </footer>
        <?php
    } else {
        // Me traigo el nuevo nombre y el Id de la marca
        $marca=$_POST["marca1"];
        $id=$_SESSION['marca_mod'];
        
        // Establezco conexión con la BD
        require "conexion.php";
        
        // Sentencia para modificar el nombre en la tabla
        $sql="UPDATE marca SET nombre_marca = '$marca' WHERE ID_marca='$id'";
        $resultado=$mysqli->query($sql);
        ?>
        <div class="container">
            <h2 class="bg-success rounded" style="padding:10px;">Marca modificada con éxito</h2>
            <p><a href="admin.html" class="btn btn-primary" style="margin:10px;">Inicio</a><a href="modificar-marca.php" class="btn btn-warning">Volver</a></p>
        </div>
        <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>