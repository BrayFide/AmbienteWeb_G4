<?php
include_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $numMedidor = $_POST['numMedidor'];
    $ultimaLectura = $_POST['ultimaLectura'];
    $nuevaLectura = $_POST['nuevaLectura'];

    
    $queryInsert = "INSERT INTO lecturas (numMedidor, ultimaLectura, nuevaLectura) VALUES (?, ?, ?)";
    $stmtInsert = $conn->prepare($queryInsert);
    $stmtInsert->bind_param("sdd", $numMedidor, $ultimaLectura, $nuevaLectura);

    if ($stmtInsert->execute()) {
        
        $queryUpdate = "UPDATE medidores SET ultimaLectura = ? WHERE numMedidor = ?";
        $stmtUpdate = $conn->prepare($queryUpdate);
        $stmtUpdate->bind_param("ds", $nuevaLectura, $numMedidor);

        if ($stmtUpdate->execute()) {
            
            header("Location: detallesMedidor.php?numMedidor=" . urlencode($numMedidor));
            exit;
        } else {
            echo "Error al actualizar la tabla medidores: " . $conn->error;
        }
        $stmtUpdate->close();
    } else {
        echo "Error al registrar la lectura: " . $conn->error;
    }

    
    $stmtInsert->close();
    $conn->close();
}
?>
