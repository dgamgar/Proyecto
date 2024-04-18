<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/comprar.css">
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

    // Establezco conexión con la BD
    require "conexion.php";

    // Inserto los datos necesarios en la tabla transacciones
    $sql="INSERT INTO transacciones (id_comprador,bastidor,fecha) VALUES ('$comp','$bastidor',CURDATE())";
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