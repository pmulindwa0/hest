<?php
require_once 'core/init.php';
$user = new User();
?>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <div id="logo">
                    <a href="#">
                        <img src="images/<?php echo $user->data()->photo; ?>" alt="profile pic"/>
                    </a>
                </div>
                <br>
            </li>

            <li>
                <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <?php if ($user->data()->group == 1) { ?>
                <li>
                    <a href="graph.php"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-table fa-fw"></i> View Students<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php
                        $university = $user->data()->university_id;
                        $university = DB::getInstance()->query("SELECT * FROM university WHERE id = '$university'");
                        foreach ($university->results() as $university) { ?>
                            <li>
                                <a href="view_students.php? uid=<?php echo $university->id; ?>"><?php echo $university->name; ?></a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </li>
                <li>
                    <a href="register.php"><i class="fa fa-edit fa-fw"></i>Register Student</a>
                    <!-- <ul class="nav nav-second-level">
                        <li>
                          <a href="register">Student</a>
                        </li>
                        <li>
                          <a href="#">Administrator</a>
                        </li>
                    </ul> -->
                </li>
                <li>
                    <a href="spreadsheet.php"><i class="fa fa-share-square-o fa-fw"></i> Export</a>
                </li>
            <?php }
            if ($user->data()->group == 2) { ?>
                <li>
                    <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="update.php">Update Profile</a>
                        </li>
                        <li>
                            <a href="changepassword.php">Change Password</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="reports/temperates/Logbook.docx" target="_blank"><i class="fa fa-download fa-fw"></i>
                        Report Format</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="report.php">Upload Report</a>
                        </li>
                        <li>
                            <a href="view_report.php">View Reports</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
        
