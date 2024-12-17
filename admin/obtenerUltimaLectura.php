<?php
include_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numMedidor'])) {
    $numMedidor = $_POST['numMedidor'];

    // Consulta para obtener la última lectura del medidor seleccionado
    $query = "SELECT ultimaLectura FROM medidores WHERE numMedidor = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $numMedidor);
    $stmt->execute();
    $stmt->bind_result($ultimaLectura);
    $stmt->fetch();

    // Devuelve la última lectura como respuesta
    echo $ultimaLectura ?: "0.00"; // Si no hay valor, devuelve 0.00

    $stmt->close();
    $conn->close();
}
?>