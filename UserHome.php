<?php
include "autoload.php";
 include "allFrags.php";
 session_start();
 needsAuthentication();

$alljobs=JobOfferRepository::getAllWhere();

 var_dump($test);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home </title>
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
                <li><a class="nav-link scrollto active" href="userhome.php">Home </a></li>
                <!-- well work on it ghodwa -->
                <li><a class="nav-link scrollto " href="jobseekerprofile.php">My Profile</a></li>
                <li><a class="nav-link scrollto" href="jobseekerjobapplications.php">My Job Applications</a></li>
                <li><a class="login " href="login.php">Disconnect</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<br>

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Job Listings</h2>

        </div>
</section>

<!-- ======= Recent Job Offers Section ======= -->
<section id="job-offers" class="job-offers">
    <div class="container" data-aos="fade-up">
        <h2><?= showErrorIfExists() ?></h2>

        <div class="section-title">
            <h2>Recent Job Offers</h2>
            <p>Check out our recent job listings</p>
        </div>
<?php

        foreach ($alljobs as $job)                           {
            echo "<div class='row'>
        <div class='col-md-12'>
          <div class='card'>
            <img src='assets/img/team/team-1.jpg' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'><a href='joboffer.php?id={$job->id}'>{$job->title}</a></h5>
              <p class='card-text'>{$job->description}</p>
              <div class='row'>
                <div class='col-md-6'>
                  <p class='card-text'><span class='bi bi-geo-alt'></span> {$job->location}</p>
                </div>
                <div class='col-md-6'>
                  <p class='card-text'><span class='bi bi-clock'></span> {$job->workType}</p>
                </div>
              </div>
              <a href='joboffer.php?id={$job->id}' class='btn btn-primary'>See More</a>
            </div>
          </div>
        </div>
      </div>";
                                                            };
     ?>
    </div>
</section><!-- End Recent Job Offers Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    Contact Us: Phone: +216 92 220 708 | Email: info@jobfinder.com | Address: Centre Urbain Nord BP 676 - 1080
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