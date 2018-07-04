<?php
require_once 'core/init.php';
require_once 'temperates/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Uploaded Reports
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-eye"></i> View Reports
                </li>
            </ol>
        </div>
    </div>
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
                                <th>Download</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $user = new User();
                            ?>
                            <?php
                            if (isset($user->data()->report_one)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>First Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($user->data()->report_one_date)); ?></td>
                                    <td>
                                        <a href="reports/<?php echo $user->data()->report_one; ?>" target="_blank"
                                           class="btn btn-default btn-circle" data-toggle="tooltip"
                                           title="Download Report"><i class="fa fa-download"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($user->data()->report_two)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>First Month Report</th>
                                    <td><?php echo date('Y M jS', strtotime($user->data()->report_two_date)); ?></td>
                                    <td>
                                        <a href="reports/<?php echo $user->data()->report_two; ?>" target="_blank"
                                           class="btn btn-default btn-circle" data-toggle="tooltip"
                                           title="Download Report"><i class="fa fa-download"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($user->data()->report_three)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>Second Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($user->data()->report_three_date)); ?></td>
                                    <td>
                                        <a href="reports/<?php echo $user->data()->report_three; ?>" target="_blank"
                                           class="btn btn-default btn-circle" data-toggle="tooltip"
                                           title="Download Report"><i class="fa fa-download"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($user->data()->report_four)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>Second Month Report</th>
                                    <td><?php echo date('Y M jS', strtotime($user->data()->report_four_date)); ?></td>

                                    <td>
                                        <a href="reports/<?php echo $user->data()->report_four; ?>" target="_blank"
                                           class="btn btn-default btn-circle" data-toggle="tooltip"
                                           title="Download Report"><i class="fa fa-download"></i></a>

                                    </td>

                                </tr>
                            <?php }
                            if (isset($user->data()->report_five)) {
                                ?>
                                <tr class="odd gradeX">
                                    <th>Third Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($user->data()->report_five_date)); ?></td>
                                    <td>
                                        <a href="reports/<?php echo $user->data()->report_five; ?>" target="_blank"
                                           class="btn btn-default btn-circle" data-toggle="tooltip"
                                           title="Download Report"><i class="fa fa-download"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($user->data()->report_six)) { ?>
                                <tr class="odd gradeX">
                                    <th>Third Month Report</th>
                                    <td><?php echo date('Y M jS', strtotime($user->data()->report_six_date)); ?></td>
                                    <td>
                                        <a href="reports/<?php echo $user->data()->report_six; ?>" target="_blank"
                                           class="btn btn-default btn-circle" data-toggle="tooltip"
                                           title="Download Report"><i class="fa fa-download"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($user->data()->report_seven)) {?>
                                <tr class="odd gradeX">
                                    <th>Forth Month Targets</th>
                                    <td><?php echo date('Y M jS', strtotime($user->data()->report_seven_date)); ?></td>
                                    <td>
                                        <a href="reports/<?php echo $user->data()->report_seven; ?>" target="_blank"
                                           class="btn btn-default btn-circle" data-toggle="tooltip"
                                           title="Download Report"><i class="fa fa-download"></i></a>

                                    </td>
                                </tr>
                            <?php }
                            if (isset($user->data()->report_eight)) {?>
                            <tr class="odd gradeX">
                                <th>Forth Month Report</th>
                                <td><?php echo date('Y M jS', strtotime($user->data()->report_eight_date)); ?></td>
                                <td>
                                    <a href="reports/<?php echo $user->data()->report_eight; ?>" target="_blank"
                                       class="btn btn-default btn-circle" data-toggle="tooltip"
                                       title="Download Report"><i class="fa fa-download"></i></a>

                                </td>
                            </tr>
                            <?php }
                            if (isset($user->data()->report_nine)) {?>
                            <tr class="odd gradeX">
                                <th>Fifth Month Targets</th>
                                <td><?php echo date('Y M jS', strtotime($user->data()->report_nine_date)); ?></td>
                                <td>
                                    <a href="reports/<?php echo $user->data()->report_nine; ?>" target="_blank"
                                       class="btn btn-default btn-circle" data-toggle="tooltip"
                                       title="Download Report"><i class="fa fa-download"></i></a>

                                </td>
                            </tr>
                            <?php }
                            if (isset($user->data()->report_ten)) {?>
                            <tr class="odd gradeX">
                                <th>Fifth Month Report</th>
                                <td><?php echo date('Y M jS', strtotime($user->data()->report_ten_date)); ?></td>
                                <td>
                                    <a href="reports/<?php echo $user->data()->report_ten; ?>" target="_blank"
                                       class="btn btn-default btn-circle" data-toggle="tooltip"
                                       title="Download Report"><i class="fa fa-download"></i></a>

                                </td>
                            </tr>
                            <?php }
                            if (isset($user->data()->report_eleven)) {?>
                            <tr class="odd gradeX">
                                <th>Sixth Month Targets</th>
                                <td><?php echo date('Y M jS', strtotime($user->data()->report_eleven_date)); ?></td>
                                <td>
                                    <a href="reports/<?php echo $user->data()->report_eleven; ?>" target="_blank"
                                       class="btn btn-default btn-circle" data-toggle="tooltip"
                                       title="Download Report"><i class="fa fa-download"></i></a>

                                </td>
                            </tr>
                            <?php }
                            if (isset($user->data()->report_twelve)) {?>
                            <tr class="odd gradeX">
                                <th>Sixth Month Report</th>
                                <td><?php echo date('Y M jS', strtotime($user->data()->report_twelve_date)); ?></td>
                                <td>
                                    <a href="reports/<?php echo $user->data()->report_twelve; ?>" target="_blank"
                                       class="btn btn-default btn-circle" data-toggle="tooltip"
                                       title="Download Report"><i class="fa fa-download"></i></a>

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
    <?php
    require_once 'temperates/copyRight.php';
    ?>
</div>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

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
            responsive: true
        });
    });
</script>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>


</body>

</html>
