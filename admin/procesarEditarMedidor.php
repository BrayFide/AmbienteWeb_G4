<?php
include_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $numMedidor = $_POST['numMedidor'];
    $direccion = $_POST['direccion'];
    $ultimaLectura = $_POST['ultimaLectura'];
    $estado = $_POST['estado'];

    // Actualizar los datos del medidor en la base de datos
    $query = "UPDATE medidores SET numMedidor = ?, direccion = ?, ultimaLectura = ?, estado = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdsi", $numMedidor, $direccion, $ultimaLectura, $estado, $id);

    if ($stmt->execute()) {
        header("Location: medidores.php?success=1");
        exit;
    } else {
        echo "Error al actualizar el medidor: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
