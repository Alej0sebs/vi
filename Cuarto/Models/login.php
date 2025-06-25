<?php
session_start(); // Para usar sesiones

// Incluye la conexión a la BD
require_once 'db.php';

if (isset($_POST["Entrar"])) {
    $usuario = $conn->real_escape_string($_POST['usuario']);
    $password = $_POST['password']; // La contraseña en texto plano del formulario

    // Consulta para buscar el usuario
    $sql = "SELECT nombre, contraseña FROM usuarios WHERE nombre = '$usuario' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if ($row['contraseña'] === $password) {
            // Login correcto
            $_SESSION['usuario'] = $row['nombre'];
            header(header: 'Location: ../index.php?action=Inicio');
            exit;
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
} else {
    header(header: 'Location: ../index.php?action=Inicio');
}
?>
