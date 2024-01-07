<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: error.php?error=Accés no autoritzat.");
    exit();
}

include('GestorTasques.php');

$gestorTasques = new GestorTasques($_SESSION['username']);
$tasques = $gestorTasques->obtenerTareas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?php echo $_SESSION['username']; ?></title>
</head>
<body>
    <header>
        <h1>Dashboard - <?php echo $_SESSION['username']; ?></h1>
        <nav>
            <ul>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Mostrar y gestionar las tareas -->
        <?php foreach ($tasques as $tarea): ?>
            <div>
                <h2><?php echo $tarea->titulo; ?></h2>
                <p><?php echo $tarea->descripcion; ?></p>
                <!-- Otros detalles de la tarea -->
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
