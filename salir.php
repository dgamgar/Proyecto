<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/buyacar_89124.ico">
    <title>Cerrar sesión</title>
</head>
<body>
    <?php
    session_destroy();
    header("Location:index.php");
    ?>
</body>
</html>