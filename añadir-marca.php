<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Añadir marca</title>
</head>
<body>
    <header>
        <h1>Añadir marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";
    ?>
    <div class="container">
        <!-- Formulario pidiendo los datos a insertar -->
        <form action="añadir-marca2.php" method="post" class="formulario">
            <div class="form-item">
                <label for="marca">Introduzca el nombre de la nueva marca: </label>
                <input type="text" name="marca" id="marca">
            </div>
            <br>
            <div class="in">
                <p>Recuerde que al añadir una marca, debe añadir una imagen(png) de esta en la carpeta img/ con el nombre de la marca tal cual lo ponga aquí.</p>
                <p>La ruta debe quedar así: C:/xampp/htdocs/proyecto/img/nueva-marca.png</p>
            </div>
            <div class="form-btn">
                <input type="submit" value="Añadir">
            </div>
        </form>
    </div>
</body>
</html>