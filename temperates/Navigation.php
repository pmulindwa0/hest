<?php

require_once 'core/init.php';

$user = new User();
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <img src="images/hest-logo.png" alt="images/Hest-logo.png" class="navbar-brand">
        <!-- <a class="navbar-brand" href="index.html">UMA HEST Portal</a> -->
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <?php /*if ($user->isLoggedIn() && ($user->data()->group == 1)) { */?><!--
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #333;"><i
                    class="fa fa-envelope"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu message-dropdown">
                <li class="message-preview">
                    <a href="#">
                        <div class="media" style="width: 200px;">
                                    <span class="pull-left">
                                        <img class="media-object" src="images/<?php /*echo $user->data()->photo; */?>"
                                             alt="" width="50" height="50">
                                    </span>

                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>

                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>

                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>

                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>

                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>

                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-preview">
                    <a href="#">
                        <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>

                            <div class="media-body">
                                <h5 class="media-heading"><strong>John Smith</strong>
                                </h5>

                                <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>

                                <p>Lorem ipsum dolor sit amet, consectetur...</p>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="message-footer">
                    <a href="#">Read All New Messages</a>
                </li>
            </ul>
            </li>--><?php /*} */?>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"
               style="text-transform: uppercase;font-weight: 700;font-size: 13px;color: #333;">
                <i class="fa fa-user fa-fw"></i> <?php if ($user->isLoggedIn()) {
                    echo escape($user->data()->fname);
                } ?> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <?php if ($user->isLoggedIn()) { ?>
                    <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>-->
                    <?php if ($user->data()->group == 2): ?>
                        <li><a href="update.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                    <?php endif ?>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                <?php }
                if (!$user->isLoggedIn()) { ?>
                    <li><a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Sign In</a>
                    </li>
                <?php } ?>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <!-- /.navbar-static-side -->
</nav>
