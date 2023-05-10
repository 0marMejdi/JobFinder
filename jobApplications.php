<!DOCTYPE html>
<?php include_once 'allFrags.php';
session_start();
needsAuthentication();
function printTableHeaders(bool $withName){
    $NameCol = "<th>Title</th>";
    if(!$withName)
        $NameCol="";
    ?>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <?=$NameCol?>
        <th>Tell Us Why You Want to Join Us</th>
        <th>CV</th>
        <th>Decision</th>
    </tr>
<?php }
function printTableData($jobApplication, bool $withName){
    $jobSeeker = JobSeekerRepository::getOneWhere("email",$jobApplication->jobSeekerEmail);
    $jobOffer = JobOfferRepository::getOneWhere("id",$jobApplication->jobOfferID);
    $JobOfferRef="joboffer.php?id=".$jobOffer->id;
    $JobOfferName=$jobOffer->title;
    $nameData = "<td><a href='".$JobOfferRef. "'>".$JobOfferName ."</a> </td>";
    if (!$withName){
        $nameData="";
    }
    ?>
    <tr>
        <td><?= $jobSeeker->firstName?> <?= $jobSeeker->lastName?></td>
        <td><a href = "jobseekerprofile.php?email=<?=$jobSeeker->email?>"><?= $jobSeeker->email?> </a></td>
        <?= $nameData?>
        <td class="aboutus"> <?= $jobApplication->aboutMe ?></td>
    <!-- TODO :: change path later -->
        <td><a href="#" target="_blank">Download</a></td>
        <td><button type="button" class="btn btn-success">Accept</button> <button type="button" class="btn btn-danger">Decline</button></td>
    </tr>
<?php
}

$withName=false;
//if id JobOffer Id is passed and valid then show without name,
// if id Joboffer is not set, then show with name because we are going to show all so we need to know each ones job offer
if (!isset($_GET['id']) || !JobOfferRepository::doesExist('id',$_GET['id'])){
    $withName=true;
}else{
    $withName=false;
}
function printAllData(){
    $user = $_SESSION["currentUser"];
    $withName=false;
    //if id JobOffer Id is passed and valid then show without name,
    // if id Joboffer is not set, then show with name
    if (!isset($_GET['id']) || !JobOfferRepository::doesExist('id',$_GET['id'])){
        $withName=true;
        $allapps = JobApplicationRepository::getAllWhere("companyEmail",$user->email);
    }else{
        $withName=false;
        $allapps = JobApplicationRepository::getAllWhere("companyEmail",$user->email,"jobOfferID",$_GET['id']);
    }

    if ($allapps==NULL){
        echo "";
    }else{
        foreach ($allapps as $app){
            printTableData($app,$withName);
        }
    }
}
?>

<html lang="en">

<head>

    <title>Applications </title>
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
    <style>
        .table tbody td:last-child {
            display: flex;
            justify-content: center;
            gap: 7px;
        }
        th{
            text-align: center;
        }
        td{
            text-align: center;}
        .aboutus{
            text-align: left;
        }
    </style>

</head>

<body>



    <!-- ======= Header ======= -->
    <?php includeNavBarCompany(here()); ?>


    <br><br>

    <!-- Applications Section -->

    <section id="applications" class="applications">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Applications for Job Title</h2>
                <p>View the applications submitted for this job offer below.</p>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <?php
                                printTableHeaders($withName);
                            ?>
                            </thead>
                            <tbody>
                                <?php
                                printAllData();

                                ?>
                            </tbody>
                        </table>
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