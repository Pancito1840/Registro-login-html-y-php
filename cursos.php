<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'bd.php';

$sql = "SELECT * FROM curso ORDER BY idCurso ASC";
$result = $mysqli->query($sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div>
    <h1>Cursos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Curso</th>
                <th>Duracion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
        echo "<td>" . $row['idCurso'] . "</td>";
        echo "<td>" . $row['nombreCurso'] . "</td>";
        echo "<td>" . $row['duracion'] . " meses</td>";
        echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay datos registrados</td></tr>";
            }
            $mysqli->close();
            ?>
        </tbody>
    </table>
    <button><a href="pag1.html">¿Volver?</a></button>
</div>
</body>
</html>