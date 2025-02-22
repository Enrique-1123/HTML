<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Registros";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idProducto = $_GET['id'];

// Usamos prepared statement para mayor seguridad
$stmt = $conn->prepare("DELETE FROM Productos WHERE idProducto = ?");
$stmt->bind_param("s", $idProducto);

if ($stmt->execute()) {
    echo "Producto eliminado correctamente";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
