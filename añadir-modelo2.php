<?php
// Me traigo la marca que haya escogido
$marca=$_POST["marca"];

// Establezco conexión con la BD
require "conexion.php";

// Saco el id de la marca para hacer el insert después
$sql="SELECT ID_marca FROM marca WHERE nombre_marca='$marca'";
$resultado=$mysqli->query($sql);

while($fila = $resultado->fetch_assoc()){
    $id=$fila["ID_marca"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Añadir modelo</title>
</head>
<body>
    <header>
        <h1>Nuevo modelo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Me traigo todos los datos
    $nmodelo=$_POST["nombre_modelo"];
    $npuertas=$_POST["num_puertas"];
    $comb=$_POST["combustible"];
    $cv=$_POST["cv"];
    
    // Compruebo que el modelo no exista ya
    $sql1="SELECT * FROM modelo WHERE nombre_modelo='$nmodelo' AND num_puertas='$npuertas' AND combustible='$comb' AND cv='$cv'";
    $resultado1=$mysqli->query($sql1);  

    if($resultado1->num_rows>0){
        // Ya existe el modelo introducido
        ?>
        <div class="container">
            <h2 class="bg-danger rounded" style="padding:10px;">ERROR: Modelo existente</h2>
            <p><a href='añadir-modelo.php' class="btn btn-warning">Volver</a></p>
        </div>
        <footer class="card fixed-bottom text-center bg-info">
            <h5>INFO</h5>
            <p>Los datos del modelo introducido ya están registrados, inténtelo de nuevo con otro modelo.</p>
        </footer>
        <?php
    } else {
        // Hago insert con todos los datos
        $sql1="INSERT INTO modelo(ID_marca, nombre_modelo, num_puertas, combustible, cv)VALUES ('$id','$nmodelo','$npuertas','$comb','$cv')";
        $resultado1=$mysqli->query($sql1);
        ?>
        <div class="container">
            <h2 class="bg-success rounded" style="padding:10px;">Modelo añadido con éxito</h2>
            <p><a href="admin.html" class="btn btn-primary" style="margin:10px;">Inicio</a><a href="añadir-modelo.php" class="btn btn-warning">Volver</a></p>
        </div>
        <?php
    }
    ?>
</body>
</html>