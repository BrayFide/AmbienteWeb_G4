<?php

/*Conexion a la base de datos*/
$servername = "localhost";
    $username = "root";
    $password = '';
    $database = "asadas";

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error){
        die("Conexio fallida");
    } 


    $data = json_decode(file_get_contents("php://input"), true);

    function obtenerNombreMes($fechaFactura) {
        $meses = [
            "Enero", "Febrero", "Marzo", "Abril", "Mayo", 
            "Junio", "Julio", "Agosto", "Septiembre", "Octubre", 
            "Noviembre", "Diciembre"
        ];
        $fechaObj = new DateTime($fechaFactura);
        return $meses[intval($fechaObj->format("m")) - 1];
    }

    switch($data['action']){
        case 'add': 
            //$name = $data["name"];
            $lecturaAnterior = $data["lecturaAnterior"];
            $lecturaActual= $data["lecturaActual"];
            $fechaFactura= $data["fechaFactura"];
            $leyHidrantes = 390; /*Cobro por ley de hidrantes */
            $cobroBase = 2500; /*Cobro base del acuaducto */
            $idMedidor = $data["idMedidor"];
            $mesCobro = obtenerNombreMes($fechaFactura);
            $consumo= $lecturaActual - $lecturaAnterior;
            $consumo1a10 = min($consumo, 10) * 300;  // El consumo entre 1 y 10 se cobra a 300
            $consumo11a30 = max(min($consumo - 10, 20), 0) * 350;  // El consumo entre 11 y 30 se cobra a 350
            $consumoMas30 = max($consumo - 30, 0) * 390;  // El consumo mayor a 30 se cobra a 39
           $totalConsumo = $consumoMas30 + $consumo11a30 + $consumo1a10;
            $subtotalMes = $totalConsumo + $cobroBase + $leyHidrantes;


            

/************************************************Voy por colocar las variables en el el insert */ 
            $query = "INSERT INTO `facturas`( `consumo`, `lecturaAnterior`, `lecturaActual`,
             `totalConsumo`, `subtotalMes`, `fechaFactura`, `mesCobro`, `idMedidor`, `consumo1a10`, `consumo11a30`, `consumoMas30`)
              VALUES ('$consumo','$lecturaAnterior','$lecturaActual','$totalConsumo','$subtotalMes','$fechaFactura','$mesCobro','$idMedidor',
              '$consumo1a10','$consumo11a30','$$consumoMas30')";


            try {
                if ($conn->query($query) ===  TRUE) {

                    $queryUpdate = "UPDATE `medidores` SET `lecturaActual` = '$lecturaActual' WHERE `idMedidor` = '$idMedidor'";
                    if ($conn->query($queryUpdate) ===  TRUE){
                        echo json_encode(["status" => "00", "message" => "Se agrego correctamente los datos de la factura"]);
                    } 
                    
                } else {
                    echo json_encode(["status" => "99", "message" => "Error al actualizar medidores"]);
                }
            } catch(Exception $e){
                echo json_encode(["status" => "99", "message" => "Error al guardar al factura"]);
            }
            break;

        case 'buscar':
            $idMedidor = $data["idMedidor"];
            $sql = "SELECT idMedidor, lecturaActual FROM medidores Where idMedidor = '$idMedidor'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $list =[];
                // Si se encuentran registros, respondemos con status 00 y señalamos que se debe mostrar la sección
                while($medidor = $result->fetch_assoc()){
                    $list[] = $medidor;
                }
                echo json_encode(["status" => true, "showSection" => true, "medidores" => $list]);
            } else {
                // Si no se encuentran registros, respondemos con status 99 y no mostramos la sección
                echo json_encode(["status" => false, "showSection" => false], );
            }
            
            break;
        
        case 'get':
            $sql = "SELECT * FROM teachers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $medidores = [];
                while ($teacher = $result->fetch_assoc()) {
                    $teachers[] = ["name" => $teacher["name"]];
                }
                echo json_encode(["status"=> "00", "teachers" => $teachers]);
            } else {
                echo json_encode(["status"=> "99", "teachers" => []]);
            }
            break;
    
            if ($result->num_rows > 0) {
                $teachers = [];
                while ($teacher = $result->fetch_assoc()) {
                    $teachers[] = ["name" => $teacher["name"]];
                }
                echo json_encode(["status"=> "00", "teachers" => $teachers]);
            } else {
                echo json_encode(["status"=> "99", "teachers" => []]);
            }
            break;
    
        case 'update':
    
            break;
    } 