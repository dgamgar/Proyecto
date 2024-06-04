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
$sql1="SELECT * FROM modelo WHERE ID_marca='$id'";
$resultado1=$mysqli->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" href="img/buyacar_89124.ico">
    <title>Añadir vehículo</title>
</head>
<body>
	<header>
        <h1>Nuevo vehículo</h1>
        <img src="img/logo2.png" class="logo">
    </header>
	<div class="container">
		<?php
		if($resultado1->num_rows>0){
		?>
		<!-- Tabla con los modelos -->
		<table id="tabla">
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
									$id_modelo=$fila1["ID_modelo"];
									$_SESSION['modelo']=$id_modelo;
									echo "<tr>";
									echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[nombre_modelo]</td>";
									echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[num_puertas]</td>";
									echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[combustible]</td>";
									echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[cv]</td>";
									?>
									<!-- Guardo el ID del modelo escogido para llevarlo a la otra página-->
									<td><a href="añadir-vehiculo3.php?id=<?php echo $id_modelo;?>" class="btn btn-primary">Añadir vehículo</a></td>
									<?php
									echo "</tr>";
								}
						?>
					</tbody>
		</table>
		<?php
		} else {
			?>
			<h2 class="bg-warning rounded" style="padding:10px;">ERROR: No hay modelos</h2>
			<footer class="card text-center fixed-bottom bg-info">
				<h5>INFO</h5>
       			<p>No disponemos de modelos de la marca escogida, inténtelo de nuevo con otra marca.</p>
    		</footer>
			<?php
		}
		?>
		<p><a href="añadir-vehiculo.php" class="btn btn-warning" style="margin-top:10px;">Volver</a></p>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>