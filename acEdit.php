<?php
require_once 'core/init.php';
$user = new User();


$uid = $_GET['uid'];
$unid = $_GET['unid'];

$un = DB::getInstance()->query("UPDATE users SET account_no = NULL WHERE id = '$uid'");
if ($un) {
    Session::flash('info', 'Account Edit has been Enabled.');
    Redirect::to('view_students.php?uid=' . $unid);
} else {
    Session::flash('info', 'Oops!, Account Edit has not been enabled!, please true again');
    Redirect::to('view_students.php?uid=' . $unid);
}



