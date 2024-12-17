<?php
include_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['rol'])) {
    $id = $_POST['id'];
    $rol = $_POST['rol'];

    // Actualizar el rol en la base de datos
    $query = "UPDATE users SET rol = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $rol, $id);

    if ($stmt->execute()) {
        header("Location: users.php?success=1");
        exit;
    } else {
        echo "Error al actualizar el rol: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
