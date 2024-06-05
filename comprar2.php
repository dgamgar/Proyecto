<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Compra Realizada</title>
</head>
<body>
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
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <img src="img/logo2.png" class="logo">
            </div>
            <div class="card-body">
                <h5>Compra realizada con éxito</h5>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <p><a href="marca.php" class="btn btn-primary">Volver</a></p>
                    <p><a href="salir.php" class="btn btn-warning">Salir</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Elimino de la BD el vehículo vendido para que no salga disponible
    $sql1="DELETE FROM vehiculos WHERE bastidor='$bastidor'";
    $resultado1=$mysqli->query($sql1);
    ?>
    <footer class="fixed-bottom">
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
</body>
</html>