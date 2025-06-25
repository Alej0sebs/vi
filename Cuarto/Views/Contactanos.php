<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contáctanos - FISEI</title>
  <link rel="stylesheet" href="css/contacto.css" />
  <link rel="stylesheet" href="css/nav.css" />
</head>

<body>
  <header>
    <div class="logo-container">
      <img src="imagenes/descarga.jpg" alt="Logo Universidad Técnica de Ambato" />
    </div>
  </header>

  <?php include 'nav.php'; ?>


  <main>
    <section class="perfil">
      <h2>Información de Contacto</h2>
      <ul>
        <li><strong>Nombre:</strong> Christian Sánchez</li>
        <li><strong>Email:</strong> <a href="mailto:alejo@example.com">csanchez1706@uta.edu.ec</a></li>
        <li><strong>Teléfono:</strong> +593 987 654 321</li>
        <li><strong>GitHub:</strong> <a href="https://github.com/0AalL" target="_blank">github.com/0AalL</a>
        </li>
        <li><strong>Ubicación:</strong> Ambato, Ecuador</li>
      </ul>
    </section>

    <section class="formulario">
      <h2>Envíanos un mensaje</h2>
      <form action="Models/guardar_mensaje.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required />

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="correo" required />

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

        <button type="submit">Enviar</button>
      </form>

    </section>
  </main>

  <footer>
    <p>© 2025 Universidad Técnica de Ambato · FISEI</p>
  </footer>
</body>

</html>