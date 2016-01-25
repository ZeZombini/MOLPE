
<?php

require 'class.phpmailer.php';
require 'class.phpmaileroauth.php';
require 'class.phpmaileroauthgoogle.php';
require 'class.smtp.php';


function sendMail($mail, $message){



$mail = new PHPMailer;

//$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; 		      // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'no.reply.molpe@gmail.com';                 // SMTP username
$mail->Password = '0258794613';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('no.reply.molpe@gmail.com', 'Mailer');
$mail->addAddress('$mail');     // Add a recipient

$mail->isHTML(false);                                  // Set email format to HTML

$mail->Subject = 'Bienvenue sur Molpe !';
$mail->Body = '$message';

/*if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}*/

}
?>

