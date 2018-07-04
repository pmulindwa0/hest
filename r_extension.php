<?php
require_once 'core/init.php';
$user = new User();


$uid = $_GET['uid'];
$unid = $_GET['unid'];


$un = DB::getInstance()->query("UPDATE users SET extension = 0 WHERE id = '$uid'");
if ($un) {
    Session::flash('info', 'Extension has been successfully granted');
    Redirect::to('view_students.php?uid=' . $unid);
} else {
    Session::flash('info', 'Oops!, Something went wrong');
    Redirect::to('view_students.php?uid=' . $unid);
}



