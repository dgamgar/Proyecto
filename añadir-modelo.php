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
?><!DOCTYPE html>
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
    <div class="container">
        <!-- Formulario para escoger la marca en la que añadir el modelo -->
        <form action="añadir-modelo2.php" method="post" class="shadow-lg p-3 mb-5 bg-light rounded">
            <div>
                <label for="marca">Marca: </label>
                <select name="marca" id="marca" class="form-select">
                    <?php
                    // Recorro todo el array mostrando las marcas que hay almacenadas
                    foreach ($marcas as $marca){
                        echo "<option value='$marca'>$marca</option>";
                    }
                    ?>
                </select>
            </div>
            <br>
            <div>
                <!-- Pide nombre del modelo -->
                <input type="text" name="nombre_modelo" id="nombre_modelo" class="form-control" placeholder="Nombre del modelo..." required>
            </div>
            <br>
            <div>
                <!-- Pide número de puertas -->
                <input type="text" name="num_puertas" id="num_puertas" class="form-control" placeholder="Número de puertas..." required>
            </div>
            <br>
            <div>
                <!-- Pide tipo de combustible -->
                <label for="combustible">Tipo de combustible: </label>
                <select name="combustible" class="form-select"> 
                    <option>Diesel</option>
                    <option>Gasolina</option>
                    <option>Eléctrico</option>
                    <option>Híbrido</option>
                    <option>GLP</option>
                </select>
            </div>
            <br>
            <div class="input-group mb-3">
                <!-- Pide potencia(cv) -->
                <input type="text" name="cv" id="cv" class="form-control" placeholder="Potencia...">
                <span class="input-group-text">CV</span>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <input type="submit" value="Añadir" class="btn btn-success">
            </div>
        </form>
        <p><a href="añadir.html" class="btn btn-warning">Volver</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>