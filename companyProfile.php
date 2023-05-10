<?php
include_once 'allFrags.php';
session_start();
needsAuthentication();

if (!isset($_GET['email'])) {
    $user = $_SESSION['currentUser'];
    if ($user->isJobSeeker()){
        header("Location: jobSeekerProfile.php");
    }
}
else {
    if(CompanyRepository::doesExist("email", $_GET['email']))
        $user = CompanyRepository::getOneWhere("email", $_GET['email']);
    else
        sendError("request_profile_doesnt_exist", here());
}

?>
<!-- Nitfehmou chnouwa bich n7otou fih -->

<?php
include_once "allFrags.php";
?>
<!DOCTYPE html>
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
        <?php includeNavBarCompany(here()) ?>


        <br><br>
        <!-- Company Profile Section -->
        <section id="company-profile" class="company-profile">
            <div class="container">
                <?= showErrorIfExists() ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="company-img" data-aos="fade-right" data-aos-delay="100">
                            <img src="<?= getPicturePathForobject($user) ?>" alt="Company Logo" width="300" height="300">
                        </div>
                    </div>
                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <div class="company-info" data-aos="fade-left" data-aos-delay="200">
                            <h3> <?= $user->companyName ?> Company </h3>
                            <p><i class="bx bx-envelope"></i> <?= $user->email ?> </p>
                            <div class="description">
                                <h5>Description</h5>
                                <p>
                                    <?= $user->description ?>
                                </p>
                            </div>
                            <div class="sector">
                                <h5>Sector</h5>
                                <ul>
                                    <li>
                                        <?= $user->sector ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="subsector">
                                <h5>Subsector</h5>
                                <ul>
                                    <li> <?= $user->subSector ?> </li>
                                </ul>
                            </div>
                            <div class="size">
                                <h5>Size</h5>
                                <?php
                                if ($user->size==1)
                                    echo "<p>1 Employee</p>";
                                else
                                    echo"<p>{$user->size} Employees</p>";
                                ?>
                            </div>
                            <div class="founded">
                                <h5>Founded</h5>
                                <p><?php
                                    $date = date_create($user->foundationDate);
                                    echo date_format($date, 'jS \of F, Y');
                                    ?>
                                </p>
                                </p>
                            </div>
                            <p><i class="bx bx-phone-call"></i> <?= $user->phone ?> </p>
                            <p><i class="bx bx-globe"></i> Country: <?= $user->country ?></p>
                            <p><i class="bx bx-map"></i> Region: <?= $user->region ?> </p>
                            <p><i class="bx bx-map"></i> Address: <?= $user->address ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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