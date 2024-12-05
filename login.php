<?php
// Iniciar sesión
session_start();

include 'bd.php';

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta para validar al usuario
$sql = "SELECT * FROM usuarios WHERE email = ? AND contraseña = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Validar resultado
if ($result->num_rows > 0) {
    // Usuario encontrado
    session_start();
    $user = $result->fetch_assoc();
    $_SESSION['idUser'] = $user['idUser'];
    $_SESSION['nombre'] = $user['nombre'];

    header("Location: success.html");
} else {
    // Usuario no encontrado
    header("Location: error.html");
}

// Cerrar conexión
$stmt->close();
$mysqli->close();
?>
