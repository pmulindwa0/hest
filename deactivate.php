<?php
require_once 'core/init.php';
$user = new User();


$uid = $_GET['uid'];
$unid = $_GET['unid'];

$un = DB::getInstance()->query("UPDATE users SET username = NULL, password = NULL, joined = NULL, active = 0  WHERE id = '$uid'");
if ($un) {
    Session::flash('info', 'User account has been deactivated.');
    Redirect::to('view_students.php?uid=' . $unid);
} else {
    Session::flash('info', 'Oops!, Account Deactivation Failure!, please true again');
    Redirect::to('view_students.php?uid=' . $unid);
}



