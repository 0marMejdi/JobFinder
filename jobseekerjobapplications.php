<?php
include "allFrags.php";
session_start();
needsAuthentication();
ConnexionBD::checkTables();
$user=$_SESSION["currentUser"];
if ($user->isCompany())
    header("Location: userhome.php");
if (JobSeekerRepository::doesExist("email",$user->email))
    $user=JobSeekerRepository::getOneWhere("email",$user->email);
else {
    unset($_SESSION["currentUser"]);
    sendError("current_user_not_found", "login");
}
$jobapplications=JobApplicationRepository::getAllWhere("jobSeekerEmail",$user->email);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>My Job Applications </title>
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

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="UserHome.php">JobFinder</a></h1>
            </div>

            <nav id="navbar" class="navbar">

                <ul>
                    <li><a class="nav-link scrollto " href="userhome.php">Home </a></li>
                    <li><a class="nav-link scrollto " href="jobseekerprofile.php">My Profile</a></li>
                    <li><a class="nav-link scrollto active" href="jobseekerjobapplications.php">My Job Applications</a>
                    </li>
                    <li><a class="login " href="login.php">Disconnect</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->



    <br><br>

    <!-- Job Applications Section -->

    <section id="job-applications" class="job-applications">
        <div class="container" data-aos="fade-up">
            <?=showSuccessIfExists()?>
            <?=showErrorIfExists()?>
            <div class="section-title">
                <h2>My Job Applications</h2>
                <p>View the job applications you've submitted below.</p>
            </div>
            <div class="align-items-stretch">

                     <?php
                     if ($jobapplications == NULL){

                     }else
                     foreach ($jobapplications as $jobapplication)
                     {
                         JobApplication::printJobApplication($jobapplication);
                     }
                        ?>
                     <br>



                 </div>
                <br>
            </div>
            <br>
        </div>
        <br>

    </section>
    <br>





    <!-- ======= Footer ======= -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">
                        Contact Us: Phone: +216 92 220 708 | Email: info@jobfinder.com | Address: Centre Urbain Nord BP
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