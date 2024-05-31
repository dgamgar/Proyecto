<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
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
        <div class="bien">
            <h2 class="bient">Usuario modificado</h2>
            <p><a href="admin.html">Volver</a></p>
        </div>
        <?php
    }else{
        ?>
        <div class="mal">
            <h2 class="malt">Ha ocurrido un error, inténtelo de nuevo</h2>
            <p><a href="admin.html">Volver</a></p>
        </div>
        <?php
    }
    ?>
</body>
</html>