<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mensajeUsuario = htmlspecialchars($_POST['mensajeUsuario']);

    $to = "maluises@google.com";
    $subject = "Mensaje de contacto de $name";
    $body = "Nombre: $name\nCorreo Electrónico: $email\n\nMensaje:\n$mensajeUsuario";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<div class='alert alert-success'>Mensaje enviado con éxito.</div>";
    } else {
        echo "<div class='alert alert-danger'>Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.</div>";
    }
}
?>