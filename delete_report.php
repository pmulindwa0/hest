<?php
require_once 'core/init.php';
$user = new User();


$uid = $_GET['uid'];
$report = $_GET['report'];

$un = DB::getInstance()->query("UPDATE users SET $report = NULL WHERE id = '$uid'");
if ($un) {
    Session::flash('info', 'Report deleted successfully.');
    Redirect::to('profile.php? user=' . $uid);
} else {
    Session::flash('info', 'Oops!, Unable to delete report');
    Redirect::to('profile.php?uid=' . $uid);
}