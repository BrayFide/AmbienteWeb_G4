<?php
include_once '../db.php';

// Consulta para obtener todos los usuarios
$query = "SELECT id, username, rol FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<?php include("head.php")?>
<body>
    <header>
        <?php include("menu.php"); ?>
    </header>

    <main class="tuser">

  
    

        <h2 class="huser">Usuarios Registrados</h2>
        <table class="tuser">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['username']) ?></td>
                            <td>
                                <!-- Formulario en línea para cambiar el rol -->
                                <form method="post" action="actualizarRol.php">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <select name="rol">
                                        <option value="admin" <?= $row['rol'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="user" <?= $row['rol'] == 'user' ? 'selected' : '' ?>>User</option>
                                    </select>
                                    <button type="submit">Actualizar</button>
                                </form>
                            </td>
                            <td>
                                <!-- Botón para eliminar usuario -->
                                <form method="post" action="eliminarUsuario.php" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="breg" style="margin-bottom: 20px;">
    <button onclick="window.location.href='../register.php'" class="btn-agregar">Agregar Nuevo Usuario</button>
    </div>
    </main>

    <?php include("../footer.php"); ?>
</body>
</html>
<?php $conn->close(); ?>
