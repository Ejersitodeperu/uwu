<?php
session_start();

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
$user = $_POST['text'];
$pass = $_POST['password'];

// Consultar el usuario
$sql = "SELECT * FROM usuarios WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        $_SESSION['username'] = $user; // Guardar sesión
        echo json_encode(["respuesta" => "ok"]);
    } else {
        echo json_encode(["respuesta" => "error"]);
    }
} else {
    echo json_encode(["respuesta" => "error"]);
}


$conn->close();
