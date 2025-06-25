<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login-container">
    <h2>Iniciar Sesión</h2>
<?php
    include("conexion.php");
    include("controller.php");
?>
    <form action="" method="POST">
    <div class="form-group">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" class="input-correcto" required>
    </div>

    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" class="input-incorrecto" required>
    </div>

    <input name="login" type="submit" value="Iniciar Sesión">
    </form>
</div>
</body>
</html>