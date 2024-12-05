<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'bd.php'; 

$name = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $idCurso = $_POST['idCurso'];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($idCurso)) {
        $sql = "INSERT INTO usuarios (nombre, email, contraseña, idCurso) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $name, $email, $password, $idCurso);
            $stmt->execute();
            $stmt->close();
        } else {
            die("Error al preparar la consulta: " . $mysqli->error);
        }
    }else {
        die("Todos los campos son obligatorios.");
    }

    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<div class="container">
        <h1>¡Registro exitoso!</h1>
        <p>Bienvenido, <strong><?= htmlspecialchars($name) ?></strong>. Tu registro se ha completado.</p>
        <button><a href="pag1.html">¿Continuar?</a></button>
    </div>
</body>
</html>