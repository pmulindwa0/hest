<?php

require_once 'core/init.php';
$account = new User();

if ($account->isLoggedIn()) {
    Redirect::to('home.php');
}
require_once 'includes/stat.php';
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
    <style type="text/css">
        .navbar-default .navbar-header .navbar-brand {
            height: 55px;
            padding: 5px;
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

        .img-centered {
            margin: 0 auto;
        }

        .bg-light-gray {
            background-color: #eeeeee;
        }

        .bg-darkest-gray {
            background-color: #222222;
        }

        .team-member {
            text-align: center;
            margin-bottom: 50px;
        }

        .team-member img {
            margin: 0 auto;
            border: 7px solid white;
        }

        .team-member h4 {
            margin-top: 25px;
            margin-bottom: 0;
            text-transform: none;
        }

        .team-member p {
            margin-top: 0;
        }

        .overlay {
            position: absolute;
            bottom: 100%;
            left: 0;
            right: 0;
            background-image: url('img/banner.jpg');
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: .5s ease;
        }

        .member:hover .overlay {
            bottom: 0;
            height: 100%;
        }

        .text {
            /*white-space: nowrap; */
            color: #000000;
            /* font-size: 20px; */
            /*position: absolute;*/
            /* overflow: hidden;
            top: 5%;
            left: 20%;
             transform: translate(-50%, -50%);
             -ms-transform: translate(-50%, -50%); */
        }

    </style>

    <title>UMA HEST Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.css" /> -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css" />

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
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link type="text/css" rel="stylesheet" href="css/media.css" />

    <!-- news ticker plugin -->
    <link href="css/ticker-style.css" rel="stylesheet" type="text/css" />

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

<header>
    <div class="header-content">
        <div class="header-content-inner">
          <h1 id="homeHeading">UMA-HEST Project</h1>
          <hr>
          <p style="color: #222222; font-weight: 500;"><strong>With the aim of improving the skills of over 2,000 graduates, Uganda Manufacturers Association in partnership with the Ministry of Education and Sports with support from African Development Bank is running an internship program</strong></p>
          <a class="btn btn-default btn-xl sr-button" href="login.php">Sign In</a>
        </div>
      </div>
</header>
<!-- start -->
<!-- <div class="container-fluid" style="background-color: #6a98af;">
    <div class="row">
        <marquee style="color: white;">Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor!</marquee>
    </div>
</div> -->
<!-- <div class="container-fluid" style="background-color: #f1f1f1;">
    <ul id="js-news" class="js-hidden">
        <li class="news-item"><a href="#">This is the 1st latest news item.</a></li>
        <li class="news-item"><a href="#">This is the 2nd latest news item.</a></li>
        <li class="news-item"><a href="#">This is the 3rd latest news item.</a></li>
        <li class="news-item"><a href="#">This is the 4th latest news item.</a></li>
    </ul>
</div> -->
<!-- end -->
<!-- see -->
<div id="wrapper">
<div class="container">
<section class="infograph" id="about">
<sup class="styler_bg_color"></sup>
<div class="header styler_color" style="text-transform: uppercase;">About the Project</div>
<div class="row">
<div class="col-md-3 col-xs-3 col-sm-3">
    <div class="graph">
        <div class="graph_inner">
            <div class="large_num styler_color"><?php echo $numberAll; ?></div>
        </div>
    </div>
    <div class="desc styler_bg_color">
        <i class="styler_border_color"></i>
        <div class="name">TRAINED</div>
        <div class="text">Number of students Trained from all the 9 institutions</div>
    </div>
</div>
<div class="col-md-3 col-xs-3 col-sm-3">
    <div class="graph">
        <div class="graph_inner">
            <div class="progress_bars_with_image styler_infograph" data-number="8" data-value="5" data-icon="icon-male" data-height="40" data-color="#0eae9b"></div>
            <div class="progress_bars_with_image_title styler_color"><?php echo $number; ?> out of <?php echo $numberAll; ?></div>
        </div>
    </div>
    <div class="desc styler_bg_color">
        <i class="styler_border_color"></i>
        <div class="name">PLACEMENT</div>
        <div class="text">Of the <?php echo $numberAll; ?> students inducted, <?php echo $number; ?> have been attached to 600 companies</div>
    </div>
</div>
<div class="col-md-3 col-xs-3 col-sm-3">
    <div class="graph">
        <div class="graph_inner">
            <div class="progress_bars_caption styler_color">MALE</div>
            <div class="progress_bars horizontal style1 styler_infograph" data-width="220" data-height="15" data-color="#0eae9b" data-title="inner" data-value="64%"></div>
            <div class="progress_bars_caption styler_color">FEMALE</div>
            <div class="progress_bars horizontal style1 styler_infograph" data-width="220" data-height="15" data-color="#0eae9b" data-title="inner" data-value="36%"></div>
            <!-- <div class="progress_bars_caption styler_color">INFO GRAPHICS</div>
            <div class="progress_bars horizontal style1 styler_infograph" data-width="220" data-height="15" data-color="#0eae9b" data-title="inner" data-value="50%"></div> -->
        </div>
    </div>
    <div class="desc styler_bg_color">
        <i class="styler_border_color"></i>
        <div class="name">GENDER</div>
        <div class="text">The project has benefited both male and female students.</div>
    </div>
</div>
<div class="col-md-3 col-xs-3 col-sm-3">
    <div class="graph">
        <div class="graph_inner">
            <div class="easy-pie-chart styler_infograph" data-percent="41" data-trackColor="#6ed1ff" data-color="#0eae9b" data-lineWidth="25" data-size="126" data-cap="butt"></div>
        </div>
    </div>
    <div class="desc styler_bg_color">
        <i class="styler_border_color"></i>
        <div class="name">EMPLOYMENT</div>
        <div class="text">Over 41% of the graduate interns placed are currently employed.</div>
    </div>
</div>
</div>
</section>
<section id="services" class="infograph7">
    <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-6">
            <ul class="styled_list" data-color="#e19957, #d66659, #b53536" data-type="process_box">
                <li>
                    <div class="name">UMA-HEST Project</div>
                    <div class="desc">A project of ministry of Education, implemented by UMA, Funded by African Development Bank (AfDB).</div>
                </li>
                <li>
                    <div class="name">GOAL</div>
                    <div class="desc">To improve the skills of over 2000 Graduate interns</div>
                </li>
                <li>
                    <div class="name" style="font-size: 150%;">Benefiting Institutions</div>
                    <div class="desc">Kyambogo University, Busitema University, Makerere University, Gulu University, Lira University, Mbarara University of Science and Technology, Muni University,Uganda Management Institute & Makerere University Business School</div>
                </li>
             </ul> 
        </div>
        <div class="col-md-6 col-xs-12 col-sm-6">
            <div class="progress_bars_with_numbers">
                <div class="item">
                    <div class="progress_bars vertical style1" data-height="190" data-width="137" data-color="#d64b4c" data-title="bottom" data-value="90%"></div>
                    <div class="desc styler_color" style="color: #0fc6b0; font-weight: bold;">Students offering Science and Technology Courses</div>
                </div>
                <div class="item">
                    <div class="progress_bars vertical style1" data-height="190" data-width="137" data-color="#eda636" data-title="bottom" data-value="10%"></div>
                    <div class="desc" style="color: #0fc6b0; font-weight: bold;">Students offering Arts Courses.</div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
<!-- see -->

<section class="no-padding" id="portfolio">
    <div class="container-fluid">
        <div class="row no-gutter popup-gallery">
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">

                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <small>Internship at Steel and Tube industries</small>
                            </div>
                            <div class="project-name">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/2.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">

                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <small>Induction training at Mbarara university of Science and Technology</small>
                            </div>
                            <div class="project-name">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/3.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">

                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <small>Makerere University interns at a site construction in Lugazi</small>
                            </div>
                            <div class="project-name">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/4.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">

                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <small>ITO carrying out support supervision</small>
                            </div>
                            <div class="project-name">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/5.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/5.jpg" class="img-responsive" alt="">

                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <small>
                                    ITO carrying out support supervision at friendship containers
                                </small>
                            </div>
                            <div class="project-name">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a href="img/portfolio/fullsize/6.jpg" class="portfolio-box">
                    <img src="img/portfolio/thumbnails/6.jpg" class="img-responsive" alt="">

                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-category text-faded">
                                <small>
                                    ITO and IPO during support supervision at steel and tube industries
                                </small>
                            </div>
                            <div class="project-name">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<aside class="bg-dark">
    <div class="container text-center">
        <div class="call-to-action">
            <h2>Sign in to the internship report web Portal!</h2>
            <a href="login.php" class="btn btn-default btn-xl sr-button">Sign In Now!</a>
        </div>
    </div>
</aside>
<!-- Team Section -->
<?php
require_once('team.php');

require_once 'temperates/copyRight.php';
?>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<!--  <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- <script src="vendor/scrollreveal/scrollreveal.min.js"></script> -->
<!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->

<!-- Theme JavaScript -->
<script src="js/creative.min.js"></script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->
<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1.js"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script>
<script type="text/javascript" src="js/library.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script src="js/jquery.ticker.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function () {
        $('#js-news').ticker();
    });
</script>
</body>

</html>
