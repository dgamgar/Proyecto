<?php
session_start();
//Me traigo la marca escogida
$marca=$_POST["marca"];

// Establezco conexión con la BD
require "conexion.php";

// Saco el ID de la marca para mostrar los modelos de esta
$sql="SELECT ID_marca FROM marca WHERE nombre_marca='$marca'";
$resultado=$mysqli->query($sql);

while($fila=$resultado->fetch_assoc()){
    $id=$fila['ID_marca'];
	// Guardo el ID dela marca en una sesión
	$_SESSION['mrc']=$id;
}

// Saco los datos de los modelos de la marca escogida
$sql="SELECT * FROM modelo WHERE ID_marca='$id'";
$resultado1=$mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/añadir-modificar-eliminar.css">
	<link rel="icon" href="img/buyacar_89124.ico">
    <title>Añadir vehículo</title>
</head>
<body>
	<header>
        <h1>Nuevo vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
	<div class="container">
		<!-- Tabla con los modelos -->
		<table id="tabla" class="display" >
					<thead>
						<tr>
							<th class="th">Modelo</th>
							<th class="th">Número de puertas</th>
							<th class="th">Tipo de combustible</th>
							<th class="th">Potencia(CV)</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($fila1 = $resultado1->fetch_assoc()){
								$id_modelo=$fila1["ID_modelo"];
								$_SESSION['modelo']=$id_modelo;
								echo "<tr>";
								echo "<td class='td'>$fila1[nombre_modelo]</td>";
								echo "<td class='td'>$fila1[num_puertas]</td>";
								echo "<td class='td'>$fila1[combustible]</td>";
								echo "<td class='td'>$fila1[cv]</td>";
								?>
								<!-- Guardo el ID del modelo escogido para llevarlo a la otra página-->
								<td><a href="añadir-vehiculo3.php?id=<?php echo $fila1['ID_modelo'];?>">Añadir vehículo</a></td>
								<?php
								echo "</tr>";
							}
						?>
					</tbody>
		</table>
		<p><a href="añadir-vehiculo.php">Volver</a></p>
	</div>
</body>
</html>