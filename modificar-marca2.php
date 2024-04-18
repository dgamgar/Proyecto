<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
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
            <h2>Introduzca el nuevo nombre de la marca</h2>
            <!-- Formulario para pidiendo la modificación de la marca -->
            <form action="modificar-marca3.php" method="post" class="formulario">
                <div>
                    <label for="marca1">Nuevo nombre: </label>
                    <input type="text" name="marca1" id="marca1">
                </div>
                <div class="btn-mod">
                    <input type="submit" value="Modificar">
                </div>
            </form>
            <p><a href="modificar-marca.php">Volver</a></p>
        </div>
        <?php
    } else {
        echo "No se ha traído el nombre de la marca";
    }
    ?>
</body>
</html>