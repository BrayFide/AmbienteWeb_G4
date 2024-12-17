<!DOCTYPE html>
<html lang="es">

<?php
include("head.php")
?>
<body>
    <header>

        <?php include("menu.php") ?>
    </header>
    <main class= "log">

    <div class="loginform">
    <form  method="post" action="procesLogin.php">
        <label>Usuario:</label><br>
        <input type="text" name="username" id="username"><br>
        <label>Clave:</label><br>
        <input type="password" name="password" id="password"><br>
        <button type="submit">Iniciar sesión</button>
    </form>
    <br>
    <button onclick="window.location.href='register.php'">Registrarse</button>
    </div>
</main>

    <?php include("footer.php") ?>

</body>

</html>