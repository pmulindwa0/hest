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
  require_once 'temperates/nav.php';
 ?>
<div>

</div>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Annual Training and Placement Reports
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i> <a href="index.php">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-cloud-upload"></i>Reports
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Placement Reports</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#2015-p" data-toggle="tab">2015</a>
                                </li>
                                <li><a href="#2016-p" data-toggle="tab">2016</a>
                                </li>
                                <li><a href="#2017-p" data-toggle="tab">2017</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="2015-p">
                                    <h4><b>2015 Reports</b></h4>
                                    <p>
                                        <ul>
                                            <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/muk.pdf" target="_blank">Makerere University</a></button></li>
                                            <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/mubs.pdf" target="_blank">Makerere University Business School</a></button></li>
                                            <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/kyu.pdf" target="_blank">Kyambogo University</a></button></li>
                                            <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/must.pdf" target="_blank">Mbarara University of Science And Technology</a></button></li>
                                            <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/gulu.pdf" target="_blank">Gulu University</a></button></li>
                                            <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/bus.pdf" target="_blank">Busitema University</a></button></li>
                                        </ul>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="2016-p">
                                    <h4><b>2016 Reports</b></h4>
                                    <p>
                                         <ul>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/muk.pdf" target="_blank">Makerere University</a></button></li>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/mubs.pdf" target="_blank">Makerere University Business School</a></button></li>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/kyu.pdf" target="_blank">Kyambogo University</a></button></li>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/must.pdf" target="_blank">Mbarara University of Science And Technology</a></button></li>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/gulu.pdf" target="_blank">Gulu University</a></button></li>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/bus.pdf" target="_blank">Busitema University</a></button></li>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/lira.pdf" target="_blank">Lira University</a></button></li>
                                           <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/muni.pdf" target="_blank">Muni University</a></button></li>
                                        </ul>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="2017-p">
                                    <h4><b>2017 Reports</b></h4>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Training and General placement Reports</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#2015-t" data-toggle="tab">2015</a>
                                </li>
                                <li><a href="#2016-t" data-toggle="tab">2016</a>
                                </li>
                                <li><a href="#2017-t" data-toggle="tab">2017</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="2015-t">
                                    <h4><b>2015 Reports</b></h4>
                                    <p>
                                        <ul>
                                          <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/general.pdf" target="_blank">General Placement Report</a></button></li>
                                          <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2015/training.pdf" target="_blank">Training Report</a></button></li>
                                        </ul>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="2016-t">
                                    <h4><b>2016 Reports</b></h4>
                                    <p>
                                        <ul>

                                          <li><button type="button" class="btn btn-outline btn-link"><a href="reports/2016/training.pdf" target="_blank">Training Report</a></button></li>
                                        </ul>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="2017-t">
                                    <h4><b>2017 Reports</b></h4>
                                    <p>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->

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

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>



</body>

</html>
