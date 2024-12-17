<?php
include_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Eliminar el usuario de la base de datos
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: usuarios.php?success=1");
        exit;
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
