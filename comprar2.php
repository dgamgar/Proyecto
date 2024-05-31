<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/comprar.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Compra Realizada</title>
</head>
<body>
    <header>
        <h1>Compra realizada</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Guardo los datos necesarios de las sesiones en variables
    $comp=$_SESSION['id'];
    $bastidor=$_SESSION['bast'];
    $precio=$_SESSION['precio'];
    $id_modelo=$_SESSION['id_modelo'];

    // Establezco conexión con la BD
    require "conexion.php";

    // Inserto los datos necesarios en la tabla transacciones
    $sql="INSERT INTO transacciones (id_comprador,bastidor,fecha, id_modelo, precio) VALUES ('$comp','$bastidor',CURDATE(), '$id_modelo', '$precio')";
    $resultado=$mysqli->query($sql);
    ?>
    <div class="exito">
        <h2 class="exito-item">Compra realizada con éxito</h2>
        <div class="botones">
            <p><a href="marca.php">Volver</a></p>
            <p><a href="salir.php">Salir</a></p>
        </div>
    </div>
    <?php

    // Elimino de la BD el vehículo vendido para que no salga disponible
    $sql1="DELETE FROM vehiculos WHERE bastidor='$bastidor'";
    $resultado1=$mysqli->query($sql1);
    ?>
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