<?php
session_start();

if(!empty($_SESSION)){
   if($_SESSION["rol"] == "admin"){
    $menu = [
        ["label" => "Inicio", "url" => "../index.php"],
        ["url" => "medidores.php", "label" => "Medidores"],
        ["url" => "registroLecturas.php", "label" => "Registrar Lecturas"],
        ["url" => "informes.php", "label" => "Informes"],
        ["url" => "users.php", "label" => "Usuarios"],
        ["url" => "../logout.php", "label" => "Salir"]
    ];
   } 
    elseif($_SESSION["rol"] == "user") {
    $menu = [
        ["label" => "Inicio", "url" => "index.php"],
        ["url" => "user/realizarpago.php", "label" => "Realizar Pago"],
        ["url" => "user/historialpagos.php", "label" => "Historial"],
        ["url" => "user/reportes.php", "label" => "Reportar Averia"],
        ["url" => "logout.php", "label" => "Salir"]
    ];

    
}}else {
    $menu = [
        ["label" => "Inicio", "url" => "index.php"],
        ["label" => "Login", "url" => " login.php"],
        ["url" => "pregFrec.php", "label" => "Preguntas Frecuentes"],
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