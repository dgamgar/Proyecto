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
    <title>Modificar modelo</title>
</head>
<body>
    <header>
        <h1>Modificar modelo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <?php
    if(!isset($_GET["id"])){
    ?>
    <div class="container">
        <!-- Tabla mostrando marcas -->
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
                        <td><a href="modificar-modelo.php?id=<?php echo $marca;?>" class="btn btn-primary">Modificar</a></td>
                        <?php
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
        <p><a href="admin.html" class="btn btn-warning" style="margin-top:10px;">Inicio</a></p>
    </div>
    <footer class="card text-center bg-info">
        <h5>INFO</h5>
        <p>Aquí debe escoger la marca a la que pertenece el modelo que desea modificar.</p>
    </footer>
    <?php
    } else {
        // Guardo el nombre de la marca en una variable
        $nmarca=$_GET['id'];
        // Establezco conexión con la BD
        require "conexion.php";

        // Saco el ID de la marca para mostrar los modelos de esta
        $sql="SELECT ID_marca FROM marca WHERE nombre_marca='$nmarca'";
        $resultado=$mysqli->query($sql);

        while($fila=$resultado->fetch_assoc()){
            $id=$fila['ID_marca'];
        }

        // Saco los datos de los modelos de la marca escogida
        $sql1="SELECT * FROM modelo WHERE ID_marca='$id'";
        $resultado1=$mysqli->query($sql1);

        if($resultado1->num_rows>0){
            // Hay modelos
            ?>
            <div class="container">
                <!-- Tabla con los modelos -->
                <table id="tabla" class="display" >
                            <thead>
                                <tr class="bg-dark">
                                    <th style="color:white; padding:10px;">Modelo</th>
                                    <th style="color:white; padding:10px;">Número de puertas</th>
                                    <th style="color:white; padding:10px;">Tipo de combustible</th>
                                    <th style="color:white; padding:10px;">Potencia(CV)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($fila1 = $resultado1->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[nombre_modelo]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[num_puertas]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[combustible]</td>";
                                        echo "<td class='bg-light border-bottom' style='padding:10px;'>$fila1[cv]</td>";
                                        ?>
                                        <!-- Guardo el ID del modelo escogido para llevarlo a la otra página-->
                                        <td><a href="modificar-modelo2.php?id=<?php echo $fila1['ID_modelo'];?>" class="btn btn-primary">Modificar modelo</a></td>
                                        <?php
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                </table>
                <p><a href="modificar-modelo.php" class="btn btn-warning" style="margin-top:10px;">Volver</a></p>
            </div>
            <footer class="card fixed-bottom text-center bg-info">
                <h5>INFO</h5>
                <p>Escoja el modelo que desea modificar.</p>
            </footer>
            <?php
        } else {
            // No hay modelos
            ?>
            <div class="container">
                <h2 class="bg-warning rounded" style="padding:10px;">ERROR: No hay modelos</h2>
                <p><a href="modificar-modelo.php" class="btn btn-primary" style="margin:10px;">Volver</a></p>
            </div>
            <footer class="card fixed-bottom text-center bg-info">
                <h5>INFO</h5>
                <p>No tenemos modelos asociados a la marca escogida, inténtelo de nuevo con otra marca.</p>
            </footer>
            <?php
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>