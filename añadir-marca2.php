<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
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
        <div class="container">
            <h2 class="bg-danger rounded" style="padding:10px;">ERROR: Marca ya existente</h2>
            <p><a href='añadir-marca.html' class="btn btn-warning">Volver</a></p>
        </div>
        <footer class="card fixed-bottom text-center bg-info">
            <h5>INFO</h5>
            <p>El nombre de la marca que ha introducido ya está registrado, inténtelo de nuevo con otro nombre.</p>
        </footer>
        <?php
    } else {
        // No existe la marca introducida
        // Hago insert con la nueva marca
        $sql="INSERT INTO marca (nombre_marca) VALUES ('$marca')";
        $resultado=$mysqli->query($sql);
        ?>
        <div class="container">
            <h2 class="bg-success rounded" style="padding:10px;">Nueva marca añadida con éxito</h2>
            <p><a href="admin.html" class="btn btn-primary" style="margin:10px;">Inicio</a><a href="añadir-marca.html" class="btn btn-warning">Volver</a></p>
        </div>
        <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>