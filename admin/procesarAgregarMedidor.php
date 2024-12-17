<?php
// Conexión a la base de datos
include_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $numMedidor = $_POST['numMedidor'];
    $direccion = $_POST['direccion'];
    $ultimaLectura = $_POST['ultimaLectura'];
    $estado = $_POST['estado'];

   
    $query = "INSERT INTO medidores (numMedidor, direccion, ultimaLectura, estado) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
     
    $stmt->bind_param("ssds", $numMedidor, $direccion, $ultimaLectura, $estado);

    if ($stmt->execute()) {
        
        header("Location: medidores.php?success=1");
        exit;
    } else {
        echo "Error al agregar el medidor: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
