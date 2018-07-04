<?php
require_once 'core/init.php';

$user = new User();

if (Input::exists()) {
    $validate = new Validation();
    $validate = $validate->check($_POST, array(
        'account_no' => array(
            'required' => true
        ),
        'bank' => array(
            'required' => true
        ),
        'branch' => array(
            'required' => true
        ),
    ));
    if ($validate->passed()) {

        try {
            $user->update(array(
                'account_no' => Input::get('account_no'),
                'bank_name' => Input::get('bank'),
                'lname' => Input::get('lname'),
                'fname' => Input::get('fname'),
                'bank_branch' => Input::get('branch')
            ));
            /*'account_no'=>Input::get('account_no'),
            'bank_name' => Input::get('bank'),
            'bank_branch' => Input::get('branch')*/

            Session::flash('info', 'You have successfully updated your profile');
            Redirect::to('update.php');

        } catch (Exception $e) {
            Session::flash('info', 'Unable to updated your profile');

        }
    } else {
        Session::flash('info', $validate->errors()[0]);
    }
}