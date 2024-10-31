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

// Obtener datos del formulario
$user = $_POST['newUsername'];
$pass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT); // Encriptar contraseña

// Insertar usuario
$sql = "INSERT INTO usuarios (username, password) VALUES ('$user', '$pass')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["respuesta" => "ok"]);
} else {
    echo json_encode(["respuesta" => "error"]);
}

$conn->close();
