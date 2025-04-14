<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // o el servidor que uses
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dimarketing1602@gmail.com'; // correo que envía
        $mail->Password   = 'Gdi#1602';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Configuración del mensaje
        $mail->setFrom('dimarketing1602@gmail.com', 'Formulario Grupo DI');
        $mail->addAddress('mcamargo@grupodi.cl');

        $mail->isHTML(true);
        $mail->Subject = "Nuevo mensaje del formulario";
        $mail->Body    = "<strong>Nombre:</strong> $nombre <br><strong>Email:</strong> $email <br><strong>Mensaje:</strong><br>$mensaje";

        $mail->send();
        echo "Mensaje enviado correctamente.";
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>
