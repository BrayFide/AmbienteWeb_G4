<?php
include_once '../db.php';

// Inicializar variables
$estadoSeleccionado = $_GET['estado'] ?? 'pendiente'; // Por defecto muestra "pendiente"
$lecturas = [];

// Consulta para obtener lecturas según el estado seleccionado
$query = "SELECT id, numMedidor, ultimaLectura, nuevaLectura, (nuevaLectura - ultimaLectura) AS consumo, monto, estado, fechaRegistro 
          FROM lecturas 
          WHERE estado = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $estadoSeleccionado);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $lecturas[] = $row;
}

$stmt->close();
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
        <h2 class="huser">Informes de Lecturas</h2>

        <!-- Formulario de selección de estado -->
        <form method="get" action="informes.php" class="form-agregar">
            <label for="estado">Filtrar por Estado:</label>
            <select id="estado" name="estado" onchange="this.form.submit()">
                <option value="pendiente" <?= $estadoSeleccionado == 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                <option value="pagado" <?= $estadoSeleccionado == 'pagado' ? 'selected' : '' ?>>Pagado</option>
            </select>
        </form>

        <!-- Tabla de lecturas -->
        <table class="tuser">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de Medidor</th>
                    <th>Última Lectura</th>
                    <th>Nueva Lectura</th>
                    <th>Consumo (m³)</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lecturas)): ?>
                    <?php foreach ($lecturas as $lectura): ?>
                        <tr>
                            <td><?= htmlspecialchars($lectura['id']) ?></td>
                            <td><?= htmlspecialchars($lectura['numMedidor']) ?></td>
                            <td><?= number_format($lectura['ultimaLectura'], 2) ?></td>
                            <td><?= number_format($lectura['nuevaLectura'], 2) ?></td>
                            <td><?= number_format($lectura['consumo'], 2) ?></td>
                            <td>₡<?= number_format($lectura['monto'], 2) ?></td>
                            <td><?= htmlspecialchars(ucfirst($lectura['estado'])) ?></td>
                            <td><?= htmlspecialchars($lectura['fechaRegistro']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No hay registros disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <?php include("../footer.php"); ?>
</body>
</html>
