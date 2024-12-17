<?php
include_once '../db.php';


if (isset($_GET['numMedidor'])) {
    $numMedidor = $_GET['numMedidor'];

    
    $query = "SELECT m.numMedidor, m.direccion, l.ultimaLectura, l.nuevaLectura, l.fechaRegistro, l.consumo, l.monto, l.estado
              FROM medidores m
              LEFT JOIN lecturas l ON m.numMedidor = l.numMedidor
              WHERE m.numMedidor = ?
              ORDER BY l.fechaRegistro DESC LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $numMedidor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $medidor = $result->fetch_assoc();
    } else {
        echo "No se encontró información para este medidor.";
        exit;
    }

    $stmt->close();
} else {
    echo "No se especificó un medidor.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<?php include("head.php")?>
<body>
    <header>
        <?php include("menu.php"); ?>
    </header>

    <main class="dmed">
        <h2 class="hmed">Detalles del Medidor</h2>
        <table class="tmed" border="1">
            <tr>
                <th>Número de Medidor</th>
                <td><?= htmlspecialchars($medidor['numMedidor']) ?></td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td><?= htmlspecialchars($medidor['direccion']) ?></td>
            </tr>
            <tr>
                <th>Última Lectura</th>
                <td><?= htmlspecialchars($medidor['ultimaLectura']) ?></td>
            </tr>
            <tr>
                <th>Nueva Lectura</th>
                <td><?= htmlspecialchars($medidor['nuevaLectura']) ?></td>
            </tr>
            <tr>
                <th>Fecha de Registro</th>
                <td><?= htmlspecialchars($medidor['fechaRegistro']) ?></td>
            </tr>
            <tr>
                <th>Consumo Total</th>
                <td><?= htmlspecialchars($medidor['consumo']) ?></td>
            </tr>
            <tr>
                <th>Monto</th>
                <td><?= htmlspecialchars($medidor['monto']) ?></td>
            </tr>
            <tr>
                <th>Estado de Pago</th>
                <td><?= htmlspecialchars($medidor['estado']) ?></td>
            </tr>
        </table>
</br>
        <h2><a href="medidores.php">Volver a Medidores</a></h2>
    </main>

    <?php include("../footer.php"); ?>
</body>
</html>
