<?php
//include "autoload.php";
include "allFrags.php";
session_start();
needsAuthentication();
function printJobOffer($job){
    $company = CompanyRepository::getOneWhere("email",$job->companyEmail);
    if ($company==NULL) return;
    ?>
    <div class='row'>
        <div class='col-md-12'>
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'><a href="joboffer.php?id=<?=$job->id?>"><?=$job->title?></a></h5>
                    <p class='card-text'><a href="CompanyProfile.php?email=<?=$company->email?>"> <?=$company->companyName?> </a> </p>
                    <p class='card-text'>Description: <?=$job->description?></p>
                    <div class='row'>
                        <div class='col-md-6'>
                            <p class='card-text'><span class='bi bi-geo-alt'></span> <?=ucwords($company->country)?>, <?=ucwords($company->region)?>, <?=ucwords($company->address)?></p>
                        </div>
                        <div class='col-md-6'>
                            <p class='card-text'><span class='bi bi-clock'></span> <?=$job->workType?></p>
                        </div>
                    </div>
                    <br>
                    <a href='joboffer.php?id=<?=$job->id?>' class='btn btn-primary'>See More</a>
                </div>
            </div>
        </div>
    </div>
    <br>
<?php
}
function printAllJobOffers($alljobs)
{

    if ($alljobs == NULL)
        echo "<div class='alert alert-info' >No Job offers to be shown, you haven't created any one </div>";
    else {
        usort($alljobs, function($a, $b) {
            return $a->publishDate < $b->publishDate;
        });
        foreach ($alljobs as $job)
            printJobOffer($job);
    }
}
if (!isset($_SESSION["filter"]))
{
    $alljobs= JobOfferRepository::getAllWhere();
}
else
{
    $alljobs= $_SESSION["filter"];
    unset($_SESSION["filter"]);
}
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
  <?php includeNavBarJobSeeker(here()); ?>
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
      <h2>
        <?= showErrorIfExists() ?>
      </h2>

      <div class="section-title">
        <h2>Recent Job Offers</h2>
        <p>Check out our recent job listings</p>
      </div>





      <!-- Filter  -->



      <section id="job-offer-filters" class="job-offer-filters">
        <div class="container" data-aos="fade-up">
          
          <div class='row'>
            <div class='col-md-12 justify-content-center'>
              <form class='form-inline mb-3 d-flex' action="filterprocess.php" method="post">
                <input class='form-control mr-sm-2' type='text' placeholder='Search by job title' aria-label='Search' name="title">
            </div>
          </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="work-time">Work Time</label>
                  <select class="form-control" id="work-time" name="work-time">
                    <option value="">-- Select --</option>
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="work-type">Work Type</label>
                  <select class="form-control" id="work-type" name="worktype">
                    <option value="">-- Select --</option>
                    <option value="office">Office</option>
                    <option value="remote">Remote</option>
                    <option value="both">Both</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="contract-type">Contract Type</label>
                  <select class="form-control" id="contract-type" name="contracttype">
                    <option value="">-- Select --</option>
                    <option value="CDI">CDI</option>
                    <option value="CDD">CDD</option>
                    <option value="freelance">Freelance</option>
                      <option value="volunteer">Volunteer</option>
                      <option value="internship">Internship</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="experience">Experience Required (in years)</label>
                  <input type="number" class="form-control" id="experience" name="experience" min="0">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="salary-min">Minimum Salary ($)</label>
                  <input type="number" class="form-control" id="salary-min" name="salarymin" min="0">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="salary-max">Maximum Salary ($)</label>
                  <input type="number" class="form-control" id="salary-max" name="salarymax" min="0">
                </div>
              </div>
            </div>
            <br>
            <center>
              <button type="submit" class="btn btn-primary">Filter Job Offers</button>
            </center>
          </form>
        </div>
      </section>




      <?php
        printAllJobOffers($alljobs);
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