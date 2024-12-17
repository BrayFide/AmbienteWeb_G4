<!DOCTYPE html>
<html lang="es">

<?php
include("head.php")
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body>
    <!--Encabezados-->
    <header>
        <?php include("menu.php") ?>
    </header>
    <!--Principal-->
    <main>

    <div class="acciones">
    <button onclick="abrirModalAgregar()">Agregar Medidor</button>


    </div>

<!-- Modal para agregar medidor -->
<div id="modalAgregar" class="modal">
    <div class="modal-contenido">
        <span class="cerrar" onclick="cerrarModal('modalAgregar')">&times;</span>
        <h2>Agregar Medidor</h2>
        <form method="post" action="procesarAgregarMedidor.php">
            <label for="numMedidor">Número de Medidor:</label><br>
            <input type="text" id="numMedidorAgregar" name="numMedidor" required><br>
            <label for="direccion">Dirección:</label><br>
            <input type="text" id="direccionAgregar" name="direccion" required><br>
            <label for="ultimaLectura">Última Lectura:</label><br>
            <input type="number" id="ultimaLecturaAgregar" name="ultimaLectura" step="0.01" required><br>
            <label for="estado">Estado:</label><br>
            <select id="estadoAgregar" name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select><br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</div>


    <div id="modalEditar" class="modal">
    <div class="modal-contenido">
        <span class="cerrar" onclick="cerrarModal('modalEditar')">&times;</span>
        <h2>Editar Medidor</h2>
        <form method="post" action="procesarEditarMedidor.php">
            <input type="hidden" id="idEditar" name="id">
            <label for="numMedidor">Número de Medidor:</label><br>
            <input type="text" id="numMedidorEditar" name="numMedidor" required><br>
            <label for="direccion">Dirección:</label><br>
            <input type="text" id="direccionEditar" name="direccion" required><br>
            <label for="ultimaLectura">Última Lectura:</label><br>
            <input type="number" id="ultimaLecturaEditar" name="ultimaLectura" step="0.01" required><br>
            <label for="estado">Estado:</label><br>
            <select id="estadoEditar" name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select><br><br>
            <button type="submit">Guardar</button>
        </form>
    </div>
</div>
<script>
function abrirModalAgregar() {
    document.getElementById('modalAgregar').style.display = 'block';
}

function abrirModalEditar(id, numMedidor, direccion, ultimaLectura, estado) {
    // Poblar el formulario de editar con los valores actuales
    document.getElementById('idEditar').value = id;
    document.getElementById('numMedidorEditar').value = numMedidor;
    document.getElementById('direccionEditar').value = direccion;
    document.getElementById('ultimaLecturaEditar').value = ultimaLectura;
    document.getElementById('estadoEditar').value = estado;

    document.getElementById('modalEditar').style.display = 'block';
}

function cerrarModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}
</script>
    <?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<p style='color: green;'>Proceso Completado correctamente.</p>";
}
?>
    <div id="medidores">
    <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número de Medidor</th>
            <th>Dirección</th>
            <th>Última Lectura</th>
            
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include_once '../db.php';

        $query = "SELECT id, numMedidor, direccion, ultimaLectura, estado FROM medidores";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['numMedidor']}</td>
                        <td>{$row['direccion']}</td>
                        <td>{$row['ultimaLectura']}</td>
                    
                        <td>{$row['estado']}</td>
                        <td>
                            <button class=\"btn-editar\" onclick=\"abrirModalEditar('{$row['id']}', '{$row['numMedidor']}', '{$row['direccion']}', '{$row['ultimaLectura']}', '{$row['estado']}')\"><i class=\"fas fa-edit\"></i>  Editar</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay medidores registrados</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>

</div>

    </main>

    <?php include("../footer.php") ?>

</body>

</html>