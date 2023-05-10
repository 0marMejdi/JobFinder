<?php
include "allFrags.php";
include "autoload.php";
session_start();
needsAuthentication();
$user=$_SESSION["currentUser"];
$job=JobOfferRepository::getOneWhere("id",$_GET["id"]);
$client=CompanyRepository::getOneWhere("email",$job->companyEmail);
$clientName=$client->companyName;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Job Offer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- logo -->

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
                    <h1><a href="index.php">JobFinder</a></h1>
                </div>

                <nav id="navbar" class="navbar">

                    <ul>
                        <li><a class="nav-link scrollto" href="userhome.php">Home Page</a></li>
                        <!-- well work on it ghodwa -->
                        <li><a class="nav-link scrollto " href="jobseekerprofile.php">My Profile</a></li>
                        <li><a class="nav-link scrollto" href="">I will get to this ghodwa xd</a></li>
                        <li><a class="login " href="processess/disconnect.php">Disconnect</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->


        <br><br><br>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Job Offer Details</h2>
          <ol>
            <li><a href="UserHome.html">Home Page</a></li>
            <li>Job Offer Details</li>
          </ol>
        </div>

      </div>
    </section>
      <!-- End Breadcrumbs -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/team/team-1.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/team/team-2.jpg" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/team/team-3.jpg" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Job Information</h3>
              <ul>
                <li><strong>Job Title</strong>: <?= $job->title ?></li>
                <li><strong>Client</strong>: <?= $clientName ?></li>
                <li><strong>Published on</strong>: <?= $job->publishDate ?></li>
              </ul>
            </div>
            <div >
              <h2>Job Description</h2>
              <p>
                <?= $job->description ?>
              </p>
            </div>
            <br>
            <a href="jobApply.php?id=<?=$job->id?>" class="btn btn-primary">Apply Now</a>
          </div>

        </div>
        
      </div>
    </section><!-- End Portfolio Details Section -->

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