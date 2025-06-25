<?php
require_once 'operaciones.php';
require_once 'factorial.php';
require_once 'fibonacci.php';
require_once 'estudiantes.php';
require_once 'promedio.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repaso PHP Modular</title>
</head>
<body>
    <!-- SUMA -->
    <h2>Suma</h2>
    <form method="post">
        <input type="number" name="n1" placeholder="" required>
        <input type="number" name="n2" placeholder="Ingrese n2" required>
        <input type="submit" name="sumar" value="Sumar"><br>
    </form>
    <?php
    if (isset($_POST['sumar'])) {
        echo sumar($_POST['n1'], $_POST['n2']);
    }
    ?>

    <!-- FACTORIAL -->
    <h2>Factorial</h2>
    <form method="post">
        <input type="number" name="f1" placeholder="Ingrese un número" min="0" required>
        <input type="submit" name="factorial" value="Factorial"><br>
    </form>
    <?php
    if (isset($_POST['factorial'])) {
        echo calcularFactorial($_POST['f1']);
    }
    ?>
    <!-- FIBONACCI -->
    <h2>Fibonacci</h2>
    <form method="post">
        <input type="number" name="fib" placeholder="Ingrese el número de términos" min="1" required>
        <input type="submit" name="fibonacci" value="FIBONACCI">
    </form>
    <?php
    if (isset($_POST['fibonacci'])) {
        echo calcularFibonacci($_POST['fib']);
    }
    ?>
    <!-- ESTUDIANTE -->
    <h2>Datos del Estudiante</h2>
    <form method="post">
        <input type="text" name="nombre" placeholder="Ingrese el nombre" required>
        <input type="text" name="apellido" placeholder="Ingrese el apellido" required>
        <input type="text" name="telefono" placeholder="Ingrese el # telefónico" required> 
        <input type="submit" name="mostrarEstudiante" value="Mostrar">
    </form>
    <?php
    if (isset($_POST['mostrarEstudiante'])) {
        echo obtenerEstudiante($_POST['nombre'], $_POST['apellido'], $_POST['telefono']);
    }
    ?>
    <!-- PROMEDIO -->
<h2>Promedio</h2>
<form method="post">
    <input type="number" name="p1" placeholder="Ingrese número 1" required>
    <input type="number" name="p2" placeholder="Ingrese número 2" required>
    <input type="number" name="p3" placeholder="Ingrese número 3" required>
    <input type="submit" name="promedio" value="Calcular Promedio">
</form>
<?php
if (isset($_POST['promedio'])) {
    echo calcularPromedio($_POST['p1'], $_POST['p2'], $_POST['p3']);
}
?>


</body>
</html>
