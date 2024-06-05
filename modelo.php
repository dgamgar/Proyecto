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
$sql1="SELECT * FROM modelo WHERE ID_marca='$id'";
$resultado1=$mysqli->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" href="img/buyacar_89124.ico">
</head>
<body>
	<header>
		<h1>Modelos disponibles</h1>
		<img src="img/logo2.png" class="logo">
	</header>
	<?php
	// Compruebo si hay modelos asociados a la marca escogida
	if($resultado1->num_rows>0){
		// Sí los hay
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
							echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[nombre_modelo]</td>";
							echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[num_puertas]</td>";
							echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[combustible]</td>";
							echo "<td class='bg-light border-bottom border-start' style='padding:10px;'>$fila1[cv]</td>";
							?>
							<!-- Guardo el ID del modelo escogido para llevarlo a la otra página-->
							<td><a href="vehiculo.php?id=<?php echo $fila1['ID_modelo'];?>" class="btn btn-primary">Ver vehículos disponibles</a></td>
							<?php
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<br>
			<p><a href="marca.php" class="btn btn-warning">Volver</a></p>
		</div>
		<?php
	} else {
		// No los hay
		?>
		<div class="container">
			<div class="card">
				<div class="card-header bg-danger rounded">
					<h2 style="padding:10px;">ERROR:No hay modelos</h2>
				</div>
				<div class="card-body bg-light">
					<p>Lo sentimos, no tenemos modelos disponibles de la marca escogida, inténtelo de nuevo con otra marca</p>
				</div>
			</div>
			<br>
			<p><a href="marca.php" class="btn btn-warning">Volver</a></p>
		</div>
	<?php
	}
	?>

	<footer class="fixed-bottom">
        <div class="row">
            <p>Contáctanos</p>
            <span>------------------------------</span>
            <div class="row">
                <div class="col-sm-2">
                    <p>685489625</p>
                </div>
                <div class="col-sm-1">
                    <img src="img/telefono.png" style="width:30px;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>dancarautos@gamil.com</p>
                </div>
                <div class="col-sm-1">
                    <img src="img/gmail.png" style="width:30px;">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <p>@dancar_autos</p>
                </div>
                <div class="col-sm-1">
                    <img src="img/instagram.png" style="width:30px;">
                </div>
            </div>
        </div>
        <div class="text-center">
            <p><img src="img/copy.png" class="icopy" style="width:20px;"> 2024 DanCar Autos SL. ALL RIGHTS RESERVED.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>