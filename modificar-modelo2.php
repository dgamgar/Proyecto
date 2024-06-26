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
            <form action="modificar-modelo2.php" method="post" class="shadow-lg p-3 mb-5 bg-light rounded">
                <div>
                    <label for="nmodelo">Nombre del modelo </label>
                    <input type="text" name="modelo_mod" id="modelo_mod" class="form-control" value="<?php echo $nmodelo;?>">
                </div>
                <br>
                <div>
                    <label for="npuertas">Número de puertas: </label>
                    <input type="number" name="puertas_mod" id="puertas_mod" class="form-control" value="<?php echo $npuertas;?>">
                </div>
                <br>
                <div>
                    <label for="comb">Tipo de combustible: </label>
                    <input type="text" name="comb_mod" id="comb_mod" class="form-control" value="<?php echo $comb;?>">
                </div>
                <br>
                <div>
                    <label for="cv">Potencia(CV): </label>
                    <input type="text" name="cv_mod" id="cv_mod" class="form-control" value="<?php echo $cv;?>">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Modificar" class="btn btn-success">
                </div>
            </form>
            <p><a href="modificar-modelo.php" class="btn btn-warning">Volver</a></p>
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
        <div class="container">
            <h2 class="bg-success rounded" style="padding:10px;">Modelo modificado con éxito</h2>
            <p><a href="admin.html" class="btn btn-primary" style="margin:10px;">Inicio</a><a href="modificar-modelo.php" class="btn btn-warning">Volver</a></p>
        </div>
        <footer class="card fixed-bottom text-center bg-info">
            <h5>INFO</h5>
            <p>La información del modelo se ha actualizado correctamente</p>
        </footer>
        <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>