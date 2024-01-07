<?php
include('conect.php');
session_start();

if(!isset($_SESSION['username'])){
    header("Location: error.php?error=Accés no autoritzat.");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Despatx: Àlies</title>
</head>
<body>
    <header>
        <h1>Despatx: <?php echo $_SESSION['username']; ?></h1>
        <nav>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- Aquí s'afegiran les tasques i se'n gestionarà el contingut. -->
    </main>
</body>
</html>