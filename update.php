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
            'company' => array(
                'required' => true,
                'min' => 2,
                'max' => 60
            ),
            'supervisor' => array(
                'min' => 2,
                'max' => 50
            ),
            'email' => array(
                'required' => true,
                'min' => 2,
                'max' => 60,
                'unique' => 'users'
            ),
        ));
        if ($validate->passed()) {

            try {
                $user->update(array(
                    'company_name' => Input::get('company'),
                    'company_supervisor' => Input::get('supervisor'),
                    'email' => Input::get('email'),
                    'sex' => Input::get('sex'),
                    'supervisor_number' => Input::get('supervisor_no'),
                    'course' => Input::get('course'),
                    'phone' => Input::get('phone')
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
                    Update User Profile
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Update User Profile
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i> Bank details can only be updated once. <strong>You can only update
                        them again after you have contacted the administrators</strong>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update user profile
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <h3>Company & Personal Details</h3>

                                <form role="form" action="" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label for="company">Course</label>
                                        <input class="form-control" id="course" name="course" type="text"
                                               value="<?php echo escape($user->data()->course); ?>" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-inline">
                                            <label for="msex">
                                                <input type="radio" name="sex" id="msex" value="male" 
                                                <?php echo ($user->data()->sex == "male") ? "checked" : " "; ?>
                                                >Male
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label for="fsex">
                                                <input type="radio" name="sex" id="fsex" value="female" 
                                                <?php echo ($user->data()->sex == "female") ? "checked" : " "; ?>
                                                >Female
                                            </label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="company">Company name</label>
                                        <input class="form-control" id="company" name="company" type="text"
                                               value="<?php echo escape($user->data()->company_name); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="supervisor">Company Supervisor</label>
                                        <input class="form-control" id="supervisor" name="supervisor" type="text"
                                               value="<?php echo escape($user->data()->company_supervisor); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="supervisor_no">Supervisor's Number</label>
                                        <input class="form-control" id="supervisor_no" name="supervisor_no" type="tel"
                                               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$"
                                               value="<?php echo escape($user->data()->supervisor_number); ?>">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa  fa-envelope"></i></span>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Email address"
                                               value="<?php echo escape($user->data()->email); ?>">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa  fa-phone"></i></span>
                                        <input type="tel" class="form-control" name="phone"
                                               placeholder="Your phone number"
                                               value="<?php echo escape($user->data()->phone); ?>"
                                               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h3>Bank Details</h3>
                                </br>
                                <form action="ac_update.php" method="post" autocomplete="off">
                                    <fieldset <?php if (isset($user->data()->account_no)): ?>
                                        <?php echo "disabled" ?>
                                    <?php endif; ?>>
                                    <div class="form-group">
                                        <label for="company">First name</label>
                                        <input class="form-control" id="fname" name="fname" type="text"
                                               value="<?php echo escape($user->data()->fname); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Last name</label>
                                        <input class="form-control" id="lname" name="lname" type="text"
                                               value="<?php echo escape($user->data()->lname); ?>">
                                    </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                                            <input type="text" class="form-control" name="bank" placeholder="Bank name"
                                                   value="<?php echo escape($user->data()->bank_name); ?>">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-bold"></i></span>
                                            <input type="text" class="form-control" name="branch"
                                                   placeholder="Bank Branch"
                                                   value="<?php echo escape($user->data()->bank_branch); ?>">
                                        </div>
                                        <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa fa-money"></i>
                                                </span>
                                            <input type="text" class="form-control" name="account_no"
                                                   placeholder="Bank Account number"
                                                   value="<?php echo escape($user->data()->account_no); ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </fieldset>
                                </form>
                            </div>

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->

                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="page-header">
                                    Update User Profile Image
                                </h3>

                                <form class="form-inline ajax" method="post" action="upload.php"
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="pic">Upload Profile Photo</label>
                                        <input type="file" id="pic" name="file" value="">

                                        <p class="help-block"><i class="text-warning">
                                                <small>The upload image should not exceed 2Mbs and should be either png
                                                    or jpg format
                                                </small>
                                            </i></p>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                        
        <?php
        require_once 'temperates/copyRight.php';
        ?>
    </div>
<?php
require_once 'temperates/footer.php';
?>