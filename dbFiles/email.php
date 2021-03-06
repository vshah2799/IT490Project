<?php
require '/home/vshah/Desktop/IT490Project/vendor/phpmailer/phpmailer/src/Exception.php';
require '/home/vshah/Desktop/IT490Project/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '/home/vshah/Desktop/IT490Project/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$emailToMail = $argv[1];

try {
    //Server settings                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'shahitproject@gmail.com';                     //SMTP username
    $mail->Password   = 'abcd123EFGH';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('shahitproject@gmail.com', 'Car Recalls');
    $mail->addAddress("$emailToMail");     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Your car has recall(s) that have not been fixed';
    $mail->Body    = 'Visit <a href="~/Desktop/IT490Project/index.php">it.project.com</a> to check the recalls on your car';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    
    $errorString = "EMAIL_PHP: Message could not be sent. Mailer Error: {$mail->ErrorInfo} \n";
    shell_exec("php ~/Desktop/IT490Project/RABBITMQloggingRabbitMQClient.php $errorString");
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}









