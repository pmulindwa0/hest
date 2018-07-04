<?php
require_once 'core/init.php';


if (!$username = Input::get('user')) {
    Redirect::to('login.php');
} else {
    $user = new User($username);
    if (!$user->exists()) {
        Redirect::to('404');
    } else {
        $data = $user->data();
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
    require_once 'temperates/Side_nav.php';
    ?>
</nav>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                    <span class="pull-left">
                                <img class="media-object" src="images/<?php echo escape($data->photo); ?>" alt=""
                                     width="50" height="50" style="border-radius: 50%;">
                            </span>
                &nbsp;
                <?php echo escape($data->fname) . " " . escape($data->lname);?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-user"></i> profile
                </li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i> <strong>Personal details</strong>
                </div>
                <div class="panel-body">
                    <address>
                        <strong>Identification</strong>
                        <br>Name: <?php echo escape($data->fname) . " " . escape($data->lname);?>
                        <br><abbr title="HEST Personal identification number">IP_no:</abbr>
                        <?php echo escape($data->username);?>
                        <br>
                        <small>
                            <!-- format('Y M d') -->
                            Start Date: <?php echo date('jS M Y', strtotime($data->joined));?>
                        </small>
                        <br>
                        Sex: <?php echo escape($data->sex);?>
                    </address>
                    <address>
                        <strong>Bank Account Details</strong>
                        <br>
                        Bank : <?php echo escape($data->bank_name);?>
                        <br>
                        Branch: <?php echo escape($data->bank_branch);?>
                        <br>
                        Number: <?php echo escape($data->account_no);?>
                    </address>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
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
                        <br>
                        <abbr title="Phone">Tel: </abbr><?php echo escape($data->phone);?>
                        <br>
                        Email: <a href="mailto:#"><?php echo escape($data->email);?></a>
                        <br>Residence: <?php echo escape($data->residence);?>
                    </address>
                    <address>
                        <strong>Next of kin</strong>
                        <br>Name: <?php echo escape($data->nkname);?>
                        <br>
                        <abbr title="Phone">Tel: </abbr><?php echo escape($data->nkphone);?>

                    </address>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-institution fa-fw"></i> <strong>Company Details</strong>
                </div>
                <div class="panel-body">
                    <strong>Campany name</strong>
                    <ul>
                        <li><?php echo escape($data->company_name);?></li>
                    </ul>
                    <strong>Campany Supervisor</strong>
                    <ul>
                        <li><?php echo escape($data->company_supervisor);?></li>
                    </ul>
                    <strong>Supervisor's contact</strong>
                    <ul>
                        <li><?php echo escape($data->supervisor_number);?></li>
                    </ul>

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-4 -->
        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Uploaded Reprots
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Report</th>
                                <th>Upload Date</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (isset($data->report_one)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>First Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($data->report_one_date)); ?></td>
                                    <td>
                                    <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_one"; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                            if (isset($data->report_two)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>First Month Report</th>
                                    <td><?php echo date('Y M jS', strtotime($data->report_two_date)); ?></td>
                                    <td>
                                        <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_two"; ?>"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($data->report_three)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>Second Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($data->report_three_date)); ?></td>
                                    <td>
                                        <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_three"; ?>"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($data->report_four)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>Second Month Report</th>
                                    <td><?php echo date('Y M jS', strtotime($data->report_four_date)); ?></td>

                                    <td>
                                        <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_four"; ?>"><i class="fa fa-trash"></i></a>

                                    </td>

                                </tr>
                            <?php }
                            if (isset($data->report_five)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>Third Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($data->report_five_date)); ?></td>
                                    <td>
                                        <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_five"; ?>"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($data->report_six)) { ?>
                                <tr class="odd gradeX">
                                    <th>Third Month Report</th>
                                    <td><?php echo date('Y M jS', strtotime($data->report_six_date)); ?></td>
                                    <td>
                                        <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_six"; ?>"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($data->report_seven)) {?>
                                <tr class="odd gradeX">
                                    <th>Forth Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($data->report_seven_date)); ?></td>
                                    <td>
                                        <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_seven"; ?>"><i class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($data->report_eight)) {?>
                            <tr class="odd gradeX">
                                <th>Forth Month Report</th>
                                <td><?php echo date('Y M jS', strtotime($data->report_eight_date)); ?></td>
                                <td>
                                    <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_eight"; ?>"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php }
                            if (isset($data->report_nine)) {?>
                            <tr class="odd gradeX">
                                <th> <a href="reports/<?php echo $data->report_nine; ?>" target="_blank"
                                       class="btn btn-default btn-circle" data-toggle="tooltip"
                                       title="Download Report">Fifth Month Targets</a></th>
                                <td><?php echo date('Y M jS', strtotime($data->report_nine_date)); ?></td>
                                <td>
                                <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_nine"; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php }
                            if (isset($data->report_ten)) {?>
                            <tr class="odd gradeX">
                                <th>Fifth Month Report</th>
                                <td><?php echo date('Y M jS', strtotime($data->report_ten_date)); ?></td>
                                <td>
                                    <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_ten"; ?>"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php }
                            if (isset($data->report_eleven)) {?>
                            <tr class="odd gradeX">
                                <th>Sixth Month Targets</th>
                                <td><?php echo date('Y M jS', strtotime($data->report_eleven_date)); ?></td>
                                <td>
                                    <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_eleven"; ?>"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php }
                            if (isset($data->report_twelve)) {?>
                            <tr class="odd gradeX">
                                <th>Sixth Month Report</th>
                                <td><?php echo date('Y M jS', strtotime($data->report_twelve_date)); ?></td>
                                <td>
                                    <a href="delete_report.php?uid=<?php echo $data->id; ?>&report=<?php echo "report_twelve"; ?>"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
    </div>
    <!-- /.row -->
    <?php
    require_once 'temperates/copyRight.php';
    ?>
</div>
<?php
}
require_once 'temperates/footer.php';
?>