<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Añadir marca</title>
</head>
<body>
    <header>
        <h1>Añadir marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Me traigo el nombre de la marca que quiere añadir
    $marca=$_POST["marca"];

    // Establezco conexion con la BD
    require "conexion.php";

    // Compruebo que la marca no exista ya
    $sql1="SELECT * FROM marca WHERE nombre_marca='$marca'";
    $resultado1=$mysqli->query($sql1);

    if($resultado1->num_rows>0){
        // Ya existe la marca introducida
        ?>
        <div class="mal">
            <h2 class="malt">La marca introducida ya existe, inténtelo de nuevo</h2>
            <p class="malb"><a href='añadir-marca.html'>Volver</a></p>
        </div>
        <?php
    } else {
        // No existe la marca introducida
        // Hago insert con la nueva marca
        $sql="INSERT INTO marca (nombre_marca) VALUES ('$marca')";
        $resultado=$mysqli->query($sql);
        ?>
        <div class="bien">
            <h2 class="bient">Nueva marca añadida con éxito</h2>
            <p class="bienb"><a href="admin.html">Inicio</a><a href="añadir-marca.html">Volver</a></p>
        </div>
        <?php
    }
    ?>
</body>
</html>