<!DOCTYPE html>
<html lang="es">
<?php
include("head.php")
?>
<body>
    <header>
        <?php include("menu.php") ?>
    </header>
    <main>
    <main class= "log">
        <div class="loginform">
    <form method="post" action="procesRegister.php">
        <label>Usuario:</label><br>
        <input type="text" name="username" id="username" required><br>
        <label>Clave:</label><br>
        <input type="password" name="password" id="password" required><br>
        <button type="submit">Registrar</button>
    </form>
        </div>
</main>
</main>

    <?php include("footer.php") ?>

</body>

</html>