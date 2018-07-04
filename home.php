<?php

require_once 'core/init.php';

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('login.php');
}

?>

<?php
require_once 'temperates/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <?php
            if (Session::exists('info')) { ?>
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i>
                    <?php
                    echo Session::flash('info');
                    ?>
                </div>
            <?php
            } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
    <!-- ***************** -->
    <?php
    $uid = $user->data()->university_id;
    $male = 0;
    $female = 0;
    $dbn = 0;
    $completed = 0;
    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' GROUP BY sex");
    foreach ($counter->results() as $counter) {

        if ($counter->sex == "male") {
            $male = $counter->student_count;
        }
        if ($counter->sex == "female") {
            $female = $counter->student_count;
        }
        $dbn = $female + $male;
    }
    $std_complete = DB::getInstance()->query("SELECT COUNT(*) AS std_count FROM users WHERE university_id = '$uid' AND completed = 1");

    $completed = $std_complete->first()->std_count;
    ?>
    <?php if ($user->data()->group == 1): ?>


        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-database fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $dbn; ?></div>
                                <div>Database!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#details" data-toggle="modal">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-female fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $female; ?></div>
                                <div>Female!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#details" data-toggle="modal">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-male fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $male; ?></div>
                                <div>Male!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#details" data-toggle="modal">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php endif ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info">
                <i class="fa fa-info-circle"></i> <strong>Welcome to the HEST Report Web portal...</strong>
            </div>
        </div>
    </div>
    <!-- ***************** -->
    <?php if ($user->data()->group == 2) { ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user fa-fw"></i> <strong>Personal details</strong>
                    </div>
                    <div class="panel-body">
                        <address>
                            <strong>Identification</strong>
                            <br>Name: <?php echo escape($user->data()->fname) . " " . escape($user->data()->lname); ?>
                            <br><abbr title="HEST Personal identification number">IP_no:</abbr>
                            <?php echo escape($user->data()->username); ?>
                            <br>
                            <small>
                                <!-- format('Y M d') -->
                                Start Date: <?php echo date('jS M Y', strtotime($user->data()->joined)); ?>
                            </small>
                            <br>
                            Sex: <?php echo escape($user->data()->sex); ?>
                        </address>
                        <address>
                            <strong>Bank Account Details</strong>
                            <br>
                            Bank : <?php echo escape($user->data()->bank_name); ?>
                            <br>
                            Branch: <?php echo escape($user->data()->bank_branch); ?>
                            <br>
                            Number: <?php echo escape($user->data()->account_no); ?>
                        </address>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
                <!-- /.panel -->
                    <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-institution fa-fw"></i> <strong>Company Details</strong>
                        </div>
                        <div class="panel-body">
                            <strong>Campany name</strong>
                            <ul>
                                <li><?php echo escape($user->data()->company_name); ?></li>
                            </ul>
                            <strong>Campany Supervisor</strong>
                            <ul>
                                <li><?php echo escape($user->data()->company_supervisor); ?></li>
                            </ul>
                            <strong>Supervisor's contact</strong>
                            <ul>
                                <li><?php echo escape($user->data()->supervisor_number); ?></li>
                            </ul>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-phone fa-fw"></i> <strong>Contact Information</strong>
                    </div>
                    <div class="panel-body">
                        <address>
                            <strong>Contacts</strong>
                            <br>Name: <?php echo escape($user->data()->fname) . " " . escape($user->data()->lname); ?>
                            <br>
                            <abbr title="Phone">Tel: </abbr><?php echo escape($user->data()->phone); ?>
                            <br>
                            Email: <a href="mailto:#"><?php echo escape($user->data()->email); ?></a>
                        </address>
                        <address>
                            <strong>Next of kin</strong>
                            <br>Name: <?php echo escape($user->data()->nkname); ?>
                            <br>
                            <abbr title="Phone">Tel: </abbr><?php echo escape($user->data()->nkphone); ?>

                        </address>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        <!-- /.row -->
    <?php } ?>

    <div id="copyright">
        <span>&copy; Copy Right. All rights reserved. | for UMA HEST</a></span>
        <span>Developed by <a href="#" rel="nofollow">ABERCOM TECHNOLOGIES(U) Ltd</a>.</span>
    </div>
</div>
<?php
require_once 'temperates/footer.php';
?>
