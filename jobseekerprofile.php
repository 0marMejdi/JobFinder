<!DOCTYPE html>
<?php
include_once "allFrags.php";
// user must be authenticated to access this page
if (!isAuthenticated())
    sendError("unauthenticated", "login");
// if no email is specified, then requested profile is the current user's profile
if (!isset($_GET['email']))
    $user= $_SESSION['currentUser'];
else {
    // if email is specified in url, then requested profile is the user with that email
    // if no user with that email exists, then send error and go back to current user's profile page
    if(JobSeekerRepository::doesExist("email", $_GET['email']))
        $user = JobSeekerRepository::getOneWhere("email", $_GET['email']);
    else
        sendError("request_profile_doesnt_exist", here());
}

// calculating user's age
$currentDate = new DateTime();
$age = 18;
try {
    $age = $currentDate->diff(new DateTime($user->birthdate))->y;
} catch (Exception $e) {
    echo "Invalid BirthDate";
}
?>
<html lang="en">

<head>

    <title>My Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- logo -->
    <link href="assets/templates/logo.png" rel="icon">

    <!-- CSS -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <h1><a href="jobseekerprofile.php">JobFinder</a></h1>
                </div>

                <nav id="navbar" class="navbar">

                    <ul>
                        <li><a class="nav-link scrollto" href="userhome.php">Home Page</a></li>
                        <!-- well work on it ghodwa -->
                        <li><a class="nav-link scrollto active" href="jobseekerprofile.php">My Profile</a></li>
                        <li><a class="nav-link scrollto" href="">I will get to this ghodwa xd</a></li>
                        <li><a class="login " href="disconnect.php">Disconnect</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->



        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" <!--style="width: 18rem;"--> >
                        <img src="<?= getPicturePathForobject($user) ?> " class="card-img-top" alt="Profile Picture">
                        <div class="card-body">
                            <h5 class="card-title"> <?= ucwords($user->firstName) ?> <?=ucwords($user->lastName)?></h5>
                            <p class="card-text"><?= ucwords($user->title) ?> </p>
                            <p class="card-text"><?= ucwords($user->gender) ?>, <?=$age?> years old</p>
                            <p class="card-text"><?= ucwords($user->country) ?>, <?= ucwords($user->region) ?>, <?= $user->address ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><?= ucwords($user->firstName) ?> <?=ucwords($user->lastName)?></h1>
                            <p><?= ucwords($user->title) ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>About Me</h3>
                            <p> <?=$user->bio ?>   </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Contact Information</h3>
                            <p><i class="bi bi-telephone"></i> <?=$user->number ?></p>
                            <p><i class="bi bi-envelope"></i> <?=$user->email ?></p>
                            <p><i class="bi bi-geo-alt"></i> <?=ucwords($user->country) ?>, <?= ucwords($user->region) ?>, <?= $user->address ?></p>
                        </div>
                        <div class="col-md-6">
                            <h3>Skills</h3>
                            <ul>
                                <li>HTML</li>
                                <li>CSS</li>
                                <li>JavaScript</li>
                                <li>Python</li>
                                <li>SQL</li>
                                <li>Git</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Education</h3>
                            <!--<p><strong>Bachelor of Science in Computer Science</strong></p>
                            <p>University of California, Los Angeles</p>
                            <p>Graduated in 2015</p>-->
                            <p><?= $user->education?></p>
                        </div>
                        <div class="col-md-6">
                            <h3>Experience</h3>
                            <p><strong><?= ucwords($user->title) ?> </strong></p>
                            <p><?= $user->section ?>, <?= $user->subSection ?></p>
                            <p>for <?=$user->experience?> years </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>

        <!-- ======= Footer ======= -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">
                            Contact Us: Phone: +216 92 220 708 | Email: info@jobfinder.com | Address: Centre Urbain Nord
                            BP
                            676 - 1080
                            Tunis
                        </p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- End Footer -->



        <!-- JS -->
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/js/main.js"></script>

    </body>

</html>