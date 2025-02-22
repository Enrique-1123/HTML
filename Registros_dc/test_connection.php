<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Registros";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Datos a insertar en la tabla Productos
$idProducto = "P001";
$Nombre = "Producto Ejemplo";
$Precio = 12.50;
$Existencia = 100;

// Preparar la consulta SQL utilizando sentencias preparadas
$stmt = $conn->prepare("INSERT INTO Productos (idProducto, Nombre, Precio, Existencia) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssdi", $idProducto, $Nombre, $Precio, $Existencia);
// "ssdi": s = string para idProducto, s = string para Nombre, d = double para Precio, i = integer para Existencia

// Ejecutar la consulta y verificar si se insertó correctamente
if ($stmt->execute()) {
    echo "Nuevo registro insertado correctamente";
} else {
    echo "Error al insertar el registro: " . $stmt->error;
}

// Cerrar la sentencia y la conexión
$stmt->close();
$conn->close();
?>
