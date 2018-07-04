<?php
/**
 *
 */
require 'vendor/PHPMailer/PHPMailerAutoload.php';

class Mail
{

    public static function isSent($email, $name, $subject, $body)
    {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->Username = 'pmulindwa0@gmail.com';
        $mail->Password = '0774917932';

        $mail->isHTML();

        $mail->AddAddress('pmulindwa0@gmail.com', 'mulindwa peter');

        $mail->From = $email;
        $mail->FromName = $name;
        $mail->Subject = $subject;
        $mail->Body = $body;
        $isSent = $mail->send();

        return $isSent;
    }

}
