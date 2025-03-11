<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

if($_POST){
    $asunto=$_POST['asunto'];
    $descripcion=$_POST['email'];
    $mensaje=$_POST['mensaje'];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'libs/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'josemartinezanguita26@gmail.com';                     //SMTP username
    $mail->Password   = 'cfvlcaudmrulosgl';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('remitente@gmail.com', 'Julián');
    $mail->addAddress('josemartinezanguita26@gmail.com', 'José Martínez');     //Add a recipient
    

    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $email;
    $mail->Body    = $mensaje;
    

    $mail->send();
    header("Location:index.php");
    echo "correo enviado";
} catch (Exception $e) {
    echo "error en el envio: {$mail->ErrorInfo}";
}