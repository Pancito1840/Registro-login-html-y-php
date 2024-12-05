<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
    <h1>Bienvenido al Dashboard</h1>
    <p>Hola, <?php echo $_SESSION['nombre']; ?>.</p>
    <button><a href="logout.php">Cerrar sesión</a></button>
    </div>
</body>
</html>
