<?php
// Establezco conexión con la BD
require "conexion.php";

// Preparo la sentencia SQL
$sql="SELECT * FROM marca";
$resultado=$mysqli->query($sql);

if ($resultado->num_rows > 0) {
    // Array para almacenar las marcas
    $marcas = array();

    // Recorro los resultados y almaceno las marcas en el array
    while ($fila = $resultado->fetch_assoc()) {
        $marcas[] = $fila['nombre_marca'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Eliminar marca</title>
</head>
<body>
    <header>
        <h1>Eliminar marca</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    if(!isset($_GET["id"])){
    ?>
    <div class="container">
        <table id="tabla">
            <thead>
                <tr class="bg-dark">
                    <th style="color:white; padding:10px;">Marcas</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    // Recorro todo el array mostrando las marcas que hay almacenadas
                    foreach ($marcas as $marca){
                        echo "<tr>";
                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$marca</td>";
                        ?>
                        <td><a href="eliminar-marca.php?id=<?php echo $marca;?>" class="btn btn-danger">Eliminar</a></td>
                        <?php
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
        <p><a href="eliminar.html" class="btn btn-warning" style="margin-top:10px;">Volver</a></p>
    </div>
    <footer class="card text-center bg-info">
        <h5>INFO</h5>
        <p>Aquí podrá eliminar la marca que desee.</p>
    </footer>
    <?php
    } else {
        $nmarca=$_GET["id"];

        //  Sentencia para sacar el ID de la marca
        $sql="SELECT * FROM marca WHERE nombre_marca='$nmarca'";
        $resultado=$mysqli->query($sql);
        
        // Guardo el ID en una variable
        while($fila = $resultado->fetch_assoc()){
            $idmarca=$fila["ID_marca"];
        }

        // Compruebo si hay modelos de esta marca
        $sql1="SELECT * FROM modelo WHERE ID_marca='$idmarca'";
        $resultado1=$mysqli->query($sql1);

        if($resultado1->num_rows>0){
            // Sí hay modelos
            ?>
            <div class="container">
                <h2 class="bg-danger rounded" style="padding:10px;">ERROR: No se ha podido eliminar esta marca</h2>
                <p><a href="eliminar-modelo2.php?id=<?php echo $nmarca;?>" class="btn btn-warning">Eliminar modelos</a>
                <a href="eliminar-marca.php" class="btn btn-light">Volver</a></p>
            </div>
            <footer class="card text-center fixed-bottom bg-info">
                <h5>INFO</h5>
                <p>Para poder eliminar una marca, primero deberá eliminar los modelos asociados a esta.</p>
            </footer>
            <?php
        } else {
            // No hay modelos
            // Sentencia DELETE para eliminar la marca escogida
            $sql2="DELETE FROM marca WHERE ID_marca='$idmarca'";
            $resultado2=$mysqli->query($sql2);
            header("Location:eliminar-marca.php");
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>