<?php
require_once 'core/init.php';
$user = new User();


$uid = $_GET['uid'];
$unid = $_GET['unid'];

$currentdate = date("Y");
if ($unid == 2) {
    $cons = "MUST";
}
if ($unid == 3) {
    $cons = "MAK";
}
if ($unid == 4) {
    $cons = "KYU";
}
if ($unid == 5) {
    $cons = "MUBS";
}
if ($unid == 6) {
    $cons = "GULU";
}
if ($unid == 7) {
    $cons = "MUNI";
}
if ($unid == 8) {
    $cons = "UMI";
}
if ($unid == 9) {
    $cons = "LIRA";
}
if ($unid==10) {
    $cons = "BUS";
}

$data_count = DB::getInstance()->query("SELECT COUNT(*) AS std_count FROM users WHERE university_id = '$unid' AND YEAR(joined) = '$currentdate'");

$count = $data_count->first()->std_count;
$num = $count + 1;
$user_selected = new User($uid);

$ip = "IP";
$m = date("F");
$n = date("n");
$ipNo = $ip . "" . date("y") . "" . $cons . "/" . $uid . "/" . $m[0] . "" .$n;

$chars = "abcdefghijklmnopqprstuvxwABCDEFGHJKLMNOPQRSTUVWXWZ0123456789!&*?";
$password = substr(str_shuffle($chars), 0, 6);

$un = DB::getInstance()->query("UPDATE users SET username = '$ipNo', password = '$password', active = 1, joined = NOW() WHERE id = '$uid'");
if ($un) {
require_once('vendor/PHPMailer/PHPMailerAutoload.php');
require_once('vendor/PHPMailer/class.phpmailer.php');

ini_set("SMTP", "ssl://smtp.gmail.com");
ini_set("smtp_port", "465");

$mail = new PHPMailer();
$mail->CharSet = "UTF-8";
$mail->isSMTP();
$email = $user_selected->data()->email;
    $name = $user_selected->data()->fname;

// enable SMTP authentication
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;
// GMAIL username
$mail->Username = "umahest.system@gmail.com";
// GMAIL password
$mail->Password = "hestsystem";
$mail->SMTPSecure = "ssl";
// sets GMAIL as the SMTP server
$mail->Host = "smtp.gmail.com";
// set the SMTP port for the GMAIL server
$mail->Port = "465";
$mail->From = 'umahest.system@gmail.com';
$mail->FromName = 'UMA-HEST';
$mail->AddAddress($email);
$mail->Subject = 'UMA-HEST account activation';
$mail->IsHTML(true);
$mail->Body = 'Your HEST Account has been activated, password: <strong>' . $password . '</strong><br> Username/IPNo: ' . $ipNo;
if ($mail->Send()) {
        Session::flash('info', $name . '`s account successfully activated Username: ' . $ipNo . ' Password: ' . $password);
        Redirect::to('view_students.php?uid=' . $unid);
    }
    else{
        Session::flash('info', $name . '`s account successfully activated Username: '. $ipNo . ' Password: ' . $password);
        Redirect::to('view_students.php?uid=' . $unid);
    }

} else {
    Session::flash('info', 'Oops!, Account not activated, please true again');
    Redirect::to('view_students.php?uid=' . $unid);
}



