<?php
session_start();

if(!empty($_SESSION)){
   if($_SESSION["rol"] == "admin"){
    $menu = [
        ["label" => "Inicio", "url" => "index.php"],
        ["url" => "admin/medidores.php", "label" => "Medidores"],
        ["url" => "admin/registroLecturas.php", "label" => "Registrar Lecturas"],
        ["url" => "admin/informes.php", "label" => "Informes"],
        ["url" => "admin/users.php", "label" => "Usuarios"],
        ["url" => "logout.php", "label" => "Salir"]
    ];
   } 
    elseif($_SESSION["rol"] == "user") {
    $menu = [
        ["label" => "Inicio", "url" => "index.php"],
        ["url" => "realizarpago.php", "label" => "Realizar Pago"],
        ["url" => "historialpagos.php", "label" => "Historial"],
        ["url" => "consultafacturas.php", "label" => "Facturas Pendientes"],
        ["url" => "logout.php", "label" => "Salir"]
    ];

    
}}else {
    $menu = [
        ["label" => "Inicio", "url" => "index.php"],
        ["label" => "Login", "url" => " login.php"],
        ["url" => "preguntasfrecuentes.php", "label" => "Preguntas Frecuentes"],
    ];
    
}
?>
<nav>
    <ul class="menu">
        <?php
        foreach ($menu  as $item) { ?>
            <li class="menu-item"><a href="<?php echo $item["url"] ?>"><?php echo $item["label"] ?></a></li>
        <?php } ?>
    </ul>
</nav>