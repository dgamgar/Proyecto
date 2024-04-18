<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registrar.css">
    <title>Registrar</title>
</head>
<body>
    <header>
        <h2>Regístrate</h2>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Me traigo los datos
    $rol=$_POST["rol"];
    $nombre=$_POST["nombre"];
    $fecha_nac=$_POST["fecha_nac"];
    $dni=$_POST["dni"];
    $contraseña=$_POST["contraseña"];

    // Establezco conexion con BD
    require "conexion.php";

    //saco los datos de los usuarios
    $sql="SELECT * FROM usuarios WHERE dni='$dni'";
    $resultado=$mysqli->query($sql);

    if ($resultado->num_rows >0){
        //Ya existe, no se puede crear nuevo usuario
        ?>
        <div class="mal">
            <h2 class="malt">Ya existe un usuario con el DNI introducido</h2>
            <p class="malb"><a href="registrar.php">Volver</a><br><a href="login.php">Iniciar sesión</a></p>
        </div>
        <?php
    } else {
        // No existe, se puede crear nuevo usuario
        if ($rol>0){
            // Opción de nuevo admin, hago insert con los datos correspondientes
            $sql1= "INSERT INTO usuarios (rol, nombre, fecha_nac, contraseña, dni) VALUES ('1','$nombre','$fecha_nac','$contraseña','$dni')";
            $resultado1=$mysqli->query($sql1);
        ?>
            <div class="bien">
                <br>
                <h2 class="bi-ad">Usuario ADMIN agregado correctamente</h2>
                <p><a href="login.php">Iniciar sesión</a></p>
            </div>
            <?php
        } else {
            // Opcion de nuevo comprador, hago insert con los datos correspondientes
            $sql2="INSERT INTO usuarios (rol, nombre, fecha_nac, contraseña, dni) VALUES ('0','$nombre','$fecha_nac','$contraseña','$dni')";
            $resultado2=$mysqli->query($sql2);
        ?>
            <div class="bien">
                <br>
                <h2 class="bi-com">Usuario COMPRADOR agregado correctamente</h2>
                <p><a href="login.php">Iniciar sesión</a></p>
            </div>
            <?php
        }
    }
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