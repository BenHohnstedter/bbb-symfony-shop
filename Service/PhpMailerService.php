<?php

namespace App\Service;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class PhpMailerService
{
    public function createMail($ordering): void
    {
        // Load Composer's autoloader
        require 'vendor/autoload.php';

        // Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // Server settings
            //            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                                //Enable verbose debug output
            $mail->isSMTP();                                                            // Send using SMTP
            $mail->Host = 'mailhog';                                                        // Set the SMTP server to send through
            $mail->SMTPAuth = false;                                                // Enable SMTP authentication
            //            $mail->Username = 'user@example.com';                                 //SMTP username
            //            $mail->Password = 'secret';                                           //SMTP password
            //            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                      //Enable implicit TLS encryption
            $mail->Port = 1025;                                                     // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom('bbb.shop@info-help.com', 'Bens-Batterien-Boerse');
            $mail->addAddress(
                $ordering->getUser()->getEmail(),
                $ordering->getUser()->getFirstname().' '.$ordering->getUser()->getLastname()
            );     // Add a recipient
            $mail->addReplyTo('bbb.shop@info-help.com', 'dein Rechnungsbescheid');

            // Attachments
            $mail->addAttachment('Resource/Bill/'.$ordering->getPdf(), 'dein-rechnungsbescheid.pdf');         // Add attachments

            $randNum = rand(0, 1000);
            // Content
            $mail->isHTML(true);                                                    // Set email format to HTML
            $mail->Subject = 'Deine Bestellung bei BBB - Nr. '.$randNum;
            $mail->Body =
                '<p style="font-size: 20px; font-weight: bolder">Deine Bestellung bei <a href="https://bbb.shop.dev/index.php">Bens Batterien Börse</a> ist eingegangen.<br>
                Bitte überweisen die den Betrag, den Sie im Anhang finden.<br>
                Danach ist die Ware auf den Weg zu ihnen.</p>';
            $mail->AltBody = 'Deine Bestellung bei Bens Batterien Börse ( https://bbb.shop.dev/index.php ) ist eingegangen.
Bitte überweisen die den Betrag, den Sie im Anhang finden.
Danach ist die Ware auf den Weg zu ihnen.';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

// https://youtu.be/GmCFeLhA-fA?feature=shared
