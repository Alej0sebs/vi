<?php
header('Content-Type: application/json');

require 'db.php';

$cedula = $_POST['cedula'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$direccion = $_POST['direccion'] ?? '';

// Sentencia preparada para evitar SQL Injection

$stmt = $conn->prepare("INSERT INTO estudiantes (cedula, nombre, apellido,
 telefono, direccion) VALUES (?, ?, ?, ?, ?)");

$stmt->bind_param("sssss", $cedula, $nombre, $apellido, $telefono, $direccion);

try {
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Usuario actualizado correctamente']);
} catch (Exception $e) {
    echo json_encode(['errorMsg' => 'Error al actualizar el usuario: ' . $e->getMessage()]);
    exit;
}

$stmt->close();
$conn->close();
?>
