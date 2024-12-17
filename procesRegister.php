<?php
include("db.php");
session_start();

// Validar datos
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); 
    $rol = 'user'; 

    
    $sql_check = "SELECT * FROM users WHERE username = '$username'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "El usuario ya existe. Por favor, elija otro nombre de usuario.";
    } else {
        
        $sql = "INSERT INTO users (username, password, rol) VALUES ('$username', '$password', '$rol')";
        if ($conn->query($sql) === TRUE) {
            echo "Usuario registrado con éxito. <a href='login.php'>Iniciar sesión</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Todos los campos son obligatorios.";
}
?>
