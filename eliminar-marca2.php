<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Eliminar marca</title>
</head>
<body>
    <header>
        <h1>Eliminar marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    // Compruebo si se ha traído el nombre de la marca
    if(isset($_GET["id"])){
        $nmarca=$_GET["id"];

        //  Sentencia para sacar el ID de la marca
        $sql="SELECT * FROM marca WHERE nombre_marca='$nmarca'";
        $resultado=$mysqli->query($sql);
        
        // Guardo el ID en una variable
        while($fila = $resultado->fetch_assoc()){
            $idmarca=$fila["ID_marca"];
        }

        // Compruebo si hay modelos de esta marca
        $sql1="SELECT * FROM modelo WHERE ID_marca='$idmarca'";
        $resultado1=$mysqli->query($sql1);

        if($resultado1->num_rows>0){
            // Sí hay modelos
            ?>
            <div class="mal">
                <h2 class="malt">Hay registrados modelos de esta marca, primero elimine los modelos.</h2>
                <p class="malb"><a href="eliminar-modelo2.php?id=<?php echo $nmarca;?>">Eliminar modelos de esta marca</a></p>
                <p class="malb"><a href="eliminar-marca.php">Volver</a></p>
            </div>
            <?php
        } else {
            // No hay modelos
            // Sentencia DELETE para eliminar la marca escogida
            $sql2="DELETE FROM marca WHERE ID_marca='$idmarca'";
            $resultado2=$mysqli->query($sql2);
            header("Location:eliminar-marca.php");
        }


    } else {
        echo "No se lo ha traído";
    }
    ?>
</body>
</html>