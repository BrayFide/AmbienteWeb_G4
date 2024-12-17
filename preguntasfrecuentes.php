<!DOCTYPE html>
<html lang="es">
<?php
include("head.php")
?>
<body>
<header>
        <?php include("menu.php"); ?>
    </header>
    <?php
    
    $pagosLink = isset($_SESSION['username']) ? 'realizarpago.php' : 'login.php';
    $historialLink = isset($_SESSION['username']) ? 'historialpagos.php' : 'login.php';
    $pendientesLink = isset($_SESSION['username']) ? 'consultafacturas.php' : 'login.php';
    ?>
    <main>
        <h2 class="funcionamiento" >Preguntas Frecuentes</h2>

        <section class="funcionamiento">
            <h3>1. ¿Cómo puedo realizar el pago de mi factura de agua?</h3>
            <p>Para realizar el pago, diríjase a la página <a href="<?= $pagosLink ?>">Realizar pago</a>. Ingrese su número de medidor y siga las instrucciones para completar la transacción.</p>
        </section>

        <section class="funcionamiento">
            <h3>2. ¿Qué métodos de pago están disponibles?</h3>
            <p>Actualmente aceptamos pagos mediante tarjeta de crédito, tarjeta de débito y transferencias bancarias.</p>
        </section>

        <section class="funcionamiento">
            <h3>3. ¿Cómo puedo consultar mi historial de pagos?</h3>
            <p>Puede consultar su historial de pagos ingresando su número de medidor en la página de <a href="<?= $historialLink ?>">historial de pagos</a></p>
        </section>

        <section class="funcionamiento">
            <h3>4. ¿Qué hago si tengo un error al realizar el pago?</h3>
            <p>Si encuentra algún error, por favor contáctenos a través de nuestra línea de atención al cliente al +506 1234-5678.</p>
        </section>

        <section class="funcionamiento">
            <h3>5. ¿Cómo sé si mi pago fue procesado exitosamente?</h3>
            <p>Puede revisarlo en facturas pendientes.</p>
        </section>

        <section class="funcionamiento">
            <h3>6. ¿Qué pasa si no pago mi factura a tiempo?</h3>
            <p>Si no realiza el pago antes de la fecha de vencimiento, se aplicará un cargo por mora. Es importante realizar sus pagos puntualmente para evitar interrupciones en el servicio.</p>
        </section>

    <?php include("footer.php") ?>
</body>
</html>
