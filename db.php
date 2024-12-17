<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "asada";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Conexio fallida");
} 
