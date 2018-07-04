<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <img src="images/hest-logo.png" alt="images/Hest-logo.png" class="navbar-brand" width="150" height="90">
            <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="index.php">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php#about">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php#services">Objectives</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php#portfolio">Portfolio</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.php#team">Contact</a>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Reports <i class="fa fa-caret-down"></i>
                      <ul class="dropdown-menu">
                        <li>
                            <a class="page-scroll" href="yreports.php"><i class="fa fa-file-text-o"></i> Documents</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="statistics.php"><i class="fa fa-bar-chart-o"></i> Charts</a>
                        </li>
                      </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Database <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $un = DB::getInstance()->query("SELECT * FROM university");
                        foreach ($un->results() as $un) {
                            ?>

                            <li>
                                <a href="university.php? db=<?php echo $un->id; ?>"><strong><?php echo $un->name ?></strong></a>
                            </li>
                            <li class="divider"></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Sign In</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
