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
                    <tr>
                        <th class="th">DNI</th>
                        <th class="th">Nombre</th>
                        <th class="th">Fecha de Nacimiento</th>
                        <th class="th">Tipo de Usuario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($fila = $resultado->fetch_assoc()){
                            $rol=$fila["Rol"];
                            echo "<tr>";
                            echo "<td class='td'>$fila[dni]</td>";
                            echo "<td class='td'>$fila[Nombre]</td>";
                            echo "<td class='td'>$fila[fecha_nac]</td>";
                            // Muestro el tipo de usuario
                            if($rol>0){
                                echo "<td class='td'>Administrador</td>";
                            } else {
                                echo "<td class='td'>Standard(comprador)</td>";
                            }
                            ?>
                            <!-- Boton para ir a editar el usuario -->
                            <td><a href="usuarios.php?id=<?php echo $fila['ID_usu'];?>">Editar usuario</a></td>
                            <?php
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <p><a href="admin.html" class="cese">Volver</a></p>
        </div>
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
            <form action="usuarios2.php" method="post" class="formulario">
                <div class="dni">
                    <label for="dni">DNI: </label>
                    <input type="text" name="dni_m" id="dni_m" value="<?php echo $dni;?>">
                </div>
                <br>
                <div class="nombre">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre_m" id="nombre_m" value="<?php echo $nombre;?>">
                </div>
                <br>
                <div class="fecha">
                    <label for="fecha">Fecha de Nacimiento: </label>
                    <input type="date" name="m_fecha" id="m_fecha" value="<?php echo $fecha_nac;?>">
                </div>
                <br>
                <div class="rol">
                    <label for="rol">Tipo de Usuario: </label>
                    <?php
                    // Compruebo el tipo de usuario
                    if($rol>0){
                        // Admin
                        ?>
                        <input type="radio" name="rol_m" value="0">Comprador
                        <input type="radio" name="rol_m" value="1" checked> Administrador
                        <?php
                    } else {
                        // Comprador / Standard
                        ?>
                        <input type="radio" name="rol_m" value="0" checked>Comprador
                        <input type="radio" name="rol_m" value="1"> Administrador
                        <?php
                    }
                    ?>
                </div>
                <br>
                <div class="form-btn">
                    <input type="submit" value="Aceptar">
                </div>
            </form>
        </div>
        <?php
    }
    ?>
</body>
</html>