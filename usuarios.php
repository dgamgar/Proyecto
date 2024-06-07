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
    // Establezco conexión con la BD
    require "conexion.php";

    if(!isset($_GET['id'])){
        // Saco los datos de todos los usuarios
        $sql="SELECT * FROM usuarios";
        $resultado=$mysqli->query($sql);
        ?>
        <div class="container">
            <!-- Tabla mostrando datos de los usuarios -->
            <table>
                <thead>
                    <tr class="bg-dark">
                        <th style="color:white; padding:10px;">DNI</th>
                        <th style="color:white; padding:10px;">Nombre</th>
                        <th style="color:white; padding:10px;">Fecha de Nacimiento</th>
                        <th style="color:white; padding:10px;">Tipo de Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($fila = $resultado->fetch_assoc()){
                            $rol=$fila["Rol"];
                            echo "<tr>";
                            echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[dni]</td>";
                            echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[Nombre]</td>";
                            echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila[fecha_nac]</td>";
                            // Muestro el tipo de usuario
                            if($rol>0){
                                echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>Administrador</td>";
                            } else {
                                echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>Standard(comprador)</td>";
                            }
                            ?>
                            <!-- Boton para ir a editar el usuario -->
                            <td><a href="usuarios.php?id=<?php echo $fila['ID_usu'];?>" class="btn btn-primary">Editar usuario</a></td>
                            <?php
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <br>
            <p><a href="admin.html" class="btn btn-warning">Volver</a></p>
        </div>
        <footer class="card text-center bg-info">
            <h5>INFO</h5>
            <p>Aquí puede ver los datos de los usuarios registrados y acceder a editarlos.</p>
        </footer>
        <?php
    } else {

        // Traigo el ID del usuario y lo guardo en una sesión
        $idusu=$_GET['id'];
        $_SESSION['edit']=$idusu;

        // Saco los datos del usuario escogido
        $sql1="SELECT * FROM usuarios WHERE ID_usu='$idusu'";
        $resultado1=$mysqli->query($sql1);

        while($fila1 = $resultado1->fetch_assoc()){
            $dni=$fila1["dni"];
            $fecha_nac=$fila1["fecha_nac"];
            $nombre=$fila1["Nombre"];
            $rol=$fila1["Rol"];
        }

        ?>
        <div class="container">
            <!-- Formulario con los datos del usuario para modificar -->
            <form action="usuarios2.php" method="post" class="shadow-lg p-3 mb-5 bg-light rounded">
                <label for="dni_m">DNI </label>
                <input type="text" name="dni_m" id="dni_m" class="form-control" value="<?php echo $dni;?>">
                <br>
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre_m" id="nombre_m" class="form-control" value="<?php echo $nombre;?>">
                <br>
                <label for="fecha">Fecha de Nacimiento </label>
                <input type="date" name="m_fecha" id="m_fecha" class="form-control" value="<?php echo $fecha_nac;?>">
                <br>
                <?php
                // Compruebo el tipo de usuario
                if($rol>0){
                    // Admin
                    ?>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="rol_m" value="0" class="form-check-input">Comprador
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="rol_m" value="1" class="form-check-input" checked> Administrador
                    </div>
                    <?php
                 } else {
                   // Comprador / Standard
                    ?>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="rol_m" value="0" class="form-check-input" checked>Comprador
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="rol_m" value="1" class="form-check-input"> Administrador
                    </div>
                    <?php
                }
                ?>
                <br>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Aceptar" class="btn btn-success">
                </div>
            </form>
            <p><a href="usuarios.php" class="btn btn-warning">Volver</a></p>
        </div>
        <footer class="card text-center bg-info">
            <h5>INFO</h5>
            <p>Aquí puede modificar los datos del usuarios escogido.</p>
        </footer>
        <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>