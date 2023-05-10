<?php
include "allFrags.php";
//include "autoload.php";
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

    <?php includeNavBarJobSeeker(here()); ?>


        <br><br><br>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Job Offer Details</h2>
        </div>

      </div>
    </section>
      <!-- End Breadcrumbs -->
      <section id="portfolio-details" class="portfolio-details">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="portfolio-details-slider text-center">
          <div class="swiper-slide">
            <img src="assets\img\jobs\job.jpg" alt="" style="width: 300px; margin: auto;">
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Job Information</h3>
          <ul>
            <li><strong>Job Title</strong>: <?= $job->title ?></li>
            <li><strong>Salary</strong>: <?= $job->salary?></li>
            <li><strong>Work Time</strong>: <?= $job->workTime ?></li>
            <li><strong>Work Type</strong>: <?= $job->workType ?></li>
            <li><strong>Published on</strong>: <?= $job->publishDate ?></li>
            <li><strong>location</strong>: <?= $job->location ?></li>
            <li><strong>Required Experience</strong>: <?= $job->experience ?></li>
            <li><strong>Company Name</strong>: <?= $clientName ?></li>
            <li><strong>Contract Type</strong>: <?= $job->contractType ?></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4">
        <div>
          <h2>Job Description</h2>
          <p>
            <?= $job->description ?>
          </p>
        </div>
        <br>
          <?php
          if ($user->isJobSeeker())
              echo"
        <a href='jobApply.php?id=<?= $job->id ?>' class='btn btn-primary'>Apply Now!</a>";
        ?>
      </div>

    </div>

  </div>
</section>


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