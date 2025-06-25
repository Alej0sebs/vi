<?php
include("conexion.php");

// Crear
if (isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";
    mysqli_query($conn, $sql);
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM usuarios WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Editar
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Obtener datos para editar
$usuarioEditar = null;
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $res = mysqli_query($conn, "SELECT * FROM usuarios WHERE id=$id");
    $usuarioEditar = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CRUD Usuarios</title>
</head>
<body>
  <h2>CRUD de Usuarios</h2>

  <!-- Formulario Crear/Editar -->
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $usuarioEditar['id'] ?? ''; ?>">
    <input type="text" name="nombre" placeholder="Nombre" required value="<?php echo $usuarioEditar['nombre'] ?? ''; ?>">
    <input type="email" name="email" placeholder="Email" required value="<?php echo $usuarioEditar['email'] ?? ''; ?>">
    <?php if ($usuarioEditar): ?>
      <button type="submit" name="editar">Actualizar</button>
      <a href="index.php">Cancelar</a>
    <?php else: ?>
      <button type="submit" name="crear">Agregar</button>
    <?php endif; ?>
  </form>

  <!-- Tabla de usuarios -->
  <table border="1" cellpadding="5">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Acciones</th>
    </tr>
    <?php
    $res = mysqli_query($conn, "SELECT * FROM usuarios");
    while ($row = mysqli_fetch_assoc($res)):
    ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['nombre']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td>
        <a href="index.php?editar=<?php echo $row['id']; ?>">Editar</a>
        <a href="index.php?eliminar=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>