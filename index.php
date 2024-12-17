<!DOCTYPE html>
<html lang="es">

<?php
include("head.php")
?>

<body>
    <!--Encabezados-->
    <header>
        <?php include("menu.php") ?>
    </header>
    <!--Principal-->
    <main>

    

    <div class="banner">
    <h1>Bienvenidos al Sistema de Pagos de ASADA El Llano</h1>
    <p>En nuestro sistema puedes gestionar y realizar tus pagos de agua de forma rápida y sencilla. Consulta tu historial, verifica tus facturas pendientes y mantente al día con tus pagos.</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.531073706936!2d-84.07058269999997!3d9.889651100000012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e375be4b36d1%3A0x8fa53bcda4556d6!2sEl%20Llano%20de%20San%20Miguel%20de%20Escaz%C3%BA!5e0!3m2!1sen!2scr!4v1733893724260!5m2!1sen!2scr" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    </br>





    
    </br>
    <div style="text-align:center;" class="servic">
    <h2 class="tit">Servicios Disponibles</h2>

    

    <section class="servs">
    <?php
    
    $pagosLink = isset($_SESSION['username']) ? 'realizarpago.php' : 'login.php';
    $historialLink = isset($_SESSION['username']) ? 'historialpagos.php' : 'login.php';
    $pendientesLink = isset($_SESSION['username']) ? 'consultafacturas.php' : 'login.php';
    ?>
    <div class="servicio">
    <strong>Pagar Factura:</strong>
    </br>
    <img src="https://cdn-icons-png.flaticon.com/512/1019/1019607.png" alt="Pagar Factura">
    <p>Realiza el pago de tus servicios de agua.</p>
    <button onclick="window.location.href='<?= $pagosLink ?>'">Acceder</button>
</div>
<div class="servicio">
    <strong>Historial de Pagos:</strong>
    </br>
    <img src="https://cdn-icons-png.flaticon.com/512/18277/18277029.png" alt="Historial de Pagos">
    <p>Consulta el registro de todos tus pagos anteriores.</p>
    <button onclick="window.location.href='<?= $historialLink ?>'">Acceder</button>
</div>
<div class="servicio">
    <strong>Facturas Pendientes:</strong>
    </br>
    <img src="https://cdn-icons-png.flaticon.com/512/1651/1651965.png" alt="Facturas Pendientes">
    <p>Verifica las facturas que aún están por pagar.</p>
    <button onclick="window.location.href='<?= $pendientesLink ?>'">Acceder</button>
</div>
</section>
</div>


<section class="funcionamiento">
    <h2>¿Cómo Funciona?</h2>
    <p><strong>Para utilizar este sistema, sigue los siguientes pasos:</strong></p>

    <div class="pasos">
        <div class="paso">
            <div class="icono">
                <img src="https://cdn-icons-png.flaticon.com/512/8322/8322693.png" alt="Paso 1">
            </div>
            <div class="contenido">
                <h3>Paso 1</h3>
                <p>Ingresa con tus credenciales o regístrate como usuario nuevo.</p>
            </div>
        </div>
        <div class="paso">
            <div class="icono">
                <img src="https://cdn-icons-png.flaticon.com/512/8322/8322875.png" alt="Paso 2">
            </div>
            <div class="contenido">
                <h3>Paso 2</h3>
                <p>Ingresa a la sección que desees desde el menú principal.</p>
            </div>
        </div>
        <div class="paso">
            <div class="icono">
                <img src="https://cdn-icons-png.flaticon.com/512/8322/8322999.png" alt="Paso 3">
            </div>
            <div class="contenido">
                <h3>Paso 3</h3>
                <p>Introduce la información solicitada, como tu número de medidor.</p>
            </div>
        </div>
        <div class="paso">
            <div class="icono">
                <img src="https://cdn-icons-png.flaticon.com/512/7518/7518748.png" alt="Paso 4">
            </div>
            <div class="contenido">
                <h3>Paso 4</h3>
                <p>Realiza tu pago de forma segura o consulta la información que necesitas.</p>
            </div>
        </div>
    </div>
</section>


    
    </main>

    <?php include("footer.php") ?>

</body>

</html>