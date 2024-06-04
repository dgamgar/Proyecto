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
                $passwd=$fila["contraseña"];
            }
            // Compruebo la contraseña
            if(password_verify($contraseña,$passwd)){
                // Correcta
                // Compruebo si es admin o no
                if($rol>0){
                    // ADMIN
                    header("Location:admin.html");
                } else {
                    // NO admin
                    header("Location:clientes.html");
                }
            }else{
                ?>
                <div class="container" style="margin-top:120px;">
                    <div class="card rounded shadow-lg">
                        <div class="card-body bg-danger d-flex justify-content-center">
                            <h5>La contraseña introducida es incorrecta, inténtelo de nuevo.</h5>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <p><a href="login.html" class="btn btn-primary">Volver</a></p>
                        </div>
                    </div>
                </div>
            <?php
            }

        } else {
            // No existe
            ?>
            <div class="container" style="margin-top:120px;">
                <div class="card rounded shadow-lg">
                    <div class="card-body bg-danger">
                        <h5>Los datos introducidos no corresponden con ningún cliente, inténtelo de nuevo.</h5>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <p><a href="login.html" class="btn btn-primary">Volver</a></p>
                    </div>
                </div>
            </div>
            <?php
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>