<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Mailer     = "smtp";
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'patricia.corduant@gmail.com';
    $mail->Password   = '<Liberty2000>';
    $mail->setFrom('patricia.corduant@gmail.com');           //Votre mail
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('support@hackers-poulette.com', 'Hackers Poulette Support Team');
    $mail->addAddress($email, 'Client de Hackers poulette');
    $mail->addAddress($email, $firstname);

    // Content
    $body = "
        <p>
            Hello " . $firstname . "!<br>
            Thank you for reaching out to us.<br>
            Your form was successfully submitted.<br>
            We will get back to you as soon as possible.<br>
            Take care.<br>
        </p>
        <p></p>
        <p><i>Hackers Poulette Support Team.</i></p><br>
        <p></p>
        <p>Here is a recap of your form:</p>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;First Name: " . $firstname . "<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Last Name: " . $lastname . "<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Gender: " . $gender . "<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Email address: " . $email . "<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Country: " . $country . "<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Subject: " . $subject . "<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Message: " . $message . "<br>
        </p>
    ";

    $mail->isHTML(true);
    $mail->Subject = 'Hackers Poulette Contact Form';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);
    $mail->send();
    echo 'message envoyé';

    $email_sent = '
        <div class="alert alert-success" role="alert">
            Your message was sent successfully!<br>
            Thank you for contacting us.
        </div>
    ';
} catch (Exception $e) {
    $email_not_sent = '
        <div class="alert alert-danger" role="alert">
            Your message could not be sent.<br>
            Mailer Error: ' . $mail->ErrorInfo . '
        </div>
    ';
}