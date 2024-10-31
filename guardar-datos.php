<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$foto = $_POST['foto'];
$nombre = $_POST['nombre'];
$contenido = $_POST['contenido'];
$fecha= $_POST['fecha'];

$sql = "INSERT INTO formulario (nombre, fecha, contenido, foto) VALUES ('$nombre', '$fecha', '$contenido', '$foto')";
if ($conn->query($sql) === TRUE) {  
    echo json_encode(["respuesta" => "ok"]);
} else {
    echo json_encode(["respuesta" => "error"]);
}

$conn->close();
