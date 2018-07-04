<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isloggedIn()) {
    Redirect::to('login.php');

} elseif ($user->data()->group == 1) {
    Redirect::to('404');
}

if (Input::exists()) {
    /*$fromDate = new DateTime('2016-03-15');
    $curDate = new DateTime();

    $months = $curDate->diff($fromDate);
    echo $months->format('%m months');*/

    if (Token::check(Input::get('token'))) {
        $validate = new Validation();

        $validate = $validate->check($_POST, array(
            'name' => array(
                'required' => true
            )
        ));

        if ($validate->passed()) {

            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];

                /*file property*/
                $file_name = $file['name'];
                $file_tmp = $file['tmp_name'];
                $file_size = $file['size'];
                $file_error = $file['error'];

                /*file extension*/
                $file_ext = explode('.', $file_name);
                $file_ext = strtolower(end($file_ext));
                $allowed = array('pdf');

                if (in_array($file_ext, $allowed)) {
                    if ($file_error === 0) {
                        if ($file_size <= 5097152) {
                            $file_name_new = uniqid('', true) . '.' . $file_ext;
                            $file_destination = "reports/" . $file_name_new;

                            if (move_uploaded_file($file_tmp, $file_destination)) {

                                $type = Input::get('name');
                                $date = $type . '_date';
                                $uid = $user->data()->id;

                                $un = DB::getInstance()->query("UPDATE users SET $type = '$file_name_new', $date = NOW() WHERE id = '$uid'");
                                if ($un) {
                                    Session::flash('info', 'Report uploaded successfully');
                                } else {
                                    Session::flash('info', 'Oops!, Unable to upload report');
                                }
                            }
                        } else {
                            Session::flash('info', 'The upload file should not exceed 5Mbs');
                        }
                    }
                } else {
                    Session::flash('info', 'The upload file should be a pdf format');
                }
            } else {
                Session::flash('info', 'Select file to be uploaded');
            }

        } else {
            // output errors
            Session::flash('info', $validation->errors()[0]);

        }
    }

}


?>
<?php
require_once 'temperates/header.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php
                if (Session::exists('info')) { ?>
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i>
                        <?php
                        echo Session::flash('info');
                        ?>
                    </div>
                <?php
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Upload Report
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-cloud-upload"></i> Upload Reports
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <?php 
            $start_date = new DateTime($user->data()->joined);

            $current_date = new DateTime();
            $months = $current_date->diff($start_date);
            $num_of_months = $months->format('%m');
         ?>
         <?php if ($num_of_months > 7): ?>
         <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-exclamation-triangle"></i> 
                    <strong>
                     You cannot upload any reports on your account since your training period expired
                    </strong>
                </div>
            </div>
        </div>
        <!-- /.row -->
         <?php endif ?>
        <?php if ($num_of_months <= 7): ?>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i> You are required to provide quality and timely reports <strong>As
                        this will trigger timely payment of stipends. <i class="text-warning">Once a report is uploaded,
                            no further changes will be made it</i></strong>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Report Upload From
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <form role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="name">Report</label>
                                        <select class="form-control" id="name" name="name" required>
                                            <option value="">
                                                ---------------------------------Report------------------------
                                            </option>
                                            <?php
                                            if (!isset($user->data()->report_one)) {
                                                ?>
                                                <option value="report_one">Month one Targets</option>
                                            <?php }
                                            if (!isset($user->data()->report_two)) {
                                                ?>
                                                <option value="report_two">Month one Report</option>
                                            <?php }
                                            if (!isset($user->data()->report_three)) {
                                                ?>
                                                <option value="report_three">Month two Targets</option>
                                            <?php }
                                            if (!isset($user->data()->report_four)) {
                                                ?>
                                                <option value="report_four">Month two Report</option>
                                            <?php }
                                            if (!isset($user->data()->report_five)) {
                                                ?>
                                                <option value="report_five">Month three Targets</option>
                                            <?php }
                                            if (!isset($user->data()->report_six)) {
                                                ?>
                                                <option value="report_six">Month three Report</option>
                                            <?php }
                                            if ($user->data()->extension == 1) {

                                                if (!isset($user->data()->report_seven)) {
                                                    ?>
                                                    <option value="report_seven">Month four Targets</option>
                                                <?php }
                                                if (!isset($user->data()->report_eight)) {
                                                    ?>
                                                    <option value="report_eight">Month four Report</option>
                                                <?php }
                                                if (!isset($user->data()->report_nine)) {
                                                    ?>
                                                    <option value="report_nine">Month five Targets</option>
                                                <?php }
                                                if (!isset($user->data()->report_ten)) {
                                                    ?>
                                                    <option value="report_ten">Month five Report</option>
                                                <?php }
                                                if (!isset($user->data()->report_eleven)) {
                                                    ?>
                                                    <option value="report_eleven">Month six Targets</option>
                                                <?php }
                                                if (!isset($user->data()->report_twelve)) {
                                                    ?>
                                                    <option value="report_twelve">Month six Report</option>
                                                <?php }
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="report">Choose Report</label>
                                        <input type="file" id="report" name="file">

                                        <p class="help-block"><i class="text-warning">
                                                <small>The upload report should not exceed 5Mbs and should be a pdf
                                                    format
                                                </small>
                                            </i></p>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                            </form>


                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <?php endif ?>
        <!-- /.row -->
        <?php
        require_once 'temperates/copyRight.php';
        ?>
    </div>
<?php
require_once 'temperates/footer.php';
?>