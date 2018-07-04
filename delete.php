<?php
require_once 'core/init.php';

$db = DB::getInstance();
if (isset($_GET['uid'])) {

    $uid = $_GET['uid'];
    $unid = $_GET['unid'];

    $db->delete('users', array('id', '=', $uid));
    if ($db->count()) {

        Session::flash('info', 'You have successfully removed a student');
        Redirect::to('view_students.php?uid=' . $unid);
    }
}
 