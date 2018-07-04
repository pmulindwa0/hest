<?php

require_once 'core/init.php';
$account = new User();

if ($account->isLoggedIn()) {
    Redirect::to('home');
}
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="dist/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .navbar-default .navbar-header .navbar-brand {
            height: 55px;
            padding: 5px;
        }

        .navbar-default .nav > li > a, .navbar-default .nav > li > a:focus {
            color: #222;
        }

        /* header .header-content .header-content-inner h1 {
            color: black;
        }
        header .header-content .header-content-inner p {
            color: blue;
        } */
        #copyright {
            overflow: hidden;
            padding: 5em 0em;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }

        #copyright span {
            display: block;
            letter-spacing: 0.20em;
            line-height: 2.5em;
            text-align: center;
            text-transform: uppercase;
            font-size: 0.80em;
            color: rgba(0, 0, 0, 0.7);
        }

        #copyright a {
            text-decoration: none;
            color: rgba(0, 0, 0, 0.9);
        }
    </style>

    <title>UMA HEST Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">
    <!-- <link href="dist/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

<?php
  require_once 'temperates/nav.php'
 ?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <!-- Database -->
                    <?php
                    $uid = $_GET['db'];
                    $male = 0;
                    $female = 0;
                    $dbn = 0;
                    $completed = 0;
                    require_once 'includes/stat.php';
                    $counter = DB::getInstance()->query("SELECT sex, COUNT(*) AS student_count FROM users WHERE university_id = '$uid' AND active = 1 GROUP BY sex");
                    foreach ($counter->results() as $counter) {

                        if ($counter->sex == "male") {
                            $male = $counter->student_count;
                        }
                        if ($counter->sex == "female") {
                            $female = $counter->student_count;
                        }
                        $dbn = $female + $male;

                    }
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
                        <i class="fa fa-home"></i> <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-database"></i> <?php echo $dbn; ?> Out of <?php echo $number; ?>
                    </li>
                    <li class="active">
                        <i class="fa fa-male"></i> <?php echo $male; ?> Male
                    </li>
                    <li class="active">
                        <i class="fa fa-female"></i> <?php echo $female; ?> Female
                    </li>
                </ol>
            </div>
        </div>
        <div class="row" id="details">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Students Records
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <!-- /.table-responsive -->

                            <table width="100%" class="table table-striped table-bordered table-hover"
                                   id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="no-sort">Photo</th>
                                    <th class="no-sort">First Name</th>
                                    <th class="no-sort">Last Name</th>
                                    <th>Sex</th>
                                    <th>Course</th>
                                    <th>Company</th>
                                    <th class="no-sort">Report(s)</th>
                                    <th class="no-sort">Start date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $uid = $_GET['db'];

                                $user = DB::getInstance()->query("SELECT * FROM users WHERE university_id = '$uid'AND active = 1 ORDER BY registration_date DESC");
                                foreach ($user->results() as $user) {
                                if ($user->group == 2): ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <?php if (isset($user->photo)): ?>
                                            <img src="images/<?php echo $user->photo; ?>" alt="profile pic" width="50"
                                                 height="50" style="border-radius: 50%;"/>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $user->fname; ?></td>
                                    <td><?php echo $user->lname; ?></td>
                                    <td><?php echo $user->sex; ?></td>
                                    <td><?php echo $user->course; ?></td>
                                    <td><?php echo $user->company_name; ?></td>
                                    <td class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-eye fa-fw"></i> <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user pull-right">
                                            <?php
                                            if (isset($user->report_one)) {
                                                ?>
                                                <li><a href="reports/<?php echo $user->report_one; ?>" target="_blank">1st
                                                        month targets
                                                        <small class=" text-muted"><i
                                                                class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_one_date)); ?>
                                                        </small>
                                                    </a>

                                                </li>
                                            <?php
                                            }
                                            if (isset($user->report_two)) {
                                                ?>
                                                <li><a href="reports/<?php echo $user->report_two; ?>" target="_blank">1st
                                                        month report
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
                                                <li><a href="reports/<?php echo $user->report_four; ?>" target="_blank">
                                                        2nd month report
                                                        <small class=" text-muted"><i
                                                                class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_four_date)); ?>
                                                        </small>
                                                    </a></li>
                                            <?php
                                            }
                                            if (isset($user->report_five)) {
                                                ?>
                                                <li><a href="reports/<?php echo $user->report_five; ?>" target="_blank">3rd
                                                        month targets
                                                        <small class=" text-muted"><i
                                                                class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_five_date)); ?>
                                                        </small>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                            if (isset($user->report_six)) {
                                                ?>
                                                <li><a href="reports/<?php echo $user->report_six; ?>" target="_blank">3rd
                                                        month report
                                                        <small class=" text-muted"><i
                                                                class="fa fa-clock-o fa-fw"></i><?php echo date('jS M, Y', strtotime($user->report_six_date)); ?>
                                                        </small>
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </td>
                                    <td><?php if (isset($user->joined)):
                                            echo date('Y M jS', strtotime($user->joined));
                                        endif;
                                        endif;
                                        } ?></td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>

    </div>
</section>
<div id="copyright">
    <span>&copy; 2016. All rights reserved. | for UMA HEST</a></span>
    <span>Developed by <a href="#" rel="nofollow">ABERCOM TECHNOLOGIES(U) Ltd</a>.</span>
</div>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Theme JavaScript -->
<script src="js/creative.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>


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
