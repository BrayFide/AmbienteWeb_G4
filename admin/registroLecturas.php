<?php
include("head.php");
include_once '../db.php'; 


$query = "SELECT numMedidor FROM medidores";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">

<body>
    <!--Encabezados-->
    <header>
        <?php include("menu.php") ?>
    </header>

    <!--Principal-->
    <main>
        <div class="modal-contenido">
            <h2>Registrar Lectura</h2>
            <form method="post" action="procesarLectura.php">
                <label for="numMedidor">Número de Medidor:</label>
                <select id="numMedidor" name="numMedidor" onchange="cargarUltimaLectura()" required>
                    <option value="">Seleccione un Medidor</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['numMedidor']}'>{$row['numMedidor']}</option>";
                        }
                    } else {
                        echo "<option value=''>No hay medidores disponibles</option>";
                    }
                    ?>
                </select>
                <br><br>

                <label for="ultimaLectura">Última Lectura:</label><br>
                <input type="number" id="ultimaLectura" name="ultimaLectura" step="0.01" required><br><br>

                <label for="nuevaLectura">Nueva Lectura:</label><br>
                <input type="number" id="nuevaLectura" name="nuevaLectura" step="0.01" required><br><br>

                <button type="submit">Guardar</button>
            </form>
        </div>
    </main>

    <?php include("../footer.php") ?>

    <script>
        function cargarUltimaLectura() {
            const numMedidor = document.getElementById("numMedidor").value; 
            const ultimaLecturaInput = document.getElementById("ultimaLectura");

            if (numMedidor) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "obtenerUltimaLectura.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        
                        ultimaLecturaInput.value = xhr.responseText;
                    }
                };

                
                xhr.send("numMedidor=" + encodeURIComponent(numMedidor));
            } else {
               
                ultimaLecturaInput.value = "";
            }
        }
    </script>

</body>
</html>
<?php
$conn->close(); // Cierra la conexión a la base de datos
?>
