<?php
header('Content-Type: application/json');

require 'db.php';

$cedula = $_POST['cedula'] ?? null;

if (!$cedula) {

    echo json_encode(['errorMsg' => 'ID de usuario no proporcionado']);
    exit;
}

$stmt = $conn->prepare("DELETE FROM estudiantes WHERE cedula = ?");
$stmt->bind_param("s", $cedula);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['errorMsg' => $stmt->error]);
}
//codigo de alpha beta pruning

$stmt->close();
$conn->close();
?>
