<?php
// Establezco conexión con la BD
require "conexion.php";

// Preparo la sentencia SQL
$sql="SELECT * FROM marca";
$resultado=$mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // Array para almacenar las marcas
    $marcas = array();

    // Recorro los resultados y almaceno las marcas en el array
    while ($fila = $resultado->fetch_assoc()) {
        $marcas[] = $fila['nombre_marca'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marca</title>
    <link rel="stylesheet" href="css/marca.css">
</head>
<body>
    <header>
        <h1>Escoja la marca que desee</h1>
        <img src="img/logo2.png" alt="">
    </header>
    <div class="container">
                <div class="marcas">
                    <?php
                    // Recorro todo el array mostrando las marcas que hay almacenadas
                    foreach ($marcas as $marca){
                        ?>
                        <a href="modelo.php?id=<?php echo $marca;?>"><img src="img/<?php echo $marca;?>.png"></a>
                        <?php
                    }
                    ?>
                </div>
        <p><a href="salir.php" class="boton">Salir</a></p>
    </div>
    <footer>
        <div class="rrss">
            <div class="rrss-item">
                <img src="img/telefono.png" class="ico"><p>645868195</p>
            </div>
            <div class="rrss-item">
                <img src="img/gmail.png" class="ico"><p>dancarautos@gmail.com</p>
            </div>
            <div class="rrss-item">
                <img src="img/instagram.png" class="ico"><p>@dancar_autos</p>
            </div>
        </div>
        <div class="copy">
            <div class="copy-item">
                <img src="img/copy.png" class="icopy">
            </div>
            <div class="copy-item">
                <p> 2024 DanCar Autos SL. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>
</body>
</html>