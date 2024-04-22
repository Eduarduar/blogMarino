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
        $mail->addAddress($correoDelUsuario);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Support DEEP OCEAN';
        $mail->Body = 'Hello '.$nombreDeUsuario.',<br> We have received a request to recover your password. <br> Click the button below to recover your password. <br> <a href="http://localhost/pruebas/blogMarino/resetpasword?code='.$code.'" style="background-color: #4CAF50; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block;">Recover Password</a> <br> If you did not request this change, please ignore this email. <br> Best regards, <br> Support DEEP OCEAN.';        $mail->send();

    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
    }    

?>