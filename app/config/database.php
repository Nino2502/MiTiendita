<?php



$conn = new mysqli("localhost", "root", "", "mitiendita");

// Verificación de la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Se conectó exitosamente la base de datos :v";
}




?>