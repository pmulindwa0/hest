<?php
require_once 'core/init.php';
$user = new User();

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $currentYear = date("Y");

    $un = DB::getInstance()->query("SELECT COUNT(*) AS num FROM users WHERE email = '$email' AND YEAR(registration_date) = '$currentYear'");
    $count = $un->first()->num;

    if ($count > 0) {
        echo "User already exists";
    }

}

/*
 	$uid = $_GET['uid'];
 	$unid = $_GET['unid'];

	$un = DB::getInstance()->query("UPDATE users SET account_no = NULL WHERE id = '$uid'");
     if ($un) {
         Session::flash('info', 'Account Edit has been Enabled.');
         Redirect::to('view_students.php?uid=' . $unid);
     }else{
        Session::flash('info', 'Oops!, Account Edit has not been enabled!, please true again');
        Redirect::to('view_students.php?uid=' . $unid);
     }*/