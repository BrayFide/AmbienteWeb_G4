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
        <h2 class="huser">Consulta Facturas Pendientes</h2>
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