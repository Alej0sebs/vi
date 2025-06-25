<?php
session_start();
?>

<nav>
  <ul>
    <li><a href="index.php?action=Inicio">Inicio</a></li>
    <li><a href="index.php?action=Nosotros">Nosotros</a></li>
    <li><a href="index.php?action=Servicios">Servicios</a></li>
    <li><a href="index.php?action=Contactanos">Contactanos</a></li>
    <li><a href="index.php?action=Serviciosbootstrap">Serviciosootstrap</a></li>

    <?php if (isset($_SESSION['usuario'])): ?>
      <li><a href="Models/logout.php">Logout</a></li>
    <?php else: ?>
      <li><a href="index.php?action=Login">Login</a></li>
    <?php endif; ?>
  </ul>
</nav>