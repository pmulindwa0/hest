<?php
require_once 'core/init.php';
$db = DB::getInstance();

$user = new User();
$sender = $user->data()->id;
$reciever = $user->data()->university_id;


if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validate = $validate->check($_POST, array(
            'query' => array(
                'required' => true,
                'min' => 3,
                'max' => 300
            )
        ));

        if ($validate->passed()) {
            $db->insert('queries', array(
                'query' => Input::get('query'),
                'sender' => $sender,
                'reciever' => $reciever
            ));

            Session::flash('info', 'Your query has been successfully sent, wait for reply....');
            Redirect::to('home.php');

        } else {
            // output errors
            Session::flash('info', $validation->errors()[0]);
        }
    }

}

?>

