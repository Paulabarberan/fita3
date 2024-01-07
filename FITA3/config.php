<?php

// Incluir el archivo config.php
include('config.php');

// Conectar a la base de datos usando las constantes definidas en config.php
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificar la conexión
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
define('DB_USERNAME', $config['username']);
define('DB_PASSWORD', $config['password']);
?>
