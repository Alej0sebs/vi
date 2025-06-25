<?php
include("conexion.php");

// Crear
if (isset($_POST['crear'])) {
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    if ($user !== '' && $clave !== '') {
        $sql = "INSERT INTO usuario (user, clave) VALUES ('$user', '$clave')";
        mysqli_query($conexion, $sql);
    }
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM usuario WHERE id=$id";
    mysqli_query($conexion, $sql);
}

// Editar
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    if ($user !== '' && $clave !== '') {
        $sql = "UPDATE usuario SET user='$user', clave='$clave' WHERE id=$id";
        mysqli_query($conexion, $sql);
    }
}

// Obtener datos para editar
$usuarioEditar = null;
if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $res = mysqli_query($conexion, "SELECT * FROM usuario WHERE id=$id");
    if ($res && mysqli_num_rows($res) > 0) {
        $usuarioEditar = mysqli_fetch_assoc($res);
    }
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
    <input type="text" name="user" placeholder="Usuario" required value="<?php echo $usuarioEditar['user'] ?? ''; ?>">
    <input type="text" name="clave" placeholder="Clave" required value="<?php echo $usuarioEditar['clave'] ?? ''; ?>">
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
      <th>Usuario</th>
      <th>Clave</th>
      <th>Acciones</th>
    </tr>
    <?php
    $res = mysqli_query($conexion, "SELECT * FROM usuario");
    while ($row = mysqli_fetch_assoc($res)):
    ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['user']; ?></td>
      <td><?php echo $row['clave']; ?></td>
      <td>
        <a href="index.php?editar=<?php echo $row['id']; ?>">Editar</a>
        <a href="index.php?eliminar=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar usuario?')">Eliminar</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>