<?php
//Me traigo la marca escogida
$marca=$_GET["id"];

// Establezco conexión con la BD
require "conexion.php";

// Saco el ID de la marca para mostrar los modelos de esta
$sql="SELECT ID_marca FROM marca WHERE nombre_marca='$marca'";
$resultado=$mysqli->query($sql);

while($fila=$resultado->fetch_assoc()){
    $id=$fila['ID_marca'];
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
    <title>Modelos</title>
    <link rel="stylesheet" href="css/modelo.css">
</head>
<body>
	<header>
		<h1>Modelos disponibles</h1>
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
								echo "<tr>";
								echo "<td class='td'>$fila1[nombre_modelo]</td>";
								echo "<td class='td'>$fila1[num_puertas]</td>";
								echo "<td class='td'>$fila1[combustible]</td>";
								echo "<td class='td'>$fila1[cv]</td>";
								?>
								<!-- Guardo el ID del modelo escogido para llevarlo a la otra página-->
								<td><a href="vehiculo.php?id=<?php echo $fila1['ID_modelo'];?>">Ver vehículos disponibles</a></td>
								<?php
								echo "</tr>";
							}
						?>
					</tbody>
		</table>
	</div>
	<p><a href="marca.php">Volver</a></p>
	<footer>
        <div class="rrss">
            <div class="rrss-item">
                <img src="img/telefono.png" class="ico"><p>645868195</p>
            </div>
            <div class="rrss-item">
                <img src="img/gmail.png" class="ico"><p>dancarautos@gmail.com</p>
            </div>
            <div class="rrss-item">
                <img src="img/instagram.png" class="ico"><p>@dancar_autos</p>
            </div>
        </div>
        <div class="copy">
            <div class="copy-item">
                <img src="img/copy.png" class="icopy">
            </div>
            <div class="copy-item">
                <p> 2024 DanCar Autos SL. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>
</body>
</html>