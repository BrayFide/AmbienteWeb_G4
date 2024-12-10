<!DOCTYPE html>
<html>

<head>
    
</head>
<?php

$servername = "localhost";
    $username = "root";
    $password = '';
    $database = "asadas";

    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error){
        die("Conexio fallida");
    } 

    if($_SERVER['REQUEST_METHOD']  == 'POST') {

     $idMedidor = $_POST['idMedidor'] ?? null;
     $ubicacion = $_POST['ubicacion'] ?? null; 
     $serie = $_POST['serie'] ?? null;
     $cedUsuario = $_POST['cedUsuario'] ?? null;
     $fechaIngreso = $_POST['fechaIngreso'] ?? null;  
     
     
     
    }
    if ($idMedidor && $ubicacion && $serie && $cedUsuario && $fechaIngreso) {
        // Preparar la consulta SQL
        $sql = "INSERT INTO medidores (idMedidor, ubicacion, serie, cedUsuario, fechaIngreso) 
                VALUES (?, ?, ?, ?, ?)";

        // Preparar la consulta utilizando prepared statements
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Vincular los parámetros
            $stmt->bind_param("sssss", $idMedidor, $ubicacion, $serie, $cedUsuario, $fechaIngreso);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                header("Location: registroMedidores.php?mensaje=correcto");
                exit();
            } else {
                header("Location: registroMedidores.php?mensaje=error");
                exit();
            }

            // Cerrar el statement
            $stmt->close();
        } else {
            header("Location: registroMedidores.php?mensaje=error_preparar");
            exit();
        }
    } else {
        header("Location: registroMedidores.php?mensaje=incompleto");
    }


// Cerrar la conexión a la base de datos
$conn->close();
?>

