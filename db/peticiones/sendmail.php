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
        $htmlContent = <<<HTML
            <!DOCTYPE html>
            <html lang="es">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
            body, html {
                margin: 0;
                padding: 0;
                font-family: 'Arial', sans-serif;
            }
            .container {
                width: 100%;
                max-width: 600px;
                margin: auto;
                background-color: #f9f9f9;
                color: #333;
                border: 1px solid #ddd;
            }
            .header {
                background-color: #004173;
                color: #fff;
                padding: 10px;
            }
            .main-content {
                padding: 20px;
            }
            .footer {
                background-color: #004173;
                color: #fff;
                text-align: center;
                padding: 10px;
                font-size: 12px;
            }
            .button {
                display: inline-block;
                padding: 10px 20px;
                margin: 10px 0;
                background-color: #0066cc;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
            }
            img {
                max-width: 100%;
                height: 100px;
                width: 100px;
            }
            </style>
            </head>
            <body>
            <div class="container">
                <div class="header">
                <img src="https://drive.google.com/uc?export=view&id=1J2A62YcrxlMh12RKp35CN_vhdOPZDAbE" class="header-image">
                <h1>Support Deep Ocean</h1>
                </div>
                <div class="main-content">
                <h2>Reset Password</h2>
                <p>Hello $nombreDeUsuario,<br>We have received a request to recover your password.<br><br>Click the button below to recover your password.<br><br><a href="http://localhost/pruebas/blogMarino/resetpassword?code=$code" style="background-color: #0979b0; color: white; padding: 14px 20px; text-align: center; text-decoration: none; display: inline-block;">Recover Password</a><br><br>If you did not request this change, please ignore this email.<br>Best regards,<br>Support DEEP OCEAN.</p>
                </div>
                <div class="footer">
                <p>Copyright © 0000 All Rights Reserved by [NAME].</p>
                </div>
            </div>
            </body>
            </html>
        HTML;

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Support DEEP OCEAN';
        $mail->Body = $htmlContent;
        $mail->send();

    } catch (Exception $e) {
        echo '<script>alert("Message could not be sent. Mailer Error: {$mail->ErrorInfo}")</script>';
    }    

?>