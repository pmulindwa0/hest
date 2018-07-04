 <?php
require_once 'core/init.php';
$account = new User();

if (!$account->isLoggedIn()) {
    Redirect::to('login.php');
} elseif ($account->data()->group == 2) {
    Redirect::to('404');
}
require_once 'temperates/header.php';
$uid = $_GET['uid'];
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
            <?php

            $male = 0;
            $female = 0;
            $dbn = 0;
            $completed = 0;

            if (isset($_POST['search'])) {
                if ($_POST['search'] == "placed") {
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND active = 1 GROUP BY sex");
                }
                if ($_POST['search'] == "extension") {
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND extension = 1 GROUP BY sex");
                }
                if ($_POST['search'] == "up-country") {
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND up_country = 1 GROUP BY sex");
                }
                if ($_POST['search'] == "not-placed") {
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND active = 0 GROUP BY sex");
                }
                if ($_POST['search'] == "report_one") {
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND report_two IS NOT NULL GROUP BY sex");
                }
                if ($_POST['search'] == "report_two") {
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND report_four IS NOT NULL GROUP BY sex");
                }
                if ($_POST['search'] == "report_three") {
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND report_six IS NOT NULL GROUP BY sex");
                }
            } else {
                $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' GROUP BY sex");
            }
            /***********/
            /*$counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' GROUP BY sex");*/
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
            <h1 class="page-header">

                <?php
                $un = DB::getInstance()->query("SELECT * FROM university WHERE id = '$uid'"); ?>
                <span class="pull-left">
                                <img class="media-object" src="img/<?php echo $un->first()->logo; ?>" alt="" width="50"
                                     height="50">
                            </span>
                &nbsp;
                <?php
                echo $un->first()->name;
                ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-eye"></i> View Students
                </li>
            </ol>
        </div>
    </div>
    <!-- /*********************************************************************************************/ -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-md-6">
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
                <a href="#details">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-6">
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
                <a href="#details">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-md-6">
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
                <a href="#details">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <!--<div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php /*echo $completed; */ ?></div>
                                        <div>Completed!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#details">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>-->
    </div>
    <!-- /*********************************************************************************************/ -->
    <div class="row" id="details">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Students Records
                    <form class="pull-right" method="post" action="view_students.php? uid=<?php echo $uid; ?>">
                        <select name="search" id="search_filter">
                            <option value="">--Filter--</option>
                            <option value="report_one">1st Month Report</option>
                            <option value="report_two">2nd Month Report</option>
                            <option value="report_three">3rd Month Report</option>
                            <option value="extension">Extension</option>
                            <option value="up-country">Up-Country</option>
                            <option value="placed">Placed</option>
                            <option value="not-placed">Not Placed</option>
                        </select>
                        <input class="btn btn-info btn-xs" type="submit" value="Filter">
                    </form>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <!-- /.table-responsive -->

                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th class = "no-sort">First Name</th>
                                <th class = "no-sort">Last Name</th>
                                <th>Course</th>
                                <th>Company</th>
                                <th class = "no-sort">Phone</th>
                                <th>Start date</th>
                                <th class = "no-sort">Reports</th>
                                <th class = "no-sort">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($_POST['search'])) {
                                if ($_POST['search'] == "placed") {
                                    $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' AND active = 1 ORDER BY registration_date DESC");
                                }
                                if ($_POST['search'] == "extension") {
                                    $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' AND extension = 1 ORDER BY registration_date DESC");
                                }
                                if ($_POST['search'] == "up-country") {
                                    $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' AND up_country = 1 ORDER BY registration_date DESC");
                                }
                                if ($_POST['search'] == "not-placed") {
                                    $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' AND active = 0 ORDER BY registration_date DESC");
                                }
                                if ($_POST['search'] == "report_one") {
                                    $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' AND report_two IS NOT NULL ORDER BY registration_date DESC");
                                }
                                if ($_POST['search'] == "report_two") {
                                    $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' AND report_four IS NOT NULL ORDER BY registration_date DESC");
                                }
                                if ($_POST['search'] == "report_three") {
                                    $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' AND report_six IS NOT NULL ORDER BY registration_date DESC");
                                }
                            } else {
                                $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid' ORDER BY registration_date DESC");
                            }

                            foreach ($user->results() as $user) {
                                if ($user->group == 2): ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $user->fname; ?></td>
                                        <td><?php echo $user->lname; ?></td>
                                        <td><?php echo $user->course; ?></td>
                                        <td><?php echo $user->company_name; ?></td>
                                        <td><?php echo $user->phone; ?></td>
                                        <td><?php if (isset($user->joined)):
                                                echo date('Y M jS', strtotime($user->joined));
                                            endif; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    Report(s)
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu pull-right" role="menu">
                                                    <?php
                                                    if (isset($user->report_one)) {
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_one; ?>"
                                                               target="_blank">1st month targets
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_one_date)); ?>
                                                                </small>
                                                            </a>

                                                        </li>
                                                    <?php
                                                    }
                                                    if (isset($user->report_two)) {
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_two; ?>"
                                                               target="_blank">1st month report
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_two_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }
                                                    if (isset($user->report_three)) {
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_three; ?>"
                                                               target="_blank">2nd month targets
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_three_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }
                                                    if (isset($user->report_four)) {
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_four; ?>"
                                                               target="_blank"> 2nd month report
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_four_date)); ?>
                                                                </small>
                                                            </a></li>
                                                    <?php
                                                    }
                                                    if (isset($user->report_five)) {
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_five; ?>"
                                                               target="_blank">3rd month targets
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_five_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }
                                                    if (isset($user->report_six)) {
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_six; ?>"
                                                               target="_blank">3rd month report
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_six_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }
                                                    if(isset($user->report_seven)):
                                                    ?>
                                                        <li><a href="reports/<?php echo $user->report_seven; ?>"
                                                               target="_blank">4th month targets
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_seven_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php endif;
                                                    if(isset($user->report_eight)):
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_eight; ?>"
                                                               target="_blank">4th month report
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_eight_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php endif;
                                                    if(isset($user->report_nine)):
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_nine; ?>"
                                                               target="_blank">5th month targets
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_nine_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php endif;
                                                    if(isset($user->report_ten)):
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_ten; ?>"
                                                               target="_blank">5th month report
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_ten_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php endif;
                                                    if(isset($user->report_eleven)):
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_eleven; ?>"
                                                               target="_blank">6th month targets
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_eleven_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php endif;
                                                    if(isset($user->report_twelve)):
                                                        ?>
                                                        <li><a href="reports/<?php echo $user->report_twelve; ?>"
                                                               target="_blank">6th month report
                                                                <small class=" text-muted"><i
                                                                        class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_twelve_date)); ?>
                                                                </small>
                                                            </a>
                                                        </li>
                                                    <?php endif;?>
                                                    </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-circle dropdown-toggle"
                                                        data-toggle="dropdown" title="More Actions">
                                                    <i class="fa fa-caret-down"></i>
                                                </button>
                                                <ul class="dropdown-menu slidedown pull-right">
                                                    <li>
                                                        <a href="profile.php? user=<?php echo $user->id; ?>">
                                                            <i class="fa fa-user fa-fw"></i> View Profile
                                                        </a>
                                                    </li>
                                                    <?php
                                                    if ($user->extension == 0):
                                                        ?>
                                                        <li>
                                                            <a href="g_extension.php? uid=<?php echo $user->id;?>&unid=<?php echo $uid;?>"
                                                               class="ajax" id="g_extension">
                                                                <i class="fa fa-plus-circle fa-fw"></i> Grant Extension
                                                            </a>
                                                        </li><!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>-->
                                                    <?php endif;
                                                    if ($user->extension == 1):
                                                        ?>
                                                        <li>
                                                            <a href="r_extension.php? uid=<?php echo $user->id;?>&unid=<?php echo $uid;?>"
                                                               class="ajax" id="r_extension">
                                                                <i class="fa fa-ban fa-fw"></i> Revoke Extension
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (isset($user->account_no)): ?>
                                                        <li>
                                                            <a href="acEdit.php? uid=<?php echo $user->id; ?>&unid=<?php echo $uid; ?>"
                                                               class="ajax" id="account">
                                                                <i class="fa fa-edit fa-fw"></i> Enable A/C Edit
                                                            </a>
                                                        </li>
                                                    <?php endif;
                                                    if ($user->up_country == 0):?>
                                                        <li>
                                                            <a href="up_country.php? uid=<?php echo $user->id;?>&unid=<?php echo $uid;?>"
                                                               class="ajax" id="up_country">
                                                                <i class="fa fa-plus-circle fa-fw"></i> Up-country
                                                            </a>
                                                        </li>
                                                    <?php
                                                    endif;

                                                    if ($user->active == 1) { ?>
                                                        <li>
                                                            <a href="deactivate.php? uid=<?php echo $user->id; ?>&unid=<?php echo $uid; ?>"
                                                               class="ajax" id="deactivate"><i class="fa fa-times"></i>
                                                                Deactivate Account</a></li>

                                                    <?php } elseif ($user->active == 0) { ?>
                                                        <li>
                                                            <a href="activate.php? uid=<?php echo $user->id; ?>&unid=<?php echo $uid; ?>"><i
                                                                    class="fa fa-check"></i> Activate Account</a></li>
                                                    <?php } ?>
                                                    <li>
                                                        <a href="delete.php? uid=<?php echo $user->id; ?>&unid=<?php echo $uid; ?>"><i class="fa fa-trash"></i>
                                                                Delete Account</a></li>
                                                </ul>
                                            </div>
                                            <!-- <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-circle dropdown-toggle" data-toggle="dropdown" title = "Leave a comment">
                                                <i class="fa fa-comment"></i>
                                            </button>
                                            <form class="dropdown-menu pull-right" role="form" method = "" action = "comment.php">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="4"></textarea>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <button  type="button" class="btn btn-link"> <strong>Send</strong><i class="fa fa-arrow-right"></i></button>
                                                <input type="submit" value="Send Comment <i class="fa fa-angle-right"></i>" class="btn btn-default">
                                                </div>
                                            </form>
                                            </div> -->
                                        </td>
                                    </tr>
                                <?php
                                endif;
                            }
                            ?>

                            </tbody>
                        </table>
                        <div id="dialog"></div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div id="copyright">
        <span>&copy; Copy Right. All rights reserved. | to UMA HEST project</a></span>
        <span>Developed by <a href="#" rel="nofollow">ABERCOM TECHNOLOGIES(U) Ltd</a>.</span>
    </div>

</div>

<!-- jQuery -->
<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery.js"></script> -->
<!--<script src="https://code.jquery.com/jquery-3.1.0.js"
        integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="
        crossorigin="anonymous"></script>-->
<script src="dist/js/jquery-3.1.0.js"></script>
<script src="dist/js/jquery-ui.js"></script>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<!-- hover text -->
<script src="vendor/hover/hoverText.js"></script>

<!-- Bootstrap Core JavaScript -->
<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

<script src="dist/js/bootstrap.min.js"></script>

<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>-->

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="action.js"></script>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true,
            "order": [],
            "columnDefs": [ {
                "targets": 'no-sort',
                "orderable": false
            } ]
        });
    });
</script>

</body>

</html>
