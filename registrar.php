<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="css/registrar.css">
</head>
<body>
    <header>
        <h2>Regístrate</h2>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
        <!--Formulario para rellenar registro-->
        <form action="registrar2.php" method='post' class="formulario">
            <div class="form-usu">
                <!--Pide rol (admin o no)-->
                <p class="p-inp1"><input type="checkbox" name="rol" value="0">Comprador</p>
                <p class="p-inp2"><input type="checkbox" name="rol" value="1"> Administrador</p>
            </div>
            <br>
            <div class="form-item">
                <!--Pide nombre-->
                <label for="nombre">Nombre </label>
                <input type="text" name="nombre" id="nombre" placeholder="Introduzca su nombre..." required>
            </div>
            <br>
            <div class="form-item">
                <!-- Pide DNI -->
                <label for="dni">DNI </label>
                <input type="text" name="dni" id="dni" required>
            </div>
            <br>
            <div class="form-item">
                <!-- Pide contraseña -->
                <label for="contraseña">Contraseña </label>
                <input type="text" name="contraseña" id="contraseña" required>
            </div>
            <br>
            <div class="form-item">
                <!--Pide fecha de nacimiento-->
                <label for="fecha_nac">Fecha de nacimiento </label>
                <input type="date" name="fecha_nac" id="fecha_nac" required>
            </div>
            <br>
            <div class="form-item-btn">
                <!--Botón registrar o iniciar sesión-->
                <input type="submit" value="Siguiente" class="btn btn-primary">
            </div>
        </form>
    </div>
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