<?php
require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));
        if ($validation->passed()) {
            // login user
            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login) {
                Redirect::to('home.php');
            } else {

                Session::flash('info', 'Oops.. something went wrong, login failure!');

            }
        } else {
            Session::flash('info', $validation->errors()[0]);
            // foreach ($validation->errors() as $error) {
            //     Session::flash('info', $error);
            // }
        }
    }
}
// echo Config::get('mysql/host');
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/uma-logo.png">

        <title>UMA HEST Portal</title>

        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php
    require_once 'temperates/Navigation.php';
    // require_once 'temperates/Side_nav.php';
    ?>
</nav>
<div class="container">
    <!-- <div class="row">
        <div class="col-md-offset-4">
            <h1 class="page-header">Login</h1>
        </div>
    </div> -->

    <div class="row">
        <?php
        if (Session::exists('info')) { ?>
            <div class="alert alert-info">
                <?php
                echo Session::flash('info');
                ?>
            </div>
        <?php
        } ?>
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Login</strong></h3>
                </div>
                <div class="panel-body">
                    <form role="form" autocomplete="off" action="" method="post">
                        <fieldset>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa  fa-user"></i></span>
                                <input class="form-control" placeholder="IP-NUMBER/ USERNAME" name="username"
                                       type="text" autofocus autocomplete="off">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa  fa-lock"></i></span>
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       value="" autocomplete="off">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">

                        </fieldset>
                    </form>

                    <button class="btn btn-outline btn-link" data-toggle="modal" data-target="#myModal">
                        Forgot Password?
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                                </div>
                                <div class="modal-body">
                                    <form role="form" autocomplete="off" action="reset.php" method="post">
                                        <fieldset>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="fa  fa-envelope-o"></i></span>
                                                <input class="form-control" placeholder="Enter Account Email Address"
                                                       name="email" type="email" autofocus autocomplete="off" required>
                                            </div>
                                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Reset">

                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <?php
    require_once 'temperates/copyRight.php';
    ?>
</div>

<?php
require_once 'temperates/footer.php';
?>