<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login2.css">
    <title>Login</title>
</head>
<body>
    <?php
        // Traigo los datos
        $dni=$_POST["dni"];
        $contraseña=$_POST["contraseña"];

        // Establezco conexión con la BD
        require "conexion.php";

        // Saco los datos de los usuarios
        $sql="SELECT * FROM usuarios where dni='$dni'";
        $resultado=$mysqli->query($sql);

        // Compruebo el usuario
        if ($resultado->num_rows >0){
            // Existe
            while($fila = $resultado->fetch_assoc()){
                $rol=$fila["Rol"];
                $id=$fila["ID_usu"];
                $_SESSION['id']=$id;
            }
            
            // Compruebo si es admin o no
            if($rol>0){
                // ADMIN
                header("Location:admin.html");
            } else {
                // NO admin
                header("Location:marca.php");
            }
        } else {
            // No existe
            ?>
            <h2>Los datos introducidos no corresponden con ningún cliente, inténtelo de nuevo.</h2>
            <p><a href="login.html">Volver</a><a href="registrar.html">Registrarse</a></p>
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
            <?php
        }


    ?>
</body>
</html>