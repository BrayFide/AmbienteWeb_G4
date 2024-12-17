<?php
include_once 'db.php';

if (isset($_GET['id'], $_GET['numMedidor'])) {
    $id = $_GET['id'];
    $numMedidor = $_GET['numMedidor'];

    // Consulta para obtener SOLO la información de la lectura seleccionada
    $query = "SELECT numMedidor, (nuevaLectura - ultimaLectura) AS consumo, monto, fechaRegistro 
              FROM lecturas 
              WHERE id = ? AND numMedidor = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $id, $numMedidor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $factura = $result->fetch_assoc();
    } else {
        die("No hay información disponible para generar la factura.");
    }

    $stmt->close();
} else {
    die("Parámetros inválidos.");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<?php include("head.php"); ?>
<body>
    <header>
        <?php include("menu.php"); ?>
    </header>

    <main class="tuser">
        <h2 class="huser">Factura</h2>
        <div class="factura">
            <p><strong>Número de Medidor:</strong> <?= htmlspecialchars($factura['numMedidor']) ?></p>
            <p><strong>Consumo (m³):</strong> <?= number_format($factura['consumo'], 2) ?></p>
            <p><strong>Monto (₡):</strong> <?= number_format($factura['monto'], 2) ?></p>
            <p><strong>Fecha de Registro:</strong> <?= htmlspecialchars($factura['fechaRegistro']) ?></p>
        </div>
        <a href="realizarpago.php?numMedidor=<?= urlencode($factura['numMedidor']) ?>" class="btn-volver">Volver a Pagos</a>
    </main>

    <?php include("footer.php"); ?>
</body>
</html>
