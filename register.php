<?php
require_once 'core/init.php';

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('login.php');
} elseif ($user->data()->group == 2) {
    Redirect::to('404');
}

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validation();
        $validate = $validate->check($_POST, array(
            'fname' => array(
                'required' => true,
                'min' => 2,
                'max' => 40
            ),
            'lname' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            ),
            'email' => array(
                'required' => true,
                'min' => 2,
                'max' => 60,
                'unique' => 'users'
            ),
            'university' => array(
                'required' => true),
            'phone' => array(
                'required' => true)
        ));

        if ($validate->passed()) {
            // register user
            // Session::flash('success', 'You have successfully registered a student');
            // header('Location: index.php');
            try {
                $user->create(array(
                    'fname' => Input::get('fname'),
                    'lname' => Input::get('lname'),
                    'email' => Input::get('email'),
                    'sex' => Input::get('sex'),
                    'university_id' => Input::get('university'),
                    'phone' => Input::get('phone'),
                    'alt_phone' => Input::get('contact'),
                    'residence' => Input::get('residence'),
                    'nkname' => Input::get('nkname'),
                    'course' => Input::get('course'),
                    'group' => 2,
                    'nkphone' => Input::get('nkphone')
                ));

                Session::flash('info', 'You have successfully registered a student');
                // Redirect::to('home.php');

            } catch (Exception $e) {
                Session::flash('info', 'Unable to register a student');
                // Redirect::to('home.php');

            }
        } else {
            // output errors
            Session::flash('info', $validation->errors()[0]);
        }
    }

}


// echo Config::get('mysql/host');
?>
<?php
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
                    Register Students
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="home.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> Register
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Student Registration Form
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <form role="form" action="" method="post">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" name="fname" id="fname"
                                               placeholder="Enter First name" value="" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" name="lname" id="lname"
                                               placeholder="Enter Last name" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" placeholder="Example@gmail.com"
                                               name="email" id="email" value="" required>
                                        <span class="text-danger" id="email_status"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="course">Course</label>
                                        <input class="form-control" id="course" name="course" type="text"
                                               placeholder="Enter course name" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-inline">
                                            <label for="msex">
                                                <input type="radio" name="sex" id="msex" value="male">Male
                                            </label>
                                        </div>
                                        <div class="radio-inline">
                                            <label for="fsex">
                                                <input type="radio" name="sex" id="fsex" value="female">Female
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="university">University</label>
                                        <select class="form-control" id="university" name="university">
                                            <option>---------------------------------select
                                                university------------------------
                                            </option>
                                            <?php
                                            $university = DB::getInstance()->query("SELECT * FROM university");
                                            foreach ($university->results() as $university) { ?>
                                                <option value="<?php echo $university->id; ?>">
                                                    <?php echo $university->name; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="residence">Residence</label>
                                        <input class="form-control" id="residence" name="residence" type="text"
                                               placeholder="Student's residence">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Telephone Number</label>
                                        <input class="form-control" id="phone" name="phone" type="tel"
                                               placeholder="07________"
                                               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact">Alternative Contact</label>
                                        <input class="form-control" id="contact" name="contact" type="tel"
                                               placeholder="07________"
                                               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
                                    </div>
                                    <div class="form-group">
                                        <label for="nkname">Next of Kin</label>
                                        <input class="form-control" id="nkname" name="nkname" type="text"
                                               placeholder="Next of kin's name">
                                    </div>
                                    <div class="form-group">
                                        <label for="nkphone">Next of Kin's Contact</label>
                                        <input class="form-control" id="nkphone" name="nkphone" type="tel"
                                               placeholder="Next of kin's number"
                                               pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Register</button>
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
        <!-- /.row -->
        <?php
        require_once 'temperates/copyRight.php';
        ?>
    </div>
<?php
require_once 'temperates/footer.php';
?>