<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Registrar</title>
</head>
<body>
    <?php
    // Me traigo los datos
    $nombre=$_POST["nombre"];
    $fecha_nac=$_POST["fecha_nac"];
    $dni=$_POST["dni"];
    $contraseña=$_POST["contraseña"];

    // Encripto la contraseña
    $passwd_hashed=password_hash($contraseña, PASSWORD_DEFAULT);

    // Establezco conexion con BD
    require "conexion.php";

    //saco los datos de los usuarios
    $sql="SELECT * FROM usuarios WHERE dni='$dni'";
    $resultado=$mysqli->query($sql);

    if ($resultado->num_rows >0){
        //Ya existe, no se puede crear nuevo usuario
        ?>
        <div class="container" style="margin-top:120px;">
            <div class="card">
                <div class="card-body bg-danger">
                    <h5>Ya existe un usuario con el DNI introducido</h5>
                </div>
                <div class="card-footer d-flex flex-row justify-content-center">
                    <p><a href="registrar.html" class="btn btn-warning" style="margin-right:10px;">Volver</a><a href="login.html" class="btn btn-primary">Iniciar sesión</a></p>

                </div>
            </div>
        </div>
        <?php
    } else {
        // No existe, se puede crear nuevo usuario
        $sql2="INSERT INTO usuarios (rol, nombre, fecha_nac, contraseña, dni) VALUES ('0','$nombre','$fecha_nac','$passwd_hashed','$dni')";
        $resultado2=$mysqli->query($sql2);
        ?>
        <div class="container" style="margin-top:120px;">
            <div class="card">
                <div class="card-body bg-success">
                    <h5>Usuario agregado correctamente</h5>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <p><a href="login.html" class="btn btn-primary">Iniciar sesión</a></p>
                </div>
            </div>
        </div>
        <?php
        
    }
    ?>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>