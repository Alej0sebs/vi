<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>

<body>

  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form action="Models/login.php" method="POST">
      <label for="usuario">Usuario</label>
      <input type="text" id="usuario" name="usuario" placeholder="Tu usuario" required />

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" placeholder="Tu contraseña" required />

      <input type="submit" name="Entrar" value="Entrar" />
    </form>
    <a href="index.php?action=Contactanos" style="display: inline-block; margin-top: 0.5rem; padding: 0.5rem 1rem; background-color: #ccc; color: #333; text-decoration: none; border-radius: 4px;">Cancelar</a>

  </div>

</body>

</html>
