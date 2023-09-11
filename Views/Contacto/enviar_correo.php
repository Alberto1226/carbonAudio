<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../Libraries/PHPMailer/Exception.php';
require '../Libraries/PHPMailer/PHPMailer.php';
require '../Libraries/PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $email = $_POST["email"];
    $asunto = $_POST["asunto"];
    $descripcion = $_POST["descripcion"];
    
    $destinatario = "franciscoortiz@carbonaudio.com.mx";

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Configurar el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'mail.carbonaudio.com.mx '; // Cambia esto por la dirección de tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'franciscoortiz@carbonaudio.com.mx'; // Cambia esto por tu dirección de correo electrónico
    $mail->Password = 'MjXN^!%.9{Er'; // Cambia esto por tu contraseña
    $mail->SMTPSecure = 'tls';
    $mail->Port = 465;

    // Configurar remitente y destinatario
    $mail->setFrom($email, $nombres);
    $mail->addAddress($destinatario);

    // Configurar el contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = $descripcion;

    // Enviar el correo
    if ($mail->send()) {
        echo "Correo enviado exitosamente.";
    } else {
        echo "Error al enviar el correo: " . $mail->ErrorInfo;
    }
}
?>
