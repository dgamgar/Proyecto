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
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
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
        <form action="añadir-modelo2.php" method="post" class="formulario">
            <div>
                <label for="marca">Escoja la marca: </label>
                <select name="marca" id="marca">
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
                <label for="nombre_modelo">Nombre del modelo: </label>
                <input type="text" name="nombre_modelo" id="nombre_modelo" required>
            </div>
            <br>
            <div>
                <!-- Pide número de puertas -->
                <label for="num_puertas">Número de puertas: </label>
                <input type="text" name="num_puertas" id="num_puertas">
            </div>
            <br>
            <div>
                <!-- Pide tipo de combustible -->
                <label for="combustible">Tipo de combustible: </label>
                <select name="combustible"> 
                    <option>Diesel</option>
                    <option>Gasolina</option>
                    <option>Eléctrico</option>
                    <option>Híbrido</option>
                    <option>GLP</option>
                </select>
            </div>
            <br>
            <div>
                <!-- Pide potencia(cv) -->
                <label for="cv">Potencia(CV): </label>
                <input type="text" name="cv" id="cv">
            </div>
            <br>
            <div class="form-btn">
                <input type="submit" value="Añadir">
            </div>
        </form>
        <p><a href="añadir.html">Volver</a></p>
    </div>
</body>
</html>