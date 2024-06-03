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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Añadir vehículo</title>
</head>
<body>
    <header>
        <h1>Nuevo vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
        <!-- Menú desplegable para escoger marca -->
        <form action="añadir-vehiculo2.php" method="post" class="shadow-lg p-3 mb-5 bg-light rounded row g-1">
            <div class="col-auto" style="margin-top:12px;">
                <label for="marca" class="form-label">Escoja una marca</label>
            </div>
            <div class="col-auto">
                <select name="marca" id="marca" class="marca">
                    <?php
                    // Recorro todo el array mostrando las marcas que hay almacenadas
                    foreach ($marcas as $marca){
                        echo "<option value='$marca'>$marca</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-btn col-auto">
                <input type="submit" value="Siguiente" class="btn btn-primary">
            </div>
        </form>
        <p><a href="admin.html" class="btn btn-warning">Volver</a></p>
    </div>
    <footer class="card text-center fixed-bottom bg-info">
        <p>Debe escoger la marca a la que pertenecerá el nuevo vehículo.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>