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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
</head>
<body>
    <header>
        <h2>Escoja la marca que desee</h2>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
                <div class="bg-light rounded" style="max-width:80%; padding:10px;">
                    <?php
                    // Recorro todo el array mostrando las marcas que hay almacenadas
                    foreach ($marcas as $marca){
                        ?>
                        <a href="modelo.php?id=<?php echo $marca;?>"><img src="img/<?php echo $marca;?>.png" style="width:120px; padding:10px;"></a>
                        <?php
                    }
                    ?>
                </div>
                <br>
        <p><a href="clientes.html" class="btn btn-warning">Volver</a></p>
    </div>
    <footer>
        <div class="row">
            <h5>Contáctanos</h5>
            <span>------------------------------</span>
            <div class="row">
                <div class="col-sm-2">
                    <p>685489625</p>
                </div>
                <div class="col-sm-1">
                    <img src="img/telefono.png" style="width:30px;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>dancarautos@gmail.com</p>
                </div>
                <div class="col-sm-1">
                    <img src="img/gmail.png" style="width:30px;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>@dancar_autos</p>
                </div>
                <div class="col-sm-1">
                    <img src="img/instagram.png" style="width:30px;">
                </div>
            </div>
        </div>
        <div class="text-center">
            <p><img src="img/copy.png" style="width:20px;"> 2024 DanCar Autos SL. ALL RIGHTS RESERVED.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>