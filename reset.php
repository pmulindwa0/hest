<?php
require_once 'core/init.php';

$chars = "abcdefghijklmnopqprstuvxwABCDEFGHJKLMNOPQRSTUVWXWZ0123456789!&?";
$password = substr(str_shuffle($chars), 0, 6);

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $data_count = DB::getInstance()->query("SELECT COUNT(*) AS std_count FROM users WHERE email = '$email'");

    $count = $data_count->first()->std_count;
    if ($count > 0) {

        require_once('vendor/PHPMailer/PHPMailerAutoload.php');
        require_once('vendor/PHPMailer/class.phpmailer.php');

        ini_set("SMTP", "ssl://smtp.gmail.com");
        ini_set("smtp_port", "465");

        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->isSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;
        // GMAIL username
        $mail->Username = "pmulindwa0@gmail.com";
        // GMAIL password
        $mail->Password = "0774917932";
        $mail->SMTPSecure = "ssl";
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From = 'pmulindwa0@gmail.com';
        $mail->FromName = 'UMA-HEST';
        $mail->AddAddress($email);
        $mail->Subject = 'Reset Password';
        $mail->IsHTML(true);
        $mail->Body = 'Your HEST password has been reset to: ' . $password . '</strong><br> You can now login with this password and change to your preferred password';
        if ($mail->Send()) {
            $un = DB::getInstance()->query("UPDATE users SET password = '$password' WHERE email = '$email'");
            if ($un) {
                Session::flash('info', 'Check your Email to reset password');
                Redirect::to('login.php');
            }
        } else {
            Session::flash('info', 'Ooops.. Unable to reset password');
            Redirect::to('login.php');
        }
    }
}

?>