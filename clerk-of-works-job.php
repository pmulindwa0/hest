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
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'> -->

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/job/slick.css">  
    <link rel="stylesheet" href="css/job/main.css">
    <link rel="stylesheet" href="css/job/responsive.css">
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
<section id="contact" style="padding: 0;">
    <div class="job-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                        CLERK OF WORKS (COW)
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="job-summary section">
                        <span class="tr-title"><strong>Background</strong></span>
                        <p>Uganda Manufacturers Association (UMA) in partnership with the Ministry of Education Science
                            Technology and Sports (MoESTS) with support from the African Development Bank (AfDB) is
                            running an internship program under the Higher Education Science and Technology (HEST)
                            Project. The main goal of the project is to improve skills of 2000 interns from eight public Benefiting Institutions.</p>
                        <p>UMA invites Applicants for clerks of works under the AfDB Apprenticeship program to work on the following construction sites  for a period of 6 months</p>
                        <ul class="tr-list">
                            <li>1.Kyambogo- Science and technology Centre</li>
                            <li>2.Kyambogo- BIC</li>
                            <li>3.Kyambogo engineering blocks</li>
                            <li>4.MUBS</li>
                            <li>5.Nagongera- Busitema Lecture/ laboratory store</li>
                            <li>6.Mbarara University- Kihumuro hostel and Buhoma HC</li>
                            <li>7.Gulu- BIC</li>
                        </ul>
                        <span><strong>Key Responsibilities:</strong></span>
                        <p>The duties of the COW are varied and extensive and include all aspects of on-site contract administration.</p>
                        <p>
                            The COW will inspect any part of the work under construction at any time as well as any material to be used either on the site or in storage. He will order, with the approval of the Project Manager, testing of samples of the materials in an approved laboratory to ascertain whether or not they comply with the specification. Defective work or material not complying with the specifications should be reported to the Project Manager, so that instructions can be issued to the contractor for the work to be rectified and or the materials to be replaced.
                        </p>
                        <span><strong>Minimum Requirements</strong></span>
                        <ul class="tr-list">
                            <li>Bachelor's Degree in architecture, Quantity Surveying, Civil Engineering or related field in building construction</li>
                            <li>Prior work experience in capacity such as clerk of the works will be of added advantage</li>
                            <li>Ability to read and interpret architectural and engineering drawings, specifications, codes, and other material pertinent to construction.</li>
                            <li>Working knowledge of building components and systems.</li>
                            <li> Knowledge of construction materials, means and methods.</li>
                            <li>Knowledge of applicable state and federal building codes.</li>
                            <li>Excellent written and oral communication skills and ability to establish and maintain professional working relationships.</li>
                            <li>Ability to wear/use personal protective equipment as needed on construction site.</li>
                            <li>NB:<i>**Female applicants are highly encouraged.**</i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <div class="tr-sidebar">
                        <div class="widget-area">
                            <div class="widget short-info">
                                <h3 class="widget_title">Note</h3>
                                <ul class="tr-list">
                                    <li><div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                                    <div class="media-body"><span>Deadline:</span><?php echo date_format(date_create("2018-1-12 5:00:00 PM"), "F d, Y h:i:s A"); ?></div></li>
                                    <li><div class="pull-left"><i class="fa fa-user-plus" aria-hidden="true"></i></div> <div class="media-body"><span>Job positions:</span>7</div></li> 
                                    <li><div class="pull-left"><i class="fa fa-line-chart" aria-hidden="true"></i></div> <div class="media-body"><span>Experience:</span>Entry level</div></li>
                                    <li><div class="pull-left"><i class="fa fa-clock-o" aria-hidden="true"></i></div> <div class="media-body"><span>Duration:</span>6 months minimum</div></li>
                                </ul>
                            </div><!-- /.widger -->
                            <div class="widget cmpany-info">
                                <h3 class="widget_title">How to Apply</h3>
                                <p>All suitably qualified and interested candidates should submit their application, and an updated resume to the;</p>
                                <ul class="tr-list">
                                    <li><span>Internship Placement Officer</span></li>
                                    <li><span>UMA-HEST Project</span></li>
                                    <li><span>Address:</span> P.O Box 6966,</li>
                                    <li>Lugogo Show Grounds</li>
                                    <li>Kampala</li>
                                    <li><span>Email:</span> <a href="#">ipo@uma.or.ug</a></li>
                                    <li><span></span></li>
                                </ul>
                                <p><i>**Indicate the construction site of interest**</i></p>
                            </div><!-- /.widger -->
                        </div><!-- /.widget-area -->
                    </div><!-- /.tr-sidebar -->
                </div>
            </div><!-- row -->     
        </div><!-- /.container -->
    </div><!-- /.tr-details --> 
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
