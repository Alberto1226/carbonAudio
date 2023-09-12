<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
const BASE_URL = "http://localhost/tienda_virtual";
require __DIR__ .'/PHPMailer/Exception.php';
require __DIR__ .'/PHPMailer/PHPMailer.php';
require __DIR__ .'/PHPMailer/SMTP.php';


/*$nom = $_POST['nom'];
$ap = $_POST['ap'];
$correo = $_POST['email'];
$telefono = $_POST['tel'];
$comentario = $_POST['msg'];*/

$nombres = $_POST["nombre"];
$app = $_POST["app"];
$apm = $_POST["apm"];
$dom = $_POST["dom"];
$prop = $_POST["prop"];

// Inicio
    $mail = new PHPMailer(true);

    try {
        // Configuracion SMTP
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
        $mail->isSMTP();                                               // Activar envio SMTP
        $mail->Host  = 'mail.carbonaudio.com.mx';                     // Servidor SMTP
        $mail->SMTPAuth  = true;                                       // Identificacion SMTP
        $mail->SMTPSecure = 'ssl';
        $mail->Username  = 'franciscoortiz@carbonaudio.com.mx';                  // Usuario SMTP
        $mail->Password  = 'MjXN^!%.9{Er';	          // Contraseña SMTP//Informaticaieeh2022
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port  = 26;
        $mail->setFrom('franciscoortiz@carbonaudio.com.mx', 'Contacto Carbon Audio');                // Remitente del correo

        // Destinatarios
        $mail->addAddress('franciscoortiz@carbonaudio.com.mx', 'Contacto Carbon Audio');  // Email y nombre del destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'CONTACTO';
        $mail->Body = '<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse; background-color: #001f3f;">
        <tr>
            
        </tr>	
        <tr>
            <td style="background-color: #001f3f; color: #fff;">
                <div style="color: #ffffff; margin: 4% 10% 2%; text-align: justify; font-family: sans-serif;">
                
                    <p style="margin: 2px; font-size: 15px">
                        <br>
                        <h2 style="color: #fff; margin: 0 0 7px" align="center">'.'Quiero ser un distribuidor'.'</h2>
                        </p>
                        <p>
                        De:  
                        <br>
                        <br>
                        <br>
                        <h2 style="color: #fff; margin: 0 0 5px" align="center">'.$nombres.' '.$app.' '.$apm.'</h2>
                        Mi domicilio es:   
                        <h2 style="color: #fff; margin: 0 0 5px" align="center">'.$dom.'</h2>
                        
                        </p>
                        <p>
                        Mi propuesta es:   
                        <br>
                        <br>
                        <br>
                        <h2 style="color: #fff; margin: 0 0 5px" align="center">'.$prop.'</h2>
                        
                        </p>
                    </p>		
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    
                </div>
            </td>
        </tr>
    </table>';

        $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
        $mail->send();
        echo "<script type='text/javascript'> 
	alert('Datos Enviados Correctamente');
	window.location='#';
	
	</script>";
    } catch (Exception $e) {
        echo "<script type='text/javascript'> 
	alert('Error');
	window.location='#';
	
	</script>";
    }
