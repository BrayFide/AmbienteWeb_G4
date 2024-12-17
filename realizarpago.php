<?php
include_once 'db.php'; 


$mensaje = "";
$montosPendientes = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['numMedidor'])) {
    $numMedidor = $_POST['numMedidor'] ?? $_GET['numMedidor'];

    
    $query = "SELECT id, numMedidor, nuevaLectura, ultimaLectura, fechaRegistro,
                     (nuevaLectura - ultimaLectura) AS consumo, monto, estado 
              FROM lecturas 
              WHERE numMedidor = ? AND estado = 'pendiente'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $numMedidor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $montosPendientes[] = $row; 
        }
    } else {
        $mensaje = "No hay montos pendientes para el medidor ingresado.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<?php
include("head.php")
?>
<body>
    <header>
        <?php include("menu.php"); ?>
    </header>

    <main class="tuser">
        <h2 class="huser">Procesar Pagos</h2>
        <div class="center-container">
        <!-- Formulario para ingresar el número de medidor -->
        <form method="post" action="realizarpago.php" class="form-agregar">
            <label for="numMedidor">Número de Medidor:</label>
            <input type="text" id="numMedidor" name="numMedidor" required>
            <button type="submit">Consultar</button>
        </form>
        </div>
        <!-- Mostrar mensaje si no hay montos pendientes -->
        <?php if ($mensaje): ?>
            <p style="color: red;"><?= htmlspecialchars($mensaje) ?></p>
        <?php endif; ?>

        <!-- Mostrar montos pendientes -->
        <?php if (count($montosPendientes) > 0): ?>
            <h3 class="h1user">Montos Pendientes</h3>
            <table class="tuser">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número de Medidor</th>
            <th>Consumo (m³)</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Fecha de lectura</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($montosPendientes as $pago): ?>
            <tr>
                <td><?= htmlspecialchars($pago['id']) ?></td>
                <td><?= htmlspecialchars($pago['numMedidor']) ?></td>
                <td><?= htmlspecialchars(number_format($pago['consumo'], 2)) ?></td>
                <td>₡<?= htmlspecialchars(number_format($pago['monto'], 2)) ?></td>
                <td><?= htmlspecialchars($pago['estado']) ?></td>
                <td><?= htmlspecialchars($pago['fechaRegistro']) ?></td>
                <td>
                    <!-- Botón para pagar -->
                    <form method="post" action="procesarPago.php">
                        <input type="hidden" name="id" value="<?= $pago['id'] ?>">
                        <input type="hidden" name="monto" value="<?= $pago['monto'] ?>">
                        <button class="bt-pagar" type="submit">Pagar</button>
                    </form>

                    <form method="get" action="generarFactura.php" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $pago['id'] ?>">
                    <input type="hidden" name="numMedidor" value="<?= $pago['numMedidor'] ?>">
                    <button class="bt-factura" type="submit">Factura</button>
                </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        <?php endif; ?>
    </main>

    <?php include("footer.php"); ?>
</body>
</html>
