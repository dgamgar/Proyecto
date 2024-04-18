<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Modificar marca</title>
</head>
<body>
    <header>
        <h1>Modificar marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Me traigo el nuevo nombre y el Id de la marca
    $marca=$_POST["marca1"];
    $id=$_SESSION['marca_mod'];
    
    // Establezco conexión con la BD
    require "conexion.php";

    // Sentencia para modificar el nombre en la tabla
    $sql="UPDATE marca SET nombre_marca = '$marca' WHERE ID_marca='$id'";
    $resultado=$mysqli->query($sql);
   ?>
   <div class="bien">
       <h2 class="bient">Marca modificada con éxito</h2>
       <p class="bienb"><a href="admin.php">Inicio</a><a href="modificar-marca.php">Volver</a></p>
   </div>
</body>
</html>