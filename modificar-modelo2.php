<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
    <title>Modificar modelo</title>
</head>
<body>
    <header>
        <h1>Modificar modelo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    // Establezco conexión con la BD
    require "conexion.php";

    if(isset($_GET['id'])){
        // Guardo el ID en una variable y en una sesión
        $idmod=$_GET['id'];
        $_SESSION['idmod']=$idmod;
        // Saco los datos del modelo
        $sql="SELECT * FROM modelo WHERE ID_modelo='$idmod'";
        $resultado=$mysqli->query($sql);

        // Guardo los datos del modelo en variables
        while($fila = $resultado->fetch_assoc()){
            $nmodelo=$fila["nombre_modelo"];
            $npuertas=$fila["num_puertas"];
            $comb=$fila["combustible"];
            $cv=$fila["cv"];
        }

        ?>
        <div class="container">
            <!-- Formulario relleno con los datos a modificar -->
            <form action="modificar-modelo2.php" method="post" class="formulario">
                <div>
                    <label for="nmodelo">Nombre del modelo: </label>
                    <input type="text" name="modelo_mod" id="modelo_mod" value="<?php echo $nmodelo;?>">
                </div>
                <br>
                <div>
                    <label for="npuertas">Número de puertas: </label>
                    <input type="number" name="puertas_mod" id="puertas_mod" value="<?php echo $npuertas;?>">
                </div>
                <br>
                <div>
                    <label for="comb">Tipo de combustible: </label>
                    <input type="text" name="comb_mod" id="comb_mod" value="<?php echo $comb;?>">
                </div>
                <br>
                <div>
                    <label for="cv">Potencia(CV): </label>
                    <input type="text" name="cv_mod" id="cv_mod" value="<?php echo $cv;?>">
                </div>
                <br>
                <div class="form-btn">
                    <input type="submit" value="Modificar">
                </div>
            </form>
        </div>
        <?php
    } else {
        // Guardo los datos del formulario en variables
        $modelo_mod=$_POST["modelo_mod"];
        $puertas_mod=$_POST["puertas_mod"];
        $comb_mod=$_POST["comb_mod"];
        $cv_mod=$_POST["cv_mod"];
        $idmod=$_SESSION['idmod'];
        
        // Update con estos datos
        $sql1="UPDATE modelo SET nombre_modelo='$modelo_mod', num_puertas='$puertas_mod', combustible='$comb_mod', cv='$cv_mod' WHERE ID_modelo='$idmod'";
        $resultado1=$mysqli->query($sql1);
        ?>
        <div class="bien">
            <h2 class="bient">Modelo modificado con éxito</h2>
            <p class="bienb"><a href="admin.html">Inicio</a><a href="modificar-modelo.php">Volver</a></p>
        </div>
        <?php
    }
    ?>
</body>
</html>