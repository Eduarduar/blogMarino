<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



    try {
        //Server settings
        $mail->SMTPDebug = 0; // Desactivar la salida de depuración                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'rafaelalex6949@gmail.com';                     //SMTP username
        $mail->Password   = 'ptkn alme tadr nuuj';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('rafaelalex6949@gmail.com', 'Support DEEP OCEAN');
        $mail->addAddress('rafaelalexandro6949@gmail.com');     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Support DEEP OCEAN';
        $mail->Body    = "Correo de Contacto: " . $email . "<br/>Mensaje: " . $message;
    
        $mail->send();
        echo '<script>alert("Message has been sent")</script>';

        // Configurar y enviar el correo de agradecimiento
        $mail->clearAddresses(); // Limpiar los destinatarios anteriores
        $mail->addAddress($email); // El correo electrónico del usuario que contactó al soporte
        $mail->Subject = 'Thank you for contacting DEEP OCEAN support.';
        $mail->Body    = "Thank you for contacting us. We have received your message and will get back to you as soon as possible.";
        $mail->send();
    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
    }    

?>