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
    <title>Usuarios</title>
</head>
<body>
    <header>
        <h1>Editar Usuarios</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Traigo los datos del formulario anterior
    $nombre=$_POST["nombre_m"];
    $dni=$_POST["dni_m"];
    $fecha_nac=$_POST["m_fecha"];
    $rol=$_POST["rol_m"];

    // Establezco conexión con la BD
    require "conexion.php";

    // Saco el ID del usuario de la sesión
    $idusu=$_SESSION['edit'];

    // Hago update con los nuevos datos
    $sql="UPDATE usuarios SET Rol='$rol', Nombre='$nombre', fecha_nac='$fecha_nac', dni='$dni' WHERE ID_usu='$idusu'";
    $resultado=$mysqli->query($sql);

    if($resultado>0){
        ?>
        <div class="container">
            <h2 class="bg-success rounded" style="padding:10px;">Usuario modificado</h2>
            <p><a href="admin.html" class="btn btn-warning">Volver</a></p>
        </div>
        <?php
    }else{
        ?>
        <div class="container">
            <h2 class="bg-danger rounded" style="padding:10px;">ERROR: No se ha podido modificar</h2>
            <p><a href="admin.html" class="btn btn-warning">Volver</a></p>
        </div>
        <footer class="card fixed-bottom text-center bg-info">
            <h5>INFO</h5>
            <p>No se han podido actualizar los datos introducidos para el usuario, inténtelo de nuevo.</p>
        </footer>
        <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>