<?php
require_once 'core/init.php';
$user = new User();


if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    /*file property*/
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    /*file extension*/
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed = array('png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG');

    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 2097152) {
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                $file_destination = "images/" . $file_name_new;

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    $uid = $user->data()->id;

                    $un = DB::getInstance()->query("UPDATE users SET photo = '$file_name_new' WHERE id = '$uid'");
                    if ($un) {
                        Session::flash('info', 'Profile picture set successfully');
                        Redirect::to('update.php');
                    } else {
                        Session::flash('info', 'Oops!, Unable to set profile picture');
                        Redirect::to('update.php');
                    }
                }
            } else {
                Session::flash('info', 'The upload file should not exceed 60Kbs');
                Redirect::to('update.php');
            }
        }
    } else {
        Session::flash('info', 'The upload file type should either be JPG or PNG');
        Redirect::to('update.php');
    }
} else {
    Session::flash('info', 'Select file to be uploaded');
    Redirect::to('update.php');
}