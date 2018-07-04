<?php
require_once 'core/init.php';

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('login.php');
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validate = $validate->check($_POST, array(
            'old_password' => array(
                'required' => true
            ),
            'new_password' => array(
                'required' => true,
                'min' => 6,
                'max' => 20
            ),
            'new_password_again' => array(
                'required' => true,
                'matches' => 'new_password'
            )
        ));
        if ($validate->passed()) {
            if (Input::get('old_password') != $user->data()->password) {
                Session::flash('info', 'Your old password input is wrong');
            } else {
                try {
                    $user->update(array(
                        'password' => Input::get('new_password')
                    ));

                    Session::flash('info', 'You have successfully changed your password');
                    Redirect::to('home.php');

                } catch (Exception $e) {
                    Session::flash('info', 'Oops!, The system couldn`t change your password, Please try again');

                }
            }

        } else {
            Session::flash('info', $validate->errors()[0]);
        }
    }
}
require_once 'temperates/header.php';
?>
    <div id="page-wrapper">
        <?php
        if (Session::exists('info')) { ?>
            <div class="alert alert-info">
                <?php
                echo Session::flash('info');
                ?>
            </div>
        <?php
        } ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Change Password
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="home">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Change Password
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <form role="form" action="" method="post" autocomplete="off">
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="old_password">Old Password</label>
                                        <input class="form-control" id="old_password" name="old_password"
                                               type="password" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input class="form-control" id="new_password" name="new_password"
                                               type="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_again">New Password Again</label>
                                        <input class="form-control" id="new_password_again" name="new_password_again"
                                               type="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Change password</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            </form>


                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <?php
        require_once 'temperates/copyRight.php';
        ?>
    </div>
<?php
require_once 'temperates/footer.php';
?>