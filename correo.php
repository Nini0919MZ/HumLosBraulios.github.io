<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Requiere PHPMailer
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura los datos del formulario
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico inválido.";
        exit;
    }

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia según tu proveedor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'tu_correo@gmail.com'; // Tu correo SMTP
        $mail->Password = 'tu_contraseña'; // Contraseña del correo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom($email, $name);
        $mail->addAddress('humanidadesaprende@gmail.com', 'Destinatario'); // Destinatario final
        $mail->addReplyTo($email, $name);

        $mail->isHTML(true);
        $mail->Subject = "Nuevo mensaje de contacto de $name";
        $mail->Body = "<p><strong>Nombre:</strong> $name</p>
                       <p><strong>Correo:</strong> $email</p>
                       <p><strong>Mensaje:</strong></p>
                       <p>$message</p>";

        $mail->send();
        echo "Tu mensaje ha sido enviado exitosamente.";
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso no permitido.";
}
?>
