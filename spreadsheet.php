<?php
require_once 'core/init.php';
$account = new User();

if (!$account->isLoggedIn()) {
    Redirect::to('login.php');
} elseif ($account->data()->group == 2) {
    Redirect::to('404');
}

require_once 'temperates/header.php';
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
            <h1 class="page-header">
                Export Students Data to a spread sheet
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-share-square-o"></i> Export
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Filter Students basing on the registration date
                </div>
                <!-- .panel-heading -->
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Export all
                                        students <b class="caret"></b></a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <!-- /.table-responsive -->
                                        <div class="col-lg-12">

                                            <form class="navbar-form navbar-left" role="search" method="post"
                                                  action="excel_all.php" autocomplete="off">
                                                <div class="form-group">
                                                    <label for="from">Filter From:</label>
                                                    <input type="text" class="form-control datepicker" id="datepicker"
                                                           name="from" placeholder="mm/dd/yyy">
                                                </div>

                                                &nbsp;
                                                <div class="form-group">
                                                    <label for="to">To:</label>
                                                    <input type="text" class="form-control datepicker" id="to" name="to"
                                                           placeholder="mm/dd/yyy">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Export</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Export
                                        students basing on report submission<b class="caret"></b></a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <!-- /.table-responsive -->

                                        <div class="col-lg-12">

                                            <form class="form-inline" role="search" method="post" action="excel.php"
                                                  autocomplete="off">
                                                <div class="form-group">
                                                    <label for="from2">Filter From:</label>
                                                    <input type="text" class="form-control datepicker" id="form2"
                                                           name="from" placeholder="mm/dd/yyy">
                                                </div>

                                                <div class="form-group">
                                                    <label for="to2">To:</label>
                                                    <input type="text" class="form-control datepicker" id="to2"
                                                           name="to" placeholder="mm/dd/yyy">
                                                </div>
                                                <div class="form-group">
                                                    <label for="report">Report:</label>
                                                    <select id="report" class="form-control" name="report">
                                                        <option>Null</option>
                                                        <option value="report_one">1st month targets</option>
                                                        <option value="report_two">1st month report</option>
                                                        <option value="report_three">2nd month targets</option>
                                                        <option value="report_four">2nd month report</option>
                                                        <option value="report_five">3rd month targets</option>
                                                        <option value="report_six">3rd month report</option>
                                                        <option value="report_seven">4th month targets</option>
                                                        <option value="report_eight">4th month report</option>
                                                        <option value="report_nine">5th month targets</option>
                                                        <option value="report_ten">5th month report</option>
                                                        <option value="report_eleven">6th month targets</option>
                                                        <option value="report_twelve">6th month report</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Export</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Coming soon<b
                                            class="caret"></b></a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                                <div class="panel-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .panel-body -->
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
<!-- <script src="vendor/jquery/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker();
    });
</script>

<!-- hover text -->
<script src="vendor/hover/hoverText.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
