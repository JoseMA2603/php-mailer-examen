<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

if($_POST){
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'libs/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'paginaswebifcd@gmail.com';                     //SMTP username
    $mail->Password   = 'ekheppkkfjzycjgp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('remitente@gmail.com', 'José Martínez');
    $mail->addAddress(' paginaswebifcd@gmail.com', 'Laura García'); 



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = "<h3>Detalles del mensaje</h3>
                      <p><strong>Nombre:</strong> $nombre</p>
                      <p><strong>Teléfono:</strong> $telefono</p>
                      <p><strong>Email:</strong> $email</p>
                      <p><strong>Mensaje:</strong> $descripcion</p>";


    $mail->send();
    header("Location:index.php");
    echo 'correo ha sido enviado';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

echo "<script>
Swal.fire({
    icon: 'success',
    title: '¡Correo enviado!',
    text: 'Tu mensaje ha sido enviado correctamente.',
}).then(() => {
    window.location.href='index.php';
});
</script>";

if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
    $mail->addAttachment($_FILES['archivo']['tmp_name'], $_FILES['archivo']['name']);
}


?>
