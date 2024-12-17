<?php
include_once 'db.php';

// Inicializar variables
$mensaje = "";
$formularioPago = true; // Muestra el formulario por defecto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $monto = $_POST['monto'];

    if (isset($_POST['numero_tarjeta'], $_POST['fecha_expiracion'], $_POST['cvv'])) {
        // Procesar el pago después de enviar los datos del formulario
        $numeroTarjeta = $_POST['numero_tarjeta'];
        $fechaExpiracion = $_POST['fecha_expiracion'];
        $cvv = $_POST['cvv'];

        // Aquí puedes agregar validaciones básicas para los datos de tarjeta si es necesario.
        if (!empty($numeroTarjeta) && !empty($fechaExpiracion) && !empty($cvv)) {
            // Simular procesamiento del pago
            $mensaje = "Pago por ₡" . number_format($monto, 2) . " procesado exitosamente.";

            // Actualizar el estado en la tabla `lecturas` a 'cancelado'
            $query = "UPDATE lecturas SET estado = 'pagado' WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                $mensaje .= " El estado del monto ahora es 'cancelado'.";
                $formularioPago = false; // Ocultar el formulario después del pago
            } else {
                $mensaje = "Error al procesar el pago: " . $conn->error;
            }

            $stmt->close();
        } else {
            $mensaje = "Por favor, complete todos los campos correctamente.";
        }
    }
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
        <h2 class="huser">Información del Pago</h2>
        <div class="center-container">
        <?php if (!empty($mensaje)): ?>
            <p style="color: <?= strpos($mensaje, 'Error') !== false ? 'red' : 'green' ?>;">
                <?= htmlspecialchars($mensaje) ?>
            </p>
        <?php endif; ?>

        <?php if ($formularioPago): ?>
            <!-- Formulario de información de pago -->
            <form method="post" action="procesarPago.php" class="form-agregar">
                <input type="hidden" name="id" value="<?= htmlspecialchars($_POST['id'] ?? '') ?>">
                <input type="hidden" name="monto" value="<?= htmlspecialchars($_POST['monto'] ?? '') ?>">

                <label for="numero_tarjeta">Número de Tarjeta:</label>
                <input type="text" id="numero_tarjeta" name="numero_tarjeta" maxlength="16" placeholder="1234 5678 9012 3456" required>

                <label for="fecha_expiracion">Fecha de Expiración:</label>
                <input type="month" id="fecha_expiracion" name="fecha_expiracion" required>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" placeholder="123" required>

                <button type="submit" class="bt-pagar">Procesar Pago</button>
            </form>
        <?php endif; ?>
        </div>
        <a href="realizarpago.php" class="btn-volver">Volver a Consultar Pagos</a>
    </main>

    <?php include("footer.php"); ?>
</body>
</html>
