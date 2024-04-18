<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Iniciar sesión</h1>
        <img src="img/logo2.png" class="logo">
    </header>
    <div class="container">
        <div class="formulario">
            <form action="login2.php" method="post">
                <div class="dni">
                    <!-- Pide DNi -->
                    <label for="usu">DNI </label>
                    <input type="text" name="dni" id="dni" required>
                </div>
                <br>
                <div class="pswd">
                    <!-- Pide contraseña -->
                    <label for="pswd">Contraseña </label>
                    <input type="password" name="contraseña" id="contraseña" required>
                </div>
                <br>
                <div class="btn">
                    <input type="submit" value="Acceder">
                </div>
            </form>
        </div>
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