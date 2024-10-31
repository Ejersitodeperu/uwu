<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['contactName']));
    $email = htmlspecialchars(trim($_POST['contactEmail']));
    $mensaje = htmlspecialchars(trim($_POST['contactMessage']));

    // Validar el correo electrónico
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $to = "pront153@example.com"; 
        $subject = "Nuevo mensaje de contacto de $nombre";
        $body = "Nombre: $nombre\n";
        $body .= "Correo: $email\n";
        $body .= "Mensaje:\n$mensaje\n";

        if (mail($to, $subject, $body)) {
            echo "Mensaje enviado con éxito.";
        } else {
            echo "Error al enviar el mensaje. Inténtalo más tarde.";
        }
    } else {
        echo "Dirección de correo electrónico no válida.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
