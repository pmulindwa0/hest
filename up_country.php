<?php
require_once 'core/init.php';
$user = new User();


$uid = $_GET['uid'];
$unid = $_GET['unid'];


$un = DB::getInstance()->query("UPDATE users SET up_country = 1 WHERE id = '$uid'");
if ($un) {
    Redirect::to('view_students.php?uid=' . $unid);
} else {
    Session::flash('info', 'Oops!, Something went wrong');
    Redirect::to('view_students.php?uid=' . $unid);
}