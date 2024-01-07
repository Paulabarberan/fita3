<?php
$servername = "mysql-paulabarberan14.alwaysdata.net";
$username = "336662";
$password = "paula2023";
$dbname = "paulabarberan14_todoapp";
// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Comprobar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
include('conect.php');

?>
