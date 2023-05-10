<?php
include_once 'allFrags.php';
session_start();
needsAuthentication();
$user= $_SESSION["currentUser"];
if ($user->personType=="JobSeeker")
    header("Location: jobseekerprofile.php");
if (CompanyRepository::doesExist("email",$user->email))
    $user=CompanyRepository::getOneWhere("email",$user->email);
else
    sendError("current_user_not_found","login");
// make salary from 1 format to $1,000 format
function formatSalary($salary)
{
    $salary = strrev($salary);
    $salary = chunk_split($salary, 3, ',');
    $salary = strrev($salary);
    $salary = substr($salary, 1);
    return $salary;
}
function printOffer($joboffer){
    $formattedSalary = "$".$joboffer->salary." per month";
    echo "
        <div class='card'>
            <div class='card-header'>
                <h4><a href='joboffer.php?id={$joboffer->id}' >{$joboffer->title} </a></h4>
                <div class='job-post-date'>Posted on: <span>{$joboffer->publishDate}</span></div>
            </div>
        <div class='card-body'>
            <p>{$joboffer->description}</p>
            <ul>
                <li><strong>Salary:</strong> {$formattedSalary} </li>
            </ul>
        </div>
        <div class='card-footer'>
            <a href='#' class='btn btn-primary'>View Applications</a>
        </div>
    </div>
    <br>
    ";
}
function printAllJobOffers(){
    $user= $_SESSION["currentUser"];
    if (! JobOfferRepository::doesExist("companyEmail", $user->email))
    {
        echo "<div class='alert alert-info' >No Job offers to be shown, you haven't created any one </div>";
    }else{
        $jobOffersList = JobOfferRepository::getAllWhere("companyEmail", $user->email);

        foreach ($jobOffersList as $joboffer)
        {
            printOffer($joboffer);
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>My Job Offers</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- logo -->
    <link href="assets\img\logo.png" rel="icon">

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

        <?php includeNavBarCompany(here()) ?>


        <br> <br>


        <!-- ======= Job Offers Section ======= -->

        <section id="job-offers" class="job-offers">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>My Job Offers</h2>
                    <p>View the job offers created by your company below.</p>
                </div>


                <div class="align-items-stretch">
                    <?php
                        printAllJobOffers()
                    ?>
                </div>
            </div>
        </section>

        <br> <br>
        <br> <br>

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