<?php
require_once 'core/init.php';
$must_male = 0;
$muk_male = 0;
$kyu_male = 0;
$mubs_male = 0;
$gulu_male = 0;
$muni_male = 0;
$must_female = 0;
$muk_female = 0;
$kyu_female = 0;
$mubs_female = 0;
$gulu_female = 0;
$muni_female = 0;
$number = DB::getInstance()->query("
    SELECT sex, university_id, COUNT(*) AS student_count FROM users WHERE active = 1 GROUP BY university_id, sex
    ");
foreach ($number->results() as $number) {
    if ($number->university_id == 2 && $number->sex == "male") {
        $must_male = $number->student_count;
    }
    if ($number->university_id == 3 && $number->sex == "male") {
        $muk_male = $number->student_count;
    }
    if ($number->university_id == 4 && $number->sex == "male") {
        $kyu_male = $number->student_count;
    }
    if ($number->university_id == 5 && $number->sex == "male") {
        $mubs_male = $number->student_count;
    }
    if ($number->university_id == 6 && $number->sex == "male") {
        $gulu_male = $number->student_count;
    }
    if ($number->university_id == 7 && $number->sex == "male") {
        $muni_male = $number->student_count;
    }
    if ($number->university_id == 2 && $number->sex == "female") {
        $must_female = $number->student_count;
    }
    if ($number->university_id == 3 && $number->sex == "female") {
        $muk_female = $number->student_count;
    }
    if ($number->university_id == 4 && $number->sex == "female") {
        $kyu_female = $number->student_count;
    }
    if ($number->university_id == 5 && $number->sex == "female") {
        $mubs_female = $number->student_count;
    }
    if ($number->university_id == 6 && $number->sex == "female") {
        $gulu_female = $number->student_count;
    }
    if ($number->university_id == 7 && $number->sex == "female") {
        $muni_female = $number->student_count;
    }
}

$sex = DB::getInstance()->query("SELECT sex, COUNT(*) AS gender FROM users WHERE active = 1 GROUP BY sex");
foreach ($sex->results() as $sex) {
    if ($sex->sex == "male") {
        $male = $sex->gender;
        // echo $male;
    }
    if ($sex->sex == "female") {
        $female = $sex->gender;
        // echo $female;
    }
}
?>
<!DOCTYPE html>
<html>
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
    <script language="javascript" type="text/javascript" src="dist/excanvas.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"
            integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="
            crossorigin="anonymous"></script>
    <script language="javascript" type="text/javascript" src="dist/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="dist/jquery.jqplot.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/jquery.jqplot.css"/>
    <link rel="stylesheet" type="text/css" href="dist/jquery.jqplot.min.css"/>
    <link type="text/css" rel="stylesheet" href="dist/syntaxhighlighter/styles/shCoreDefault.min.css"/>
    <link type="text/css" rel="stylesheet" href="dist/syntaxhighlighter/styles/shThemejqPlot.min.css"/>
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <?php
    require_once 'temperates/Navigation.php';
    require_once 'temperates/Side_nav.php';
    ?>
</nav>
<div id="page-wrapper">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Statistical Overview
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="home">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-bar-chart-o"></i> Charts
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Females. Vs Males Chart
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="pie8"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Number of Students posted Per University
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="chart1"></div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {

        var s1 = [<?php  echo $must_male;?>, <?php  echo $mubs_male;?>, <?php  echo $muk_male;?>, <?php  echo $kyu_male;?>, <?php  echo $gulu_male;?>, <?php  echo $muni_male;?>];
        var s2 = [<?php  echo $must_female;?>, <?php  echo $mubs_female;?>, <?php  echo $muk_female;?>, <?php  echo $kyu_female;?>, <?php  echo $gulu_female;?>, <?php  echo $muni_female;?>];
        /*var s3 = [-260, -440, 320, 200];*/

        var ticks = ['MUST', 'MUBS', 'MUK', 'KYU', 'GULU', 'MUNI'];

        /*var line1 = [['MUST',
        <?php echo $must; ?>],['MUBS',
        <?php echo $mubs; ?>],['KYU',
        <?php echo $kyu; ?>],['MUK',
        <?php echo $muk; ?>],['GULU',
        <?php echo $gulu; ?>],['MUNI',
        <?php echo $muni; ?>],
         ['MUST', 3],['MUBS', 6],['KYU', 2],['MUK', 0],['GULU', 7],['MUNI', 9]];*/

        $('#chart1').jqplot([s1, s2], {
            title: 'Students per University',
            animate: true,
            seriesDefaults: {
                renderer: $.jqplot.BarRenderer,
                pointLabels: {show: true, edgeTolerance: -15},
                shadowAngle: 135,
                rendererOptions: {fillToZero: true}
            },
            series: [
                {label: 'Male'},
                {label: 'Female'}
            ],
            legend: {
                show: true,
                placement: 'outsideGrid'
            },

            axesDefaults: {
                tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                /*tickOptions: {
                 fontFamily: 'Georgia',
                 fontSize: '10pt',
                 angle: -30
                 }*/
            },
            axes: {
                // Use a category axis on the x axis and use our custom ticks.
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                },
                // Pad the y axis just a little so bars can get close to, but
                // not touch, the grid boundaries.  1.2 is the default padding.
                yaxis: {
                    pad: 1.05
                }
            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var s1 = [['Male', <?php echo $male ?>], ['Female', <?php echo $female ?>]];

        var plot8 = $.jqplot('pie8', [s1], {
            grid: {
                drawBorder: false,
                drawGridlines: false,
                background: '#ffffff',
                shadow: false
            },
            animate: true,
            axesDefaults: {},
            seriesDefaults: {
                renderer: $.jqplot.PieRenderer,
                rendererOptions: {
                    showDataLabels: true
                }
            },
            legend: {
                show: true,
                location: 'e'
            }
        });
    });
</script>

<!-- Don't touch this! -->

<script class="include" type="text/javascript" src="dist/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="dist/syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="dist/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="dist/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- End Don't touch this! -->


<!-- Additional plugins go here -->
<script type="text/javascript" src="dist/plugins/jqplot.dateAxisRenderer.min.js"></script>
<script type="text/javascript" src="dist/plugins/jqplot.canvasTextRenderer.min.js"></script>
<script type="text/javascript" src="dist/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>

<script language="javascript" type="text/javascript" src="dist/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="dist/plugins/jqplot.pointLabels.min.js"></script>
<script language="javascript" type="text/javascript" src="dist/plugins/jqplot.barRenderer.min.js"></script>
<script language="javascript" type="text/javascript" src="dist/plugins/jqplot.pieRenderer.min.js"></script>

<!-- End additional plugins -->

<!-- Bootstrap Core JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<!-- Metis Menu Plugin JavaScript -->
<script language="javascript" type="text/javascript" src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script language="javascript" type="text/javascript" src="vendor/raphael/raphael.min.js"></script>
<script language="javascript" type="text/javascript" src="vendor/morrisjs/morris.min.js"></script>
<script language="javascript" type="text/javascript" src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script language="javascript" type="text/javascript" src="dist/js/sb-admin-2.js"></script>


<script type="text/javascript" src="dist/example.min.js"></script>
</body>
</html>