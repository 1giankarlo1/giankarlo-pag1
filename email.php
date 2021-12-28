<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'files.000webhost.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'https://giankarlo-pag1.herokuapp.com';                     //SMTP username
    $mail->Password   = 'Iconorap199';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('https://giankarlo-pag1.herokuapp.com', 'Iconorap199'); // Hacer coincidir con el username. (preferentemente)
    $mail->addAddress('evilfoxoficial20@gmail.com', 'Marco teran');
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'inforamacion del formulario: '.$_POST['inp_nombre'];
    $mail->Body    = 
        'Nombre: '.$_POST['inp_nombre'].
        '<br>Apellido: '.$_POST['inp_apellido'].
        '<br>Pais: '.$_POST['inp_pais'].
        '<br>Direccion: '.$_POST['inp_dir'].
        '<br>Ciudad: '.$_POST['inp_ciudad'].
        '<br>Codigo Postal: '.$_POST['inp_postal'].
        '<br>Mensaje: '.$_POST['inp_mensaje'];
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location: gracias.html");
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location: error.html");
}

?>